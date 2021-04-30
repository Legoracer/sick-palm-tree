<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $usr = 'root';
  $pwd = '';
  $host = 'localhost';
  $db = 'watches';


  function retrieveDatabaseConnection() {
    global $usr, $pwd, $db, $host;

    // For SOLACE remove $port and for MAMP $port is needed
    $mysqli = new mysqli($host, $usr, $pwd, $db) or die('Unable to connect');

    if(!$mysqli) {
      $errorMessage = "ERROR {$mysqli->connect_error}";
      exit($errorMessage);
    }

    return $mysqli;
  }

?>