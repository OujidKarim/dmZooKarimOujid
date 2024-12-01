<?php

// Get the enclos ID from URL
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: /');
    exit;
}

$enclosManager = new \Models\Enclos();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Update the enclos
        $enclosManager->update(
            $id,
            $_POST['nom'],
            $_POST['description']
        );
        
        // Redirect to enclos view
        header('Location: /checkEnclos?id=' . $id);
        exit;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

// Get current enclos data
$enclos = $enclosManager->getById($id);

if (!$enclos) {
    header('Location: /');
    exit;
}

// Display the form
ob_start();
render('enclos/update', [
    'enclos' => $enclos,
    'error' => $error ?? null
], true);
$content = ob_get_clean();

render('default', [
    'title' => "Modifier l'enclos: " . $enclos->nom,
    'content' => $content
], true);
