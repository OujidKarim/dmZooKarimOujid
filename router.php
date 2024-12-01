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

    default:
        require 'views/404.php';
        break;
}
