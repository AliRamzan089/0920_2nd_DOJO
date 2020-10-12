<?php
require 'layouts/header.php';
require '../connec.php';
require '../Model/ArticleModel.php';

$article = null;
// Récupérer les infos de l'article à updater si il y en a un
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $article = getOneArticle(intval($id));
}
// Récupérer les données du formulaire et les traiter en fonction de si 
// le form est en create ou en update 
// Traiter les erreurs => tous les champs doivent être rempli
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['img']) && !empty($_POST['content'])) {
        if (isset($_POST['create'])) {
            createArticle($_POST);
        } else {
            updateArticle($_POST);
        }
    } else {
        $error = 'Tous les champs sont obligatoires !';
    }
}

var_dump($article);
?>
<div class="container">
    <div class="row">
        <!-- FORMULAIRE CREATE & UPDATE -->
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="title">Titre *</label>
                    <input type="text" class="form-control" id="title" name="title" value="">
                </div>
                <div class="form-group">
                    <label for="img">Image * ( https://www.placecage.com/640/360 )</label>
                    <input type="text" class="form-control" id="img" name="img" value="">
                </div>
                <div class="form-group">
                    <label for="content">Texte *</label>
                    <textarea class="form-control" id="content" name="content" value=""></textarea>
                </div>
                <div class="form-group">
                    <small>Tous les champs sont obligatoires *</small>
                </div>
                <input type="text" class="d-none" id="id" name="id" value="">
                <div class="text-center mt-5">
                    <!-- CONDITION D'AFFICHAGE DES BOUTONS DU FORM -->
                    <!-- ici, afficher le bouton create si en create OU le bouton update si en update -->
                    <?php if ($article === null) { ?>
                        <button type="submit" class="btn btn-primary" name="create">Create</button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'layouts/footer.php'; ?>