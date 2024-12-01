<?php

require 'utils/utils.php';
require 'utils/splAutoload.php';

switch ($_SERVER['REDIRECT_URL']) {
    case '/':
        require 'controllers/indexCtrl.php';
        break;

    case '/addEnclos':
        require 'controllers/addEnclosCtrl.php';
        break;

    case '/checkEnclos':
        require 'controllers/checkEnclosCtrl.php';
        break;

    case '/deleteEnclos':
        require 'controllers/deleteEnclosCtrl.php';
        break;

    case '/updateEnclos':
        require 'controllers/updateEnclosCtrl.php';
        break;

    case '/addAnimal':
        require 'controllers/addAnimalCtrl.php';
        break;

    case '/deleteAnimal':
        require 'controllers/deleteAnimalCtrl.php';
        break;

    case '/updateAnimal':
        require 'controllers/updateAnimalCtrl.php';
        break;


    default:
        require 'views/404.php';
        break;
}
