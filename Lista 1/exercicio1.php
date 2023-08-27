<?php

class Invoice {

    private int $numeroItem;
    private string $descricao;
    private int $qtdItemCompra;
    private float $precoUnitario;

    public function __construct(int $numeroItem, string $descricao, int $qtdItemCompra, float $precoUnitario){

        $this->SetNumeroItem($numeroItem);
        $this->SetDescricao($descricao);

        if ($qtdItemCompra < 0) {
            $this->SetQtdItemCompra(0);
        } else {
            $this->SetQtdItemCompra($qtdItemCompra);
        }

        if ($precoUnitario < 0) {
            $this->SetPrecoUnitario(0);
        } else {
            $this->SetPrecoUnitario($precoUnitario);
        }
    }

    public function GetNumeroItem(){
        return $this->numeroItem;
    }

    public function SetNumeroItem($numeroItem){
        $this->numeroItem = $numeroItem;
    }

    public function GetDescricao(){
        return $this->descricao;
    }

    public function SetDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function GetQtdItemCompra(){
        return $this->qtdItemCompra;
    }

    public function SetQtdItemCompra($qtdItemCompra){
        $this->qtdItemCompra = $qtdItemCompra;
    }

    public function GetPrecoUnitario(){
        return $this->precoUnitario;
    }

    public function SetPrecoUnitario($precoUnitario){
        $this->precoUnitario = $precoUnitario;
    }

    public function GetInvoiceAmount(){
       
        $total = $this->GetPrecoUnitario() * $this->GetQtdItemCompra();
        return $total;
    }



}

$in1 = new Invoice(1, "Notebook", 5, 2500.00);

echo "<p>" . $in1->GetNumeroItem() . "<p>";
echo "<p>" . $in1->GetDescricao(). "</p>";
echo "<p>" . $in1->GetQtdItemCompra(). "</p>";
echo "<p>" . $in1->GetPrecoUnitario(). "</p>";
echo "<p>" . $in1->GetInvoiceAmount(). "</p>";

?>