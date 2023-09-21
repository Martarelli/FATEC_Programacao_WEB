<?php require_once "header_inc.php"; ?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Gerenciamento de Cursos</h1>
  <hr class="my-3">
  <p class="lead">Permite a inclusão, edição e exclusão dos cursos exibidos na página de cursos.</p>
</div>

<div class="container">
  <a class="btn btn-success" href="#">Criar Novo Curso</a>
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
  </table>
</div>

<?php require_once "footer_inc.php"; ?>