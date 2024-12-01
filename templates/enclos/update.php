<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Modifier l'enclos: <?= htmlspecialchars($enclos->nom) ?></h1>
    
    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>
    
    <form action="/updateEnclos?id=<?= $enclos->id ?>" method="POST" class="max-w-lg">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                Nom
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   id="nom" 
                   name="nom" 
                   type="text" 
                   value="<?= htmlspecialchars($enclos->nom) ?>"
                   required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                      id="description" 
                      name="description" 
                      rows="4"
                      required><?= htmlspecialchars($enclos->description) ?></textarea>
        </div>
        
        <div class="flex items-center justify-between">
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                Modifier l'enclos
            </button>
            <a href="/checkEnclos?id=<?= $enclos->id ?>" class="text-blue-500 hover:text-blue-800">Annuler</a>
        </div>
    </form>
</div>
