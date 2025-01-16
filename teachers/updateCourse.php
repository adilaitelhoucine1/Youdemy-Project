<?php

require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';
require_once '../classes/Cours.php';

$course_id = $_POST['course_id'];
// $type = $_POST['type'];


if (!$course_id) {
    header("Location: cours.php");
    exit;
}

$Enseignant = new Enseignant();
$category = new Categorie();
$tag = new Tags();
$cours = new Cours();

if($Enseignant->CheckActifEnseignant($_SESSION['user_id'])==0){
    header("location: Error404.php");
    exit;
}
$type=$cours->GettypeCourse($course_id);




$categories = $category->afficherCategorie();
$tags = $tag->afficher_tag();
// $selectedTags = $cours->getCourseTags($course_id);

if(isset($_POST['update-btn'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $tags = $_POST['tags'];
    

    if($cours->updateCourse($course_id, $title, $description, $category_id)) {
        $cours->updateCourseTags($course_id, $tags);

        if($type === 'text' ) {
            $cours->updateContent($course_id, $_POST['content']);
        } 
        else if($type === 'video') {
            $cours->updateVideoUrl($course_id, $_POST['videoUrl']);
        }

        header("Location: cours.php");
        exit;
    }
}

$title = $cours->getTitle($course_id);
$description = $cours->getDescription($course_id);
$category_id = $cours->getCategoryId($course_id);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Cours</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-gray-50 flex">
        <aside class="w-64 bg-white shadow-lg fixed h-full">
            <div class="p-6">
                <div class="flex items-center justify-center mb-8">
                    <h1 class="text-2xl font-bold gradient-text">Youdemy</h1>
                </div>
                <nav class="space-y-4">
                    <a href="dashboard.php" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="cours.php" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg bg-gray-100">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Mes Cours</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-users"></i>
                        <span>Étudiants</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-gray-600 p-3 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-chart-line"></i>
                        <span>Statistiques</span>
                    </a>
                </nav>
            </div>
        </aside>

        <div class="flex-1 ml-64">
            <div class="p-8">
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6 border-b bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-lg">
                        <h3 class="text-2xl font-bold text-white">Modifier un Cours</h3>
                    </div>

                    <div class="p-8">
                        <form action="" method="POST" class="space-y-6">
                            <input type="hidden" name="course_id" value="<?= $course_id ?>">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Titre du cours</label>
                                <input type="text" name="title" value="<?php echo  htmlspecialchars($title) ?>" required
                                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                                <textarea name="description" rows="4" required
                                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($description) ?></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Catégorie</label>
                                <select name="category" required class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500">
                                    <?php foreach($categories as $cat): ?>
                                        <option value="<?= $cat['id_category'] ?>" <?php echo $cat['id_category'] == $category_id ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($cat['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                                <div class="grid grid-cols-3 gap-4">
                                    <?php foreach($tags as $t): ?>
                                        <label class="flex items-center space-x-2">
                                            <input type="checkbox" name="tags[]" value="<?= $t['id_tag'] ?>"
                                          
                                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                            <span><?= htmlspecialchars($t['name']) ?></span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div>
                                
                            </div>
                 

                            <?php 
                            if($type =="video") {
                                echo '<div id="videoContent">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">URL de la Vidéo</label>
                                    <input type="url" name="videoUrl"  class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500">
                                </div>';
                            } else {
                                echo '<div id="textContent">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contenu Textuel</label>
                                    <textarea name="content" rows="6" class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500"></textarea>
                                </div>';
                            }
                            ?>

                            <div class="flex justify-end space-x-4 pt-6 border-t">
                                <a href="cours.php" class="px-6 py-3 border rounded-lg hover:bg-gray-50">Annuler</a>
                                <button type="submit" name="update-btn" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const contentTypeInputs = document.querySelectorAll('input[name="contentType"]');
        const textContent = document.getElementById('textContent');
        const videoContent = document.getElementById('videoContent');

        contentTypeInputs.forEach(input => {
            input.addEventListener('change', (e) => {
                if (e.target.value === 'text') {
                    textContent.classList.remove('hidden');
                    videoContent.classList.add('hidden');
                } else {
                    textContent.classList.add('hidden');
                    videoContent.classList.remove('hidden');
                }
            });
        });
    </script>
</body>
</html>