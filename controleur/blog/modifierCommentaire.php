<?php
require_once 'modele/blog/commentaire.php';

// Récupération des paramètres
$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

if (!$id) {
    header('Location: index.php');
    exit();
}

// Récupération du commentaire
$commentaire = MODELE_getCommentaire($id);
if (!$commentaire) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation des données
    $auteur = trim($_POST['auteur']);
    $texte_commentaire = trim($_POST['commentaire']);
    
    if (empty($auteur) || empty($texte_commentaire)) {
        $erreur = "Tous les champs sont obligatoires.";
    } else {
        // Traitement du formulaire de modification
        if (MODELE_modifierCommentaire($id, $auteur, $texte_commentaire)) {
            header('Location: index.php?action=article&id=' . $commentaire['article_id']);
            exit();
        } else {
            $erreur = "Une erreur est survenue lors de la modification du commentaire.";
        }
    }
}

// Affichage de la vue
require 'vue/blog/modifierCommentaire.php'; 