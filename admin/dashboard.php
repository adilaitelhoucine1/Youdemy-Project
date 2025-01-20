<?php
require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Cours.php';
require_once '../classes/Categorie.php';
$cours = new Cours();
$Administrateur = new Administrateur();
$user = new Utilisateur();
$Enseignant = new Enseignant();
$Categorie = new Categorie();
 
$CatByCount=$cours->getcategorybyCrCount();
$MostCourse=$cours->GetMostCours();
$topEnseignants=$cours->getMostEnseignat();

// print_r($CatByCount);
if(!($_SESSION['role']==="admin")){
    header("location: ../public/404.php");
}

?>

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
        
        <?php
        include '../templates/asideadmin.php';
        ?>

       
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
                                    <p class="text-2xl font-bold text-gray-800"><?php echo $Administrateur->getCountCourses();  ?></p>
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
                                    <p class="text-2xl font-bold text-gray-800"><?php echo $user->getCountUsers();  ?></p>
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
                                <p class="text-2xl font-bold text-gray-800"><?php echo $Enseignant->getCountEnseignant();  ?></p>
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
                                <p class="text-2xl font-bold text-gray-800"><?php echo $Categorie->getCountCategorie();  ?></p>
                            </div>
                        </div>
                    </div>
                </div>

             
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Statistiques par catégorie -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fas fa-chart-pie mr-2 text-indigo-600"></i>
                            Top Catégories
                        </h3>
                        <div class="space-y-4">
                            <?php foreach($CatByCount as $Cat){ ?>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium"><?php echo $Cat['name'] ?></span>
                                <span class="text-indigo-600 font-bold"><?php echo $Cat['total'] ?> cours</span>
                            </div>
                           <?php } ?>  
                        </div>
                    </div>

                    <!-- Cours populaire -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fas fa-trophy mr-2 text-yellow-500"></i>
                            Cours le plus populaire
                        </h3>
                      <?php foreach($MostCourse as $cours) ?>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-lg mb-2"><?php echo $cours['titre'] ?></h4>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600"><?php echo $cours['total'] ?> étudiants</span>
                              
                            </div>
                        </div>
                       
                    </div>
                </div>

                
                
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-medal mr-2 text-indigo-600"></i>
                        Meilleurs Enseignants
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <?php foreach ($topEnseignants as $teacher) { ?>
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 p-6 rounded-lg shadow-lg text-center text-white hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center justify-center mb-4">
                            <span class="text-4xl mr-2">👩‍🏫</span>
                            <h4 class="text-2xl font-bold capitalize"><?php echo $teacher['nom']; ?></h4>
                        </div>
                        <p class="text-lg font-medium"><?php echo $teacher['total']; ?> étudiants</p>
                    </div>
                <?php } ?>


                    </div>
                </div>
            </main>
        </div>
    </div>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden lg:hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

    
            function openMenu() {
                sidebar.classList.remove('translate-x-[-100%]');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; 
            }

           
            function closeMenu() {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('translate-x-[-100%]');
                overlay.classList.add('hidden');
                document.body.style.overflow = ''; 
            }

         
            mobileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                if (sidebar.classList.contains('translate-x-[-100%]')) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });


            overlay.addEventListener('click', closeMenu);

 
            const sidebarLinks = sidebar.querySelectorAll('a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', closeMenu);
            });

       
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('translate-x-[-100%]');
                    document.body.style.overflow = '';
                } else {
                    sidebar.classList.add('translate-x-[-100%]');
                }
            });
        });

       
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