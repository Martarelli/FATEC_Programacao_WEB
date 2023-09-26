<?php

require_once "header_inc.php"; 
require_once "veiculo.php";

$veiculos = Veiculo::listarVeiculos();


?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Gerenciamento de Veículos</h1>
  <hr class="my-3">
  <p class="lead">Permite a inclusão, edição e exclusão dos veículos cadastrados.</p>
</div>

<div class="container" style="max-width: 100%;">
  <a class="btn btn-success" href="veiculo-create.php">Criar Novo Veiculo</a>
  <p></p>
  <table class="table table-bordered">
    <tr class="table-success text-center text-center">
      <th>#</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Cor</th>
      <th>Ano Fabricação</th>
      <th>Ano Modelo</th>
      <th>Combustível</th>
      <th>Detalhes</th>
      <th>Foto</th>
      <th>Ação</th>
    </tr>
    <?php foreach ($veiculos as $veiculo) { ?>
    <tr class="text-center">
      <td class="table-light"> <?= $veiculo->getId()?> </td>
      <td class="table-light"> <?= $veiculo->getMarca()?> </td>
      <td class="table-light"> <?= $veiculo->getModelo()?> </td>
      <td class="table-light"> <?= $veiculo->getCor()?> </td>
      <td class="table-light"> <?= $veiculo->getAnoFabricacao()?> </td>
      <td class="table-light"> <?= $veiculo->getAnoModelo()?> </td>
      <td class="table-light"> <?= $veiculo->getCombustivel()?> </td>
      <td class="table-light"> <?= $veiculo->getDetalhes()?> </td>
      <td class="table-light"> <?= $veiculo->getFoto()?> </td>
      <td class="table-light" style="width: 15%">
        <a href="veiculo-update.php?id=<?= $veiculo->getId(); ?>"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="veiculo-destroy.php?id=<?= $veiculo->getId(); ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
      </td>
    </tr>
    <?php  }?>
  </table>
</div>

<?php require_once "footer_inc.php"; ?>