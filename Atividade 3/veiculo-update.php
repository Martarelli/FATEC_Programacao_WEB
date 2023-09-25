<?php 
require_once 'header_inc.php';
require_once 'connection.php';
require_once 'veiculo.php';

$id = $_GET['id'];

$veiculos = Veiculo::listarVeiculoPorId($id);

$id = $veiculos->getId();
$marca = $veiculos->getMarca();
$modelo = $veiculos->getModelo();
$cor = $veiculos->getCor();
$anoFabricacao = $veiculos->getAnoFabricacao();
$anoModelo = $veiculos->getAnoModelo();
$combustivel = $veiculos->getCombustivel();
$preco = $veiculos->getPreco();
$detalhes = $veiculos->getDetalhes();
$foto = $veiculos->getFoto();

$flag_msg = null;

if(isset($_POST['enviar'])){

    if (empty($_POST["marca"]) || 
        empty($_POST["modelo"]) || 
        empty($_POST["cor"]) || 
        empty($_POST["anoFabricacao"]) || 
        empty($_POST["anoModelo"]) || 
        empty($_POST["combustivel"]) || 
        empty($_POST["preco"]) || 
        empty($_POST["detalhes"]) || 
        empty($_POST["foto"])) 
        {
        $flag_msg = false; //Erro 
        $msg = "Dados incompletos, preencha o formulário corretamente!";
    } else {

      $marca = $_POST["marca"];
      $modelo = $_POST["modelo"];
      $cor = $_POST["cor"];
      $anoFabricacao = $_POST["anoFabricacao"];
      $anoModelo = $_POST["anoModelo"];
      $combustivel = $_POST["combustivel"];
      $preco = $_POST["preco"];
      $detalhes = $_POST["detalhes"];
      $foto = $_POST["foto"];


        $sql = "UPDATE veiculos SET marca=?, modelo=?, cor=?, anoFabricacao=?, anoModelo=?, combustivel=?, preco=?, detalhes=?, foto=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(1, $marca);
        $stmt->bindParam(2, $modelo);
        $stmt->bindParam(3, $cor);
        $stmt->bindParam(4, $anoFabricacao);
        $stmt->bindParam(5, $anoModelo);
        $stmt->bindParam(6, $combustivel);
        $stmt->bindParam(7, $preco);
        $stmt->bindParam(8, $detalhes);
        $stmt->bindParam(9, $foto);
        $stmt->bindParam(10, $id);
        
        $stmt->execute();

        $flag_msg = true; // Sucesso 
        $msg = "Dados enviados com sucesso!";
    }

    $conn = null;
}
?>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Veículos</h1>
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
      <label for="marca">Marca:</label>
      <input type="text" class="form-control" id="marca" name="marca" value="<?= $marca; ?>" required>
    </div>
    <br />

    <div class="form-group">
      <label for="modelo">Modelo:</label>
      <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $modelo; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="cor">cor:</label>
      <input type="text" class="form-control" id="cor" name="cor" value="<?= $cor; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="anoFabricacao">Ano Fabricação:</label>
      <input type="text" class="form-control" id="anoFabricacao" name="anoFabricacao" value="<?= $anoFabricacao; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="anoModelo">Ano Modelo:</label>
      <input type="text" class="form-control" id="anoModelo" name="anoModelo" value="<?= $anoModelo; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="combustivel">Combustível:</label>
      <input type="text" class="form-control" id="combustivel" name="combustivel" value="<?= $combustivel; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="preco">Preço:</label>
      <input type="text" class="form-control" id="preco" name="preco" value="<?= $preco; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="detalhes">Detalhes:</label>
      <input type="text" class="form-control" id="detalhes" name="detalhes" value="<?= $detalhes; ?>">
    </div>
    <br />

    <div class="form-group">
      <label for="foto">Foto:</label>
      <input type="text" class="form-control" id="foto" name="foto" value="<?= $foto; ?>">
    </div>
    <br />

    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="veiculo-list.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
</div>

<?php require_once "footer_inc.php"; ?>