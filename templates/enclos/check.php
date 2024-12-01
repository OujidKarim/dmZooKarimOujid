<div class="container mx-auto p-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold mb-2"><?= htmlspecialchars($enclos->nom) ?></h1>
        <p class="text-gray-600 mb-4"><?= htmlspecialchars($enclos->description) ?></p>

        <a href="/addAnimal?enclos_id=<?= $enclos->id ?>"
            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Ajouter un animal
        </a>
    </div>

    <div class="grid gap-4">
        <?php if (empty($animals)): ?>
            <p class="text-gray-500">Aucun animal dans cet enclos.</p>
        <?php else: ?>
            <?php foreach ($animals as $animal): ?>
                <div class="border p-4 rounded shadow">
                    <h3 class="font-bold"><?= htmlspecialchars((string) $animal->nom) ?></h3>
                    <p class="text-sm text-gray-600">Espèce: <?= htmlspecialchars((string) $animal->espece_nom) ?></p>
                    <p class="text-gray-600"><?= htmlspecialchars((string) $animal->description) ?></p>
                    <div class="mt-2">
                        <form action="/deleteAnimal" method="POST" class="inline"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">
                            <input type="hidden" name="id" value="<?= $animal->id ?>">
                            <input type="hidden" name="enclos_id" value="<?= $enclos->id ?>">
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                                Supprimer
                            </button>
                            <a href="/updateAnimal?id=<?= $animal->id ?>&enclos_id=<?= $enclos->id ?>"
                                class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm ml-2">
                                Modifier
                            </a>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>


    <div class="mt-6">
        <a href="/" class="text-blue-500 hover:text-blue-800">Retour à la liste</a>
    </div>
</div>