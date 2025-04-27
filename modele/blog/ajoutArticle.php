<?php
require_once('include/connexion.php');

function MODELE_ajoutArticle($titre, $contenu) {
    try {
        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO articles (titre, contenu, dateCreation) VALUES (?, ?, NOW())');
        return $req->execute(array($titre, $contenu));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
} 