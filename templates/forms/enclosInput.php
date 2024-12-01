<div class="w-full flex flex-col items-center">
    <label for="<?= $data['nom'] ?>"><?= $data['label'] ?>
    <input id="<?= $data['nom'] ?>" name="<?= $data['nom'] ?>" type="text"></label>
    <?php if ($data['error']) { ?>
        <p class="error"><?= $data['error'] ?></p>
    <?php } ?>

</div>