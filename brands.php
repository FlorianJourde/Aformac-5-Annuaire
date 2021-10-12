<?php

include 'header.php';
include 'functions.php';

$id = $_GET["id"];

$brands = getStagiairesBrands($id);
$brandname = getStagiairesFromBrands($id);
$stagiaires = getStagiaires();

?>

<div class="category">
  <div class="row">
    <h5 class="names"><i class="fas fa-address-book"></i><a href="index.php">Annuaire</a></h5>
    <h5 class="names" id="chevron"><i class="fas fa-chevron-right"></i></h5>
    <h5 class="names"><i class="fas fa-laptop"></i><?php echo $brandname['brand']?></h5>
  </div>
</div>

<?php $stagiaires = getStagiaires(); ?>
<div class="row">
  <?php foreach($brands as $brand) { ?>
    <div class="col-6 col names">
      <div class="card">
        <h5><i class="fas fa-user"></i><a href="stagiaire.php?id=<?php echo $brand['id']; ?>"><?php echo $brand['lastname'] . ' ' . $brand['firstname'] ?></h5></a>
      </div>
    </div>
  <?php } ?>
</div>

<div class="category">
</div>

<?php include 'footer.php' ?>

