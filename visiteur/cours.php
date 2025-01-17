<?php

require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/Cours.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$cours = new Cours();
$AllCourses = $cours->searchCourses($search, $page);
$pages = $cours->getNombrePages($search);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours disponibles - Youdemy</title>
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
    </style>
</head>
<body class="bg-gray-50">
<nav class="fixed w-full z-50 nav-blur">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-4">
                    <div class="gradient-border">
                        <div class="w-12 h-12 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-2xl gradient-text"></i>
                        </div>
                    </div>
                    <span class="text-2xl font-bold gradient-text">Youdemy</span>
                </div>

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

           
                <button class="md:hidden text-gray-700" id="mobile-menu-button">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

  
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
                <span class="gradient-text">Découvrez nos cours</span>
            </h1>
            <p class="text-xl text-gray-600 text-center max-w-2xl mx-auto">
                Explorez notre sélection de cours de qualité et commencez votre voyage d'apprentissage dès aujourd'hui
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto -mt-8 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row gap-6 justify-between items-start md:items-center">
                <div class="w-full md:w-96">
                    <form method="GET" action="" class="relative">
                        <input type="text" 
                               name="search"
                               value="<?= htmlspecialchars($search) ?>"
                               placeholder="Rechercher un cours..." 
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <button type="submit" class="absolute right-3 top-3 text-gray-400 hover:text-indigo-600 transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="flex flex-wrap gap-4">
                    <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 bg-white">
                        <option value="">Catégorie</option>
                        <option value="web">Développement Web</option>
                        <option value="mobile">Développement Mobile</option>
                        <option value="design">Design</option>
                    </select>

                    <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 bg-white">
                        <option value="">Niveau</option>
                        <option value="beginner">Débutant</option>
                        <option value="intermediate">Intermédiaire</option>
                        <option value="advanced">Avancé</option>
                    </select>

                    <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 bg-white">
                        <option value="">Trier par</option>
                        <option value="popular">Popularité</option>
                        <option value="recent">Plus récent</option>
                        <option value="price-asc">Prix croissant</option>
                        <option value="price-desc">Prix décroissant</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="coursContainer">
            <?php foreach($AllCourses as $course) {?>
            <div class="course-card bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <div class="relative">
                    <img src="../assets/images/cours_bg.jpeg" alt="Course" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4">
                        <button class="btn p-2 bg-white rounded-full shadow-md hover:text-indigo-600 transition-colors">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-sm rounded-full">
                            Youcode
                        </span>
                        <span class="ml-2 px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">
                        Simplon
                        </span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 course-title"><?php echo $course['titre']; ?></h3>
                    <p class="text-gray-600 mb-4 line-clamp-2 course-description">
                    <?php echo $course['description']; ?></p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <img src="../assets/images/professeur.png" alt="Instructor" class="w-10 h-10 rounded-full border-2 border-indigo-600">
                            <div class="ml-3">
                                <span class="course-Enseignant block text-sm font-medium text-gray-900 capitalize"><?php echo $course['nom']; ?></span>
                                <span class="block text-xs text-gray-500">Expert Web</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="block text-lg font-bold gradient-text">Free</span>
                            
                        </div>
                    </div>
                    <a href="../public/login.php" 
                        class="gradient-border block card-hover">
                        <div class="btn px-6 py-2 text-center text-indigo-600">
                            Voir le cours
                        </div>
                    </a>
                </div>
            </div>
            <?php }; ?>
        </div>

        <div class="flex justify-center gap-2 mt-8">
            <?php for($i = 1; $i <= $pages; $i++): ?>
                <a href="?page=<?= $i ?>&search=<?= htmlspecialchars($search) ?>" 
                   class="px-3 py-1 <?= $i == $page ? 'bg-indigo-600 text-white' : 'bg-gray-100' ?> rounded">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>


    <script>

        
   
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    });
    
    // document.getElementById('searchInput').addEventListener('keyup', function() {
    //      const searchTerm = this.value.toLowerCase();
    //     const courseCards = document.getElementsByClassName('course-card');
    //     console.log(courseCards);
        
    //     Array.from(courseCards).forEach(card => {
    //         const title = card.querySelector('.course-title').textContent.toLowerCase();
    //         const description = card.querySelector('.course-description').textContent.toLowerCase();
    //         const Enseignant = card.querySelector('.course-Enseignant').textContent.toLowerCase();
            
    //         if (title.includes(searchTerm) || description.includes(searchTerm) ||  Enseignant.includes(searchTerm)) {
    //             card.style.display = '';
    //         } else {
    //             card.style.display = 'none';
    //         }
    //     });
    // });
    </script>
</body>
</html>