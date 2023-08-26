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
    
    public function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
    public function ConsultaDados(){
        echo "Nome :". $this->nome . " CPF: " . $this->cpf . " Email: " . $this->email . "<br>";
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

    public function AlteraSalario(float $valor){
        $this->salario += $this->salario * $valor / 100 ;
    }

    public function ConsultaDados(){
        parent::ConsultaDados();
        echo "Matricula :". $this->matricula . " Carga Horaria: " . $this->cargaHoraria . " Salario: R$" . $this->salario . " Departamento: " . $this->departamento . "<br>";
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

    public function AlteraSalario(float $valor){
        $this->salario += $this->salario * $valor / 100 ;
    }

    public function ConsultaDados(){
        parent::ConsultaDados();
        echo "Matricula :". $this->matricula . " Regime: " . $this->regime . " Salario: R$" . $this->salario . "<br>";
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

    public function AlteraTermo(float $valor){
        $this->termo = $valor ;
    }

    public function ConsultaDados(){
        parent::ConsultaDados();
        echo "RA :". $this->ra . " Curso: " . $this->curso . " Termo: " . $this->termo . "<br>";
    }
}

$p1 = new Professor("Prof", "xxx.xxx.xxx-xx", "email@email.com", "10001", 30, 2000.00, "TI");
$p1->ConsultaDados();








?>