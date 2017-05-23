<?php

namespace model;

class PDOEventRepository implements EventRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findAllEvents()
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM events');
            $statement->execute();
            $events = [];
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $event) {
                $events[] = new Event($event['id'], $event['k_id'], $event['naam'], $event['b_datum'], $event['e_datum'], $event['locatie']);
            }
            return $events;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEventMetId($id)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM events WHERE id=:id');
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            $events = [];
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            if (count($results) > 0) {
                return new Event($results[0]['id'], $results[0]['k_id'], $results[0]['naam'], $results[0]['b_datum'], $results[0]['e_datum'], $results[0]['locatie']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function findEventsMetIdKlant($k_id){
        try {
            $statement = $this->connection->prepare('SELECT * FROM events WHERE k_id=:k_id');
            $statement->bindParam(':k_id', $k_id, \PDO::PARAM_INT);
            $statement->execute();
            $events = [];
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $event) {
                    $events[] = new Event($event['id'], $event['k_id'], $event['naam'], $event['b_datum'], $event['e_datum'], $event['locatie']);
                }
                return $events;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEventsMetLocatie($locatie){
        try {
            $statement = $this->connection->prepare('SELECT * FROM events WHERE locatie=:locatie');
            $statement->bindParam(':locatie', $locatie,  \PDO::PARAM_STR, 20);
            $statement->execute();
            $events = [];
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $event) {
                    $events[] = new Event($event['id'], $event['k_id'], $event['naam'], $event['b_datum'], $event['e_datum'], $event['locatie']);
                }
                return $events;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEventsMetIdKlantEnLocatie($k_id, $locatie){
        try {
            $statement = $this->connection->prepare('SELECT * FROM events WHERE locatie=:locatie AND k_id=:k_id');
            $statement->bindParam(':k_id', $k_id, \PDO::PARAM_INT);
            $statement->bindParam(':locatie', $locatie,  \PDO::PARAM_STR, 20);
            $statement->execute();
            $events = [];
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $event) {
                    $events[] = new Event($event['id'], $event['k_id'], $event['naam'], $event['b_datum'], $event['e_datum'], $event['locatie']);
                }
                return $events;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function addNewEvent($naam, $k_id, $b_datum, $e_datum, $locatie){
        try {
            $statement = $this->connection->prepare('INSERT INTO events(naam, k_id, b_datum, e_datum, locatie) VALUES (:naam, :k_id, :b_datum, :e_datum, :locatie)');
            $statement->bindParam(":naam", $naam, \PDO::PARAM_STR, 20);
            $statement->bindParam(':k_id', $k_id, \PDO::PARAM_INT);
            $statement->bindParam(':b_datum', $b_datum,  \PDO::PARAM_STR, 20);
            $statement->bindParam(':e_datum', $e_datum,  \PDO::PARAM_STR, 20);
            $statement->bindParam(':locatie', $locatie,  \PDO::PARAM_STR, 20);
            $statement->execute();

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
