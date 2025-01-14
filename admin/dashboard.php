
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Admin</title>
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
</head>
<body class="bg-gray-50">
    
    <div class="lg:hidden fixed top-0 w-full bg-white z-50 shadow-md">
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center space-x-2">
                
                <h1 class="text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                    Youdemy
                </h1>
            </div>
            <button id="mobile-menu-button" class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <aside id="sidebar" class="transform lg:transform-none lg:opacity-100 lg:relative fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transition-all duration-300 ease-in-out translate-x-[-100%] lg:translate-x-0">
            <div class="p-6 hidden lg:block">
                <div class="flex items-center space-x-3">
                    
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                        Youdemy
                    </h1>
                </div>
            </div>
            
            <nav class="mt-6 px-4">
                <div class="space-y-4">
                    <a href="#" class="flex items-center px-4 py-3 text-gray-700 transform transition-colors duration-200 border-r-4 border-primary bg-gradient-to-r from-primary/10 to-transparent">
                        <i class="fas fa-tachometer-alt w-6 text-primary"></i>
                        <span class="mx-4 font-medium">Dashboard</span>
                    </a>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase">Management</p>
                        <a href="users.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-users w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Users</span>
                            <span class="flex-grow"></span>
                            
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-graduation-cap w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Courses</span>
                        </a>
                    </div>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase">Content</p>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-folder w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Categories</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-tags w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Tags</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Admin Profile -->
            <div class="absolute bottom-0 w-full p-4 border-t bg-gray-50">
                <div class="flex items-center space-x-3">
                    
                    <div>
                        <p class="font-medium text-gray-800">Admin User</p>
                        <p class="text-sm text-gray-500">admin@youdemy.com</p>
                    </div>
                </div>
            </div>
        </aside>

       
        <div class="flex-1 lg:ml-0">
           
            <header class="bg-white shadow-sm mt-16 lg:mt-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                        <p class="text-gray-600 text-sm">Welcome back, Admin</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell"></i>
                        </button>
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-cog"></i>
                        </button>
                    </div>
                </div>
            </header>

         
            
            <main class="p-6">
               
            
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                   
                
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:border-primary/20 transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-4 bg-primary/10 rounded-lg">
                                <i class="fas fa-book text-primary text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Total des Cours</h3>
                                <div class="flex items-center space-x-1">
                                    <p class="text-2xl font-bold text-gray-800">125</p>
                                    <span class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-up"></i>
                                        12%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:border-primary/20 transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-4 bg-secondary/10 rounded-lg">
                                <i class="fas fa-users text-secondary text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Étudiants Actifs</h3>
                                <div class="flex items-center space-x-1">
                                    <p class="text-2xl font-bold text-gray-800">1,245</p>
                                    <span class="text-green-500 text-sm">
                                        <i class="fas fa-arrow-up"></i>
                                        8%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:border-primary/20 transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-4 bg-accent/10 rounded-lg">
                                <i class="fas fa-chalkboard-teacher text-accent text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Enseignants</h3>
                                <p class="text-2xl font-bold text-gray-800">45</p>
                            </div>
                        </div>
                    </div>

                
                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:border-primary/20 transition-all duration-200">
                        <div class="flex items-center">
                            <div class="p-4 bg-green-500/10 rounded-lg">
                                <i class="fas fa-folder text-green-500 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Catégories</h3>
                                <p class="text-2xl font-bold text-gray-800">8</p>
                            </div>
                        </div>
                    </div>
                </div>

             
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                
                
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Évolution des Inscriptions</h3>
                            <select class="text-sm border rounded-lg px-2 py-1">
                                <option>7 derniers jours</option>
                                <option>30 derniers jours</option>
                                <option>Cette année</option>
                            </select>
                        </div>
                        <div class="h-80">
                            <canvas id="enrollmentChart"></canvas>
                        </div>
                    </div>

                  
                    
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Répartition des Cours</h3>
                            <button class="text-primary hover:text-primary/80 text-sm">
                                <i class="fas fa-download mr-1"></i> Exporter
                            </button>
                        </div>
                        <div class="h-80">
                            <canvas id="categoryPieChart"></canvas>
                        </div>
                    </div>
                </div>

                
                
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Top 3 Enseignants</h3>
                        <button class="text-primary hover:text-primary/80">Voir tous les enseignants</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                     
                    
                        <div class="bg-gray-50 rounded-xl p-6 text-center">
                            <img src="https://via.placeholder.com/80" alt="Teacher" class="w-20 h-20 rounded-full mx-auto mb-4">
                            <h4 class="font-semibold text-gray-800">Marie Dubois</h4>
                            <p class="text-sm text-gray-500 mb-2">Développement Web</p>
                            <div class="flex justify-center items-center space-x-2">
                                <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">
                                    245 étudiants
                                </span>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">
                                    4.9 ★
                                </span>
                            </div>
                        </div>
                        <!-- Répéter pour les 2 autres enseignants -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Ajout d'un overlay pour le mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden lg:hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            // Fonction pour ouvrir le menu
            function openMenu() {
                sidebar.classList.remove('translate-x-[-100%]');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Empêche le défilement
            }

            // Fonction pour fermer le menu
            function closeMenu() {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('translate-x-[-100%]');
                overlay.classList.add('hidden');
                document.body.style.overflow = ''; // Réactive le défilement
            }

            // Toggle menu on button click
            mobileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                if (sidebar.classList.contains('translate-x-[-100%]')) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            // Fermer le menu quand on clique sur l'overlay
            overlay.addEventListener('click', closeMenu);

            // Fermer le menu quand on clique sur un lien
            const sidebarLinks = sidebar.querySelectorAll('a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', closeMenu);
            });

            // Gérer le redimensionnement de la fenêtre
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) { // 1024px est le breakpoint lg de Tailwind
                    closeMenu();
                    sidebar.classList.remove('translate-x-[-100%]');
                    document.body.style.overflow = '';
                } else {
                    sidebar.classList.add('translate-x-[-100%]');
                }
            });
        });

        // Graphique d'Evolution
        const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
        new Chart(enrollmentCtx, {
            type: 'line',
            data: {
                labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                datasets: [{
                    label: 'Nouveaux Étudiants',
                    data: [15, 25, 20, 30, 28, 40, 45],
                    borderColor: '#4F46E5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Nouveaux Cours',
                    data: [5, 8, 6, 9, 7, 12, 15],
                    borderColor: '#0EA5E9',
                    backgroundColor: 'rgba(14, 165, 233, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Graphique Circulaire
        const categoryCtx = document.getElementById('categoryPieChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Développement Web', 'Design', 'Marketing', 'Business', 'Langues'],
                datasets: [{
                    data: [35, 25, 20, 15, 5],
                    backgroundColor: [
                        '#4F46E5',
                        '#0EA5E9',
                        '#818CF8',
                        '#6366F1',
                        '#A78BFA'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 15,
                            padding: 15
                        }
                    }
                },
                cutout: '65%'
            }
        });

        // Ajoutez également un graphique de progression mensuelle
        const progressChart = document.getElementById('progressChart').getContext('2d');
        new Chart(progressChart, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Revenus (€)',
                    data: [12000, 19000, 15000, 25000, 22000, 30000],
                    backgroundColor: 'rgba(79, 70, 229, 0.8)',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>