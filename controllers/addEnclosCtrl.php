<?php

$error = [];

if (!empty($_POST)) {
    $enclos = new Models\Enclos();

    if (empty($_POST['nom'])) {
        try {
            $enclos->setName($_POST['nom']);
        } catch (Exception $e) {
            $error['nom'] = $e->getMessage();
        }
    }

    if (empty($_POST['description'])) {
        try {
            $enclos->setDescription($_POST['description']);
        } catch (Exception $e) {
            $error['description'] = $e->getMessage();
        }
    }

    if (empty($error)) {
        if ($enclos->create()) {
            header('Location: /');
        }
    }
}

render('addEnclos', [
    'error' => $error,
]);
