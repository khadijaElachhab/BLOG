<?php
require_once('include/connexion.php');

function MODELE_getArticle($id)
{
    try {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateCreation, \'%d/%m/%Y à %Hh%i\') as date_creation_fr FROM articles WHERE id = ?');
        $req->execute(array($id));
        return $req->fetch();
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}