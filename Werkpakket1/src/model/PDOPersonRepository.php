<?php

namespace model;

class PDOPersonRepository implements PersonRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findPersonById($id)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM person WHERE id=?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Person($results[0]['id'], $results[0]['name']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findPersons()
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM person');
            $statement->execute();
            $persons = [];
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $person) {
                $persons[] = new Person($person['id'], $person['name']);
            }
            return $persons;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
