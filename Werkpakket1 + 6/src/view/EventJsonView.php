<?php

namespace view;

class EventJsonView implements View
{
    public function show(array $data)
    {
        header('Content-Type: application/json');

        if (isset($data['events'])) {
            $events = $data['events'];
            echo json_encode($events);
        } else {
            echo '{}';
        }
    }

    public function showAll(array $data)
    {
        header('Content-Type: application/json');
        if (isset($data['event'])) {
            $event = $data['event'];
            $listJson = array();
            $i =0;
            foreach ($event as $e)
            {
                $listJson[$i] =  ['id' => $e->getId(), 'name' => $e->getName()
                    , 'startDate' => $e->getStartDate(), 'endDate' => $e->getEndDate(), 'location' => $e->getLocation()];
                $i++;
            }
            echo json_encode($listJson,JSON_PRETTY_PRINT) ;
        } else {
            echo '{}';
        }
    }
}
