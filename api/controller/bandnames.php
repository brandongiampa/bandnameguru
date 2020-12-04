<?php
date_default_timezone_set('America/Los_Angeles');
require_once 'db.php';
require_once '../model/BandName.php';
require_once '../model/Response.php';

$nouns = [];
$adjectives = [];
$verbs = [];
$modifiers = [];
$random_numbers = [];

try{
  $db = DB::connect();
}
catch(PDOException $ex){
  error_log("Connection error - " . $ex, 0);
  $response = new Response(500, false);
  $response->addMessage($ex->getMessage());
  $response->send();
  exit;
}

if(array_key_exists("genre", $_GET)){
  $genre = $_GET['genre'];

  if ($genre === ''){
    $response = new Response(400, false);
    $response->addMessage("Genre cannot be blank.");
    $response->send();
    exit;
  }

  if($_SERVER['REQUEST_METHOD'] === 'GET'){
    try{
    //get nouns
      $query = $db->prepare('SELECT DISTINCT * FROM tbl_nouns WHERE genre = :genre');
      $query->bindParam(':genre', $genre, PDO::PARAM_STR);
      $query->execute();

      $rowCount = $query->rowCount();

      if($rowCount===0){
        $response = new Response(404, false);
        $response->addMessage("Cannot complete, as there are no nouns to create names.");
        $response->send();
        exit;
      }

      while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($nouns, $row['noun']);
      }

      //get adjectives
      $query = $db->prepare('SELECT DISTINCT * FROM tbl_adjectives WHERE genre = :genre');
      $query->bindParam(':genre', $genre, PDO::PARAM_STR);
      $query->execute();

      $rowCount = $query->rowCount();

      if($rowCount===0){
        $response = new Response(404, false);
        $response->addMessage("Cannot complete, as there are no adjectives to create names.");
        $response->send();
        exit;
      }

      while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($adjectives, $row['adjective']);
      }

      //get verbs
      $query = $db->prepare('SELECT DISTINCT * FROM tbl_verbs WHERE genre = :genre');
      $query->bindParam(':genre', $genre, PDO::PARAM_STR);
      $query->execute();

      $rowCount = $query->rowCount();

      if($rowCount===0){
        $response = new Response(404, false);
        $response->addMessage("Cannot complete, as there are no verbs to create names.");
        $response->send();
        exit;
      }

      while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($verbs, $row['verb']);
      }

      //get modifiers
      $query = $db->prepare('SELECT DISTINCT * FROM tbl_modifiers WHERE genre = :genre');
      $query->bindParam(':genre', $genre, PDO::PARAM_STR);
      $query->execute();

      $rowCount = $query->rowCount();

      if($rowCount===0){
        $response = new Response(404, false);
        $response->addMessage("Cannot complete, as there are no verbs to create names.");
        $response->send();
        exit;
      }

      while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($modifiers, $row['modifier']);
      }

      $returnData = array();
      $returnData['band_name_1'] = makeRandomBandNameType1( $adjectives, $nouns );
      $returnData['band_name_2'] = makeRandomBandNameType2( $adjectives, $nouns );
      $returnData['band_name_3'] = makeRandomBandNameType3( $modifiers ,$nouns );
      $returnData['band_name_4'] = makeRandomBandNameType4( $verbs, $modifiers );

      $response = new Response(200, true);
      //$response->toCache(true);
      $response->setData($returnData);
      $response->send();

      $returnData = false;
      $response = false;
      exit;

    }catch(Exception $ex){
      $response = new Response(400, false);
      $response->addMessage($ex->getMessage());
      $response->send();
      exit;
    }
    catch(PDOException $ex){
      error_log("Database query error - " . $ex, 0);
      $response = new Response(500, false);
      $response->addMessage("Failed to connect to database. Please refresh and try again.");
      $response->send();
      exit;
    }
  }
  else {
    $response = new Response( 405, false );
    $response->addMessage("Request Method not Allowed");
    $response->send();
    exit;
  }
}
else {
  $response = new Response(404, false);
  $response->addMessage("Endpoint not found.");
  $response->send();
  exit;
}

function makeRandomBandNameType1($adjectives, $nouns) {
    $rand = rand( 0, sizeof( $adjectives ) - 1 );
    $adj = $adjectives[ $rand ];
    $rand = rand( 0, sizeof( $nouns ) - 1 );
    $noun = $nouns[ $rand ];
    $name = new BandNameType1($adj, $noun);
    return $name->createName();
}

function makeRandomBandNameType2($adjectives, $nouns) {
  $rand = rand( 0, sizeof( $adjectives ) - 1 );
  $adj = $adjectives[ $rand ];
  $rand = rand( 0, sizeof( $nouns ) - 1 );
  $noun = $nouns[ $rand ];
  $name = new BandNameType2($adj, $noun);
  return $name->createName();
}

function makeRandomBandNameType3( $modifiers, $nouns ) {
  $rand = rand( 0, sizeof( $modifiers ) - 1 );
  $modifier = $modifiers[ $rand ];
  $rand = rand( 0, sizeof( $nouns ) - 1 );
  $noun = $nouns[ $rand ];
  $name = new BandNameType3( $modifier, $noun );
  return $name->createName();
}
function makeRandomBandNameType4( $verbs, $modifiers ) {
  $rand = rand( 0, sizeof( $verbs ) - 1 );
  $verb = $verbs[ $rand ];
  $rand = rand( 0, sizeof( $modifiers ) - 1 );
  $modifier = $modifiers[ $rand ];
  $name = new BandNameType4( $verb, $modifier );
  return $name->createName();
}