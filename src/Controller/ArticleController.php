<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        // return new Response('OMG! My first page already! Wooo!');
        return $this->render('article/homepage.html.twig');
    }

    /*
     * Forma alternativa de gerar o template sem a necessidade de estender
     * o AbstractController, passando a instância por autowiring.
    public function homepage(Environment $twig)
    {
        // return new Response('OMG! My first page already! Wooo!');
        return new Response($twig->render('article/homepage.html.twig'));
    }
    */

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug)
    {
        $comments = [
            'I ate a normal rock once.',
            'Woohoo! Asteroid',
            'I like bacon too!'
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/news/{slug}/heard", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - Actually heard/unheard the artcle

        $logger->info('Article is being hearted');

        return new JsonResponse(['hearts' => rand(5, 100)]);
        // Controller Shortcut para o mesmo retorno:
        // $this->json(['hearts' => rand(5, 100)])
    }
}