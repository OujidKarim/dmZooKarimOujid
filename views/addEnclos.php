<?php

ob_start();

if (!empty($data['error']['global'])) { ?>
    <h2><?= $data['error']['global'] ?></h2>
<?php }

?>

<form method="POST">
    <?php
    render('forms/enclosInput', [
        'name' => 'nom',
        'label' => 'Nom de l\'enclos',
        'error' => !empty($data['error']) ? $data['error'] : ''
    ], true);
    ?>

    <?php
    render('forms/enclosInput', [
        'name' => 'description',
        'label' => 'Description de l\'enclos',
        'error' => !empty($data['error']) ? $data['error'] : ''
    ], true);
    ?>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Créer l'enclos
    </button>
</form>


<?php $content = ob_get_clean();

render('default', [
    'title' => 'Ajouter un enclos',
    'content' => $content,
], true);




?>