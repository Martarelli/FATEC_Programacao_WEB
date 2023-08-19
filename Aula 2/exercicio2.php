<?php 

class Pessoa {
    protected string $nome;
    protected string $cpf;
    protected string $email;

}

class Professor extends Pessoa {
    private string $matricula;
    private int $cargaHoraria;
    private float $salario;
    private string $departamento;
}

class Funcionario extends Pessoa {
    private string $matricula;
    private string $regime;
    private float $salario;
}

class Aluno extends Pessoa {
    private string $ra;
    private string $curso;
    private float $termo;
}











?>