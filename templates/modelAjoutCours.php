<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un Cours</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>
</head>
<body class="bg-gray-50 p-8">
  <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-2xl">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Ajouter un Cours</h1>
    <form action="#" method="POST" class="space-y-6">
      
      <!-- Titre -->
      <div>
        <label for="title" class="block text-gray-600 font-medium">Titre</label>
        <input type="text" id="title" name="title"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-4 mt-2 transition-all duration-300 ease-in-out focus:outline-none hover:ring-2 hover:ring-blue-500">
      </div>

      <!-- Description -->
      <div>
        <label for="description" class="block text-gray-600 font-medium">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Description détaillée du cours"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-4 mt-2 transition-all duration-300 ease-in-out focus:outline-none hover:ring-2 hover:ring-blue-500"></textarea>
      </div>

      <!-- Catégorie -->
      <div>
        <label for="category_id" class="block text-gray-600 font-medium">Catégorie</label>
        <select id="category_id" name="category_id"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-4 mt-2 transition-all duration-300 ease-in-out focus:outline-none hover:ring-2 hover:ring-blue-500">
          <option value="" disabled selected>Choisir une catégorie</option>
          <option value="1">Informatique</option>
          <option value="2">Mathématiques</option>
          <option value="3">Sciences</option>
        </select>
      </div>

      <!-- Tags -->
      <div>
        <label class="block text-gray-600 font-medium mb-2">Tags</label>
        <div class="flex flex-wrap gap-4">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="tags[]" value="Programmation"
              class="text-blue-600 focus:ring-blue-500 rounded transition-all duration-300 ease-in-out hover:ring-2 hover:ring-blue-500">
            <span>Programmation</span>
          </label>
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="tags[]" value="JavaScript"
              class="text-blue-600 focus:ring-blue-500 rounded transition-all duration-300 ease-in-out hover:ring-2 hover:ring-blue-500">
            <span>JavaScript</span>
          </label>
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="tags[]" value="Algorithmique"
              class="text-blue-600 focus:ring-blue-500 rounded transition-all duration-300 ease-in-out hover:ring-2 hover:ring-blue-500">
            <span>Algorithmique</span>
          </label>
        </div>
      </div>

      <!-- Type de Contenu -->
      <div>
        <label for="content_type" class="block text-gray-600 font-medium">Type de Contenu</label>
        <select id="content_type" name="content_type" onchange="toggleContentField()"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-4 mt-2 transition-all duration-300 ease-in-out focus:outline-none hover:ring-2 hover:ring-blue-500">
          <option value="" disabled selected>Choisir un type</option>
          <option value="text">Texte</option>
          <option value="video">Vidéo</option>
        </select>
      </div>

      <!-- Contenu Textuel -->
      <div id="content_text_field" class="hidden">
        <label for="content_text" class="block text-gray-600 font-medium">Contenu Textuel</label>
        <textarea id="content_text" name="content_text" rows="6" placeholder="Contenu textuel du cours"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-4 mt-2 transition-all duration-300 ease-in-out focus:outline-none hover:ring-2 hover:ring-blue-500"></textarea>
      </div>

      <!-- Contenu Vidéo -->
      <div id="content_video_field" class="hidden">
        <label for="content_video" class="block text-gray-600 font-medium">Lien de la Vidéo</label>
        <input type="url" id="content_video" name="content_video" placeholder="Ex: https://youtube.com/..."
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-4 mt-2 transition-all duration-300 ease-in-out focus:outline-none hover:ring-2 hover:ring-blue-500">
      </div>

      <!-- Bouton d'ajout -->
      <div class="flex justify-end mt-6">
        <button type="submit"
          class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
          Ajouter le Cours
        </button>
      </div>
    </form>
  </div>

  <script>
    function toggleContentField() {
      const type = document.getElementById('content_type').value;
      const textField = document.getElementById('content_text_field');
      const videoField = document.getElementById('content_video_field');

      if (type === 'text') {
        textField.classList.remove('hidden');
        videoField.classList.add('hidden');
      } else if (type === 'video') {
        videoField.classList.remove('hidden');
        textField.classList.add('hidden');
      } else {
        textField.classList.add('hidden');
        videoField.classList.add('hidden');
      }
    }
  </script>
</body>
</html>
