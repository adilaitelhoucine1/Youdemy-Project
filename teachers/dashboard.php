<?php
require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/Cours.php';
$enseignant_id=$_SESSION['user_id'];
$cours = new Cours();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Enseignant | Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-white shadow-lg fixed h-full">
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
                    <a href="dashboard.php" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg bg-gray-100">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="cours.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Mes Cours</span>
                    </a>
                    <a href="subscriptions.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-users"></i>
                        <span>Étudiants</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-chart-line"></i>
                        <span>Statistiques</span>
                    </a>
                    <a href="../public/deonnexion.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </nav>
            </div>
        </aside>

      
        <main class="flex-1 ml-64 p-8">
            <header class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Bonjour, <?php echo  $_SESSION['nom']; ?></h2>
                        <p class="text-gray-600">Bienvenue sur votre tableau de bord</p>
                    </div>
                 
                </div>
            </header>

            <div class="grid grid-cols- md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
             
                <div class="bg-white rounded-xl shadow-sm p-6 dashboard-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total des cours</p>
                            <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo $cours->getCountCourses($enseignant_id);  ?></h3>
                          
                            <p class="text-green-500 text-sm flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>12% ce mois</span>
                            </p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <i class="fas fa-book-open text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                
                <div class="bg-white rounded-xl shadow-sm p-6 dashboard-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Cours Vidéo</p>
                            <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo $cours->getCountCoursVideo($enseignant_id);  ?></h3>
                            <p class="text-green-500 text-sm flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>8% ce mois</span>
                            </p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <i class="fas fa-video text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>

              
                <div class="bg-white rounded-xl shadow-sm p-6 dashboard-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Cours Texte</p>
                            <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo $cours->getCountCoursText($enseignant_id);  ?></h3>
                            <p class="text-green-500 text-sm flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>5% ce mois</span>
                            </p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-file-alt text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

               
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Cours Récents</h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition cursor-pointer">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-video text-purple-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-800">Introduction à PHP</h4>
                                <p class="text-sm text-gray-500">Ajouté il y a 2 heures</p>
                            </div>
                            <div class="flex items-center">
                                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">Actif</span>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition cursor-pointer">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-file-alt text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-800">JavaScript Avancé</h4>
                                <p class="text-sm text-gray-500">Ajouté il y a 5 heures</p>
                            </div>
                            <div class="flex items-center">
                                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">Actif</span>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Activités Récentes</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-user-graduate text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-800">5 nouveaux étudiants inscrits</p>
                                <p class="text-sm text-gray-500">Il y a 2 heures</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i class="fas fa-star text-yellow-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-800">Nouvelle évaluation 5 étoiles</p>
                                <p class="text-sm text-gray-500">Il y a 4 heures</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-comment text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-800">Nouveau commentaire reçu</p>
                                <p class="text-sm text-gray-500">Il y a 6 heures</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>