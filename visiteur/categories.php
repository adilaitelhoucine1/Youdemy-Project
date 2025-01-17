<?php

require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/Cours.php';

$Categorie= new Categorie();
$AllCategories=$Categorie->afficherCategorie();
// print_r($AllCategories);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories - Youdemy</title>
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
            position: relative;
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

        .hero-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#4F46E5 0.5px, #ffffff 0.5px);
            background-size: 10px 10px;
        }

        .nav-blur {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .navbar-spacing {
            padding-top: 80px;
        }

        .category-icon {
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="fixed w-full z-50 nav-blur">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <div class="gradient-border">
                        <div class="w-12 h-12 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-2xl gradient-text"></i>
                        </div>
                    </div>
                    <span class="text-2xl font-bold gradient-text">Youdemy</span>
                </div>

                <!-- Navigation Links - Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="group relative py-2">
                        <span class="text-gray-700 group-hover:text-indigo-600 transition-colors">Accueil</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="cours.php" class="group relative py-2">
                        <span class="text-gray-700 group-hover:text-indigo-600 transition-colors">Cours</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="categories.php" class="group relative py-2">
                        <span class="text-gray-700 group-hover:text-indigo-600 transition-colors">Catégories</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="Enseignants.php" class="group relative py-2">
                        <span class="text-gray-700 group-hover:text-indigo-600 transition-colors">Enseignants</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="../public/login.php" class="px-6 py-2 text-gray-700 hover:text-indigo-600 transition-colors">
                        Connexion
                    </a>
                    <a href="../public/register.php" class="gradient-border inline-block card-hover">
                        <div class="px-6 py-2 text-indigo-600">
                            Inscription
                        </div>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700" id="mobile-menu-button">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-white border-t" id="mobile-menu">
            <div class="px-4 py-3 space-y-3">
                <a href="#" class="block text-gray-700 hover:text-indigo-600 transition-colors">Cours</a>
                <a href="#" class="block text-gray-700 hover:text-indigo-600 transition-colors">Catégories</a>
                <a href="#" class="block text-gray-700 hover:text-indigo-600 transition-colors">Enseignants</a>
                <div class="pt-4 border-t">
                    <a href="../public/login.php" class="block text-gray-700 hover:text-indigo-600 transition-colors">Connexion</a>
                    <a href="../public/register.php" class="block mt-3 text-center bg-indigo-600 text-white px-4 py-2 rounded-lg">
                        Inscription
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="navbar-spacing"></div>

    <div class="hero-pattern">
        <div class="max-w-7xl mx-auto py-16 px-4">
            <h1 class="text-4xl md:text-5xl font-bold text-center mb-4">
                <span class="gradient-text">Explorez nos catégories</span>
            </h1>
            <p class="text-xl text-gray-600 text-center max-w-2xl mx-auto">
                Découvrez tous nos domaines d'apprentissage et trouvez celui qui vous correspond
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($AllCategories as $cat) { ?>
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden card-hover category-card">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-100 to-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-code text-4xl text-indigo-600 category-icon transform hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800 hover:text-indigo-600 transition-colors duration-300">
                        <?php echo $cat['name'] ?>
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Explorez notre sélection de cours disponibles.
                    </p>
                    <div class="flex items-center justify-between">
                        
                        <a href="cours.php" class="text-indigo-600 hover:text-indigo-700 font-medium transition-colors duration-300">
                            Explorer <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


            
            
</body>
</html> 