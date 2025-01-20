<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controllers\Controller;

class TestableController extends Controller
{
    // Rien à ajouter ici, juste pour rendre la classe instanciable
}

class ControllerTest extends TestCase
{
    public function testRender()
    {
        // Instancier le contrôleur
        $controller = new TestableController();

        // Chemins corrigés pour les fichiers temporaires
        $viewFile = ROOT . '/Views/exempleVue.php';
        $templateFile = ROOT . '/Views/default.php';

        // Créer une vue temporaire
        file_put_contents($viewFile, "<p>Bonjour, <?= \$nom ?> !</p>");

        // Créer un fichier default.php temporaire
        file_put_contents($templateFile, "<html><body><?= \$contenu ?></body></html>");

        // Définir les données pour la vue
        $data = ['nom' => 'Test'];

        // Capture de la sortie de la méthode render
        ob_start();
        $controller->render('exempleVue', $data);
        $output = ob_get_clean();

        // Vérifier que la variable $nom est bien utilisée
        $this->assertStringContainsString('Test', $output);

        // Supprimer les fichiers temporaires si existants
        if (file_exists($viewFile)) {
            unlink($viewFile);
        }
        if (file_exists($templateFile)) {
            unlink($templateFile);
        }
    }
}


