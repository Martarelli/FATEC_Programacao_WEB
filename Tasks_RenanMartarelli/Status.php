<?php

class Status {
    private $id;
    private $nome;

    public function __construct($id, $nome) {
        $this->setId($id);
        $this->setNome($nome);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public static function listarStatus() {
        require 'connection.php';
        
        $query = "SELECT * FROM status";
        $stmt = $conn->query($query);
        $st = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $status = new Status(
                $row['id'],
                $row['nome'],
            );

            $st[] = $status;
        }

        return $st;
    }

    public static function listarStatusPorId($id) {
        require 'connection.php';
        
        $query = "SELECT * FROM status WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Status(
                $row['id'],
                $row['nome'],
            );
        }
        return null; 
    }
}