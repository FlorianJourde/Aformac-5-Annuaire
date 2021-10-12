<?php

include 'header.php';
include 'functions.php';

$id = $_GET["id"];

$brands = brandList();
$hobbies = getHobbiesList();
// $lastname = getStagiairesInfos('lastname');

?>

<div class="category">
  <div class="row">
    <h5 class="names"><i class="fas fa-address-book"></i><a href="index.php">Annuaire</a></h5>
    <h5 class="names" id="chevron"><i class="fas fa-chevron-right"></i></h5>
    <h5 class="names"><i class="fas fa-user"></i>Ajout d'un stagiaire</h5>
  </div>
</div>

<form action="traitement.php" method="post">
<!-- <div class="col"> -->
  <div class="row">
    <div class="col fields">
      <label for="name">Nom</label>
      <input class= "field" name="lastname" id="name" autocomplete="off" value="<?php echo $lastname;?>">
    </div>
    <div class="col fields">
      <label for="firstname">Prénom</label>
      <input class= "field" name="firstname" id="firstname" autocomplete="off">
    </div>
  </div>
<!-- </div> -->
<!-- <div class="col"> -->
  <div class="row">
    <div class="col fields">
      <label for="birthdate">Date de naissance</label>
      <input type="date" class= "field" name="birthdate" id="birthdate" autocomplete="off">
    </div>
    <div class="col fields">
      <div class="row">
        <label for="gender">Genre</label>
      </div>
      <div class="row">
        <div class="col">
          <input type="radio" id="man" name="gender" value="M">
          <label for="man">Homme </label>
        </div>
        <div class="col">
          <input type="radio" id="woman" name="gender" value="F">
          <label for="man">Femme </label>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
  <div class="row">
    <div class="col fields">
      <label for="hobbies">Centres d'intêrets</label>
      <div class="row">
      <?php foreach($hobbies as $hobby) { ?>
          <div class="col-3">
            <input type="checkbox" name="hobby_<?php echo $hobby['hobby']; ?>" value="<?php echo $hobby['id'];?>" id="defaultCheck<?php echo $hobby['id'];?>">
            <label for="hobbies"><?php echo $hobby["hobby"]?></label>
          </div>
        <?php } ?>
        </div>
    </div>
  </div>
  <!-- <div class="col"> -->
    <div class="row">
      <div class="col fields">
        <label for="brand">Ordinateur</label>
        <select class="field" name="brand" id="<?php echo $brand['brand']?>">
          <option value="">Selectionnez votre marque d'ordinateur</option>
          <?php foreach($brands as $brand) { ?>
            <option name="brand" id="<?php echo $brand['brand']?>" value="<?php echo $brand['id']?>"><?php echo $brand['brand']?></option>
            </div>
            <?php } ?>
        </select>
      </div>
    </div>
  <!-- </div> -->
  <div class="row">
    <div class="col button">
      <button type="submit" id="button">Envoyer</button>
    </div>
  </div>
</form>

<?php include 'footer.php' ?>