<?php $bg_admin_is_allowed = true; ?>

<?php

error_reporting( 0 );

if ( isset ( $_POST[ 'send-email' ] ) ) {

    try {

        $bg_email = new BG_Email( $_POST[ 'email' ], $_POST[ 'message' ] );
        $bg_email->send_to_guru();
        $page_msg = $bg_email->get_success_message();
        $link_txt = "Send another";

    }

    catch ( BGEmailException $e ) {

        $page_msg = $e->getMessage();
        $link_txt = "Try again";

    }

}

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

            error_log( "Invalid message" );

            throw new BGEmailException( "The guru entreats you to send a valid message." );

        }

        if ( $from_email === "" || $from_email === null ) {

            error_log( "Empty email address" );

            throw new BGEmailException( "The guru entreats you to provide a valid email." );

        }

        if ( ! filter_var( $from_email, FILTER_VALIDATE_EMAIL ) ) {

            error_log( "invalid email" );

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

class BGEmailException extends Exception {

    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Throwable $previous = null) {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }

}

?>