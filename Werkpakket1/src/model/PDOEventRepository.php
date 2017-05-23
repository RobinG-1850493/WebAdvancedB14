<?php

namespace model;

class PDOEventRepository implements EventRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findEventById($id)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM events WHERE id=?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Event($results[0]['id'], $results[0]['name']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEvents()
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM events');
            $statement->execute();
            $events = [];
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $event) {
                $events[] = new Event($event['id'], $event['name']);
            }
            return $events;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEventByName($name)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM event WHERE event_name=?');
            $statement->bindParam(1, $name, \PDO::PARAM_STR);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            if (count($results) > 0) {
                return new Event($results[0]['event_id'], $results[0]['event_name']
                    , $results[0]['event_start_date'], $results[0]['event_end_date'], $results[0]['event_location']);
            } else {
                return null;
            }
        }
        catch (\Exception $exception) {
            return null;
        }
    }
    public function findAllEvents()
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM event');
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $arrayEvents = array();
            if (count($results) > 0) {
                for ($x = 0; $x <= count($results) -1 ; $x++) {
                    $arrayEvents[$x] =  new Event($results[$x]['event_id'], $results[$x]['event_name']
                        , $results[$x]['event_start_date'], $results[$x]['event_end_date'], $results[$x]['event_location']);
                }
                return $arrayEvents;
            } else {
                return null;
            }
        }
        catch (\Exception $exception) {
            return null;
        }
    }
}
