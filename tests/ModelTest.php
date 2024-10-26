<?php

use PHPUnit\Framework\TestCase;
use App\Models\Model;

class ModelTest extends TestCase
{
    private $pdoMock;
    private $model;

    protected function setUp(): void
    {
        // Création d'un mock de PDO pour simuler la connexion
        $this->pdoMock = $this->createMock(PDO::class);
        
        // Injecte le mock de PDO dans ton modèle
        $this->model = new Model($this->pdoMock);
    }

    public function testReqSelectQuery()
    {
        // Définir le comportement de l'exécution de la requête
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->method('fetchAll')->willReturn([
            ['id' => 1, 'name' => 'Exemple'],
            ['id' => 2, 'name' => 'Test'],
        ]);

        $this->pdoMock->expects($this->once())
            ->method('prepare')
            ->with('SELECT * FROM table')
            ->willReturn($statementMock);

        $result = $this->model->req('SELECT * FROM table');

        // Vérification des résultats
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('Exemple', $result[0]['name']);
    }
}

