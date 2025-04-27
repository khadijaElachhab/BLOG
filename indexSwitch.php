<?php
session_start();

// Inclusion des contrôleurs
require_once('controleur/blog/getArticles.php');
require_once('controleur/blog/commentaires.php');
require_once('controleur/blog/ajoutArticle.php');
require_once('controleur/blog/suppression.php');
require_once('controleur/blog/modifierArticle.php');


if (isset($_GET['indexArticles']) && $_GET['indexArticles'] == 1) {
    // Page des articles avec pagination
    $result = getArticles();
    $articles = $result['articles'];
    $page = $result['page'];
    $totalPages = $result['totalPages'];
    require('vue/blog/indexArticles.php');
}
elseif (isset($_GET['modifierArticle'])) {
    // Page de modification d'article
    $articleId = (int)$_GET['modifierArticle'];
    afficherFormulaireModification($articleId);
}
elseif (isset($_GET['action']) && $_GET['action'] == 'modifierArticle' && isset($_GET['id'])) {
    // Traitement de la modification d'article
    $articleId = (int)$_GET['id'];
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
    modifierArticle($articleId, $titre, $contenu);
}
elseif (isset($_GET['action']) && $_GET['action'] == 'supprimerArticle' && isset($_GET['id'])) {
    // Suppression d'un article
    $articleId = (int)$_GET['id'];
    supprimerArticle($articleId);
}
elseif (isset($_GET['action']) && $_GET['action'] == 'supprimerCommentaire' && isset($_GET['id'])) {
    // Suppression d'un commentaire
    $commentaireId = (int)$_GET['id'];
    supprimerCommentaire($commentaireId);
}
elseif (isset($_GET['ajoutArticle']) && $_GET['ajoutArticle'] == 1) {
    // Page d'ajout d'article
    afficherFormulaireAjoutArticle();
}
elseif (isset($_GET['action']) && $_GET['action'] == 'ajoutArticle') {
    // Traitement de l'ajout d'article
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
    ajouterArticle($titre, $contenu);
}
elseif (isset($_GET['commentaires'])) {
    // Page des commentaires d'un article
    $articleId = (int)$_GET['commentaires'];
    afficherCommentaires($articleId);
}
elseif (isset($_GET['action']) && $_GET['action'] == 'ajoutCommentaire' && isset($_GET['id'])) {
    // Ajout d'un commentaire
    $articleId = (int)$_GET['id'];
    $commentaire = isset($_POST['commentaire']) ? $_POST['commentaire'] : '';
    $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
    ajouterCommentaire($articleId, $commentaire, $auteur);
}
elseif (isset($_GET['deconnexion']) && $_GET['deconnexion'] == 1) {
    // Déconnexion
    session_destroy();
    header('Location: indexSwitch.php?indexArticles=1');
    exit();
}
else {
    // Page d'accueil par défaut - redirection vers les articles
    header('Location: indexSwitch.php?indexArticles=1');
    exit();
}
?>