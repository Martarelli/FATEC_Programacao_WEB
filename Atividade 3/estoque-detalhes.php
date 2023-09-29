<?php 

require_once "header_inc.php"; 
require_once "veiculo.php";
$id = $_GET['id'];

$veiculo = Veiculo::listarVeiculoPorId($id);

?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Veículos</h1>
  <hr class="my-3">
  <p class="lead">Conheça mais detalhes sobre o veículo.</p>
</div>

<br />
<div class="container">
  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading"><?= $veiculo->getModelo()?></h2>
      <p class="lead pt-3">Ano Fabricação: <?= $veiculo->getAnoFabricacao()?></p>
      <p class="lead">Ano Modelo: <?= $veiculo->getAnoModelo()?></p>
      <p class="lead">Marca: <?= $veiculo->getMarca()?></p>
      <p class="lead">Cor: <?= $veiculo->getCor()?></p>
      <p class="lead">Combustível: <?= $veiculo->getCombustivel()?></p>
      <p class="lead">Detalhes: <?= $veiculo->getDetalhes()?></p>
      <h3 class="featurette pb-3">Preço: R$<?= $veiculo->getPreco()?></h3>
      <p class="lead"><a href="estoque.php"><button type="button" class="btn btn-dark btn-lg px-4 me-md-2">Voltar</button></a></p>
    </div>
    <div class="col-md-5">
      <figure class="figure">
          <img src="<?= $veiculo->getFoto()?>" class="figure-img img-fluid rounded" alt="Curso de PHP">
      </figure>
    </div>
  </div>
</div>

<?php require_once "footer_inc.php"; ?>