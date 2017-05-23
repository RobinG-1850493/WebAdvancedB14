<?php

namespace controller;

use model\EventRepository;
use view\View;

class EventController
{
    private $eventRepository;
    private $view;

    public function __construct(EventRepository $eventRepository, View $view)
    {
        $this->eventRepository = $eventRepository;
        $this->view = $view;
    }

    public function handleFindEventById($id = null)
    {
        $event = $this->eventRepository->findEventById($id);
        $this->view->show(['persons' => [$event]]);
    }

    public function handleFindEvents()
    {
        $events = $this->eventRepository->findEvents();
        $this->view->show(['events' => $events]);
    }

    public function handleFindEventByName($name = null)
    {
        $event = $this->eventRepository->findEventByName($name);
        $this->view->show(['event' => $event]);
    }
    public function handleFindAllEvents()
    {
        $event = $this->eventRepository->findAllEvents();
        $this->view->showAll(['event' => $event]);
    }
    public function handleEventBetweenTwoDates($startDate = null, $endDate = null)
    {
        $event = $this->eventRepository->findBetweenTwoDates($startDate, $endDate);
        $this->view->showAll(['event' => $event]);
    }
}
