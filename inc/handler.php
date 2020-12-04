<?php

if ( isset( $_POST[ 'submit' ] ) ) {
    header( 'Location: ' . $_POST[ 'genre' ] );
    exit;
}

?>