<?php

namespace model;

interface EventRepository
{
    public function findAllEvents();
    public function findEventMetId($id);
    public function findEventsMetIdKlant($k_id);
    public function findEventsMetLocatie($locatie);
    public function findEventsMetIdKlantEnlocatie($k_id, $locatie);
    public function addNewEvent($naam, $k_id, $b_datum, $e_datum, $locatie);
}
