<?php

require_once 'src/autoload.php';
use controller\EventController;
use model\PDOEventRepository;
use \model\PDOPersonRepository;
use view\EventJsonView;
use \view\PersonJsonView;
use \controller\PersonController;

$user = 'root';
$password = 'user';
$database = 'Project_web';
$pdo = null;

try {

    $jsonfile = file_get_contents("output.json");
    $json_a = json_decode($jsonfile, true);
    $pdo = new PDO($json_a);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //PDO
    $eventPDORepository = new PDOEventRepository($pdo);
    $personPDORepository = new PDOPersonRepository($pdo);

    //VIEW
    $eventJsonView = new EventJsonView();
    $personJsonView = new PersonJsonView();

    //CONTROLLER
    $eventController = new EventController($eventPDORepository, $eventJsonView);
    $personController = new PersonController($personPDORepository, $personJsonView);

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    //Alle Events
    $allEvent = isset($_REQUEST['allEvent'])? $_REQUEST['allEvent'] : null;
    $eventController->handleFindAllEvents();

    //Event op naam
    $eventName = isset($_REQUEST['eventName']) ? $_REQUEST['eventName'] : null;
    $eventController->handleFindEventByName($eventName);

    //Event op id
    $eventId = isset($_REQUEST['eventId']) ? $_REQUEST['eventId'] : null;
    $eventController->handleFindEventById($eventId);

    //Persoon op id
    $personId = isset($_REQUEST['personId']) ? $_REQUEST['personId'] : null;
    $personController->handleFindPersonById($personId);

    //Persoon op naam
    $personName = isset($_REQUEST['personName']) ? $_REQUEST['personName'] : null;
    $personController->handleFindPersonByName($personName);

} catch (Exception $e) {
    echo $e;
}
