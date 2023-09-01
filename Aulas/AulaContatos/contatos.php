<?php

$nome= "";
$email = "";
$datanasc = "";

if(isset($_POST['enviar'])){

    require_once('connection.php');
    
    $nome = $_POST['nomeContato'];
    $email = $_POST['emailContato'];
    $datanasc = $_POST['datanascContato'];

    $stmt = $conn->prepare("INSERT INTO contatos(nome, email, datanasc) VALUES (:nome, :email, :datanasc)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':datanasc', $datanasc);

    $stmt->execute();

    $conn = null;
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
    <div class="form-group">
      <label for="nomeContato">Nome:</label>
      <input type="text" class="form-control" id="nomeContato" name="nomeContato" value="<?= $nome; ?>" required>
    </div>
    <br />
    <div class="form-group">
      <label for="datanascContato">Data Nascimento:</label>
      <input type="date" class="form-control" id="datanascContato" name="datanascContato" value="<?= $datanasc; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="emailContato">Email:</label>
      <input type="email" class="form-control" id="emailContato" name="emailContato" value="<?= $email; ?>">
    </div>
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="contatos.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
</div>

<?php require_once "footer_inc.php"; ?>