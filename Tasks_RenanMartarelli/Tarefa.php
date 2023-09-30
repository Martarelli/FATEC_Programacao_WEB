<?php

class Tarefa {
    private $id;
    private $titulo;
    private $descricao; 
    private $atividade; 
    private $prioridade; 
    private $dataInicio; 
    private $dataConclusao; 
    private $dataCadastro;
    private $status_id; 

    public function __construct($id, $titulo, $descricao, $atividade, $prioridade, $dataInicio, $dataConclusao, $dataCadastro, $status_id) {
        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setDescricao($descricao);
        $this->setAtividade($atividade);
        $this->setPrioridade($prioridade);
        $this->setDataInicio($dataInicio);
        $this->setDataConclusao($dataConclusao);
        $this->setDataCadastro($dataCadastro);
        $this->setStatusId($status_id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getAtividade()
    {
        return $this->atividade;
    }

    public function setAtividade($atividade)
    {
        $this->atividade = $atividade;
    }

    public function getPrioridade()
    {
        return $this->prioridade;
    }

    public function setPrioridade($prioridade)
    {
        $this->prioridade = $prioridade;
    }

    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
    }

    public function getDataConclusao()
    {
        return $this->dataConclusao;
    }

    public function setDataConclusao($dataConclusao)
    {
        $this->dataConclusao = $dataConclusao;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function getStatusId()
    {
        return $this->status_id;
    }

    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
    }

    public static function listarTaredas() {
        require 'connection.php';
        
        $query = "SELECT * FROM tarefas";
        $stmt = $conn->query($query);
        $tarefas = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tarefa = new Tarefa(
                $row['id'],
                $row['titulo'],
                $row['descricao'],
                $row['atividade'],
                $row['prioridade'],
                $row['dataInicio'],
                $row['dataConclusao'],
                $row['dataCadastro'],
                $row['status_id']
            );

            $tarefas[] = $tarefa;
        }

        return $veiculos;
    }

    public static function listarTarefaPorId($id) {
        require 'connection.php';
        
        $query = "SELECT * FROM tarefas WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Tarefa(
                $row['id'],
                $row['titulo'],
                $row['descricao'],
                $row['atividade'],
                $row['prioridade'],
                $row['dataInicio'],
                $row['dataConclusao'],
                $row['dataCadastro'],
                $row['status_id']
            );
        }
        return null; 
    }
}