<?php
// "/" route
// Checking if the template file exists
$templatePath = 'templates/enclos/default.php';
if (!file_exists($templatePath)) {
    throw new Exception("File not found: $templatePath");
}

// Creating an instance of the Enclos class
$enclos = new Models\Enclos();

// Displaying the index page with the list of enclos as data
render('index', [
    'EnclosList' => $enclos->getAll(),
]);


