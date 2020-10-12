<?php
require 'layouts/header.php';
require '../connec.php';
require '../Model/ArticleModel.php';

$article = null;
// Récupérer les infos de l'article à updater si il y en a un
// S'inspirer de la logique pour le delete



// Récupérer les données du formulaire et les traiter en fonction de si 
// le form est en create ou en update 
// Traiter les erreurs => tous les champs doivent être rempli
?>
<div class="container">
    <div class="row">
        <!-- FORMULAIRE CREATE & UPDATE -->
        <div class="col-12">
             <!-- CONDITION D'AFFICHAGE ERREUR FORM -->
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
                    <textarea 
                    class="form-control" 
                    id="content" 
                    name="content" 
                    value=""></textarea>
                </div>
                <div class="form-group">
                    <small>Tous les champs sont obligatoires *</small>
                </div>
                <input type="text" class="d-none" id="id" name="id" value="">
                <div class="text-center mt-5">
                    <!-- CONDITION D'AFFICHAGE DES BOUTONS DU FORM -->
                    <!-- ici, afficher le bouton create si en create OU le bouton update si en update -->
                   
                        <button type="submit" class="btn btn-primary" name="create">Create</button>
                
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'layouts/footer.php'; ?>