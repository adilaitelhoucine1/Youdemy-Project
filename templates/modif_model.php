
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 w-full max-w-4xl">
            <!-- Modal content -->
            <div class="relative bg-white rounded-xl shadow-lg">
                <!-- En-tête avec bouton fermer -->
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Ajouter un Cours</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Corps du modal -->
                <div class="p-6">
                    <form id="courseForm" class="space-y-4">
                        <!-- Titre -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" id="title" name="title" 
                                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" 
                                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <select id="category" name="category" 
                                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Sélectionner une catégorie</option>
                                <option value="1">Informatique</option>
                                <option value="2">Mathématiques</option>
                                <option value="3">Sciences</option>
                            </select>
                        </div>

                        <!-- Tags -->
                        <div>
                            <span class="block text-sm font-medium text-gray-700 mb-2">Tags</span>
                            <div class="space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600">
                                    <span class="ml-2 text-sm">Programmation</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600">
                                    <span class="ml-2 text-sm">JavaScript</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600">
                                    <span class="ml-2 text-sm">Algorithmique</span>
                                </label>
                            </div>
                        </div>

                        <!-- Type de Contenu -->
                        <div>
                            <label for="contentType" class="block text-sm font-medium text-gray-700">Type de Contenu</label>
                            <select id="contentType" name="contentType" onchange="toggleContentFields()" 
                                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Choisir un type</option>
                                <option value="text">Texte</option>
                                <option value="video">Vidéo</option>
                            </select>
                        </div>

                        <!-- Contenu Texte (caché par défaut) -->
                        <div id="textContent" class="hidden">
                            <label for="content" class="block text-sm font-medium text-gray-700">Contenu Textuel</label>
                            <textarea id="content" name="content" rows="4" 
                                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Contenu Vidéo (caché par défaut) -->
                        <div id="videoContent" class="hidden">
                            <label for="videoUrl" class="block text-sm font-medium text-gray-700">URL de la Vidéo</label>
                            <input type="url" id="videoUrl" name="videoUrl" 
                                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </form>
                </div>

                <!-- Pied du modal avec boutons -->
                <div class="px-6 py-4 bg-gray-50 rounded-b-xl flex justify-end space-x-3">
                    <button onclick="closeModal()" 
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Annuler
                    </button>
                    <button onclick="submitForm()" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Ajouter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Empêche le défilement du fond
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.body.style.overflow = 'auto'; // Réactive le défilement
        }

        function toggleContentFields() {
            const contentType = document.getElementById('contentType').value;
            const textContent = document.getElementById('textContent');
            const videoContent = document.getElementById('videoContent');

            textContent.classList.add('hidden');
            videoContent.classList.add('hidden');

            if (contentType === 'text') {
                textContent.classList.remove('hidden');
            } else if (contentType === 'video') {
                videoContent.classList.remove('hidden');
            }
        }

        function submitForm() {
            // Ajoutez ici la logique de soumission du formulaire
            console.log('Formulaire soumis');
            closeModal();
        }

        // Fermer le modal en cliquant à l'extérieur
        document.getElementById('modal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });

        // Fermer le modal avec la touche Echap
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });
    </script>
