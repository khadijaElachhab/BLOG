<?php
require_once('modele/blog/getArticles.php');
require_once('modele/blog/getArticlesLimit.php');
require_once('modele/blog/countArticles.php');

// Fonction du contrôleur qui appelle la fonction du modèle
function getArticles() {
    // Nombre d'articles par page
    $articlesParPage = 5;
    
    // Récupération du numéro de page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if($page < 1) $page = 1;
    
    // Calcul de l'offset pour la requête SQL
    $offset = ($page - 1) * $articlesParPage;
    
    // Récupération du nombre total d'articles
    $totalArticles = MODELE_countArticles();
    
    // Calcul du nombre total de pages
    $totalPages = ceil($totalArticles / $articlesParPage);
    if($page > $totalPages && $totalPages > 0) $page = $totalPages;
    
    // Récupération des articles pour la page courante
    $articles = MODELE_getArticlesLimit($offset, $articlesParPage);
    
    // On retourne toutes les informations nécessaires
    return [
        'articles' => $articles,
        'page' => $page,
        'totalPages' => $totalPages
    ];
}
?> 