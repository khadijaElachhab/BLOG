<?php
require_once('modele/blog/getBillet.php');
require_once('modele/blog/getCommentaires.php');
 
function afficherBillet($id) {
    $billet = getBillet($id);
    $commentaires = getCommentaires($id);
    require('vue/blog/vueBillet.php');
} 