<?php
ini_set("display_errors",true);   //Fehlermeldungen einschalten

require __DIR__ .'/vendor/autoload.php';



header("Content-type:application/json");    //formatiert das ganze im Browser in schönes, lesbares json
echo json_encode('{"file":"createTask"}');