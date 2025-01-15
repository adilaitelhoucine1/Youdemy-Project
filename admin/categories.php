<?php
require_once '../classes/Categorie.php';
require_once '../classes/Administrateur.php';

if(!($_SESSION['role']==="admin")){
    header("location: ../public/login.php");
}
$category=new Categorie();

$categories=$category->afficherCategorie();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#0EA5E9',
                        accent: '#818CF8'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    
    <div class="mobile lg:hidden fixed top-0 w-full bg-white z-50 shadow-md">
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center space-x-2">
                <h1 class="text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                    Youdemy
                </h1>
            </div>
            <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <?php
        include '../templates/asideadmin.php';
        ?>


      
        <div class="flex-1 lg:ml-0">
            <header class="bg-white shadow-sm mt-16 lg:mt-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Gestion des Catégories</h2>
                        <p class="text-gray-600 text-sm">Gérez les catégories de la plateforme</p>
                    </div>
                </div>
            </header>

            <main class="p-6">
                <div class="mb-12">
                    <h2 class="text-2xl font-bold mb-6">Ajouter une Nouvelle Catégorie</h2>
                    <div class="bg-white rounded-lg shadow p-6">
                        <form action="addCategory.php" method="POST">
                            <div class="mb-4">
                                <label for="category-name" class="block text-sm font-medium text-gray-700">Nom de la Catégorie</label>
                                <input type="text" id="category-name" name="category-name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="Entrez le nom de la catégorie">
                            </div>
                            <button type="submit" name ="add-category"class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Ajouter</button>
                        </form>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-6">Liste des Catégories</h2>
                    <div class="bg-white rounded-lg shadow overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom de la Catégorie</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach($categories as $category){?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $category['name'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="deletecategories.php?id_category=<?php echo $category['id_category'] ?>" class="text-red-600 hover:text-red-800">
                                        <button type="button" class="flex items-center">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </a>

                                    </td>
                                </tr>
                           <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function openMenu() {
                sidebar.classList.remove('translate-x-[-100%]');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeMenu() {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('translate-x-[-100%]');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            mobileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                if (sidebar.classList.contains('translate-x-[-100%]')) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            overlay.addEventListener('click', closeMenu);
        });
    </script>
</body>
</html>