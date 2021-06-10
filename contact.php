<?php $bg_admin_is_allowed = true; ?>

<?php include_once realpath( __DIR__ . "/inc/send-email.php" ); ?>

<?php require_once realpath( __DIR__ . "/header.php" ); ?>

<?php require_once realpath( __DIR__ . "/inc/navbar.php" ); ?>

<section class="page contact" id="contact">
    <div class="form-wrap">
        <h1>Contact the Guru</h1>
        
        <?php if ( ! isset( $_POST[ 'send-email' ] ) ): ?>
        <form action="<?php echo HOME_URL . "/contact"; ?>" method="post">
            <p class="text-gray">
                Feel free to use this message to suggest nouns, adjectives, etc. or to <span class="orange">thank the guru</span> for his assistance with your band's name.
            </p>
            <br>
            <hr>
            <br>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" required><br><br>
            <label for="message">Message:</label>
            <textarea name="message"id="message"cols="30"rows="10"required></textarea><br><br>
            <input type="submit" value="Send" name="send-email" id="submit">
        </form>
        <?php else: ?>
        <p><?php echo $page_msg; ?></p>
        <a href="<?php echo HOME_URL . "/contact"; ?>" class="link link-center"><?php echo $link_txt; ?></a>
        <?php endif; ?>

    </div>
</section>

<?php require_once realpath( __DIR__ . "/inc/footer.php" ); ?>

<?php require_once realpath( __DIR__ . "/inc/blackout-screen.php" ); ?>