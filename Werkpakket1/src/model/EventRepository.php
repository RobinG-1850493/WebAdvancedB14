<?php

namespace model;

interface EventRepository
{
    public function findEventById($id);

    public function findEvents();


}
