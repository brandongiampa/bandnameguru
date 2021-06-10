<?php $bg_admin_is_allowed = true; ?>

<?php $bg_img = "img/concert.jpg"; ?>
<?php require_once realpath( __DIR__ . "/header.php" ); ?>
<?php require_once realpath( __DIR__ . "/inc/navbar.php" ); ?>
<section id="show-names" class="show-names">
    <div class="container">
        <div class="text">
            <p>
            The <span id="guru-name" class="orange">Guru of Rock</span> hath bequeathed unto thee the following names:
            </p>
            <div class="names">
                <div class="name">
                    <label for="name-1">Style #1</label>
                    <p>
                        <span class="name-span" id="name-1"><span class="band-name-placeholder">The Name Placeholders</span></span>
                        <i class="share-button material-icons">share</i>
                    </p>
                    <?php include 'inc/social-shares.php'; ?>
                </div>
                <div class="name">
                    <label for="name-2">Style #2</label>
                    <p><span  class="name-span" id="name-2"><span class="band-name-placeholder">The Name Placeholders</span></span> <i class="share-button material-icons">share</i></p>
                    <?php include 'inc/social-shares.php'; ?>
                </div>
                <div class="name">
                    <label for="name-3">Style #3</label>
                    <p><span class="name-span" id="name-3"><span class="band-name-placeholder">The Name Placeholders</span></span> <i class="share-button material-icons">share</i></p>
                    <?php include 'inc/social-shares.php'; ?>
                </div>
                <div class="name">
                    <label for="name-4">Style #4</label>
                    <p><span class="name-span" id="name-4"><span class="band-name-placeholder">The Name Placeholders</span></span> <i class="share-button material-icons">share</i></p>
                    <?php include 'inc/social-shares.php'; ?>
                </div>
            </div>
        </div>
        <div id="pulse-wrap" class="pulse-wrap">
            <div class="dot-pulse"></div>
        </div>
        <div class="rename">
            <button id="rename">
                More please, Guru!
            </button>
            <br>
            <?php require_once "inc/return-link.php"; ?>
        </div>
    </div>
</section>
<?php require_once realpath( __DIR__ . "/inc/footer.php" ); ?>
<?php require_once realpath( __DIR__ . "/inc/blackout-screen.php" ); ?>