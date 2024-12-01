<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Modifier l'animal: <?= htmlspecialchars($animal->nom) ?></h1>

    <?php if (!empty($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?php if (is_array($error)): ?>
                <?php foreach ($error as $err): ?>
                    <p><?= htmlspecialchars($err) ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form action="/updateAnimal?id=<?= $animal->id ?>&enclos_id=<?= $enclos_id ?>" method="POST" class="max-w-lg">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                Nom
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="nom"
                name="nom"
                type="text"
                value="<?= htmlspecialchars($animal->nom) ?>"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="espece">
                Espèce
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="espece"
                name="espece"
                required>
                <option value="">Sélectionner une espèce</option>
                <?php foreach ($especes as $espece): ?>
                    <option value="<?= htmlspecialchars($espece->id) ?>" 
                            <?= $espece->id == $animal->espece_id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($espece->nom) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                name="description"
                rows="4"
                required><?= htmlspecialchars($animal->description) ?></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Modifier l'animal
            </button>
            <a href="/checkEnclos?id=<?= htmlspecialchars($enclos_id) ?>" class="text-blue-500 hover:text-blue-800">Retour</a>
        </div>
    </form>
</div>
