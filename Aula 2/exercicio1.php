<?php 

class Teste{
    private $numero1;
    private $numero2;

    public function __construct($n1, $n2){
        $this->numero1 = $n1;
        $this->numero2 = $n2;
    }

    public function Soma($numero){
        $soma = $this->numero1 + $this->numero2 + $numero;

        echo "<h1>".$soma."</h1>" ;
    }
}

$t1 = new Teste(10,20);
$t1->Soma(20);


?>