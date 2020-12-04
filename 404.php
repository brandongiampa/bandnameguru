<?php $bg_img = "img/lantern.jpg"; ?>
<?php require_once realpath( __DIR__ . "/header.php" ); ?>
<?php require_once realpath( __DIR__ . "/inc/navbar.php" ); ?>
<section class="page about" id="about-section">
    <div class="container">
        <div class="text">
            <h1>Are you lost?</h1>
            <p>
                It appears you have erred on the 404 side.
            </p>
        </div>
        <?php require_once "inc/return-link.php"; ?>
    </div>
</section>
<?php require_once realpath( __DIR__ . "/inc/footer.php" ); ?>
<?php require_once realpath( __DIR__ . "/inc/blackout-screen.php" ); ?>