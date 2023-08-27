<?php   
/* Exercício 03: Escreva uma classe Contador, que encapsule um valor usado para contagem de itens ou eventos. A classe deve oferecer métodos que devem:
• Zerar;
• Incrementar;
• Retornar o valor do contador. */

class Contador{
    private int $cont;

    public function __construct($cont){
        $this->SetCont($cont);
    }

    public function GetCont(){
        return $this->cont;
    }
    public function SetCont($cont){
        $this->cont = $cont;
    }

    public function Zerar(){
        $this->SetCont(0);
    }

    public function Incrementar(){
        $inc = $this->GetCont() + 1;
        $this->SetCont($inc);
    }
}

$cont = new Contador(5);
echo "<p>".$cont->GetCont()."</p>";
$cont->Incrementar();
echo "<p>".$cont->GetCont()."</p>";
$cont->Incrementar();
echo "<p>".$cont->GetCont()."</p>";
$cont->Zerar();
echo "<p>".$cont->GetCont()."</p>";
?>