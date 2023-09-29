<?php 
require_once 'header_inc.php';
require_once 'connection.php';
require_once 'Tarefa.php';
require_once 'Status.php';

$tarefas = Tarefa::listarTarefas();
?>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Gerenciamento de Tasks</h1>
  <hr class="my-3">
  <p class="lead">Permite a inclusão, edição e exclusão das tasks cadastradas.</p>
</div>

<div class="container" style="max-width: 100%;">
  <a class="btn btn-dark" href="tarefa-create.php">Nova Task</a>
  <p></p>
  <table class="table table-bordered">
    <tr class="table-dark text-center text-center">
      <th>#</th>
      <th>Título</th>
      <th>Descrição</th>
      <th>Prioridade</th>
      <th>Data Inicio</th>
      <th>Data Conclusão</th>
      <th>Ação</th>
    </tr>
    <?php foreach ($tarefas as $tarefa) { ?>
    <tr class="text-center">
      <td class="table-light" style="width: 3%"> <?= $tarefa->getId()?> </td>
      <td class="table-light"> <?= $tarefa->getTitulo()?> </td>
      <td class="table-light"> <?= $tarefa->getDescricao()?> </td>
      <td class="table-light" style="background-color: <?= $tarefa->getPrioridade()?>; width: 5%"></td>
      <td class="table-light" style="width: 10%"> <?= date("d/m/Y", strtotime($tarefa->getDataInicio()))?> </td>
      <td class="table-light" style="width: 10%"> <?= date("d/m/Y", strtotime($tarefa->getDataConclusao()))?> </td>
      <td class="table-light" style="width: 18%">
        <a href="tarefa-done.php?id=<?= $tarefa->getId(); ?>"><button type="button" class="btn btn-dark">Concluir</button></a>
        <a href="tarefa-update.php?id=<?= $tarefa->getId(); ?>"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="tarefa-destroy.php?id=<?= $tarefa->getId(); ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
      </td>
    </tr>
    <?php  }?>
  </table>
</div>

<?php 
require_once 'footer_inc.php'
?>