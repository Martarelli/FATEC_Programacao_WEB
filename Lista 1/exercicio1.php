<?php

class Invoice {

    private int $numeroItem;
    private string $descricao;
    private int $qtdItemCompra;
    private float $precoUnitario;

    public function __construct(int $numeroItem, string $descricao, int $qtdItemCompra, float $precoUnitario){

        $this->numeroItem = $numeroItem;
        $this->descricao = $descricao;

        if ($qtdItemCompra < 0) {
            $this->qtdItemCompra = 0;
        } else {
            $this->qtdItemCompra = $qtdItemCompra;
        }
        
        if ($precoUnitario < 0) {
            $this->precoUnitario = 0;
        } else {
            $this->precoUnitario = $precoUnitario;
        }
    }






}


?>