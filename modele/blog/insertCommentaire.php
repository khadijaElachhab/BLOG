<?php
require_once('include/connexion.php');
 
function insertCommentaire($idBillet, $auteur, $commentaire) {
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
    return $req->execute(array($idBillet, $auteur, $commentaire));
} 