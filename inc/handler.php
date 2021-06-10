<?php isset( $bg_admin_is_allowed ) ? false : die; ?>

<?php

if ( isset( $_POST[ 'submit' ] ) ) {
    header( 'Location: ' . $_POST[ 'genre' ] );
    exit;
}

?>