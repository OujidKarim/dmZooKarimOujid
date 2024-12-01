<?php
// route "/"

// Affichage de la liste des enclos dans le template list.php
ob_start();
render('enclos/list', [
    'list' => $data['EnclosList'],
], true);
$content = ob_get_clean();

// Affichage de la structure globale de la page avec le template default.php
render('default', [
    'title' => 'Enclos list',
    'content' => $content,
], true);
