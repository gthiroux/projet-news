<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class EventController extends AbstractController
{
    #[Route('/event', name: 'event.index')]
    public function index(EventRepository $repository): Response
    {
        $events = $repository->findAll();
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
            'events' => $events,
        ]);
    }

    #[Route('/event/{level}', name: 'event.show')]
    public function show(string $level, EventRepository $repository): Response
    {
        $events = $repository->findBy(['level' => $level]);
        return $this->render('event/show.html.twig', [
            'level' => $level,
            'events' => $events,
        ]);
    }

    // #[Route('/event/{level}/edit', name: 'event.edit')]
    // public function level(): Response
    // {
    //     return new Response("good");
    // }
}
