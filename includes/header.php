<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <div id="container">
        <header id="mainheader">
            <h1 class="center"><a id="logo" href="index.php">Forum</a></h1>
            <?php include("includes/mainmenu.php"); ?>
        </header>

        <section class="middle center" id="leftcontent">
    