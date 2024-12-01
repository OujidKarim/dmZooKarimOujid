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
                       class="inline-block text-green hover:text-green-700 font-bold py-2 px-4 ">
                        Voir
                    </a>                    <form action="/deleteEnclos" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet enclos ?');">
                        <input type="hidden" name="id" value="<?= $enclos->id ?>">
                        <button type="submit" class="inline-block text-red hover:text-red-700 font-bold py-2 px-4">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
