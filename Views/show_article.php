<?php
require 'layouts/header.php';
require '../connec.php';
require '../Model/ArticleModel.php';

$article = null;
// Récupérer l'article en GET-ant le param id de l'article 
// puis récupérer ses infos grâce à la méthode selectOneArticle($id)  
// TIPS : s'inspirer de la même logique que pour l'action delete
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $article = getOneArticle(intval($id));
}
var_dump($article);
?>
<div class="container">
    <div class="row">
        <!-- AFFICHER LES DÉTAILS DE L'ARTICLE (title, img, content)-->
        <div class="col-12">
            <div class="media">
                <img src="" class="mr-3" alt="image">
                <div class="media-body">
                    <h5 class="mt-0">TITRE</h5>
                    <p>CONTENT</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'layouts/footer.php'; ?>