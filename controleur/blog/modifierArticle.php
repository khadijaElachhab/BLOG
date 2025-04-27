<?php
require_once('modele/blog/modifierArticle.php');
require_once('modele/blog/getArticle.php');

function afficherFormulaireModification($id) {
    $article = MODELE_getArticle($id);
    if (!$article) {
        $_SESSION['erreur'] = "Article non trouvé";
        header('Location: indexSwitch.php?indexArticles=1');
        exit();
    }
    require('vue/blog/modifierArticle.php');
}

function modifierArticle($id, $titre, $contenu) {
    if (empty($titre) || empty($contenu)) {
        $_SESSION['erreur'] = "Tous les champs sont obligatoires";
        header('Location: indexSwitch.php?modifierArticle=' . $id);
        exit();
    }
    
    if (MODELE_modifierArticle($id, $titre, $contenu)) {
        $_SESSION['message'] = "Article modifié avec succès";
        header('Location: indexSwitch.php?indexArticles=1');
    } else {
        $_SESSION['erreur'] = "Erreur lors de la modification de l'article";
        header('Location: indexSwitch.php?modifierArticle=' . $id);
    }
    exit();
} 