<?php

// Start the session
session_start();

// Include utility functions
require 'utils/utils.php';

// Include the autoloader to load classes dynamically
require 'utils/splAutoload.php';

// Switch to select the controller based on the url
switch ($_SERVER['REDIRECT_URL']) {
    // Home page
    case '/':
        require 'controllers/indexCtrl.php';
        break;

    // Add an enclos
    case '/addEnclos':
        require 'controllers/addEnclosCtrl.php';
        break;

    // Check an enclos
    case '/checkEnclos':
        require 'controllers/checkEnclosCtrl.php';
        break;

    // Delete an enclos
    case '/deleteEnclos':
        require 'controllers/deleteEnclosCtrl.php';
        break;

    // Update an enclos
    case '/updateEnclos':
        require 'controllers/updateEnclosCtrl.php';
        break;

    // Add an animal
    case '/addAnimal':
        require 'controllers/addAnimalCtrl.php';
        break;

    // Delete an animal
    case '/deleteAnimal':
        require 'controllers/deleteAnimalCtrl.php';
        break;

    // Update an animal
    case '/updateAnimal':
        require 'controllers/updateAnimalCtrl.php';
        break;

    // Default, if the url is not recognized
    default:
        require 'views/404.php';
        break;
}

