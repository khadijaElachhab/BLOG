<?php
require_once('modele/blog/ajoutArticle.php');

function afficherFormulaireAjoutArticle() {
    require('vue/blog/ajoutArticle.php');
}

function ajouterArticle($titre, $contenu) {
    if (empty($titre) || empty($contenu)) {
        $_SESSION['erreur'] = "Tous les champs sont obligatoires";
        header('Location: indexSwitch.php?ajoutArticle=1');
        exit();
    }
    
    if (MODELE_ajoutArticle($titre, $contenu)) {
        $_SESSION['message'] = "Article ajouté avec succès";
        header('Location: indexSwitch.php?indexArticles=1');
    } else {
        $_SESSION['erreur'] = "Erreur lors de l'ajout de l'article";
        header('Location: indexSwitch.php?ajoutArticle=1');
    }
    exit();
} 