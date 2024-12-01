<?php 

if (empty($_GET['id'])) 
    redirectTo('/');

$enclos = new Models\Enclos();
try {
    $enclos->setId($_GET['id']);
} catch (Exception $e) {
    throw $e;
}

$enclosData = $enclos->get();

if (!$enclosData)
    redirectTo('/');

$tasks->setId_categories($enclosData->id);
$tasksData = $tasks->getAll();

redirectTo('/');

?>