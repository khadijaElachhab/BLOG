<?php
require_once('modele/blog/getArticle.php');
require_once('modele/blog/getCommentaires.php');

function afficherCommentaires($articleId) {
    // Récupération de l'article
    $article = MODELE_getArticle($articleId);
    if (!$article) {
        header('Location: indexSwitch.php?indexArticles=1');
        exit();
    }
    
    // Récupération des commentaires
    $commentaires = MODELE_getCommentaires($articleId);
    
    // Affichage de la vue
    require('vue/blog/commentaires.php');
}

function ajouterCommentaire($articleId, $commentaire, $auteur) {
    if (empty($commentaire)) {
        $_SESSION['erreur'] = "Le commentaire ne peut pas être vide";
        header('Location: indexSwitch.php?commentaires=' . $articleId);
        exit();
    }
    
    if (empty($auteur)) {
        $auteur = "Anonyme";
    }
    
    if (MODELE_ajoutCommentaire($articleId, $commentaire, $auteur)) {
        $_SESSION['message'] = "Commentaire ajouté avec succès";
    } else {
        $_SESSION['erreur'] = "Erreur lors de l'ajout du commentaire";
    }
    
    header('Location: indexSwitch.php?commentaires=' . $articleId);
    exit();
}
?> 