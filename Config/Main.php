<?php

namespace App\Config;

use App\Controllers\AccueilController;

/**
 * Routeur principal
 */
class Main
{
    public function start()
    {
        session_start();

        // Retirer le trailing slash de l'URL si présent
        $uri = $_SERVER['REQUEST_URI'];

        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            $uri = substr($uri, 0, -1);
            // Redirection permanente sans le / de fin (301)
            http_response_code(301);
            header('Location: ' . $uri);
            exit(); // Assurez-vous que le script ne continue pas après la redirection
        }

        // Gestion des paramètres d'URL
        $params = isset($_GET['p']) ? explode('/', $_GET['p']) : [];

        if (!empty($params[0])) {
            // Récupération du contrôleur à instancier
            $controllerName = ucfirst(array_shift($params)) . 'Controller';
            $controllerClass = '\\App\\Controllers\\' . $controllerName;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
            } else {
                http_response_code(404);
                echo "Le contrôleur $controllerName n'existe pas.";
                exit();
            }

            // Récupération du nom de la méthode d'action
            $action = isset($params[0]) ? array_shift($params) : 'index';

            // Extraire les paramètres GET supplémentaires (comme id)
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if (method_exists($controller, $action)) {
                if ($id) {
                    call_user_func_array([$controller, $action], [$id]); // Passe l'id en paramètre
                } else {
                    call_user_func_array([$controller, $action], $params);
                }
            } else {
                http_response_code(404);
                echo "La méthode demandée n'existe pas dans le contrôleur $controllerName.";
            }

        } else {
            // Instanciation du contrôleur par défaut
            $controller = new AccueilController();
            $controller->index();
        }
    }
}
