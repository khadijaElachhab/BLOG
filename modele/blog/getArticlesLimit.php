<?php
require_once('include/connexion.php');

function getArticlesLimit($debut, $limite) {
    $bdd = getBdd();
    $articles = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite');
    $articles->bindValue(':debut', $debut, PDO::PARAM_INT);
    $articles->bindValue(':limite', $limite, PDO::PARAM_INT);
    $articles->execute();
    return $articles;
}

function MODELE_getArticlesLimit($offset, $limit) {
    try {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateCreation, \'%d/%m/%Y à %Hh%i\') as date_creation_fr 
                             FROM articles 
                             ORDER BY dateCreation DESC 
                             LIMIT :offset, :limit');
        $req->bindValue(':offset', $offset, PDO::PARAM_INT);
        $req->bindValue(':limit', $limit, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll();
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}