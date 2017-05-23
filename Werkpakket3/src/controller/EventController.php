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

    public function handleFindAllEvents()
    {
        $events = $this->eventRepository->findAllEvents();
        $this->view->show(['events' => $events]);
    }

    public function handleFindEventById($id)
    {
        $event = $this->eventRepository->findEventMetId($id);
        $this->view->show(['events' => [$event]]);
    }

    public function handleFindEventsMetIdKlant($k_id){
        $events = $this->eventRepository->findEventsMetIdKlant($k_id);
        $this->view->show(['events' => $events]);
    }

    public function handleFindEventsMetLocatie($locatie){
        $events = $this->eventRepository->findEventsMetLocatie($locatie);
        $this->view->show(['events' => $events]);
    }

    public function handleFindEventsMetIdKlantEnlocatie($k_id, $locatie){
        $events = $this->eventRepository->findEventsMetIdKlantEnlocatie($k_id, $locatie);
        $this->view->show(['events' => $events]);
    }

    public function handleAddNewEvent($naam, $k_id, $b_datum, $e_datum, $locatie){
        $events = $this->eventRepository->addNewEvent($naam, $k_id, $b_datum, $e_datum, $locatie);
        header("location: ./src/view/EventsView.php");
    }

}
