<?php

class Invoice {

    private int $numeroItem;
    private string $descricao;
    private int $qtdItemCompra;
    private float $precoUnitario;

    public function __construct(int $numeroItem, string $descricao, int $qtdItemCompra, float $precoUnitario){

        $this->numeroItem = $numeroItem;
        $this->descricao = $descricao;
        $this->qtdItemCompra = $qtdItemCompra;
        $this->precoUnitario = $precoUnitario;
        
    }





}


?>