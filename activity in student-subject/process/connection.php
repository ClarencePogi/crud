<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sub_db';
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->setAttribute(PDO::FETCH_ASSOC, PDO::ATTR_DEFAULT_FETCH_MODE);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>