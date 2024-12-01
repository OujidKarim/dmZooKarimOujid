<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize error array
    $error = [];
    
    // Create new enclos object
    $enclos = new \Models\Enclos();
    
    // Validate and set name
    if (empty($_POST['nom'])) {
        $error['nom'] = 'Le nom est requis';
    } else {
        try {
            $enclos->setName($_POST['nom']);
        } catch (Exception $e) {
            $error['nom'] = $e->getMessage();
        }
    }
    
    // Validate and set description
    if (empty($_POST['description'])) {
        $error['description'] = 'La description est requise';
    } else {
        try {
            $enclos->setDescription($_POST['description']);
        } catch (Exception $e) {
            $error['description'] = $e->getMessage();
        }
    }
    
    // If no errors, create enclos and redirect
    if (empty($error)) {
        if ($enclos->create()) {
            header('Location: /');
            exit();
        }
    }
    
    // If there are errors, render form with errors
    ob_start();
    render('forms/enclosInput', [
        'error' => $error
    ], true);
    $content = ob_get_clean();
    
    render('default', [
        'title' => 'Ajouter un enclos',
        'content' => $content
    ], true);
} else {
    // Display the form
    ob_start();
    render('forms/enclosInput', [
        'error' => []
    ], true);
    $content = ob_get_clean();
    
    render('default', [
        'title' => 'Ajouter un enclos',
        'content' => $content
    ], true);
}
