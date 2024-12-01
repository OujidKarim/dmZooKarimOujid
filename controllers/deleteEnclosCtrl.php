<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $enclosManager = new \Models\Enclos();
    
    try {
        // Check if there are any animals in this enclos
        $animals = $enclosManager->getAnimals($_POST['id']);
        
        if (!empty($animals)) {
            $_SESSION['error'] = "Impossible de supprimer l'enclos car il contient des animaux.";
            header('Location: /');
            exit;
        }
        
        // Delete the enclos if no animals are present
        if ($enclosManager->delete($_POST['id'])) {
            $_SESSION['success'] = "L'enclos a été supprimé avec succès.";
            header('Location: /');
            exit;
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'enclos.";
            header('Location: /');
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Erreur: " . $e->getMessage();
        header('Location: /');
        exit;
    }
}

// If we get here, it means the request wasn't POST or didn't have an ID
header('Location: /');
exit;
