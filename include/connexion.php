<?php
function getBdd() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=blog_mvc;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    catch(Exception $e) {
        die('Erreur de connexion à la base de données : '.$e->getMessage());
    }
} 