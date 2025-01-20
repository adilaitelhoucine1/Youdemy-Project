<?php
require_once '../classes/Cours.php';
require_once '../classes/Etudiant.php';
require_once '../classes/Enseignant.php';
if(!($_SESSION['role'] === "Étudiant")){
    header("location: ../public/404.php");
}
$user_id= $_SESSION['user_id'];
$Etudiant = new Etudiant();
$Mycourses=$Etudiant->getMyCourses($user_id);
$Enseignant = new Enseignant();
// echo $Enseignant->getEnseignantById(105);
//print_r($Mycourses);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Cours - Youdemy</title>
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
        <!-- Sidebar - caché sur mobile -->
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
                    <a href="dashboard.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="mes-cours.php" class="flex items-center space-x-3 text-indigo-600 bg-indigo-50 p-3 rounded-lg">
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

        <!-- Menu mobile -->
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
            
            <!-- Menu mobile déroulant -->
            <div id="mobile-menu" class="hidden bg-white w-full">
                <nav class="p-4 space-y-3">
                    <a href="dashboard.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="Mycourses.php" class="flex items-center space-x-3 text-indigo-600 bg-indigo-50 p-3 rounded-lg">
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

        <!-- Contenu principal -->
        <div class="flex-1 md:ml-64 pt-16 md:pt-0">
            <!-- En-tête -->
            <div class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                    <h1 class="text-xl md:text-2xl font-bold gradient-text">Mes Cours</h1>
                    <div class="flex items-center space-x-4">
                        <span class="hidden md:inline font-medium"><?php echo $_SESSION['nom'] ?></span>
                        <img src="../assets/images/avatar.png" alt="Profile" class="w-8 h-8 md:w-10 md:h-10 rounded-full">
                    </div>
                </div>
            </div>

            <!-- Filtres et recherche -->
            <div class="max-w-7xl mx-auto px-4 py-8">
                <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-8">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="relative flex-1">
                            <input type="text" 
                                   placeholder="Rechercher dans mes cours..." 
                                   id="searchInput" 
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                                <option>Tous les cours</option>
                                <option>En cours</option>
                                <option>Terminés</option>
                            </select>
                            <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                                <option>Date d'ajout</option>
                                <option>Ordre alphabétique</option>
                                <option>Progression</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Grille des cours -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    <?php foreach($Mycourses as $cours){ ?>
                    <div class="course-card bg-white rounded-xl shadow-sm overflow-hidden card-hover">
                        <div class="relative">
                            <img src="../assets/images/cours_bg.jpeg" alt="Course" class="w-full h-32 md:h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <a href="DeleteMyCourse.php?id_course=<?php echo $cours['course_id'] ?>" 
                                   class="p-2 bg-white rounded-full shadow-md hover:bg-cyan-400 transition-colors">
                                    <i class="fas fa-heart heart-icon"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-4 md:p-6">
                            <h3 class="course-title text-lg md:text-xl font-semibold mb-2"><?php echo $cours['titre'] ?></h3>
                            <p class="text-gray-600 mb-4 text-sm md:text-base line-clamp-2"><?php echo $cours['description']; ?></p>
                            <div class="flex items-center">
                                <img src="../assets/images/professeur.png" alt="Instructor" class="w-8 h-8 md:w-10 md:h-10 rounded-full">
                                <div class="ml-3">
                                    <span class="block text-sm font-medium capitalize">
                                        <?php echo $Enseignant->getEnseignantById($cours["enseignant_id"]);?>
                                    </span>
                                    <span class="block text-xs text-gray-500">Expert Web</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menu mobile
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Recherche
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