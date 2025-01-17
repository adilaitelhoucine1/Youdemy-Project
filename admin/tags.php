<?php
require_once '../classes/Tags.php';
require_once '../classes/Administrateur.php';

if(!($_SESSION['role']==="admin")){
    header("location: ../public/404.php");
}
$Tag=new Tags();

$Tags=$Tag->afficher_tag();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tags - Youdemy</title>
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

<style>
          body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #0EA5E9);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile Menu Button -->
    <div class="lg:hidden fixed top-0 w-full bg-white z-50 shadow-md">
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

        <!-- Main Content -->
        <div class="flex-1 lg:ml-0">
            <header class="bg-white shadow-sm mt-16 lg:mt-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Gestion des Tags</h2>
                        <p class="text-gray-600 text-sm">Gérez les tags de la plateforme</p>
                    </div>
                </div>
            </header>

            <main class="p-6">
                <div class="mb-12">
                    <h2 class="text-2xl font-bold mb-6">Ajouter un Nouveau Tag</h2>
                    <div class="bg-white rounded-lg shadow p-6">
                        <form action="ajouter_tags.php" method="POST">
                            <div class="mb-4">
                                <label for="tag-name" class="block text-sm font-medium text-gray-700">Nom du Tag</label>
                                <input type="text" id="tag-name" name="tag-name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="Entrez le nom du tag">
                            </div>
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-200">Ajouter</button>
                        </form>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-6">Liste des Tags</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <?php foreach($Tags as $tag) {?>
                        <div class="bg-white rounded-lg shadow p-4 flex justify-between items-center">
                            <span class="font-semibold"><?php echo htmlspecialchars($tag['name']) ;?></span>
                            <a href="deletetag.php?id_tag=<?php echo $tag['id_tag']; ?>" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </a>

                        </div>
                        <?php  } ?>
                   </div>
                      
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