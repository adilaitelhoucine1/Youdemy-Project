<?php

require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/Cours.php';
if(!($_SESSION['role']==="admin")){
    header("location: ../public/404.php");
}
$cours= new Cours();
$AllCourses=$cours->getAllCourses();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tags - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <h2 class="text-2xl font-bold text-gray-800">Gestion des Cours</h2>
                        <p class="text-gray-600 text-sm">Gérez les cours de la plateforme</p>
                    </div>
                </div>
            </header>

            <main class="p-6">
         

            <table class="w-full">
    <thead>
        <tr class="text-left border-b">
            <th class="pb-4 px-4">Cours</th>
            <th class="pb-4 px-4">Enseignant</th>
            <th class="pb-4 px-4">Catégorie</th>
            <th class="pb-4 px-4">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($AllCourses as $course) {?>
        <tr class="border-b hover:bg-gray-50">
            <td class="py-4 px-4">
                 
            <p class="text-black mr-3 "><?php echo $course['titre']; ?></p>
   
            </td>
            <td class="py-4 px-4">
                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm"> <?php echo $course['nom']; ?> </span>
            </td>
            <td class="py-4 px-4"><?php echo $course['name']; ?></td>
      
            <td class="py-4 px-4">
    
            <form action="deletecours.php" method="POST" class="inline">
                        <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                        <input type="hidden" name="type" value="video">
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

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