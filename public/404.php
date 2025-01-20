<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page non trouvée | Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .float-animation {
            animation: float 4s ease-in-out infinite;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .delay-1 { animation-delay: 0.2s; opacity: 0; }
        .delay-2 { animation-delay: 0.4s; opacity: 0; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
    <div class="text-center max-w-lg">
        <div class="float-animation mb-8">
            <img src="https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif" 
                 alt="404" 
                 class="mx-auto max-w-full h-auto rounded-lg shadow-md">
        </div>

        <h1 class="text-4xl font-bold text-gray-800 mb-4 fade-in">
            Page introuvable
        </h1>
        
        <p class="text-gray-600 mb-8 fade-in delay-1">
            Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
        </p>

        <!-- Boutons -->
        <div class="space-x-4 fade-in delay-2">
            <a href="../visiteur/index.php" 
               class="inline-block px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                <i class="fas fa-home mr-2"></i>
                Accueil
            </a>
            <a href="javascript:history.back()" 
               class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour
            </a>
        </div>
    </div>
</body>
</html> 