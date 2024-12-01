<?php
// route "/"
// Vérification de l'existence du fichier de template
$templatePath = 'templates/enclos/default.php';
if (!file_exists($templatePath)) {
    throw new Exception("File not found: $templatePath");
}

// Création d'un objet (instance) de la classe Enclos
$enclos = new Models\Enclos();

// Affichage de la page index.php avec la liste des enclos en data
render('index', [
    'EnclosList' => $enclos->getAll(),
]);

