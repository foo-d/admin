<?php
    require_once('controller/Controller.php');
    session_start();
    $controller = new Controller();
    $controller->closeOffer($_GET['id']);
    header('location: index.php');
