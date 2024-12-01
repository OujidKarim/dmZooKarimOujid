<?php

// Get the animal and enclos IDs from URL
$animalId = $_GET['id'] ?? null;
$enclosId = $_GET['enclos_id'] ?? null;

if (!$animalId || !$enclosId) {
    header('Location: /');
    exit;
}

$animalManager = new \Models\Animaux();
$especesManager = new \Models\Especes();

// Get current animal data
$animal = $animalManager->getById($animalId);
if (!$animal) {
    header('Location: /checkEnclos?id=' . $enclosId);
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $animal = new \Models\Animaux();
        
        // Set the properties
        $animal->setName($_POST['nom'] ?? '');
        $animal->setDescription($_POST['description'] ?? '');
        $animal->setEspeceId($_POST['espece'] ?? '');
        $animal->setEnclosId($enclosId);
        
        if($animal->update($animalId)) {
            header("Location: /checkEnclos?id=" . $enclosId);
            exit;
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

// Get list of species for the form
$especes = $especesManager->getAll();

// Display the form
ob_start();
render('animaux/update', [
    'animal' => $animal,
    'especes' => $especes,
    'error' => $error ?? null,
    'enclos_id' => $enclosId
], true);
$content = ob_get_clean();

render('default', [
    'title' => "Modifier l'animal: " . $animal->nom,
    'content' => $content
], true);
