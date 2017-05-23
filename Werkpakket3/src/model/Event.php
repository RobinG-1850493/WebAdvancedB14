<?php

namespace model;

class Event implements \JsonSerializable
{
    public $id;
    public $k_id;
    public $naam;
    public $b_datum;
    public $e_datum;
    public $locatie;

    public function __construct($id, $k_id, $naam, $b_datum, $e_datum, $locatie)
    {
        $this->id = $id;
        $this->k_id = $k_id;
        $this->naam = $naam;
        $this->b_datum = $b_datum;
        $this->e_datum = $e_datum;
        $this->locatie = $locatie;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getK_Id()
    {
        return $this->k_id;
    }

    public function setK_Id($k_id)
    {
        $this->k_id = $k_id;
    }

    public function getNaam()
    {
        return  $this->naam;
    }

    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    public function getB_Datum()
    {
        return $this->b_datum;
    }

    public function setB_Datum($b_datum)
    {
        $this->b_datum = $b_datum;
    }

    public function getE_Datum()
    {
        return $this->e_datum;
    }

    public function setE_Datum($location)
    {
        $this->e_datum = $location;
    }

    public function getLocatie()
    {
        return $this->locatie;
    }

    public function setLocatie($locatie)
    {
        $this->locatie = $locatie;
    }

    public function jsonSerialize()
    {
        return [
            /*'id' => $this->id,
            'name' => $this->name,
            'person' => $this->person,
            'date' => $this->date
            */
            'id' => $this->getId(),
            'k_id' => $this->getK_Id(),
            'naam' => $this->getNaam(),
            'b_datum' => $this->getB_Datum(),
            'e_datum' => $this->getE_Datum(),
            'locatie' => $this->getLocatie()
        ];
    }

}
