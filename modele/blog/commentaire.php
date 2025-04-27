function MODELE_getCommentaire($id) {
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT id, article_id, auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y à %H:%i:%s") AS date_commentaire_fr FROM commentaires WHERE id = ?');
    $req->execute(array($id));
    return $req->fetch();
}

function MODELE_modifierCommentaire($id, $auteur, $commentaire) {
    $bdd = getBdd();
    $req = $bdd->prepare('UPDATE commentaires SET auteur = ?, commentaire = ? WHERE id = ?');
    return $req->execute(array($auteur, $commentaire, $id));
} 