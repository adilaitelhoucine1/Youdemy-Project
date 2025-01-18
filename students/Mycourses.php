
<?php
require_once '../classes/Cours.php';
require_once '../classes/Enrollment.php';
require_once '../classes/Enseignant.php';

$user_id= $_SESSION['user_id'];
$Enrollment = new Enrollment();
$Mycourses=$Enrollment->getMyCourses($user_id);
$Enseignant = new Enseignant();
// echo $Enseignant->getEnseignantById(105);
//print_r($Mycourses);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Cours - Youdemy</title>
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
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white h-screen fixed shadow-lg">
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
                    <a href="dashboard.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="mes-cours.php" class="flex items-center space-x-3 text-indigo-600 bg-indigo-50 p-3 rounded-lg">
                        <i class="fas fa-book"></i>
                        <span>Mes cours</span>
                    </a>
             
                    <a href="../public/deonnexion.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                    <h1 class="text-2xl font-bold gradient-text">Tableau de bord</h1>
                    <div class="flex items-center space-x-4">
                        
                        <div class="flex items-center space-x-4">
                            <span class="font-medium"><?php echo $_SESSION['nom'] ?></span>
                            <img src="../assets/images/avatar.png" alt="Profile" class="w-10 h-10 rounded-full">
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="max-w-7xl mx-auto px-4 py-8">
                
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <div class="flex flex-col md:flex-row gap-4 justify-between">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Rechercher dans mes cours..." 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex gap-4">
                            <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                                <option>Tous les cours</option>
                                <option>En cours</option>
                                <option>Terminés</option>
                            </select>
                            <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                                <option>Date d'ajout</option>
                                <option>Ordre alphabétique</option>
                                <option>Progression</option>
                            </select>
                        </div>
                    </div>
                </div>

             
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
               <?php foreach($Mycourses as $cours){ ?>
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden card-hover">
                        <div class="relative">
                            <img src="../assets/images/cours_bg.jpeg" alt="Course" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                        
                            <a href="DeleteMyCourse.php?id_course=<?php echo $cours['course_id'] ?>" class="p-2 bg-pink-500 rounded-full shadow-md hover:bg-white transition-colors">
                                    <i class="fas fa-heart heart-icon"></i>
                            </a>

                               

                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2"><?php echo $cours['titre'] ?></h3>
                            <p class="text-gray-600 mb-4"><?php echo $cours['description'] ?></p>
                            <div class="flex items-center">
                                <img src="../assets/images/professeur.png" alt="Instructor" class="w-10 h-10 rounded-full">
                                <div class="ml-3">
                           
                                    <span class="block text-sm font-medium capitalize"><?php echo $Enseignant->getEnseignantById($cours["enseignant_id"]);?>
                                    </span>
                                    <span class="block text-xs text-gray-500">Expert Web</span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }?>    
                </div>

              
                
            </div>
        </div>
    </div>
</body>
</html>