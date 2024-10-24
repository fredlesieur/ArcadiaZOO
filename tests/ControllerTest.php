<?php

use PHPUnit\Framework\TestCase;

// Classe enfant temporaire qui hérite du contrôleur abstrait pour permettre l'instanciation
class TestableController extends \App\Controllers\Controller {
    // On ne modifie rien ici, c'est juste pour rendre la classe instanciable
}

class ControllerTest extends TestCase
{
    public function testRender()
    {
        // Instancier le contrôleur via la classe enfant
        $controller = new TestableController();

        // Définir les données que nous voulons rendre disponibles dans la vue
        $data = ['nom' => 'Test'];

        // Capture de la sortie de la méthode render
        ob_start();
        $controller->render('exempleVue', $data);
        $output = ob_get_clean();

        // Vérifier que la variable $nom est bien extraite et utilisée dans la vue
        $this->assertStringContainsString('Test', $output);

        // S'assurer qu'il n'y a pas d'ob_start non terminé
        if (ob_get_length()) {
            ob_end_clean();
        }
    }
}
