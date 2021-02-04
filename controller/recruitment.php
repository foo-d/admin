<?php
    session_start();
    $_SESSION['page'] = 'recruitment';
    header('location: ../index.php');
