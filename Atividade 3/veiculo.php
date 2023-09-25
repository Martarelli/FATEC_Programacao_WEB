<?php
class Veiculo {
    private $id;
    private $marca;
    private $modelo;
    private $cor;
    private $anoFabricacao;
    private $anoModelo;
    private $combustivel;
    private $preco;
    private $detalhes;
    private $foto;

    public function __construct($id, $marca, $modelo, $cor, $anoFabricacao, $anoModelo, $combustivel, $preco, $detalhes, $foto) {
        $this->setId($id);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setCor($cor);
        $this->setAnoFabricacao($anoFabricacao);
        $this->setAnoModelo($anoModelo);
        $this->setCombustivel($combustivel);
        $this->setPreco($preco);
        $this->setDetalhes($detalhes);
        $this->setFoto($foto);
    }

    public function getId() {
        return $this->id;
    }
    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getAnoFabricacao() {
        return $this->anoFabricacao;
    }

    public function getAnoModelo() {
        return $this->anoModelo;
    }

    public function getCombustivel() {
        return $this->combustivel;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDetalhes() {
        return $this->detalhes;
    }

    public function getFoto() {
        return $this->foto;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function setAnoFabricacao($anoFabricacao) {
        $this->anoFabricacao = $anoFabricacao;
    }

    public function setAnoModelo($anoModelo) {
        $this->anoModelo = $anoModelo;
    }

    public function setCombustivel($combustivel) {
        $this->combustivel = $combustivel;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setDetalhes($detalhes) {
        $this->detalhes = $detalhes;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public static function listarVeiculos() {
        require 'connection.php';
        
        $query = "SELECT * FROM veiculos";
        $stmt = $conn->query($query);
        $veiculos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $veiculo = new Veiculo(
                $row['id'],
                $row['marca'],
                $row['modelo'],
                $row['cor'],
                $row['anoFabricacao'],
                $row['anoModelo'],
                $row['combustivel'],
                $row['preco'],
                $row['detalhes'],
                $row['foto']
            );
            $veiculos[] = $veiculo;
        }

        return $veiculos;
    }

    public static function listarVeiculoPorId($id) {
        require 'connection.php';
        
        $query = "SELECT * FROM veiculos WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Veiculo(
                $row['id'],
                $row['marca'],
                $row['modelo'],
                $row['cor'],
                $row['anoFabricacao'],
                $row['anoModelo'],
                $row['combustivel'],
                $row['preco'],
                $row['detalhes'],
                $row['foto']
            );
        }

        return null; 
    }
}
