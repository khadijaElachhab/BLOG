<?php
// MODELE : inclusion des fonctions
include_once('modele/blog/getArticles.php');
include_once('modele/blog/getArticlesLimit.php');
include_once('modele/blog/countCommentaires.php');
include_once('modele/blog/countArticles.php');

// CONTROLEUR
// INITIALISATION des variables de SESSION
// ENTREE par DECONNEXION de l'admin
if(isset($_POST['deconnexion'])) unset($_SESSION['admin']);

// MISE A JOUR de $tousLesArticles
if(
    (isset($_POST['tousLesArticles']) && $_POST['tousLesArticles']==1) || 
    (isset($_GET['tousLesArticles']) && $_GET['tousLesArticles']==1) || 
    isset($_POST['boutonTousLesArticles'])
) {
    $tousLesArticles = 1;
} else {
    $tousLesArticles = 0;
}

// MISE A JOUR de $debut
$nbMessages = 3; // nombre de messages affichés en même temps
$step = 1; // la marche de montée et de descente
$debut = 0; // position de début d'affichage

// si on revient d'un commentaire : c'est par GET
if(isset($_GET['debut'])) $debut = (int)$_GET['debut'];

// si on a cliqué sur début, fin, suivant, précédent
if(isset($_POST['haut'])) {
    $debut = 0;
    $tousLesArticles = 0;
} elseif(isset($_POST['monter']) && $tousLesArticles == 0) {
    if($_POST['debut'] - $step >= 0) {
        $debut = (int)$_POST['debut'] - $step;
    } else {
        $debut = 0;
    }
} elseif(isset($_POST['bas'])) {
    $countArticles = MODELE_countArticles();
    $debut = $countArticles - $nbMessages;
    if($debut < 0) $debut = 0;
    $tousLesArticles = 0;
} elseif(isset($_POST['descendre']) && !$tousLesArticles) {
    $countArticles = MODELE_countArticles();
    if((int)$_POST['debut'] < $countArticles - $nbMessages) {
        $debut = (int)$_POST['debut'] + $step;
    } else {
        $debut = (int)$_POST['debut'];
    }
}

// RECUPERATION DES ARTICLES
if($tousLesArticles == 0) {
    $articles = MODELE_getArticlesLimit($debut, $nbMessages, 1); // 1 : les visibles
} else {
    $articles = MODELE_getArticles(1); // les visibles
}

// VUE : On affiche la page
include_once('vue/blog/indexArticles.php');
?>