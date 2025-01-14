<?php
require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';

if(!($_SESSION['role']==="admin")){
    header("location: ../public/login.php");
}
$teacher=new Enseignant();
$teachers=$teacher->showallEnseignants();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <!-- Mobile Menu Button -->
    <div class="lg:hidden fixed top-0 w-full bg-white z-50 shadow-md">
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center space-x-2">
                <h1 class="text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                    Youdemy
                </h1>
            </div>
            <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar -->
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
                    <a href="dashboard.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="fas fa-tachometer-alt w-6 text-gray-500"></i>
                        <span class="mx-4 font-medium">Dashboard</span>
                    </a>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase">Management</p>
                        <a href="users.php" class="flex items-center px-4 py-3 text-gray-700 transform transition-colors duration-200 border-r-4 border-primary bg-gradient-to-r from-primary/10 to-transparent">
                            <i class="fas fa-users w-6 text-primary"></i>
                            <span class="mx-4 font-medium">Users</span>
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

        <!-- Main Content -->
        <div class="flex-1 lg:ml-0">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm mt-16 lg:mt-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Gestion des Utilisateurs</h2>
                        <p class="text-gray-600 text-sm">Gérez les utilisateurs de la plateforme</p>
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
                <div class="mb-12">
                    <h2 class="text-2xl font-bold mb-6">Validation des Comptes Enseignants</h2>
                    <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <form action="teacher.validation.php" method="POST">
     <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-4 text-left">Name</th>
                <th class="px-6 py-4 text-left">Email</th>
                <th class="px-6 py-4 text-left">Date</th>
                <th class="px-6 py-4 text-left">Actif</th>
                <th class="px-6 py-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
    <?php foreach ($teachers as $index => $teacher) { ?>
    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($teacher['nom']); ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($teacher['user_email']); ?></td>
        <td class="px-6 py-4 whitespace-nowrap">
            <?php echo date('Y-m-d', strtotime($teacher['date_creation'])); ?>
        </td>
        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($teacher['actif']); ?></td>
        <td class="px-6 py-4 whitespace-nowrap">
            <form action="teacher.validation.php" method="POST">
                <input type="hidden" name="teacherID" value="<?php echo htmlspecialchars($teacher['user_id']); ?>">
                <button type="submit" name="check" value="approve" class="text-green-600 hover:text-green-800 mr-2">
                    <i class="fas fa-check"></i>
                </button>
                <button type="submit" name="check" value="reject" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-times"></i>
                </button>
            </form>
        </td>
    </tr>
    <?php } ?>
</tbody>
    </table>
</form>


                    </div>
                </div>

                <!-- Section 2: Gestion des utilisateurs -->
                <div>
                    <h2 class="text-2xl font-bold mb-6">Gestion des Utilisateurs</h2>
                    
                    <!-- Filtres -->
                    <div class="mb-6 flex flex-wrap gap-4">
                        <select class="border rounded-lg px-3 py-2">
                            <option value="">Tous les rôles</option>
                            <option value="student">Étudiants</option>
                            <option value="teacher">Enseignants</option>
                        </select>

                        <select class="border rounded-lg px-3 py-2">
                            <option value="">Tous les statuts</option>
                            <option value="active">Actif</option>
                            <option value="suspended">Suspendu</option>
                        </select>
                    </div>

                    <!-- Tableau des utilisateurs avec select pour les actions -->
                    <div class="bg-white rounded-lg shadow overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rôle</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">Marie Dubois</td>
                                    <td class="px-6 py-4 whitespace-nowrap">marie@example.com</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Étudiant
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Actif
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form class="flex items-center gap-2">
                                            <select class="border rounded-lg px-2 py-1 text-sm">
                                                <option value="">Choisir une action</option>
                                                <option value="activate">Activer</option>
                                                <option value="suspend">Suspendre</option>
                                                <option value="delete">Supprimer</option>
                                            </select>
                                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-700">
                                                Appliquer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden lg:hidden"></div>

    <!-- Même script JavaScript que dans dashboard.php -->
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

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    closeMenu();
                    sidebar.classList.remove('translate-x-[-100%]');
                    document.body.style.overflow = '';
                } else {
                    sidebar.classList.add('translate-x-[-100%]');
                }
            });
        });
    </script>
</body>
</html> 