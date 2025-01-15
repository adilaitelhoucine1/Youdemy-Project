<?php
require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Enseignant</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Barre latérale -->
        <aside class="w-64 bg-gray-800 text-white p-6 fixed h-full">
            <div class="mb-8">
                <h1 class="text-2xl font-bold">Youdemy</h1>
            </div>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-300 hover:text-white p-2 rounded transition duration-200 hover:bg-gray-700">
                            <i class="fas fa-home w-6"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-300 hover:text-white p-2 rounded transition duration-200 hover:bg-gray-700">
                            <i class="fas fa-book w-6"></i>
                            <span>Mes cours</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-300 hover:text-white p-2 rounded transition duration-200 hover:bg-gray-700">
                            <i class="fas fa-users w-6"></i>
                            <span>Étudiants</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-300 hover:text-white p-2 rounded transition duration-200 hover:bg-gray-700">
                            <i class="fas fa-chart-bar w-6"></i>
                            <span>Statistiques</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-300 hover:text-white p-2 rounded transition duration-200 hover:bg-gray-700">
                            <i class="fas fa-cog w-6"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Contenu Principal -->
        <main class="ml-64 flex-1 p-8">
            <!-- En-tête -->
            <header class="bg-white shadow-sm mb-8 p-4 rounded-lg">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Bienvenue <span class="text-2xl font-bold text-gray-800"><?php echo  $_SESSION['nom'];?></span></h2>
                   
                    <div class="flex items-center space-x-4">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Ajouter un cours
                        </button>
                        <div class="relative">
                            <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full border-2 border-gray-200">
                        </div>
                    </div>
                </div>
            </header>

            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Total étudiants</h3>
                        <i class="fas fa-users text-blue-500 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">256</p>
                    <div class="text-sm text-green-500 mt-2">
                        <i class="fas fa-arrow-up"></i> +12% ce mois
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Cours actifs</h3>
                        <i class="fas fa-book text-green-500 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">8</p>
                    <div class="text-sm text-blue-500 mt-2">
                        <i class="fas fa-info-circle"></i> 2 en attente
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Note moyenne</h3>
                        <i class="fas fa-star text-yellow-500 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">4.5</p>
                    <div class="text-sm text-yellow-500 mt-2">
                        <i class="fas fa-star"></i> 128 avis
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Total des tags</h3>
                        <i class="fas fa-tags text-purple-500 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">24</p>
                    <div class="text-sm text-purple-500 mt-2">
                        <i class="fas fa-plus-circle"></i> Ajouter des tags
                    </div>
                </div>
            </div>

            <!-- Liste des cours -->
            <div class="bg-white rounded-lg shadow-sm mb-8">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Cours récents</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left border-b">
                                    <th class="pb-4 px-4">Cours</th>
                                    <th class="pb-4 px-4">Étudiants</th>
                                    <th class="pb-4 px-4">Note</th>
                                    <th class="pb-4 px-4">Statut</th>
                                    <th class="pb-4 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <img src="/api/placeholder/32/32" alt="Cours" class="w-8 h-8 rounded mr-3">
                                            <span>Introduction à la programmation</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">45</td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <span class="text-yellow-500 mr-1">4.8</span>
                                            <i class="fas fa-star text-yellow-500"></i>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Actif</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <button class="text-blue-600 hover:text-blue-800 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <img src="/api/placeholder/32/32" alt="Cours" class="w-8 h-8 rounded mr-3">
                                            <span>Bases du développement web</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">38</td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <span class="text-yellow-500 mr-1">4.6</span>
                                            <i class="fas fa-star text-yellow-500"></i>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">En attente</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <button class="text-blue-600 hover:text-blue-800 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Grille inférieure -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Actions rapides -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold mb-4">Actions rapides</h3>
                    <div class="space-y-4">
                        <button class="w-full bg-blue-600 text-white px-4 py-3 rounded hover:bg-blue-700 transition duration-200 flex items-center justify-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Ajouter un nouveau cours
                        </button>
                        <button class="w-full bg-green-600 text-white px-4 py-3 rounded hover:bg-green-700 transition duration-200 flex items-center justify-center">
                            <i class="fas fa-chart-line mr-2"></i>
                            Voir les statistiques
                        </button>
                    </div>
                </div>

                <!-- Activité récente -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold mb-4">Activité récente</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded">
                            <span class="bg-green-100 p-2 rounded-full">
                                <i class="fas fa-user-plus text-green-500"></i>
                            </span>
                            <div>
                                <p class="font-medium">Nouvel étudiant inscrit</p>
                                <p class="text-sm text-gray-500">Il y a 2 minutes</p>
                            </div>
                        </li>
                        <li class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded">
                            <span class="bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-comment text-blue-500"></i>
                            </span>
                            <div>
                                <p class="font-medium">Nouvelle évaluation de cours</p>
                                <p class="text-sm text-gray-500">Il y a 15 minutes</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>
</html>