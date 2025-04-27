<?php
require_once('include/connexion.php');

function MODELE_modifierArticle($id, $titre, $contenu) {
    try {
        $bdd = getBdd();
        $req = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ? WHERE id = ?');
        return $req->execute(array($titre, $contenu, $id));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
} 