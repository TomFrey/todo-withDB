<?php
ini_set("display_errors",true);   //Fehlermeldungen einschalten

require __DIR__ .'/vendor/autoload.php';


    $methode = $_SERVER['REQUEST_METHOD'];

    switch ($methode) {
    case 'GET':
        //Tasks holen
        include_once "getTask.php";
        break;

    case 'POST':
        include_once "createTask.php";
        break;

    case 'DELETE':
        //weil es in php kein delete gibt
        parse_str(file_get_contents("php://input", "r"), $_DELETE);
        include_once "deleteTask.php";
        break;

    case 'PUT':
        //weil es in php kein put gibt
        parse_str(file_get_contents("php://input", "r"), $_PUT);

        //echo 'task = '.$_PUT['task'];

        //nur wenn eine Task id mitgegeben wird, kann der Task editiert werden
        if(isset($_PUT['task'])){
            include_once "editTask.php";
        } else {
            //Fehler schicken z.b. 412
            header("400 Bad Request");
            echo json_encode('{"file":"editTask ohne id"}');
        }
        break;
    }