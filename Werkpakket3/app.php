<?php

require_once 'src/autoload.php';
use \model\PDOEventRepository;
use \view\EventJsonView;
use \controller\EventController;

$user = 'root';
$password = 'pxl';
$database = 'Project_web';
$pdo = null;
try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database",
        $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

    $eventPDORepository = new PDOEventRepository($pdo);
    $eventJsonView = new EventJsonView();
    $eventController = new EventController($eventPDORepository, $eventJsonView);

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $k_id = isset($_GET['k_id']) ? $_GET['k_id'] : null;
    $locatie = isset($_GET['locatie']) ? $_GET['locatie'] : null;
    $e_datum = isset($_POST['e_datum']) ? $_POST['e_datum'] : null;

    if ($e_datum != null){

        $naam =  isset($_POST['naam']) ? $_POST['naam'] : null;
        $k_id =  isset($_POST['k_id']) ? $_POST['k_id'] : null;
        $b_datum =  isset($_POST['b_datum']) ? $_POST['b_datum'] : null;
        $locatie =  isset($_POST['locatie']) ? $_POST['locatie'] : null;

        if ($naam != null  && $k_id != null && $b_datum != null && $locatie != null){
            $eventController->handleAddNewEvent($naam, $k_id, $b_datum, $e_datum, $locatie);
        } else{
            echo "Gelieve alle velden in te vullen.";
        }
    }else{
       if ($id == null) {
            if ($k_id == null && $locatie == null) {
                $eventController->handleFindAllEvents();
            } else if($locatie == null){
                $eventController->handleFindEventsMetIdKlant($k_id);
            } else if($k_id == null){
                $eventController->handleFindEventsMetlocatie($locatie);
            } else {
                $eventController->handleFindEventsMetIdKlantEnlocatie($k_id, $locatie);
            }
        } else {
            $eventController->handleFindEventById($id);
        }
    }
} catch (Exception $epi) {
    echo 'Fout tijdens verbinden met Database  '. $epi->getMessage();
}



