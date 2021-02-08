<?php
    require_once('controller/Controller.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="img/logo1.svg" rel="icon">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="style/login.css" rel="stylesheet" type="text/css">
    <link href="style/table.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.5/build/pure-min.css" integrity="sha384-LTIDeidl25h2dPxrB2Ekgc9c7sEC3CWGM6HeFmuDNUjX76Ert4Z4IY714dhZHPLd" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>foo(d) Admin</title>
</head>
<body>
<div id="background">
    <div id="img1"></div>
    <div id="img2"></div>
</div>
<div id="foreground">
    <div id="title">
        <img alt="Logo" id="logo" src="img/logo1.svg">
        <h1>foo(d)</h1>
        <div id="social">
            <a href="https://www.facebook.com/Foo-d-112920380609130" rel="noopener noreferrer" target="_blank">
                <img alt="Facebook" src="img/f_logo_RGB-Blue_1024.png">
            </a>
            <a href="https://www.instagram.com/foo_d_resto/" rel="noopener noreferrer" target="_blank">
                <img alt="Instagram" src="img/1024px-Instagram_logo_2016.svg.webp">
            </a>
            <a href="https://twitter.com/foo_d_resto" rel="noopener noreferrer" target="_blank">
                <img alt="Twitter" src="img/Twitter_Social_Icon_Circle_Color.png">
            </a>
        </div>
    </div>
    <div id="home1">
        <?php
            $controller = new Controller();
            if (isset($_POST['addOffer'])) { $controller->insertOffer($_POST); header('location: index.php'); }
            if (isset($_POST['addInterview'])) { $controller->addInterview($_POST['id'], $_POST['date']); header('location: index.php?id=' . $_POST['idr']); }
            if (isset($_GET['no'])) { $controller->archivePostulation($_GET['id']); header('location: index.php?id=' . $_GET['id']); }
            if (isset($_GET['yes'])) { $controller->acceptPostulation($_GET['id']); header('location: index.php?id=' . $_GET['id']); }
            if (isset($_SESSION['logged'])) {
                switch ($_SESSION['page'])  {
                    case 'recruitment'; include('view/recruitment.php'); break;
                    case 'postulation'; include('view/postulation.php'); break;
                    default: include('view/home.php'); break;
                }
            } else {
                if (isset($_POST['login'])) {
                    if ($controller->login($_POST)[0]['login']) {
                        $_SESSION['logged'] = 1;
                        include('view/home.php');
                    } else {
                        include('view/login-error.php');
                    }
                } else {
                    include('view/login.php');
                }
            }
        ?>
    </div>
    <div>
        <h1 class="unselectable">&nbsp</h1>
    </div>
</div>
</body>
</html>
