<?php
// Contrôleur pour l'affichage des exercices

// Inclusion éventuelle de modèles pour récupérer des données d'exercices
// include_once('modele/exos/getExercices.php');

// Liste des exercices disponibles
$exercices = [
    [
        'id' => 1,
        'titre' => 'Exercice 1: Variables et tableaux PHP',
        'description' => 'Manipulation des variables et tableaux en PHP',
        'lien' => 'indexSwitch.php?exo=1'
    ],
    [
        'id' => 2,
        'titre' => 'Exercice 2: Formulaires et validation',
        'description' => 'Création et validation de formulaires en PHP',
        'lien' => 'indexSwitch.php?exo=2'
    ],
    [
        'id' => 3,
        'titre' => 'Exercice 3: MVC et base de données',
        'description' => 'Application du modèle MVC avec accès à une base de données',
        'lien' => 'indexSwitch.php?exo=3'
    ]
];

// Traitement si un exercice spécifique est demandé
if(isset($_GET['exo'])) {
    $idExercice = (int)$_GET['exo'];
    
    // Recherche de l'exercice demandé
    $exerciceSelectionne = null;
    foreach($exercices as $exo) {
        if($exo['id'] == $idExercice) {
            $exerciceSelectionne = $exo;
            break;
        }
    }
    
    // Si exercice trouvé, inclusion du contrôleur spécifique
    if($exerciceSelectionne) {
        include_once('controleur/exos/exercice' . $idExercice . '.php');
        exit();
    }
}

// Vue : On affiche la liste des exercices
include_once('vue/exos/indexExos.php');