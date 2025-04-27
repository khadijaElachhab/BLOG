<?php
require_once('include/connexion.php');

function MODELE_countArticles() {
    try {
        $bdd = getBdd();
        $req = $bdd->query('SELECT COUNT(*) as total FROM articles');
        $count = $req->fetch();
        return $count['total'];
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}