<?php
    session_start();
    $_SESSION['page'] = 'postulation';
    header('location: ../index.php?id=' . $_GET['id']);
