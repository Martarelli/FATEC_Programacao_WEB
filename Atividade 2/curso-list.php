<?php

require_once "header_inc.php"; 
require_once "curso.php";

$cursos = Curso::listarCursos();


?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Gerenciamento de Cursos</h1>
  <hr class="my-3">
  <p class="lead">Permite a inclusão, edição e exclusão dos cursos exibidos na página de cursos.</p>
</div>

<div class="container">
  <a class="btn btn-success" href="curso-create.php">Criar Novo Curso</a>
  <p></p>
  <table class="table table-bordered">
    <tr class="table-success text-center text-center">
      <th>#</th>
      <th>Data Cadastro</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Imagem</th>
      <th>Ação</th>
    </tr>
    <?php foreach ($cursos as $curso) { ?>
    <tr class="text-center">
      <td class="table-light"> <?= $curso->getId()?> </td>
      <td class="table-light"> <?= $curso->getDataCadastro()?> </td>
      <td class="table-light"> <?= $curso->getNome()?> </td>
      <td class="table-light"> <?= $curso->getDescricao()?> </td>
      <td class="table-light"> <?= $curso->getImagem()?> </td>
      <td class="table-light" style="width: 15%">
        <a href="curso-update.php?id=<?= $curso->getId(); ?>"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="curso-destroy.php?id=<?= $curso->getId(); ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
      </td>
    </tr>
    <?php  }?>
  </table>
</div>

<?php require_once "footer_inc.php"; ?>