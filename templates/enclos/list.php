<div class="container mx-auto p-4">
    <a href="/addEnclos" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Ajouter un enclos
    </a>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?= htmlspecialchars($_SESSION['error']) ?></span>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?= htmlspecialchars($_SESSION['success']) ?></span>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

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