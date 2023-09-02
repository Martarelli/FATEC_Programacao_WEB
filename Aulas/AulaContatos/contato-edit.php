<?php

$nome= "";
$email = "";
$datanasc = "";
if(isset($_GET['id']))
{
    require_once('connection.php');
    require_once "Contato.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM contatos WHERE id = {$id} ORDER BY id";
    
    $stmt = $conn->query($sql);
    $contato = $stmt->fetchAll(PDO::FETCH_CLASS, "Contato");

    if(isset($_POST['enviar'])){
    
        $nome = $_POST['nomeContato'];
        $email = $_POST['emailContato'];
        $datanasc = $_POST['datanascContato'];
    
        $stmt = $conn->prepare("UPDATE contatos SET nome = :nome, email = :email, datanasc = :datanasc WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':datanasc', $datanasc);
    
        $stmt->execute();
    
        $conn = null;
        header("Location: contatos_list.php");
        exit;
    }
}

require_once "header_inc.php";

?>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Contatos</h1>
  <hr class="my-3">
  <p class="lead">Nossa equipe está sempre a disposição para ouvir as suas críticas e sugestões. Entre em contato que iremos responder o mais breve possível.</p>
</div>

<div class="container">
  <form method="POST">
  <?php foreach ($contato as $ct) {?>
    <div class="form-group">
      <label for="nomeContato">Nome:</label>
      <input type="text" class="form-control" id="nomeContato" name="nomeContato" value="<?= $ct->getNome(); ?>" required>
    </div>
    <br />
    <div class="form-group">
      <label for="datanascContato">Data Nascimento:</label>
      <input type="date" class="form-control" id="datanascContato" name="datanascContato" value="<?= $ct->getDataNasc(); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="emailContato">Email:</label>
      <input type="email" class="form-control mb-3" id="emailContato" name="emailContato" value="<?= $ct->getEmail(); ?>">
    </div>
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="contatos.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
    <?php  } ?>
  </form>
</div>

<?php require_once "footer_inc.php"; ?>