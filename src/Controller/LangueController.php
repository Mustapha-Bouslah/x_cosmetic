<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LangueController extends AbstractController
{
    /**
     * @Route("/langue/{langue}", name="langue")
     */
    public function changerLangue($langue, Request $request)
    {
        // on stocke la langue en session
        $request->getSession()->set('_locale', $langue);

        return $this->redirect($request->headers->get('referer'));
    }
}
