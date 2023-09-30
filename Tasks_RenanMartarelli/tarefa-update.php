<?php 
require_once 'header_inc.php';
require_once 'connection.php';
require_once 'Status.php';
require_once 'Tarefa.php';

$id = $_GET['id'];
$status = Status::listarStatus();
$tarefa = Tarefa::listarTarefaPorId($id);

$titulo = $tarefa->getTitulo();
$descricao = $tarefa->getDescricao(); 
$atividade = $tarefa->getAtividade(); 
$prioridade = $tarefa->getPrioridade(); 
$dataInicio = $tarefa->getDataInicio(); 
$dataConclusao = $tarefa->getDataConclusao(); 
$status_id = $tarefa->getStatusId(); 

$prioridadeSelectedRed = '';
$prioridadeSelectedYellow = '';
$prioridadeSelectedGreen = '';

if ($prioridade == "green") {
  $prioridadeSelectedGreen = "selected";
} else if ($prioridade == "yellow") {
  $prioridadeSelectedYellow = "selected";
} else if ($prioridade == "red") {
  $prioridadeSelectedRed = "selected";
}

$flag_msg = null;

if(isset($_POST['enviar'])){

    if (empty($_POST["titulo"]) || 
        empty($_POST["descricao"]) || 
        empty($_POST["atividade"]) || 
        empty($_POST["prioridade"]) || 
        empty($_POST["dataInicio"]) || 
        empty($_POST["dataConclusao"]) || 
        empty($_POST["status_id"])) 
    {
        $flag_msg = false; //Erro 
        $msg = "Dados incompletos, preencha o formulário corretamente!";
    } else {
        $titulo = $_POST["titulo"];
        $descricao = $_POST["descricao"]; 
        $atividade = $_POST["atividade"]; 
        $prioridade = $_POST["prioridade"]; 
        $dataInicio = $_POST["dataInicio"]; 
        $dataConclusao = $_POST["dataConclusao"]; 
        $status_id = $_POST["status_id"]; 

        $sql = "UPDATE tarefas SET titulo=?, descricao=?, atividade=?, prioridade=?, dataInicio=?, dataConclusao=?, status_id=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $atividade);
        $stmt->bindParam(4, $prioridade);
        $stmt->bindParam(5, $dataInicio);
        $stmt->bindParam(6, $dataConclusao);
        $stmt->bindParam(7, $status_id);
        $stmt->bindParam(8, $id);
         
        $stmt->execute();

        $flag_msg = true; // Sucesso 
        $msg = "Dados enviados com sucesso!";

    }

    $conn = null;
}
?>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Tasks</h1>
  <hr class="my-3">
  <p class="lead">Nossa equipe está sempre a disposição para ouvir as suas críticas e sugestões. Entre em contato que iremos responder o mais breve possível.</p>
</div>

<div class="container">
  <?php 
    if (!is_null($flag_msg)) {
      if ($flag_msg) {
        echo "<div class='alert alert-success' role='alert'>$msg</div>"; 
      }else{
        echo "<div class='alert alert-warning' role='alert'>$msg</div>"; 
      }
    }
  ?>
  <form method="POST">
  <div class="form-group">
      <label for="titulo">Titulo:</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo; ?>" required>
    </div>
    <br />

    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $descricao; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="atividade">Atividade:</label>
      <input type="text" class="form-control" id="atividade" name="atividade" value="<?= $atividade; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="prioridade">Prioridade:</label>
      <select class="form-select" id="prioridade" name="prioridade">
        <option <?= $prioridadeSelectedGreen ?>value="green">Verde</option>
        <option <?= $prioridadeSelectedRed ?> value="red">Vermelho</option>
        <option <?= $prioridadeSelectedYellow ?> value="yellow">Amarelo</option>
      </select>   
    </div>
    <br />

    <div class="form-group">
      <label for="dataInicio">Data Inicio:</label>
      <input type="date" class="form-control" id="dataInicio" name="dataInicio" value="<?= $dataInicio; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="dataConclusao">Data Conclusão:</label>
      <input type="date" class="form-control" id="dataConclusao" name="dataConclusao" value="<?= $dataConclusao; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="status_id">Status:</label>
      <select class="form-select" id="status_id" name="status_id">
        <option selected>Escolha uma prioridade...</option>
        <?php foreach ($status as $st) { ?>
          <option value="<?= $st->getId()?>" <?php if($st->getId() == $status_id) $statusSelected = "selected"; else  $statusSelected = ""; ?> <?= $statusSelected?>> <?= $st->getNome()?> </option>
        <?php } ?>
      </select>   
    </div>
    <br />

    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="index.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
</div>

<?php require_once "footer_inc.php"; ?>