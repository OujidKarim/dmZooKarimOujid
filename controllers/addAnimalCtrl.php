<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $animal = new \Models\Animaux();
        
        // Get the enclos_id from URL parameter
        $enclosId = $_GET['enclos_id'] ?? null;
        
        // Set the properties
        $animal->setName($_POST['nom']);
        $animal->setDescription($_POST['description']);
        $animal->setEspeceId($_POST['espece']); // Make sure this is being passed
        $animal->setEnclosId($enclosId);
        
        if($animal->add()) {
            header("Location: /checkEnclos?id=" . $enclosId);
            exit;
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

// Get list of species for the form
$especesManager = new \Models\Especes();
$especes = $especesManager->getAll();

// Display the form
ob_start();
render('animaux/create', [
    'error' => $error ?? null,
    'especes' => $especes,
    'enclos_id' => $_GET['enclos_id'] ?? null
], true);
$content = ob_get_clean();

render('default', [
    'title' => 'Ajouter un animal',
    'content' => $content
], true);
