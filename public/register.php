<?php


require_once '../classes/Utilisateur.php';

if (isset($_POST['register-btn'])) {
    $user = new Utilisateur();

    
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $role = isset($_POST['role']) ? $_POST['role'] : '';

    
    if ($password !== $password_confirmation) {
        echo "<script>alert('Les mots de passe ne correspondent pas.');</script>";
    } elseif ($user->emailExiste($email)) {
        echo "<script>alert(Email est déjà utilisé.');</script>";
    } else {
        
        if ($user->inscription($email, $password, $nom, $role)) {
            header("Location: login.php");
            exit(); 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
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
                Créer votre compte
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Ou
                    <a href="login.php" class="font-medium text-indigo-600 hover:text-indigo-500">
                    onnectez-vous à votre compte existant
                    </a>
                </p>
            </div>

            
            <form class="mt-8 space-y-6" action="" method="POST">
                <input type="hidden" name="action" value="register">
                
                <div class="rounded-md shadow-sm space-y-4">
                    <!-- Nom -->
                    <div>
                        <label for="name" class="sr-only">Nom complet</label>
                        <input id="name" name="name" type="text" required 
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="Nom complet">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="Adresse email">
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="Mot de passe">
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div>
                        <label for="password_confirmation" class="sr-only">Confirmer le mot de passe</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="Confirmer le mot de passe">
                    </div>

                    <!-- Type de compte -->
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Type de compte</label>
                        <select id="role" name="role" required 
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            <option value="Étudiant">Étudiant</option>
                            <option value="Enseignant">Enseignant</option>
                        </select>
                    </div>
                </div>

                <!-- Conditions d'utilisation -->
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        J'accepte les <a href="#" class="text-indigo-600 hover:text-indigo-500">conditions d'utilisation</a>
                    </label>
                </div>

                <!-- Bouton d'inscription -->
                <div>
                    <button type="submit" name="register-btn"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        Créer un compte
                    </button>
                </div>
            </form>

            <!-- Retour à l'accueil -->
            <div class="text-center">
                <a href="../visiteur/index.php" class="text-sm text-gray-600 hover:text-indigo-600">
                    <i class="fas fa-arrow-left mr-2"></i>Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</body>
</html>