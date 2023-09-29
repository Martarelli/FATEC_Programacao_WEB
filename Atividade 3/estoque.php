<?php 

require_once "header_inc.php"; 
require_once "veiculo.php";

$veiculos = Veiculo::listarVeiculos();

?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Veículos</h1>
  <hr class="my-3">
  <p class="lead">Conheça os veículos disponíveis em nossa plataforma.</p>
</div>

<br />
<div class="container">
  <?php foreach ($veiculos as $veiculo) { ?>
  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading"><?= $veiculo->getModelo()?> - <?= $veiculo->getAnoFabricacao()?> / <?= $veiculo->getAnoModelo()?></h2>
      <p class="lead"><?= $veiculo->getMarca()?></p>
      <p class="lead"><a href="estoque-detalhes.php?id=<?= $veiculo->getId(); ?>"><button type="button" class="btn btn-dark btn-lg px-4 me-md-2">Saiba mais</button></a></p>
    </div>
    <div class="col-md-5">
      <figure class="figure">
          <img src="<?= $veiculo->getFoto()?>" class="figure-img img-fluid rounded" alt="Curso de PHP">
      </figure>
    </div>
  </div>
  <hr class="featurette-divider">
  <?php  }?>
</div>

<?php require_once "footer_inc.php"; ?>