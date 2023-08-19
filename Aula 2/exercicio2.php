<?php 

class Pessoa {
    protected string $nome;
    protected string $cpf;
    protected string $email;

    public function __construct(string $nome, string $cpf, string $email){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }

}

class Professor extends Pessoa {
    private string $matricula;
    private int $cargaHoraria;
    private float $salario;
    private string $departamento;

    public function __construct(string $nome, string $cpf, string $email, string $matricula, int $cargaHoraria, float $salario, string $departamento){
        parent::__construct($nome,  $cpf,  $email);
        $this->matricula = $matricula;
        $this->cargaHoraria = $cargaHoraria;
        $this->salario = $salario;
        $this->departamento = $departamento;
    }

}

class Funcionario extends Pessoa {
    private string $matricula;
    private string $regime;
    private float $salario;

    public function __construct(string $nome, string $cpf, string $email, string $matricula, string $regime, float $salario){
        parent::__construct($nome,  $cpf,  $email);
        $this->matricula = $matricula;
        $this->regime = $regime;
        $this->salario = $salario;
    }
}

class Aluno extends Pessoa {
    private string $ra;
    private string $curso;
    private string $termo;

    public function __construct(string $nome, string $cpf, string $email, string $ra, string $curso, string $termo){
        parent::__construct($nome,  $cpf,  $email);
        $this->ra = $ra;
        $this->curso = $curso;
        $this->termo = $termo;
    }
}











?>