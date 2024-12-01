<?php

// Check if id is provided
if (!isset($_GET['id'])) {
    header('Location: /');
    exit;
}

// Get enclos details
$enclos = new \Models\Enclos();
$enclos = $enclos->getById($_GET['id']);

if (!$enclos) {
    header('Location: /');
    exit;
}

// Get animals in this enclos
$animals = new \Models\Animaux();
$animals = $animals->getByEnclosId($_GET['id']);

// Start output buffering
ob_start();
render('enclos/check', [
    'enclos' => $enclos,
    'animals' => $animals
], true);
$content = ob_get_clean();

// Make sure $enclos is an object and has the 'nom' property
$title = (is_object($enclos) && property_exists($enclos, 'nom')) ? 
    "Enclos : {$enclos->nom}" : "Enclos";

render('default', [
    'title' => $title,
    'content' => $content
], true);
