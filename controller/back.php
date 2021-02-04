<?php
    session_start();
    $_SESSION['page'] = '';
    header('location: ../index.php');
