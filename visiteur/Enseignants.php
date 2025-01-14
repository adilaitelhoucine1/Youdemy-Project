<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Enseignants - Youdemy</title>
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

        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
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
                <span class="gradient-text">Nos Enseignants Experts</span>
            </h1>
            <p class="text-xl text-gray-600 text-center max-w-2xl mx-auto">
                Découvrez notre équipe d'experts passionnés qui partagent leur savoir avec excellence
            </p>
        </div>
    </div>

    <!-- Filtres -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-wrap gap-4 justify-center">
            <button class="px-6 py-2 rounded-full bg-indigo-600 text-white hover:bg-indigo-700 transition-colors">
                Tous
            </button>
            <button class="px-6 py-2 rounded-full border border-gray-300 hover:border-indigo-600 hover:text-indigo-600 transition-colors">
                Développement Web
            </button>
            <button class="px-6 py-2 rounded-full border border-gray-300 hover:border-indigo-600 hover:text-indigo-600 transition-colors">
                Design
            </button>
            <button class="px-6 py-2 rounded-full border border-gray-300 hover:border-indigo-600 hover:text-indigo-600 transition-colors">
                Marketing
            </button>
            <button class="px-6 py-2 rounded-full border border-gray-300 hover:border-indigo-600 hover:text-indigo-600 transition-colors">
                Business
            </button>
        </div>
    </div>

    <!-- Grille des enseignants -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php for($i = 1; $i <= 6; $i++): ?>
            <!-- Carte Enseignant -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x300" alt="Teacher" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 flex space-x-2">
                        <a href="#" class="p-2 bg-white rounded-full shadow-md hover:text-indigo-600 transition-colors social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="p-2 bg-white rounded-full shadow-md hover:text-indigo-600 transition-colors social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">John Doe</h3>
                    <p class="text-indigo-600 mb-3">Expert en Développement Web</p>
                    <p class="text-gray-600 mb-4">
                        Plus de 10 ans d'expérience en développement web et formation. Spécialisé en React et Node.js.
                    </p>
                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-600">4.9</span>
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-gray-600">(128 avis)</span>
                            </div>
                            <div class="text-gray-600">
                                12 cours
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="teacher-profile.php?id=1" class="gradient-border block card-hover">
                        <div class="px-6 py-2 text-center text-indigo-600">
                            Voir le profil
                        </div>
                    </a>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Section statistiques -->
    <div class="bg-indigo-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">50+</div>
                    <div class="text-gray-600">Enseignants experts</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">200+</div>
                    <div class="text-gray-600">Cours créés</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">15k+</div>
                    <div class="text-gray-600">Étudiants satisfaits</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">4.8</div>
                    <div class="text-gray-600">Note moyenne</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Vous souhaitez devenir enseignant ?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Rejoignez notre communauté d'experts et partagez vos connaissances avec des milliers d'étudiants passionnés.
            </p>
            <a href="../public/register.php" class="gradient-border inline-block card-hover">
                <div class="px-8 py-3 text-indigo-600">
                    Commencer à enseigner
                </div>
            </a>
        </div>
    </div>
</body>
</html> 