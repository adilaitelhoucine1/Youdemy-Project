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
    <!-- Navigation -->
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

    <!-- En-tête de la page -->
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

    <!-- Grille des catégories principales -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Développement Web -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover category-card">
                <div class="p-8">
                    <div class="w-16 h-16 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-code text-3xl text-indigo-600 category-icon"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Développement Web</h3>
                    <p class="text-gray-600 mb-4">
                        HTML, CSS, JavaScript, React, Vue.js et plus encore.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">42 cours disponibles</span>
                        <a href="cours.php?category=web" class="text-indigo-600 hover:text-indigo-700 font-medium">
                            Explorer <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Développement Mobile -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover category-card">
                <div class="p-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-3xl text-blue-600 category-icon"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Développement Mobile</h3>
                    <p class="text-gray-600 mb-4">
                        iOS, Android, React Native, Flutter et plus encore.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">28 cours disponibles</span>
                        <a href="cours.php?category=mobile" class="text-blue-600 hover:text-blue-700 font-medium">
                            Explorer <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Design -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover category-card">
                <div class="p-8">
                    <div class="w-16 h-16 bg-pink-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-paint-brush text-3xl text-pink-600 category-icon"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Design</h3>
                    <p class="text-gray-600 mb-4">
                        UI/UX, Figma, Adobe XD, Photoshop et plus encore.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">35 cours disponibles</span>
                        <a href="cours.php?category=design" class="text-pink-600 hover:text-pink-700 font-medium">
                            Explorer <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Data Science -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover category-card">
                <div class="p-8">
                    <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-chart-bar text-3xl text-purple-600 category-icon"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Data Science</h3>
                    <p class="text-gray-600 mb-4">
                        Python, R, Machine Learning, IA et plus encore.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">31 cours disponibles</span>
                        <a href="cours.php?category=data" class="text-purple-600 hover:text-purple-700 font-medium">
                            Explorer <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Marketing Digital -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover category-card">
                <div class="p-8">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-bullhorn text-3xl text-green-600 category-icon"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Marketing Digital</h3>
                    <p class="text-gray-600 mb-4">
                        SEO, Réseaux sociaux, Email marketing et plus encore.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">25 cours disponibles</span>
                        <a href="cours.php?category=marketing" class="text-green-600 hover:text-green-700 font-medium">
                            Explorer <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Business -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover category-card">
                <div class="p-8">
                    <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-briefcase text-3xl text-yellow-600 category-icon"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Business</h3>
                    <p class="text-gray-600 mb-4">
                        Entrepreneuriat, Management, Finance et plus encore.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">38 cours disponibles</span>
                        <a href="cours.php?category=business" class="text-yellow-600 hover:text-yellow-700 font-medium">
                            Explorer <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section des statistiques -->
    <div class="bg-indigo-50 py-16 mt-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">200+</div>
                    <div class="text-gray-600">Cours disponibles</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">50+</div>
                    <div class="text-gray-600">Instructeurs experts</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">10k+</div>
                    <div class="text-gray-600">Étudiants satisfaits</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 