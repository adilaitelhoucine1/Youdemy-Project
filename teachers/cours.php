<?php

require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/CoursVideo.php';
require_once '../classes/CoursText.php';

$Enseignant = new Enseignant();
$category = new Categorie();
$tag = new Tags();
$coursVideo = new CoursVideo();
$coursText = new CoursText();

$categories = $category->afficherCategorie();
$tags = $tag->afficher_tag();
$videocours = $coursVideo->afficher($_SESSION['user_id']);
$textcours = $coursText->afficher($_SESSION['user_id']);

if($Enseignant->CheckActifEnseignant($_SESSION['user_id'])==0){
    header("location: Eror404.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Enseignant</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-gray-50 flex">
     
    <aside class="w-64 bg-white shadow-lg fixed h-full">
            <div class="p-6">
                <div class="flex items-center justify-center mb-8">
                    <h1 class="text-2xl font-bold gradient-text">Youdemy</h1>
                </div>
                <nav class="space-y-4">
                    <a href="dashboard.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="cours.php" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg bg-gray-100">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Mes Cours</span>
                    </a>
                    <a href="subscriptions.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-users"></i>
                        <span>Étudiants</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-chart-line"></i>
                        <span>Statistiques</span>
                    </a>
                    <a href="../public/deonnexion.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-log-out"></i>
                        <span>Déconnexion</span>
                    </a>
                </nav>
            </div>
        </aside>


    
        <main class="ml-64 flex-1 p-8">
            <header class="bg-white shadow-sm mb-8 p-4 rounded-lg">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Bienvenue <span class="text-2xl font-bold text-gray-800"><?php echo  $_SESSION['nom'];?></span></h2>
                   
                    <div class="flex items-center space-x-4">
                        <button  onclick="openModal()"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Ajouter un cours
                        </button>
                      
                    </div>
                </div>
            </header>

           

            <div class="bg-white rounded-lg shadow-sm mb-8">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Mes Cours</h3>
                    <div class="overflow-x-auto">
                    <table class="w-full">
    <thead>
        <tr class="text-left border-b">
            <th class="pb-4 px-4">Cours</th>
            <th class="pb-4 px-4">Type</th>
            <th class="pb-4 px-4">Catégorie</th>
            <th class="pb-4 px-4">Tags</th>
            <th class="pb-4 px-4">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($videocours as $course){ ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="py-4 px-4">
                    <div class="flex items-center">
                        <i class="fas fa-video text-blue-500 mr-3"></i>
                        <span><?= htmlspecialchars($course['titre']) ?></span>
                    </div>
                </td>
                <td class="py-4 px-4">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Vidéo</span>
                </td>
                <td class="py-4 px-4"><?= htmlspecialchars($course['category_name']) ?></td>
                <td class="py-4 px-4">
                    <div class="flex flex-wrap gap-1">
                        <?php foreach ($course['tags'] as $tag){ ?>
                            <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">
                                <?= htmlspecialchars($tag['name']) ?>
                            </span>
                        <?php } ?>
                    </div>
                </td>
                <td class="py-4 px-4">

                <form action="updateCourse.php" method="POST" class="inline">
                        <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                        <!-- <input type="hidden" name="type" value="video"> -->
                        <button type="submit" class="text-blue-600 hover:text-blue-800 mr-3">
                        <i class="fas fa-edit"></i>
                        </button>
                </form>

                    <form action="deletecourse.php" method="POST" class="inline">
                        <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                        <input type="hidden" name="type" value="video">
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        
        <?php foreach ($textcours as $course){ ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="py-4 px-4">
                    <div class="flex items-center">
                        <i class="fas fa-file-alt text-green-500 mr-3"></i>
                        <span><?= htmlspecialchars($course['titre']) ?></span>
                    </div>
                </td>
                <td class="py-4 px-4">
                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Texte</span>
                </td>
                <td class="py-4 px-4"><?= htmlspecialchars($course['category_name']) ?></td>
                <td class="py-4 px-4">
                    <div class="flex flex-wrap gap-1">
                        <?php foreach ($course['tags'] as $tag){ ?>
                            <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">
                                <?= htmlspecialchars($tag['name']) ?>
                            </span>
                        <?php } ?>
                    </div>
                </td>
                <td class="py-4 px-4">
                <form action="updateCourse.php" method="POST" class="inline">
                        <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                     <input type="hidden" name="type" value="video">
                        <button type="submit" class="text-blue-600 hover:text-blue-800 mr-3">
                        <i class="fas fa-edit"></i>
                        </button>
                </form>
                    
                    <form action="deletecourse.php" method="POST" class="inline">
                        <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                        <input type="hidden" name="type" value="text">
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
                    </div>
                </div>
            </div>

           
            

             
                
            </div>
        </main>
    </div>


    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-10 mx-auto p-5 w-full max-w-4xl">

            <div class="relative bg-white rounded-2xl shadow-2xl transform transition-all">
              
                <div class="flex items-center justify-between p-6 border-b bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-2xl">
                    <h3 class="text-2xl font-bold text-white">Créer un Nouveau Cours</h3>
                    <button onclick="closeModal()" class="text-white hover:text-gray-200 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-8">
                    <form id="courseForm" action="addcourse.php" method="POST" class="space-y-6">
                        <!-- Tiiiiiiiiiiiiiiiiiiiiiitre -->
                        <div class="group">
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Titre du cours</label>
                            <input type="text" id="title" name="title" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white"
                                placeholder="Entrez le titre de votre cours">
                        </div>

                        <!-- Deeeeeeeeeeeeeeeeeeeeeeeeeeeescription -->
                        <div class="group">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                            <textarea id="description" name="description" rows="4" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white resize-none"
                                placeholder="Décrivez votre cours en détail"></textarea>
                            <div class="text-xs text-gray-500 mt-1">
                                <span id="charCount">0</span>/500 caractères
                            </div>
                        </div>

                        <!-- Caaaaaaaaaaaaaaaaaaaaaaaatégorie  -->
                        <div class="group">
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Catégorie</label>
                            <div class="relative">
                                <select id="category" name="category" required
                                    class="appearance-none w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white">
                                    <option value="" disabled selected>Sélectionner une catégorie</option>
                                    <?php foreach($categories as $category) {?>
                                    <option value="<?php echo $category['id_category']; ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Tags avec style moderne -->
                        <div class="group">
                            <span class="block text-sm font-semibold text-gray-700 mb-3">Tags</span>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                <?php foreach($tags as $tag) {?>
                                <label class="inline-flex items-center p-3 border rounded-lg hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="checkbox" name="tags[]" value="<?php echo $tag['id_tag']; ?>"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700"><?php echo $tag['name']; ?></span>
                                </label>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Type de contenu avec switch stylisé -->
                        <div class="group">
                            <label for="contentType" class="block text-sm font-semibold text-gray-700 mb-2">Type de Contenu</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="contentType" value="text" onchange="toggleContentFields()"
                                        class="form-radio text-blue-600 focus:ring-blue-500 h-4 w-4">
                                    <span class="ml-2">Texte</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="contentType" value="video" onchange="toggleContentFields()"
                                        class="form-radio text-blue-600 focus:ring-blue-500 h-4 w-4">
                                    <span class="ml-2">Vidéo</span>
                                </label>
                            </div>
                        </div>

                        <!-- Contenu textuel avec éditeur stylisé -->
                        <div id="textContent" class="hidden group">
                            <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Contenu Textuel</label>
                            <textarea id="content" name="content" rows="6"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white resize-none"
                                placeholder="Rédigez votre contenu ici..."></textarea>
                        </div>

                        <!-- URL Vidéo avec prévisualisation -->
                        <div id="videoContent" class="hidden group">
                            <label for="videoUrl" class="block text-sm font-semibold text-gray-700 mb-2">URL de la Vidéo</label>
                            <input type="url" id="videoUrl" name="videoUrl"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white"
                                placeholder="https://youtube.com/...">
                        </div>

                        <!-- Boutons d'action avec effets hover -->
                        <div class="flex justify-end space-x-4 pt-6 border-t">
                            <button type="button" onclick="closeModal()"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Annuler
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Créer le cours
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <script>
        const descriptionField = document.getElementById('description');
        const charCount = document.getElementById('charCount');
        
        descriptionField.addEventListener('input', function() {
            charCount.textContent = this.value.length;
            if (this.value.length > 500) {
                charCount.classList.add('text-red-500');
            } else {
                charCount.classList.remove('text-red-500');
            }
        });

        function openModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('.transform').classList.add('scale-100');
                modal.querySelector('.transform').classList.remove('scale-95');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.querySelector('.transform').classList.add('scale-95');
            modal.querySelector('.transform').classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 200);
        }

        function toggleContentFields() {
            const contentType = document.querySelector('input[name="contentType"]:checked').value;
            const textContent = document.getElementById('textContent');
            const videoContent = document.getElementById('videoContent');

            if (contentType === 'text') {
                videoContent.classList.add('hidden');
                textContent.classList.remove('hidden');
                
            } else {
                textContent.classList.add('hidden');
                videoContent.classList.remove('hidden');
                
            }
        }

        
  
    </script>

    <!-- Ajoutez ces styles pour les animations -->
    <style>
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .scale-95 {
            transform: scale(0.95);
        }

        .scale-100 {
            transform: scale(1);
        }

        .transform {
            transition: transform 0.2s ease-out;
        }
    </style>
</body>
</html>