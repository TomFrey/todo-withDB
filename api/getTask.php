<?php
session_start();
ini_set("display_errors",true);   //Fehlermeldungen einschalten
require __DIR__ .'/vendor/autoload.php';


if (isset($_SESSION['userName'])) {
    $user = new User($_SESSION['userName']);

    $ausgabe = Array();

    //ein Task lesen, mit z.B. api/getTask?task=5
    if(isset($_GET['task'])){
        $task = $user->getTask($_GET['task']);

        $row = Array();
        $row['id'] = $task->getId();
        $row['_text'] = $task->getName();
        $row['erledigt'] = false;
        $row['_position'] = $task->getId();

        array_push($ausgabe, $row);

    //alle Tasks holen z.B. api/getTask
    } else {
        foreach ($user->getTasks() as $task) {
            $row = Array();
            $row['id'] = $task->getId();
            $row['_text'] = $task->getName();
            $row['erledigt'] = false;
            $row['_position'] = $task->getId();
            //$row['description'] = $task->getDescription();

            array_push($ausgabe, $row);
        }
    }

    //JSON zurück geben
    header("Content-type:application/json");    //formatiert das ganze im Browser in schönes, lesbares json
    echo json_encode($ausgabe);


} else {
    $ausgabe = Array();
    $row = Array();
    $row['id'] = "99";
    $row['_text'] = "keine Session erstellt";
    $row['erledigt'] = false;
    $row['_position'] = "99";
    array_push($ausgabe, $row);
   /* $ausgabe = '[
                    {
                        "id": "99",
                        "_text": "temp",
                        "erledigt": false,
                        "_position": "99"
                    },{
                        "id": "100",
                        "_text": "temp",
                        "erledigt": false,
                        "_position": "100"
                    }
                ]';  */

    //JSON zurück geben
    header("Content-type:application/json");    //formatiert das ganze im Browser in schönes, lesbares json
    echo json_encode($ausgabe);
}


