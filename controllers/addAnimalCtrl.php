<?php
// This file is called when we want to add an animal to a enclos
// We handle the form submission here
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Create a new animal object
        $animal = new \Models\Animaux();
        
        // Get the enclos_id from URL parameter
        // We need to know which enclos this animal belongs to
        $enclosId = $_GET['enclos_id'] ?? null;
        
        // Set the properties of the animal
        $animal->setName($_POST['nom']);
        $animal->setDescription($_POST['description']);
        $animal->setEspeceId($_POST['espece']); // Set the specie id
        $animal->setEnclosId($enclosId); // Set the enclos id
        
        // If the animal is successfully added, redirect to the page of the enclos
        if($animal->add()) {
            header("Location: /checkEnclos?id=" . $enclosId);
            exit;
        }
    } catch (Exception $e) {
        // If there is an error, store the message in the $error variable
        $error = $e->getMessage();
    }
}

// Get list of species for the form
// We need to know which species are available when creating an animal
$especesManager = new \Models\Especes();
$especes = $especesManager->getAll();

// Display the form
// We use the 'animaux/create' view to display the form
// We pass the error message if there is one, the list of species, and the enclos id to the view
ob_start();
render('animaux/create', [
    'error' => $error ?? null,
    'especes' => $especes,
    'enclos_id' => $_GET['enclos_id'] ?? null
], true);
$content = ob_get_clean();

// Display the page
// We use the 'default' view to display the page
// We pass the title of the page and the content to the view
render('default', [
    'title' => 'Ajouter un animal',
    'content' => $content
], true);

