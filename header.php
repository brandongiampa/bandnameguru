<?php isset( $bg_admin_is_allowed ) ? false : die( "This file is not for public consumption. Stop hacking." ); ?>

<?php
    require_once "vendor/autoload.php" ; 
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load(); 

    define( 'HOME_URL', $_ENV['HOME_URL'] );
?>

<?php 
    if ( ! isset( $bg_img ) ) {
        $bg_img = "img/gothgirl.jpg";
    }
    $genre = isset( $genre ) ? $_GET[ 'genre' ] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Khand:wght@300;400;500;600;700&family=New+Rocker&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Guru of Band Name Generators</title>
    <meta name="keywords" content="name my band, what to call my band, band name maker, band name ideas" />
    <meta name="description" content="Randomly generate your band's name with the input of a guru.">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="<?php echo HOME_URL . "/dist/app.css"; ?>">
    <link rel="icon" href="<?php echo HOME_URL . "/img/icon.png";?>" type="image/png" sizes="16x16">
    <!--SEO--> 
    <meta name=”robots” content="index, follow">
    <!--Facebook share-->
    <meta property="og:title" content="Band Name Guru">
    <meta property="og:description" content="Creating memorable band and song names since the dawn of time.">
    <meta property="og:image" content="<?php echo HOME_URL . "/img/screenshot2.jpg"; ?>">
    <meta property="og:url" content="<?php echo HOME_URL; ?>">
    <meta property="og:site_name" content="Band Name Generation GURU">
    <!--Twitter share-->
    <meta name="twitter:title" content="Band Name Guru">
    <meta name="twitter:description" content=" Creating memorable band and song names since the dawn of time.">
    <meta name="twitter:image" content="<?php echo HOME_URL . "/img/screenshot2.jpg"; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image:alt" content="The year is 2021 and the vaccine has finally brought things back to normal. After spending your whole quarantine practicing, your band is going places. You are set to play the first set and the first rock festival in over a year! What is your band's name?">
</head>
<body style="background-image: url( <?php echo $bg_img; ?> ); background-position: center;">
    <header>
        <div class="seo-headers" style="position: absolute; visibility: hidden;">
            <h1><?php echo $genre . " "; ?>Band Name Generator</h1>
            <h2>Modern <?php echo $genre . " "; ?>Band Name Maker</h2>
        </div>
        <div class="container">
            <div class="header-wrap">
                <div class="branding">
                    <a href="<?php echo HOME_URL; ?>">
                        Band Name Guru
                    </a>
                </div>
                <a href="#">
                    <div id="show-menu" class="show-menu">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </a>
            </div>
        </div>
    </header>
