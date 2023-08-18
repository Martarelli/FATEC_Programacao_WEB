<?php

class Conta
{
    private string $agencia;
    private string $conta;
    private float $saldo;

    public __construct(float $valor)
    {
        $this->agencia = "";
        $this->conta = "";
        $this->saldo = $valor;
    }
    public function depositar(float $valor)
    {
        $this->saldo += $valor;
    }
    public function sacar(float $valor)
    {
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

$c1 = new Conta(1000);
$c1->verSaldo();




?>