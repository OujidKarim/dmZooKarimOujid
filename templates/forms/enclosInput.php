<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter un enclos</h1>
    
    <form action="/addEnclos" method="POST" class="max-w-lg">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                Nom de l'enclos
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   id="nom" 
                   name="nom" 
                   type="text" 
                   value="<?= isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ?>"
                   required>
            <?php if (isset($error['nom'])): ?>
                <p class="text-red-500 text-xs italic"><?= $error['nom'] ?></p>
            <?php endif; ?>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description de l'enclos
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                      id="description" 
                      name="description" 
                      rows="4"
                      required><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?></textarea>
            <?php if (isset($error['description'])): ?>
                <p class="text-red-500 text-xs italic"><?= $error['description'] ?></p>
            <?php endif; ?>
        </div>
        
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                Créer l'enclos
            </button>
            <a href="/" class="text-blue-500 hover:text-blue-800">Retour</a>
        </div>
    </form>
</div>
