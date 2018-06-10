<?php
session_start();
require __DIR__ .'/vendor/autoload.php';
ini_set("display_errors",true);   //Fehlermeldungen einschalten


if (isset($_SESSION['userName'])) {
    header('Location: /ProjekteWebProf/Developer/php/todo/tasklist.html', true, 301);
    die();
}


if($_POST['username'] && $_POST['password']){
    $user = new User($_POST['username']);

    if (password_verify($_POST['password'], $user->getPassword())) {

        //wenn login erfolgreich war, eine Session erstellen
        $_SESSION['userName'] = $user->getUsername();

        header('Location: /ProjekteWebProf/Developer/php/todo/tasklist.html', true, 301);
        die();  //stellt sicher, dass nach der Umleitung nichts mehr gemacht wird
    } else {
        header('Location: /ProjekteWebProf/Developer/php/todo/index.php', true, 400);
        die();  //stellt sicher, dass nach der Umleitung nichts mehr gemacht wird

    }
}