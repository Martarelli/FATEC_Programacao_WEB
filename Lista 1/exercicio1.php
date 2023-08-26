<?php

class Invoice {

    private int $numeroItem;
    private string $descricao;
    private int $qtdItemCompra;
    private float $precoUnitario;

    public function __construct(int $numeroItem, string $descricao, int $qtdItemCompra, float $precoUnitario){

        $this->SetNumeroItem($numeroItem);
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

    public function GetNumeroItem(){
        return $this->numeroItem;
    }

    public function SetNumeroItem($numeroItem){
        $this->numeroItem = $numeroItem;
    }





}
$in1 = new Invoice(1, "Notebook", 1, 2500.00);
echo $in1->GetNumeroItem();

?>