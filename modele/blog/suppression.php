<?php
require_once('include/connexion.php');

function MODELE_supprimerArticle($id) {
    try {
        $bdd = getBdd();
        // Supprimer d'abord les commentaires associés
        $req = $bdd->prepare('DELETE FROM commentaires WHERE id_article = ?');
        $req->execute(array($id));
        
        // Puis supprimer l'article
        $req = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        return $req->execute(array($id));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function MODELE_supprimerCommentaire($id) {
    try {
        $bdd = getBdd();
        $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
        return $req->execute(array($id));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
} 