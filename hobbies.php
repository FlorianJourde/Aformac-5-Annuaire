<?php

include 'header.php';
include 'functions.php';

$id = $_GET["id"];

$hobbies = getHobbiesStagiaires($id);
$hobby = getHobby($id);
$stagiaires = getStagiaires();

?>

<div class="category">
  <div class="row">
    <h5 class="names"><i class="fas fa-address-book"></i><a href="index.php">Annuaire</a></h5>
    <h5 class="names" id="chevron"><i class="fas fa-chevron-right"></i></h5>
    <h5 class="names"><i class="fas fa-star"></i><?php echo $hobby['hobby']?></h5>
  </div>
</div>

<?php $stagiaires = getStagiaires(); ?>
<div class="row">
    <?php foreach($hobbies as $hobby) { ?>
      <div class="col-6 col names">
        <div class="card">
          <h5><i class="fas fa-user"></i><a href="stagiaire.php?id=<?php echo $hobby['id']; ?>"><?php echo $hobby['lastname'] . ' ' . $hobby['firstname'] ?></h5></a>
        </div>
      </div>
    <?php } ?>
</div>

<?php include 'footer.php' ?>