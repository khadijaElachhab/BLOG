<?php
function MODELE_ajoutCommentaire($idArticle, $auteur, $commentaire)
{
    global $bdd;
    
    $reqSQL = 'INSERT INTO commentaires(id_article, auteur, commentaire, dateCommentaire, visible)
               VALUES(:id_article, :auteur, :commentaire, NOW(), 1)';
    
    $requete = $bdd->prepare($reqSQL);
    $requete->bindValue(':id_article', $idArticle, PDO::PARAM_INT);
    $requete->bindValue(':auteur', $auteur, PDO::PARAM_STR);
    $requete->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
    $resultat = $requete->execute();
    
    return $resultat;
}