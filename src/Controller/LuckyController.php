<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Service\NumberGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
   /**
    * @Route("/lucky/number")
    */
    public function number(NumberGenerator $numberGenerator)
    {
        return $this->render('lucky/number.html.twig', [
            'number' => $numberGenerator->generateNumber(),
        ]);
    }
}