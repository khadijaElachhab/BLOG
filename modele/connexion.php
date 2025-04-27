<?php
try {
    $host = "localhost";
    $dbname = "blog";
    $user = "root";
    $password = "";
    
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
} 