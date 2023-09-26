<?php 
require_once 'header_inc.php';
require_once 'connection.php';

$nome = '';
$email = '';
$telefone = '';


$flag_msg = null;

if(isset($_POST['enviar'])){

    if (empty($_POST["nome"]) || 
        empty($_POST["email"]) || 
        empty($_POST["telefone"])) 
    {
        $flag_msg = false; //Erro 
        $msg = "Dados incompletos, preencha o formulário corretamente!";
    } else {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $sql = "INSERT INTO vendedores (nome, email, telefone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $telefone);

        
        $stmt->execute();

        $flag_msg = true; // Sucesso 
        $msg = "Dados enviados com sucesso!";

        $nome = '';
        $email = '';
        $telefone = '';


    }

    $conn = null;
}
?>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Vendedores</h1>
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
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?= $nome; ?>" required>
    </div>
    <br />

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="telefone">Telefone:</label>
      <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $telefone; ?>">
    </div>
    <br />

    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="vendedor-list.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
</div>

<?php require_once "footer_inc.php"; ?>