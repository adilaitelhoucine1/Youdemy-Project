<?php
require_once '../classes/Utilisateur.php';



if (isset($_POST['login-btn'])) {
    $user = new Utilisateur();
    $email =$_POST['email'];
    $password = $_POST['password'];

    $user->connexion($email, $password);
    if ($_SESSION['role']==="Étudiant"){
        header("location: ../students/index.php");  
    }else if($_SESSION['role']==="Enseignant"){
        header("location: ../teachers/dashbaord.php");
    }else if($_SESSION['role']==="admin"){
        header("location: ../admin/dashboard.php");
    }
  
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Youdemy</title>
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
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo et Titre -->
            <div class="text-center">
                <!-- Logo mis à jour pour correspondre à l'index -->
                <div class="flex items-center justify-center space-x-4">
                    <div class="gradient-border">
                        <div class="w-12 h-12 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-2xl gradient-text"></i>
                        </div>
                    </div>
                    <span class="text-2xl font-bold gradient-text">Youdemy</span>
                </div>

                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Connexion à votre compte
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Ou
                    <a href="register.php" class="font-medium text-indigo-600 hover:text-indigo-500">
                        créez un nouveau compte
                    </a>
                </p>
            </div>

            <!-- Formulaire de connexion -->
            <form class="mt-8 space-y-6"  method="POST">
                <input type="hidden" name="action" value="login">
                
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="Adresse email">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="Mot de passe">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" 
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                            Se souvenir de moi
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Mot de passe oublié?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" name="login-btn"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-lock"></i>
                        </span>
                        Se connecter
                    </button>
                </div>
            </form>

            <!-- Retour à l'accueil -->
            <div class="text-center">
                <a href="../visiteur/index.php" class="text-sm text-gray-600 hover:text-indigo-600 group">
                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</body>
</html> 