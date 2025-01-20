<?php

require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/Cours.php';

if(!($_SESSION['role'] === "Étudiant")){
    header("location: ../public/404.php");
}

$cours= new Cours();

$user = new Utilisateur();
if(!($user->CheckUserstatus( $_SESSION['user_id'])=='Active')){
    header("location: ../public/waiting.php");
}


$AllCourses=$cours->getAllCourses();



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #0EA5E9);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .gradient-border {
            background: linear-gradient(45deg, #4F46E5, #0EA5E9);
            padding: 2px;
            border-radius: 8px;
        }
        .gradient-border > div {
            background: white;
            border-radius: 6px;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex">
        <div class="hidden md:block w-64 bg-white h-screen fixed shadow-lg">
            <div class="p-6">
                <div class="flex items-center justify-center mb-8">
                    <div class="gradient-border">
                        <div class="w-12 h-12 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-2xl gradient-text"></i>
                        </div>
                    </div>
                    <span class="text-2xl font-bold gradient-text ml-3">Youdemy</span>
                </div>
                
                <nav class="space-y-4">
                    <a href="dashboard.php" class="flex items-center space-x-3 text-indigo-600 bg-indigo-50 p-3 rounded-lg">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="Mycourses.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-book"></i>
                        <span>Mes cours</span>
                    </a>
                
                    <a href="../public/deonnexion.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </nav>
            </div>
        </div>

        <div class="md:hidden fixed w-full top-0 bg-white shadow-lg z-50">
            <div class="flex justify-between items-center p-4">
                <div class="flex items-center">
                    <div class="gradient-border">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-xl gradient-text"></i>
                        </div>
                    </div>
                    <span class="text-xl font-bold gradient-text ml-2">Youdemy</span>
                </div>
                <button id="mobile-menu-button" class="text-gray-500">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            
            <div id="mobile-menu" class="hidden bg-white w-full">
                <nav class="p-4 space-y-3">
                    <a href="dashboard.php" class="flex items-center space-x-3 text-indigo-600 bg-indigo-50 p-3 rounded-lg">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="Mycourses.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-book"></i>
                        <span>Mes cours</span>
                    </a>
                    <a href="../public/deonnexion.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </nav>
            </div>
        </div>

        <div class="flex-1 md:ml-64 pt-16 md:pt-0">
            <!-- En-tête -->
            <div class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                    <h1 class="text-xl md:text-2xl font-bold gradient-text">Tableau de bord</h1>
                    <div class="flex items-center space-x-4">
                        <span class="hidden md:inline font-medium"><?php echo $_SESSION['nom'] ?></span>
                        <img src="../assets/images/avatar.png" alt="Profile" class="w-8 h-8 md:w-10 md:h-10 rounded-full">
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 py-8">
                <div class="w-full md:w-96 mb-6">
                    <div class="relative">
                        <input type="text" 
                               id="searchInput"
                               placeholder="Rechercher un cours..." 
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <button class="absolute right-3 top-3 text-gray-400 hover:text-indigo-600 transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-4 md:p-6">
                    <h2 class="text-lg md:text-xl font-semibold mb-6">Les cours disponibles</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                        <?php foreach($AllCourses as $course){ ?>
                        <div class="course-card border rounded-lg overflow-hidden card-hover">
                            <img src="../assets/images/cours_bg.jpeg" alt="Course" class="w-full h-32 md:h-40 object-cover">
                            <div class="p-3 md:p-4">
                                <h3 class="course-title font-semibold mb-2 text-sm md:text-base"><?php echo $course['titre']; ?></h3>
                                <div class="flex justify-between items-center">
                                    <form action="Coursedetails.php" method="POST">
                                        <button class="text-indigo-600 hover:text-indigo-800 text-sm md:text-base" type="submit">
                                            <input type="hidden" name="Course_id" value="<?php echo $course['course_id']; ?>">
                                            <input type="hidden" name="enseignant_id" value="<?php echo $course['user_id']; ?>">
                                            Voir Details
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const courseCards = document.getElementsByClassName('course-card');
            
            Array.from(courseCards).forEach(card => {
                const title = card.querySelector('.course-title').textContent.toLowerCase();
                card.style.display = title.includes(searchTerm) ? '' : 'none';
            });
        });
    });
    </script>
</body>
</html> 