<?php include 'functions.php' ?>
<?php include 'header.php' ?>

<div class="category">
  <h5 class="names"><a href="form.php"><i class="fas fa-plus-circle"></i>Ajouter un stagiaire</a></h5>
</div>

  <?php $stagiaires = getStagiaires(); ?>
  <div class="row">
    <?php foreach($stagiaires as $stagiaire) {
      $stagiairesBrand = getBrands($stagiaire['id']); ?>
    <div class="col-6 col names">
      <div class="card">
      <h5><i class="fas fa-user"></i><a href="stagiaire.php?id=<?php echo $stagiaire['id']; ?>"><?php echo $stagiaire['lastname'] . ' ' . $stagiaire['firstname'] ?></h5></a>
      </div>
    </div>
  <?php } ?>
  
<?php include 'footer.php' ?> 