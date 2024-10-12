<?php

namespace App\Config;

use App\Controllers\AccueilController;

class Main
{
    public function start()
    {
        // Démarrage de la session
        session_start();

        // Retirer le trailing slash de l'URL si présent
        $uri = $_SERVER['REQUEST_URI'];

        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            $uri = substr($uri, 0, -1);
            // Redirection permanente sans le / de fin (301)
            http_response_code(301);
            header('Location: ' . $uri);
            exit();
        }

        // ** Nouvelle condition pour gérer les fichiers statiques **
        $filePath = __DIR__ . '/../../public' . $uri;
        if (file_exists($filePath) && is_file($filePath)) {
            // Le fichier existe, on le sert directement
            header('Content-Type: ' . mime_content_type($filePath));
            readfile($filePath);
            exit();
        }

        // Gestion des paramètres d'URL
        $params = isset($_GET['p']) ? explode('/', $_GET['p']) : [];

        // Si des paramètres sont présents dans l'URL
        if (!empty($params[0])) {
            // Récupération du contrôleur à instancier
            $controllerName = ucfirst(array_shift($params)) . 'Controller'; // Le nom du contrôleur
            $controllerClass = '\\App\\Controllers\\' . $controllerName; // Chemin complet vers le contrôleur

            // Vérification si le contrôleur existe
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass(); // Instanciation du contrôleur
            } else {
                http_response_code(404);
                echo "Le contrôleur $controllerName n'existe pas.";
                exit();
            }

            // Récupération du nom de la méthode (action)
            $action = isset($params[0]) ? array_shift($params) : 'index'; // Méthode par défaut : index

            // Vérification si la méthode existe dans le contrôleur
            if (method_exists($controller, $action)) {
                // Appel de la méthode avec les paramètres restants
                call_user_func_array([$controller, $action], $params);
            } else {
                http_response_code(404);
                echo "La méthode $action n'existe pas dans le contrôleur $controllerName.";
            }
        } else {
            // Si aucun paramètre dans l'URL, on instancie le contrôleur par défaut (AccueilController)
            $controller = new AccueilController();
            $controller->index();
        }
    }
}
