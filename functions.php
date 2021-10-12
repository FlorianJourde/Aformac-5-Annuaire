<?php

function db_connect() {
  include 'connection.php';
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=dwwm', $user, $pass);
    return $db;
  }
  catch(PDOException $e)
  {
    print "Error ! " . $e->getMessage() . "<br/>";
    die();
  }
}

function getStagiaires() {
  $connection = db_connect();
  $query = 'SELECT * FROM stagiaires';
  $stmt = $connection->query($query);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function getStagiairesInfos($id) {
  $connection = db_connect();
  $query =
    'SELECT id, lastname, firstname, birthdate, gender
    FROM stagiaires
    WHERE stagiaires.id =' . $id;
  $stmt = $connection->query($query);
  $result = $stmt->fetch();
  return $result;
}

function getBrandList($id) {
  $connection = db_connect();
  $query =
    'SELECT brand, computers.id
    FROM computers
    WHERE computers.id =' . $id;
  $stmt = $connection->query($query);
  $result = $stmt->fetch();
  return $result;
}

function brandList() {
  $connection = db_connect();
  $query =
    'SELECT brand, id
    FROM computers';
  $stmt = $connection->query($query);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getBrands($id) {
  $connection = db_connect();
  $query =
    'SELECT brand, computers.id
    FROM computers
    INNER JOIN stagiaires ON computers.id = stagiaires.computers_id
    WHERE stagiaires.id =' . $id;
  $stmt = $connection->query($query);
  $result = $stmt->fetch();
  return $result;
}

function getHobbiesList() {
  $connection = db_connect();
  $query =
    'SELECT hobby, id
    FROM hobbies';
  $stmt = $connection->query($query);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getStagiairesFromBrands($id) {
  $connection = db_connect();
  $query =
    'SELECT lastname, firstname, stagiaires.id, brand
    FROM stagiaires
    INNER JOIN computers ON computers.id = stagiaires.computers_id
    WHERE computers.id =' . $id;
  $stmt = $connection->query($query);
  $result = $stmt->fetch();
  return $result;
}

function getStagiairesBrands($id) {
  $connection = db_connect();
  $query =
    'SELECT firstname, lastname, stagiaires.id, computers.brand
    FROM stagiaires
    INNER JOIN computers ON computers.id = stagiaires.computers_id
    WHERE computers.id =' . $id;
  $stmt = $connection->query($query);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getHobbiesStagiaires($id) {
  $connection = db_connect();
  $query =
    'SELECT firstname, lastname, stagiaires.id, hobby
    FROM stagiaires
    INNER JOIN stagiaires_hobbies ON stagiaires.id = stagiaires_hobbies.stagiaires_id
    INNER JOIN hobbies ON stagiaires_hobbies.hobby_id = hobbies.id
    WHERE hobbies.id =' . $id;
  $stmt = $connection->query($query);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getHobby($id) {
  $connection = db_connect();
  $query =
    'SELECT firstname, lastname, stagiaires.id, hobby
    FROM stagiaires
    INNER JOIN stagiaires_hobbies ON stagiaires.id = stagiaires_hobbies.stagiaires_id
    INNER JOIN hobbies ON stagiaires_hobbies.hobby_id = hobbies.id
    WHERE hobbies.id =' . $id;
  $stmt = $connection->query($query);
  $result = $stmt->fetch();
  return $result;
}

function getStagiairesHobbies($id) {
  $connection = db_connect();
  $query = 
    'SELECT hobby, hobbies.id
    FROM stagiaires
    INNER JOIN stagiaires_hobbies ON stagiaires.id = stagiaires_hobbies.stagiaires_id
    INNER JOIN hobbies ON stagiaires_hobbies.hobby_id = hobbies.id
    WHERE stagiaires.id =' . $id;
  $stmt = $connection->query($query);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function addStagiaire($lastname, $firstname, $birthdate, $gender, $brand) {
  $connection = db_connect();
  $query =
    "INSERT INTO `stagiaires`(`id`, `lastname`, `firstname`, `birthdate`, `gender`, `computers_id`)
    VALUES (null, '$lastname', '$firstname', '$birthdate', '$gender', '$brand')";
  $connection->query($query);
  // var_dump("Requete envoyée !");
}

function getLastStagiaire($lastname, $firstname, $birthdate){
  $connection = db_connect();
  $query = "SELECT id FROM stagiaires
  WHERE lastname = '$lastname' AND firstname = '$firstname' AND birthdate = '$birthdate'";
  $stmt = $connection->query($query);
  $lastStagiaire = $stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($lastStagiaire);
  return $lastStagiaire['id'];
}

function setStagiaireHobbies($stagiaires_id, $hobbies_id){
  $connection = db_connect();
  $query = "INSERT INTO stagiaires_hobbies(id, stagiaires_id, hobby_id)
  VALUES (null, '$stagiaires_id', '$hobbies_id')";
  $connection->query($query);
}