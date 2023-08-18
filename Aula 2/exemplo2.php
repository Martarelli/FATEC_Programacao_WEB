<?php

class Conta
{
    private string $agencia;
    private string $conta;
    private float $saldo;

    public function verSaldo(){
        echo "Saldo atual: " . $this->saldo . "<br>";
    }
    
}





?>