<?php

include 'header.php';
include 'functions.php';

$id = $_GET["id"];

$infos = getStagiairesInfos($id);
$brands = getBrands($id);
$hobbies = getStagiairesHobbies($id);

?>

<div class="category">
  <div class="row">
    <h5 class="names"><i class="fas fa-address-book"></i><a href="index.php">Annuaire</a></h5>
    <h5 class="names" id="chevron"><i class="fas fa-chevron-right"></i></h5>
    <h5 class="names"><i class="fas fa-user"></i>Stagiaire</h5>
  </div>
</div>

<div class="card">
  <div class="row">
    <div class="col-8 names">
      <h2><?php echo $infos['lastname'] . ' ' . $infos['firstname'] ?></h2>
    </div>
    <div class="col-4 brands">
      <p><i class="fas fa-laptop"></i><a href="brands.php?id=<?php echo $brands['id']; ?>"><?php echo $brands['brand']; ?></a></p>
    </div>
  </div>
  <ul>
    <?php foreach($hobbies as $hobby) { ?>
      <li class="list"><i class="fas fa-star"></i><a href="hobbies.php?id=<?php echo $hobby['id']; ?>"><?php echo $hobby['hobby']; ?></a></li>
    <?php } ?>
  </ul>
</div>

<?php include 'footer.php' ?>