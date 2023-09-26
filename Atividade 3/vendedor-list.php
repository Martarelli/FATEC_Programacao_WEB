<?php

require_once "header_inc.php"; 
require_once "vendedor.php";

$vendedor = Vendedor::listarVendedores();

?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Gerenciamento de Vendedores</h1>
  <hr class="my-3">
  <p class="lead">Permite a inclusão, edição e exclusão dos vendedores cadastrados.</p>
</div>

<div class="container" style="max-width: 100%;">
  <a class="btn btn-success" href="vendedor-create.php">Criar Novo Vendedor</a>
  <p></p>
  <table class="table table-bordered">
    <tr class="table-success text-center text-center">
      <th>#</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Ação</th>
    </tr>
    <?php foreach ($vendedor as $vendedor) { ?>
    <tr class="text-center">
      <td class="table-light"> <?= $vendedor->getId()?> </td>
      <td class="table-light"> <?= $vendedor->getNome()?> </td>
      <td class="table-light"> <?= $vendedor->getEmail()?> </td>
      <td class="table-light"> <?= $vendedor->getTelefone()?> </td>
      <td class="table-light" style="width: 15%">
        <a href="vendedor-update.php?id=<?= $vendedor->getId(); ?>"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="vendedor-destroy.php?id=<?= $vendedor->getId(); ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
      </td>
    </tr>
    <?php  }?>
  </table>
</div>

<?php require_once "footer_inc.php"; ?>