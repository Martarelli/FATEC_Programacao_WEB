<?php

class Conta
{
    protected string $agencia;
    protected string $conta;
    protected float $saldo;

    public function __construct (float $valor){
        $this->agencia = "";
        $this->conta = "";
        $this->saldo = $valor;
    }

    public function depositar(float $valor){
        $this->saldo += $valor;
    }

    public function sacar(float $valor){
        if (($this->saldo > 0) && ($this->saldo >= $valor))
        {
            $this->saldo -= $valor;
        } else {
            echo "Saldo Insuficiente";
        }
    }

    public function verSaldo(){
        echo "Saldo atual: " . $this->saldo . "<br>";
    }
}

class ContaPoupanca extends Conta {

    private float $rendimento;
    private float $taxa = 10.00;

    public function sacar(float $valor){
        if (($this->saldo > 0) && ($this->saldo >= $valor))
        {
            $this->saldo -= $valor + $this->taxa;
        } else {
            echo "Saldo Insuficiente";
        }
    }
}

class ContaCorrente extends Conta {

    private float $limite = 3000;

    public function sacar(float $valor){
        if (($this->saldo > 0) && ($this->saldo + $this->limite >= $valor ))
        {
            $this->saldo -= $valor;
        } else {
            echo "Saldo Insuficiente";
        }
    }

    public function verSaldo(){
        echo "Saldo atual: " . $this->saldo + $this->limite . "<br>";
    }
  
}

echo  "Conta <br>";
$c1 = new Conta(1000);
$c1->verSaldo();
$c1->depositar(500);
$c1->verSaldo();
$c1->sacar(800);
$c1->verSaldo();

echo  "<br> Conta Poupança <br>";
$c2 = new ContaPoupanca(2000);
$c2->verSaldo();
$c2->depositar(500);
$c2->verSaldo();
$c2->sacar(800);
$c2->verSaldo();

echo  "<br> Conta Corrente <br>";
$c3 = new ContaCorrente(1000);
$c3->verSaldo();
$c3->depositar(500);
$c3->verSaldo();
$c3->sacar(3000);
$c3->verSaldo();






?>