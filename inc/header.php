<?php isset( $bg_admin_is_allowed ) ? false : die; ?>

<?php
    require_once "vendor/autoload.php" ; 
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable( __DIR__ );
    $dotenv->load(); 

    define( 'HOME_URL', $_ENV['HOME_URL'] );
?>

<?php 
    if ( ! isset( $bg_img ) ) {
        $bg_img = "img/gothgirl.jpg";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Khand:wght@300;400;500;600;700&family=New+Rocker&display=swap" rel="stylesheet">
<!-- <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400&family=Karma:wght@600;700&family=Khand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Band Name Guru - A Modern Band Name Generator</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link rel="stylesheet" href="<?php //echo $_ENV['HOME'] . '/dist/app.css'; ?>"> -->
    <link rel="stylesheet" href="dist/app.css">
</head>
<body style="background-image: url( <?php echo $bg_img; ?> ); background-position: center;">

    <header>
        <div class="container">
            <div class="header-wrap">
                <div class="branding">
                    <!-- <a href="<?php //echo $_ENV["HOME"];?>"> -->
                    <a href="index.php">
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
