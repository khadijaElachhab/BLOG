<?php
require_once('include/connexion.php');

function countCommentaires($idBillet = null) {
    $bdd = getBdd();
    if ($idBillet) {
        $req = $bdd->prepare('SELECT COUNT(*) as total FROM commentaires WHERE id_billet = ?');
        $req->execute(array($idBillet));
    } else {
        $req = $bdd->query('SELECT COUNT(*) as total FROM commentaires');
    }
    $count = $req->fetch();
    return $count['total'];
}