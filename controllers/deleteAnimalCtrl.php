<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['enclos_id'])) {
    $animalManager = new \Models\Animaux();
    
    try {
        if ($animalManager->delete($_POST['id'])) {
            // Redirect back to the enclos view after successful deletion
            header('Location: /checkEnclos?id=' . $_POST['enclos_id']);
            exit;
        }
    } catch (Exception $e) {
        // Handle any errors
        // You might want to add error handling here
    }
}

// If something went wrong, redirect back to the enclos list
header('Location: /');
exit;
