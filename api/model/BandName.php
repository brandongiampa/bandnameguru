<?php

function capitalize( $str ) {

}

class BandNameType1 {

    private $_adj;
    private $_noun;

    public function __construct( $adj, $noun ) {

        $this->_adj = capitalize_phrase( $adj );
        $this->_noun = capitalize_phrase( $noun );

    } 

    public function createName() {
        return "The " . $this->_adj . " " . $this->_noun;
    }

}

class BandNameType2 {

    private $_adj;
    private $_noun;

    public function __construct( $adj, $noun ) {

        $this->_adj = capitalize_phrase( $adj );
        $this->_noun = capitalize_phrase( $noun );

    } 

    public function createName() {
        return $this->_adj . " " . $this->_noun;
    }

}

class BandNameType3 {

    private $_noun1;
    private $_noun2;

    function __construct( $noun1, $noun2 ) {

        $this->_noun1 = capitalize_phrase( $noun1 );
        $this->_noun2 = capitalize_phrase( $noun2 );

    } 

    public function createName() {
        return "The " . $this->_noun1 . " " . $this->_noun2;
    }

}

class BandNameType4 {

    private $_verb;
    private $_noun;

    function __construct( $verb, $noun ) {

        $this->_verb = capitalize_phrase( $verb );
        $this->_noun = capitalize_phrase( $noun );

    } 

    public function createName() {
        return $this->_verb . " the " . $this->_noun;
    }
}

function capitalize_phrase( $word ){

   if ( $word === "in" || $word === "to" || $word === "of" || $word === "as" || $word === "on" || $word === "or" || $word === "the" ) {
       return $word;
   }

    $hyphen_input = explode( "-" , $word);
    $hyphen_output = array();

    foreach ( $hyphen_input as $component ){
        array_push( $hyphen_output, ucfirst( $component ) ); 
    }

    $word = implode( "-", $hyphen_output );

    $space_input = explode ( " ", $word );
    $space_output = array();

    foreach ( $space_input as $component ){
        array_push( $space_output, ucfirst( $component ) );
    }

    $word = implode( " ", $space_output );

    return $word;

}


?>