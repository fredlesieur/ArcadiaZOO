<?php

namespace App\Config;

use App\Controllers\AccueilController;

class Main
{
    public function start()
    {
        session_set_cookie_params([
            'lifetime' => 0, // Durée de vie : jusqu'à la fermeture du navigateur
            'path' => '/', // Accessible sur tout le site
            'domain' => 'localhost', // Remplacer par le nom de domaine en production
            'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
            'httponly' => true, // Empêche l'accès via JavaScript
            'samesite' => 'Strict', // Protection contre les attaques CSRF
        ]);
        // Démarrage de la session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Création de token CSRF s'il n'existe pas déjà
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

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

        // Vérification du token CSRF et nettoyage des données POST si la requête est de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer le token CSRF à partir du corps de la requête (formulaires) ou des en-têtes HTTP (requêtes AJAX)
            $csrfToken = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
            
            // Appel à la méthode pour vérifier le token CSRF
            $this->checkCsrfToken($csrfToken);

            // Nettoyage des données POST pour les requêtes classiques (formulaires)
            $_POST = $this->sanitizeFormData($_POST);
        }

        // Gestion des paramètres d'URL
        $params = isset($_GET['p']) ? explode('/', $_GET['p']) : [];

        // Vérifie si des paramètres sont présents dans l'URL
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
        
        $this->handlePostRequests();
    }

    // Vérification du token CSRF
    public function checkCsrfToken($token)
    {
        if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            // Token invalide
            http_response_code(403);
            echo 'Invalid CSRF token.';
            exit();
        }
    }

    // Nettoyage des données POST
    private function sanitizeFormData(array $data)
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            // Si la valeur est un tableau, on applique récursivement la fonction
            if (is_array($value)) {
                $sanitizedData[$key] = $this->sanitizeFormData($value);
            } else {
                // Nettoyage de la valeur
                if (is_string($value)) {
                    $sanitizedData[$key] = strip_tags($value);
                } else {
                    // On conserve les autres types de données sans les nettoyer
                    $sanitizedData[$key] = $value;
                }
            }
        }
        return $sanitizedData;
    }

    // Gestion des erreurs 404
    private function error404($message)
    {
        http_response_code(404);
        echo $message;
    }
    
    private function handleSubmitForm($data)
    {
        // Exemple de traitement
        $name = htmlspecialchars($data['name'] ?? '');
    
        // Répondre avec un message JSON
        echo json_encode([
            'success' => true,
            'message' => "Formulaire soumis avec le nom : $name"
        ]);
    }
    
    private function handleOtherAction($data)
    {
        // Traitement pour une autre action
        echo json_encode([
            'success' => true,
            'message' => 'Autre action traitée avec succès'
        ]);
    }
    
    private function handlePostRequests()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifiez si c'est une requête Fetch
        $isFetchRequest = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

        // Si c'est une requête classique (non Fetch), continue normalement
        if (!$isFetchRequest) {
            return;
        }

        // Récupere les données du formulaire
        $data = $_POST;

        // Vérifie le token CSRF
        if (empty($data['csrf_token']) || $data['csrf_token'] !== $_SESSION['csrf_token']) {
            http_response_code(403);
            echo json_encode(['error' => 'Invalid CSRF token']);
            exit();
        }

        // Route la requête en fonction d'un paramètre 'action' dans le POST
        if (isset($data['action'])) {
            switch ($data['action']) {
                case 'submit_form':
                    $this->handleSubmitForm($data);
                    break;

                case 'other_action':
                    $this->handleOtherAction($data);
                    break;

                default:
                    http_response_code(404);
                    echo json_encode(['error' => 'Action not found']);
                    break;
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'No action specified']);
        }

        // Arrête l'exécution après avoir traité la requête Fetch
        exit();
    }
}

}
