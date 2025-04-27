<?php
// MODELE : inclusion des fonctions
include_once('modele/blog/getArticle.php');
include_once('modele/blog/getCommentaires.php');

// CONTROLEUR
// Récupération de l'id de l'article
$idArticle = isset($_GET['idArticle']) ? (int)$_GET['idArticle'] : 0;

// Récupération de l'article
$article = MODELE_getArticle($idArticle);

// Si l'article n'existe pas, on redirige vers la liste des articles
if (!$article) {
    header('Location: indexSwitch.php?indexArticles=1');
    exit();
}

$commentaires = MODELE_getCommentaires($idArticle, 1); // 1 : les visibles

// VUE : On affiche la page
include_once('vue/blog/indexCommentaires.php');
?>