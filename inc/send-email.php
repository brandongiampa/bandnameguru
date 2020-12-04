<?php
    error_reporting( 0 );
    $page_msg = "";
    $link_txt = "";
    $error_msg = "Unfortunately, there was an error sending your message.";

    if ( isset ( $_POST[ 'send-email' ] ) ) {
        try {
            //send email to webmaster, notify if not successful
            $to = "me@brandongiampa.com";
            $subject = "Band Name Guru Inquiry";
            $txt = isset( $_POST[ 'message' ]) ? $_POST[ 'message' ] : "Blank message.";
            $email = isset( $_POST[ 'email' ] ) ? $_POST[ 'email' ] : "inquiry@bandnameguru.com";
            $headers = "From: ${email}" . "\r\n";
    
            if ( mail( $to, $subject, $txt, $headers ) ) {
                //send confirmation email to author of msg, do not notify of error as long as webmaster email received
                try {
                    $to = $email;
                    $subject = "The Guru Hath Received Thy Inquiry";
                    $txt = "";
                    $txt = "Your message hath traversed the rough terrain of the dark forests of Detroit and, if thusly solicited, thou shalt receive a response within a Sumerian fortnight.";
                    $txt .= isset( $_POST[ 'message' ]) ? $_POST[ 'message' ] : "Blank message.";
                    $email = "donotreply@bandnameguru.com";
                    $headers = "From: ${email}" . "\r\n";
        
                    mail( $to, $subject, $txt, $headers );
                }
                catch ( Exception $e ) { 
                    error_log( $e->getMessage() );
                }
                //message to user in place of form
                $page_msg = "Your inquiry has been successfully received.";
                $link_txt = "Send another";
            }
            else {
                //message to user in place of form
                $page_msg = $error_msg;
                $link_txt = "Try again";
            }
        }
        catch ( Exception $e ) {
            error_log( $e->getMessage() );
            //message to user in place of form
            $page_msg = $error_msg;
            $link_txt = "Try again";
        }

    }

?>