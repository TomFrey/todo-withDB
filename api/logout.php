<?php
session_start();

unset($_SESSION['userName']);

header('Location: /ProjekteWebProf/Developer/php/todo/index.php', true, 301);
die();