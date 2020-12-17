<?php $is_index = true; ?>
<?php $home = __DIR__; ?>
<?php $bg_img = "img/ganesha.jpg"; ?>

<?php require_once 'inc/handler.php'; ?>

<?php //require_once realpath( __DIR__ . "/db.php" ); ?>

<?php require_once realpath( __DIR__ . "/header.php" ); ?>

<?php require_once realpath( __DIR__ . "/inc/navbar.php" ); ?>

<section id="showcase">
    <div class="form-wrap">
        <form action="<?php echo $_SERVER[ 'PHP_SELF' ]; ?>" method="post">
            <p>The <span class="orange">Guru of Rock</span> declareth:</p>
            <h1>Input thy genre.</h1>
            <select name="genre" id="genre">
                <option value="christmas" selected>Christmas</option>
                <option value="rock">Rock</option>
                <option value="metal">Metal</option>
                <!-- <option value="black metal">Black Metal</option> -->
                <option value="punk">Punk</option>
            </select>
            <input type="submit" value="Next >" name="submit" id="submit">
        </form>
    </div>
</section>
<?php require_once realpath( __DIR__ . "/inc/blackout-screen.php" ); ?>
<?php require_once realpath( __DIR__ . "/inc/footer.php" ); ?>

