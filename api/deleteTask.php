<?php
session_start();
ini_set("display_errors",true);   //Fehlermeldungen einschalten

require __DIR__ .'/vendor/autoload.php';


if (isset($_SESSION['userName'])) {
    $user = new User($_SESSION['userName']);

    //ein Task lesen, mit z.B. api/getTask?task=5
    if(isset($_DELETE['task'])){

        $task = new Task($_DELETE['task']);
        $task->delete();

    } else {
        $ausgabe = Array();
        $row = Array();
        $row['id'] = "99";
        $row['_text'] = "keine Task id";
        $row['erledigt'] = false;
        $row['_position'] = "99";
        array_push($ausgabe, $row);
    }


} else {
    $ausgabe = Array();
    $row = Array();
    $row['id'] = "99";
    $row['_text'] = "keine Session erstellt";
    $row['erledigt'] = false;
    $row['_position'] = "99";
    array_push($ausgabe, $row);
}







header("Content-type:application/json");    //formatiert das ganze im Browser in schönes, lesbares json
echo json_encode($ausgabe);