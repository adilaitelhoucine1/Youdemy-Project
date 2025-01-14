<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Une nouvelle façon d'apprendre</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#4F46E5 0.5px, #ffffff 0.5px);
            background-size: 10px 10px;
        }

        .nav-blur {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

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

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
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
<body class="bg-white">
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

    <!-- Hero Section -->
    <div class="hero-pattern min-h-screen pt-20">
        <div class="max-w-7xl mx-auto px-4 py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        <span class="gradient-text">Apprenez</span> pour 
                        <span class="gradient-text">l'avenir</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Découvrez une nouvelle façon d'apprendre avec des cours 
                        interactifs et une technologie de pointe.
                    </p>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                        <a href="cours.php" class="gradient-border inline-block card-hover">
                            <div class="px-8 py-3 text-indigo-600">
                                <i class="fas fa-play mr-2"></i>
                                Commencer
                            </div>
                        </a>
                        <a href="#about" class="px-8 py-3 border-2 border-gray-200 rounded-lg hover:border-indigo-600 hover:text-indigo-600 transition-colors">
                            En savoir plus
                        </a>
                    </div>
                </div>

                <!-- Illustration -->
                <div class="floating hidden md:block">
                    <img src="https://cdn-icons-png.flaticon.com/512/5910/5910072.png " alt="Learning" class="w-full max-w-lg mx-auto">
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="max-w-7xl mx-auto px-4 py-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-laptop-code text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Cours en ligne</h3>
                    <p class="text-gray-600">Accédez à des milliers de cours de qualité, où que vous soyez.</p>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-certificate text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Certification</h3>
                    <p class="text-gray-600">Obtenez des certificats reconnus par les professionnels.</p>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Communauté</h3>
                    <p class="text-gray-600">Rejoignez une communauté active d'apprenants passionnés.</p>
                </div>
            </div>
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
    </script>
</body>
</html> 