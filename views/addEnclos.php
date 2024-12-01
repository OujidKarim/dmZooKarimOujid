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
        'error' => !empty($data['error']['nom']) ? $data['error']['nom'] : '',
    ], true);

    render('forms/enclosSelect', [
        'name' => 'description',
        'label' => 'Description de l\'enclos',
        'error' => !empty($data['error']['description']) ? $data['error']['description'] : '',
    ], true);

    ?>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
</form>

<?php $content = ob_get_clean();

render('default', [
    'title' => 'Ajouter un enclos',
    'content' => $content,
], true);



?>