<?php
// MODELE : inclusion des fonctions
include_once('modele/blog/ajoutCommentaire.php');

// Récupération des données du formulaire
$idArticle = isset($_POST['id_article']) ? (int)$_POST['id_article'] : 0;
$auteur = isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : '';
$commentaire = isset($_POST['commentaire']) ? htmlspecialchars($_POST['commentaire']) : '';

// Validation des données
if($idArticle > 0 && !empty($auteur) && !empty($commentaire)) {
    // Ajout du commentaire
    $resultat = MODELE_ajoutCommentaire($idArticle, $auteur, $commentaire);
    
    // Redirection vers la page des commentaires
    header('Location: indexSwitch.php?indexCommentaires=1&idArticle=' . $idArticle . '&debut=' . (isset($_POST['debut']) ? $_POST['debut'] : 0) . '&tousLesArticles=' . (isset($_POST['tousLesArticles']) ? $_POST['tousLesArticles'] : 0));
    exit();
} else {
    // En cas d'erreur, redirection vers la page des articles
    header('Location: indexSwitch.php?indexArticles=1');
    exit();
}
?>