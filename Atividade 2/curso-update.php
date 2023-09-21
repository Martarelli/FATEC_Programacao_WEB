<?php 
require_once "header_inc.php";
require_once "connection.php";
require_once "curso.php";

$id = $_GET['id'];

$curso = Curso::buscarPorId($id);

$nome = $curso->getNome();
$descricao = $curso->getDescricao();
$imagem = $curso->getImagem();
$flag_msg = null;

if(isset($_POST['enviar'])){

    if (empty($_POST["nome"]) || empty($_POST["descricao"]) || empty($_POST["imagem"])) {
        $flag_msg = false; //Erro 
        $msg = "Dados incompletos, preencha o formulário corretamente!";
    } else {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $imagem = $_POST['imagem'];

        $sql = "UPDATE cursos SET nome=?, descricao=?, imagem=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $imagem);
        $stmt->bindParam(4, $id);
        
        $stmt->execute();

        $flag_msg = true; // Sucesso 
        $msg = "Dados enviados com sucesso!";
    }

    $conn = null;
}
?>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cursos</h1>
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
      <label for="descricao">Descrição:</label>
      <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $descricao; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="imagem">Imagem:</label>
      <input type="text" class="form-control" id="imagem" name="imagem" value="<?= $imagem; ?>">
    </div>
    <br />

    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="curso-list.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
</div>

<?php require_once "footer_inc.php"; ?>