<?php
require_once('include/connexion.php');

function MODELE_getArticles() {
    try {
        $bdd = getBdd();
        $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(dateCreation, \'%d/%m/%Y à %Hh%i\') as date_creation_fr FROM articles ORDER BY dateCreation DESC');
        return $req->fetchAll();
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}