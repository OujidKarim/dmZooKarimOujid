<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $enclosManager = new \Models\Enclos();
    
    // Check if there are any animals in this enclos
    $animals = $enclosManager->getAnimals($_POST['id']);
    
    if (empty($animals)) {
        // Delete the enclos if no animals are present
        if ($enclosManager->delete($_POST['id'])) {
            header('Location: /');
            exit;
        }
    }
    
    // If we get here, either there were animals or the deletion failed
    // You might want to add error handling here
}

// Redirect back to the list if something went wrong
header('Location: /');
exit;
