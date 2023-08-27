<?php
/* Exercício 01: Crie uma classe chamada Invoice que possa ser utilizado por uma loja de suprimentos de informática para representar uma fatura de um item vendido na loja. Uma fatura deve incluir as seguintes informações como atributos
• número do item faturado,
• descrição do item
• quantidade comprada do item
• preço unitário do item
Sua classe deve ter um construtor que inicialize os quatro atributos. Se a quantidade não for positiva, ela deve ser configurada como 0. Se o preço por item não for positivo ele deve ser configurado como 0.0. Forneça um método set e um método get para cada variável de instância. Além disso, forneça um método chamado getInvoiceAmount que calcula o valor da fatura (isso é, multiplica a quantidade pelo preço por item) e depois retorna o valor. */
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