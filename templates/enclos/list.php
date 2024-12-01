<div class="container mx-auto p-4">
    <a href="/addEnclos" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Ajouter un enclos
    </a>

    <div class="grid gap-4">
        <?php foreach ($list as $enclos): ?>
            <div class="border p-4 rounded">
                <h2 class="text-xl font-bold"><?= htmlspecialchars($enclos->nom) ?></h2>
                <p><?= htmlspecialchars($enclos->description) ?></p>
                <div class="mt-2 flex gap-2">
                    <a href="/checkEnclos?id=<?= $enclos->id ?>"
                        class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Voir
                    </a>
                    <form action="/deleteEnclos" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet enclos ?');">
                        <input type="hidden" name="id" value="<?= $enclos->id ?>">
                        <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                        <a href="/updateEnclos?id=<?= $enclos->id ?>"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Modifier
                        </a>

                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>