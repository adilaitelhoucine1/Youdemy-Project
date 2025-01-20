<?php
require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/Cours.php';

if(!($_SESSION['role'] === "Étudiant")){
    header("location: ../public/404.php");
}

$course_id= $_POST['Course_id'];
$cours= new Cours();
$details=$cours->afficher($course_id);

$type=$cours->GettypeCourse($course_id);

$contentText=$cours->getContent($course_id);

$url=$cours->getVideoUrl($course_id);
// echo $type;
// echo "<br>";
// echo $url;
// echo "<br>";
//  print_r($details);
foreach($details as $cours){
    $course_id=$cours['course_id'];
    $title=$cours['titre'];
    $description=$cours['description'];
    $enseignant=$cours['nom'];
    $category=$cours['name'];
   
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du cours - Youdemy</title>
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
                    <a href="Mycourses.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
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
                    <h1 class="text-2xl font-bold gradient-text">Détails du cours</h1>
                    <div class="flex items-center space-x-4">
                       
                        <div class="flex items-center space-x-4">
                            <span class="font-medium"><?php echo $_SESSION['nom'] ?></span>
                            <img src="../assets/images/avatar.png" alt="Profile" class="w-10 h-10 rounded-full">
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 py-8">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="relative">
                        <img src="../assets/images/cours_bg.jpeg" alt="Course" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80 flex flex-col items-center justify-center">
                            <h1 class="text-4xl font-bold text-white mb-6"><?php echo $title ?></h1>
                            
                            <div class="flex space-x-4">
                                <form action="AddToCourse.php" method="POST">

                                    <button type="submit" class="group relative px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-xl 
                                            hover:shadow-[0_0_20px_rgba(79,70,229,0.4)] transition-all duration-300">
                                        <span class="relative flex items-center text-white">
                                            <i class="fas fa-plus-circle text-lg mr-2 group-hover:rotate-90 transition-transform duration-300"></i>
                                            <span class="font-semibold">Ajouter à Mes cours</span>
                                        </span>
                                        <input type="hidden" name="course_id" value="<?php echo $course_id ?>">
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Course Info -->
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-6">
                            <img src="../assets/images/professeur.png" alt="Instructor" class="w-12 h-12 rounded-full">
                            <div>
                                <h3 class="font-semibold capitalize">Prof. <?php  echo $enseignant ?></h3>
                                <p class="text-gray-500">Expert en <?php echo $category ?></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mb-8">
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-clock text-indigo-600 text-xl mb-2"></i>
                                <p class="text-gray-600">Durée</p>
                                <p class="font-semibold">10 heures</p>
                            </div>
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-users text-indigo-600 text-xl mb-2"></i>
                                <p class="text-gray-600">Étudiants</p>
                                <p class="font-semibold">1,234</p>
                            </div>
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-star text-indigo-600 text-xl mb-2"></i>
                                <p class="text-gray-600">Note</p>
                                <p class="font-semibold">4.8/5</p>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h2 class="text-2xl font-semibold mb-4">Description du cours</h2>
                            <p class="text-gray-600 mb-4">
                           <?php
                            echo $description;
                           ?>
                            </p>
                        </div>

                        <div>
                            <h2 class="text-2xl font-semibold mb-4">Contenu du cours</h2>
                            <div class="space-y-4">
    <?php if ($type === "video") { ?>
        <div class="relative overflow-hidden rounded-lg shadow-lg group">
        <iframe 
            width="100%" 
            height="515" 
            src="https://www.youtube.com/embed/<?php echo str_replace('https://youtu.be/', '', strtok($url, '?')); ?>"
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    
</div>

    <?php } ?>

    <?php if ($type === "text") {?>
    
<p>

<?php echo $contentText; ?>
</p>

    <?php } ?>
</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add any JavaScript for interactivity
        // For example, to toggle course sections
    </script>
</body>
</html> 