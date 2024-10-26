<?php

use PHPUnit\Framework\TestCase;
use App\Models\AvisModel;

class AvisModelTest extends TestCase
{
    protected $avisModel;

    protected function setUp(): void
    {
        // Créer un mock pour AvisModel et remplacer la méthode req
        $this->avisModel = $this->getMockBuilder(AvisModel::class)
                                ->onlyMethods(['req'])
                                ->getMock();
    }

    public function testGetAllValidatedReviews()
    {
        // Simuler le retour de la méthode req pour les avis validés
        $expectedReviews = [
            ['pseudo' => 'JohnDoe', 'comment' => 'Great experience!'],
            ['pseudo' => 'JaneDoe', 'comment' => 'Loved it!']
        ];
        
        $this->avisModel->expects($this->once())
                        ->method('req')
                        ->with("SELECT pseudo, comment FROM addavis WHERE valid = 1")
                        ->willReturn((object)['fetchAll' => fn() => $expectedReviews]);

        $reviews = $this->avisModel->getAllValidatedReviews();
        
        $this->assertEquals($expectedReviews, $reviews);
    }

    public function testGetPendingReviews()
    {
        // Simuler le retour de la méthode req pour les avis en attente
        $expectedPendingReviews = [
            ['id' => 1, 'pseudo' => 'JohnDoe', 'comment' => 'Pending review'],
            ['id' => 2, 'pseudo' => 'JaneDoe', 'comment' => 'Another pending review']
        ];
        
        $this->avisModel->expects($this->once())
                        ->method('req')
                        ->with("SELECT * FROM addavis WHERE valid = 0")
                        ->willReturn((object)['fetchAll' => fn() => $expectedPendingReviews]);

        $pendingReviews = $this->avisModel->getPendingReviews();
        
        $this->assertEquals($expectedPendingReviews, $pendingReviews);
    }

    public function testApproveReview()
    {
        $reviewId = 1;

        // Simuler la mise à jour de la base de données
        $this->avisModel->expects($this->once())
                        ->method('req')
                        ->with("UPDATE addavis SET valid = 1 WHERE id = ?", [$reviewId])
                        ->willReturn(true);

        $result = $this->avisModel->approveReview($reviewId);
        
        $this->assertTrue($result, "La validation de l'avis devrait réussir.");
    }

    public function testRejectReview()
    {
        $reviewId = 1;

        // Simuler la suppression de la base de données
        $this->avisModel->expects($this->once())
                        ->method('req')
                        ->with("DELETE FROM addavis WHERE id = ?", [$reviewId])
                        ->willReturn(true);

        $result = $this->avisModel->rejectReview($reviewId);
        
        $this->assertTrue($result, "La suppression de l'avis devrait réussir.");
    }
}
