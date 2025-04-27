<?php
require_once('modele/blog/suppression.php');

function supprimerArticle($id) {
    if (MODELE_supprimerArticle($id)) {
        $_SESSION['message'] = "Article supprimé avec succès";
    } else {
        $_SESSION['erreur'] = "Erreur lors de la suppression de l'article";
    }
    header('Location: indexSwitch.php?indexArticles=1');
    exit();
}

function supprimerCommentaire($id) {
    if (MODELE_supprimerCommentaire($id)) {
        $_SESSION['message'] = "Commentaire supprimé avec succès";
    } else {
        $_SESSION['erreur'] = "Erreur lors de la suppression du commentaire";
    }
    // Rediriger vers la page des commentaires de l'article
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} 