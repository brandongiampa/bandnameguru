<?php $bg_admin_is_allowed = true; ?>

<?php

error_reporting( 0 );

if ( isset ( $_POST[ 'send-email' ] ) ) {

    try {

        $bg_email = new BG_Email( $_POST[ 'email' ], $_POST[ 'message' ] );
        $bg_email->send();

        $page_msg = $bg_email->get_success_message();
        $link_txt = "Send another";

    }

    catch ( Exception $e ) {

        error_log( $e->getMessage() );

        $page_msg = "There hath been an error.";
        $link_txt = "Try again";

    }

    catch ( BGEmailException $e ) {

        $page_msg = $e->getMessage();
        $link_txt = "Try again";

    }

}




    // error_reporting( 0 );
    // $page_msg = "";
    // $link_txt = "";
    // $error_msg = "Unfortunately, there was an error sending your message.";

    // if ( isset ( $_POST[ 'send-email' ] ) ) {

    //     try {
    //         //send email to webmaster, notify if not successful
    //         $to = "me@brandongiampa.com";
    //         $subject = "Band Name Guru Inquiry";
    //         $txt = isset( $_POST[ 'message' ]) ? $_POST[ 'message' ] : "Blank message.";
    //         $email = isset( $_POST[ 'email' ] ) ? $_POST[ 'email' ] : "inquiry@bandnameguru.com";
    //         $headers = "From: ${email}" . "\r\n";
    
    //         if ( mail( $to, $subject, $txt, $headers ) ) {
    //             //send confirmation email to author of msg, do not notify of error as long as webmaster email received
    //             try {
    //                 $to = $email;
    //                 $subject = "The Guru Hath Received Thy Inquiry";
    //                 $txt = "";
    //                 $txt = "Your message hath traversed the rough terrain of the dark forests of Detroit and, if thusly solicited, thou shalt receive a response within a Sumerian fortnight.";
    //                 $txt .= isset( $_POST[ 'message' ]) ? $_POST[ 'message' ] : "Blank message.";
    //                 $email = "donotreply@bandnameguru.com";
    //                 $headers = "From: ${email}" . "\r\n";
        
    //                 mail( $to, $subject, $txt, $headers );
    //             }
    //             catch ( Exception $e ) { 
    //                 error_log( $e->getMessage() );
    //             }
    //             //message to user in place of form
    //             $page_msg = "Your inquiry has been successfully received.";
    //             $link_txt = "Send another";
    //         }
    //         else {
    //             //message to user in place of form
    //             $page_msg = $error_msg;
    //             $link_txt = "Try again";
    //         }
    //     }

    //     catch ( Exception $e ) {
    //         error_log( $e->getMessage() );
    //         //message to user in place of form
    //         $page_msg = $error_msg;
    //         $link_txt = "Try again";
    //     }

    // }

class BG_Email {

    private $to = "me@brandongiampa.com";
    private $from = "donotreply@bandnameguru.com";
    private $subject = "Band Name Guru Inquiry";
    private $txt;
    private $email;
    private $headers;
    private $success_message = "Thine email hath been transmitted. Thou shalt receiveth a confirmation.";
    
    public function __construct( $from_email, $txt ) {

        if ( $txt === "" || $txt === null ) {

            throw new BGEmailException( "The guru entreats you to send a valid message." );

        }

        if ( $from_email === "" || $from_email === null ) {

            throw new BGEmailException( "The guru entreats you to provide a valid email." );

        }

        if ( ! filter_var( $from_email, FILTER_VALIDATE_EMAIL ) ) {

            throw new BGEmailException( "The guru entreats you to provide a valid email." );

        }

        $this->txt = htmlentities( $txt );
        $this->email = filter_var( $from_email, FILTER_SANITIZE_EMAIL );
        $this->headers = "From: " . $this->email . "\r\n";

    }

    public function send_to_guru() {

        try {

            if ( mail( $this->to, $this->subject, $this->txt, $this->headers ) ) {

                $this->send_confirmation_from_guru();
    
            }

            else {
    
                throw new BGEmailException( "There hath been an unknown issue and your message hath not been sent. We entreat you to try again." );
    
            }

        }

        catch ( Exception $e ) {

            error_log( $e->getMessage() );

        }

    }

    private function send_confirmation_from_guru() {
        
        try {

            $txt = "Your message hath traversed the rough terrain of the dark forests of Detroit and, if thusly solicited, thou shalt receive a response within a Sumerian fortnight.<br><br>";
            $txt .= "Original Message: " . $this->txt;
    
            $subject = "The Guru Hath Received Thy Inquiry";
    
            if ( mail( $this->email, $subject, $txt, $headers ) ) {
    
                return true;
    
            }

            else {
    
                throw new BGEmailException( "Your message hath been received by the guru, but there hath been an error sending your confirmation. The guru entreats your forgiveness." );
    
            }

        }

        catch ( Exception $e ) {

            error_log( $e->getMessage() );

        }

    }

    public function get_success_message() {

        return $this->success_message;

    }

}

class BGEmailException extends Exception {}

?>