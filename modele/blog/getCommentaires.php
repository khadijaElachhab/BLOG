<?php
require_once('include/connexion.php');

function MODELE_getCommentaires($articleId) {
    try {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(dateCommentaire, \'%d/%m/%Y à %Hh%i\') as date_creation_fr 
                             FROM commentaires 
                             WHERE id_article = ? 
                             ORDER BY dateCommentaire DESC');
        $req->execute(array($articleId));
        return $req->fetchAll();
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function MODELE_ajoutCommentaire($articleId, $commentaire, $auteur) {
    try {
        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO commentaires (id_article, auteur, commentaire, dateCommentaire, visible) VALUES (?, ?, ?, NOW(), 1)');
        return $req->execute(array($articleId, $auteur, $commentaire));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}