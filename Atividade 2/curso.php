<?php 
class Curso {
    private $id;
    private $nome;
    private $descricao;
    private $imagem;
    private $dataCadastro;

    public function __construct($id, $nome, $descricao, $imagem, $dataCadastro) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->dataCadastro = $dataCadastro;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
    
    public static function buscarPorId($id) {
        require('connection.php');
        $sql = "SELECT * FROM cursos WHERE id=?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new Curso(
                    $row['id'],
                    $row['nome'],
                    $row['descricao'],
                    $row['imagem'],
                    $row['dataCadastro']
                );
            }
        }
        return null;
    }

    public static function listarCursos() {
        require('connection.php');
        $sql = "SELECT * FROM cursos";
        $stmt = $conn->query($sql);
        
        $cursos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = new Curso(
                $row['id'],
                $row['nome'],
                $row['descricao'],
                $row['imagem'],
                $row['dataCadastro']
            );
        }
        return $cursos;
    }
}

?>