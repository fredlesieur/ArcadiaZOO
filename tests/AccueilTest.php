<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\AccueilController;
use App\Models\HabitatsModel;
use App\Models\AccueilModel;
use App\Models\CarouselModel;

class AccueilTest extends TestCase
{
    public function testIndex()
    {
        // Mock des modèles
        $habitatsModelMock = $this->createMock(HabitatsModel::class);
        $accueilModelMock = $this->createMock(AccueilModel::class);
        $carouselModelMock = $this->createMock(CarouselModel::class);

        // Configuration des retours des mocks
        $habitatsModelMock->method('findAll')->willReturn(['habitat1', 'habitat2']);
        $accueilModelMock->method('findAll')->willReturn(['accueil1']);
        $carouselModelMock->method('findAllImages')->willReturn(['image1', 'image2']);

        // Création de l'instance du contrôleur avec les mocks
        $controller = new AccueilController(null, $habitatsModelMock, $accueilModelMock, $carouselModelMock);

        // Capture la sortie de la méthode render
        ob_start();
        $controller->index();
        $output = ob_get_clean();

        // Assertions sur le contenu généré
        $this->assertStringContainsString('ACCUEIL', $output);
        $this->assertStringContainsString('habitat1', $output);
        $this->assertStringContainsString('image1', $output);
        $this->assertStringContainsString('Aucun avis pour le moment.', $output);
    }
}
