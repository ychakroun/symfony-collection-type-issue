<?php

namespace App\Controller;

use App\Entity\Footer;
use App\Entity\Link;
use App\Form\Type\FooterType;
use App\Form\Type\LinkType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_index")
     */
    public function index(Request $request): Response
    {
        $footer = new Footer();
        $form = $this->createForm(FooterType::class, $footer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return new Response('OK');
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/without-collection-type", name="default_without")
     */
    public function without(Request $request): Response
    {
        $link = new Link();
        $form = $this->createForm(LinkType::class, $link);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return new Response('OK');
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
