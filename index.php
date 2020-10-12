<?php
require 'Views/layouts/header.php';
require 'connec.php';
require 'Model/ArticleModel.php';

// SI GET delete_id existe et qu'il n'est pas vide ---------
if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])){
    // intval pour s'assurer que la valeur soit bien convertie en INTEGER
    $id = intval($_GET['delete_id']);
    // Appel à la fonction deleteArticle 
    deleteArticle($id);
}
$articles = getAllArticles();

// DEBUG -----------
var_dump($articles);
// ------------------
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- BONUS : FORM SEARCH TERM --> 
            <form>
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search">
                        </div>
                    </div>
                    <div class="col-1">
                        <button type="submit" name="search" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="col-2">
                        <!-- ADD ARTICLE -->
                        <a href="Views/edit_article.php" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- ICI BOUCLER SUR TOUS LES ARTICLES ET 
        AFFICHER LEURS TITRES ET LEURS IMAGES AUX BONS ENDROITS DE LA CARD BOOTSTRAP -->
        <div class="my-5"><hr></div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="card">

                <img src="<!-- IMAGE -->" class="card-img-top" alt="<!-- IMAGE -->">

                <div class="card-body">
                    <h5 class="card-title">TITRE</h5>
                </div>

                <!-- AJOUTER UN MOYEN DE RÉCUPÉRER L'ID DE CHAQUE ARTICLE DANS LES LIENS SUIVANTS -->
                <div class="card-footer text-center bg-dark">
                    <!-- SHOW ONE ARTICLE -->
                    <a href="Views/show_article.php?id=" class="btn btn-success text-white"><i class="fas fa-eye"></i></a>
                    <!-- EDIT ARTICLE -->
                    <a href="Views/edit_article.php?id=" class="btn btn-warning text-white"><i class="fas fa-pen"></i></a>
                    <!-- DELETE ARTICLE -->
                    <a href="index.php?delete_id=1" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </div>
            </div>
        </div>

    </div>
</div>
<?php require 'Views/layouts/footer.php'; ?>