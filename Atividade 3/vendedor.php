<?php
class Vendedor {
    private $id;
    private $nome;
    private $email;
    private $telefone;

    public function __construct($id, $nome, $email, $telefone) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTelefone($telefone);
    }

    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public static function listarVendedores() {
        require 'connection.php';
        
        $query = "SELECT * FROM vendedores";
        $stmt = $conn->query($query);
        $vendedores = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vendedor = new Vendedor(
                $row['id'],
                $row['nome'],
                $row['email'],
                $row['telefone']
            );
            $vendedores[] = $vendedor;
        }

        return $vendedores;
    }

    public static function listarVendedorPorId($id) {
        require 'connection.php';
        
        $query = "SELECT * FROM vendedores WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Vendedor(
                $row['id'],
                $row['nome'],
                $row['email'],
                $row['telefone']
            );
        }

        return null; 
    }
}
