<?php
require_once('include/connexion.php');

function getBillet($id) {
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets WHERE id = ?');
    $req->execute(array($id));
    $billet = $req->fetch();
    return $billet;
} 