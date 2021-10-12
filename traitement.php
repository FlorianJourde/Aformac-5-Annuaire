<?php

include 'header.php';
include 'functions.php';

if(isset($_POST)) {
  $form = $_POST;
  $lastname = $_POST["lastname"];
  $firstname = $_POST["firstname"];
  $birthdate = $_POST["birthdate"];
  $gender = $_POST["gender"];
  // $hobby = $_POST["hobby"];
  $brand = $_POST["brand"];
  // $id = $_POST['id'];

  $add = addStagiaire($lastname, $firstname, $birthdate, $gender, $brand);
  $last = getLastStagiaire($lastname, $firstname, $birthdate);
  //var_dump($last);
  foreach($_POST as $key => $value){
    if(strpos($key, 'hobby')!== false){
      // var_dump($key);
      // var_dump($value);
      // var_dump($last);
      setStagiaireHobbies($last, $value);
    }
  }
  // var_dump($_POST);
};

header('location:index.php');

?>

<?php include 'footer.php' ?>