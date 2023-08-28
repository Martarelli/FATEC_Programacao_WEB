<?php  

/* Exercício 05: Escreva uma classe que represente um círculo no plano cartesiano. Forneça os seguintes membros de classe:
• Um construtor que inicialize o ponto em um local por parâmetros ou na origem do espaço;
• Métodos getter e setter.
• Métodos de inflar e desinflar que respectivamente aumenta e diminuem o tamanho do círculo.
• Método para mover o círculo a partir de outro ponto ou para a origem do espaço.
• Método que retorna a área do círculo. */

class Circulo {

    private int $x;
    private int $y;
    private float $raio;

    public function __construct(int $x = 0, int $y = 0, float $raio = 1){
            $this->SetX($x);
            $this->SetY($y);
            $this->SetRaio($raio);
    }

    public function GetX(){
        return $this->x;
    }
    public function SetX(int $x){
        $this->x = $x;
    }
    
    public function GetY(){
        return $this->y;
    }
    public function SetY(int $y){
        $this->y = $y;
    }

    public function GetRaio(){
        return $this->raio;
    }
    public function SetRaio(float $raio){
        $this->raio = $raio;
    }

    public function Inflar(float $fator){
        $newRaio = $this->GetRaio() * $fator;
        $this->SetRaio($newRaio);
    }
    public function Desinflar(float $fator){
        $newRaio = $this->GetRaio() / $fator;
        $this->SetRaio($newRaio);
    }

    public function Mover(int $x = 0, int $y =0){
        $this->SetX($x);
        $this->SetY($y);
    }

    public function Area(){
        return (pi() * pow($this->GetRaio(), 2));
    }
}

$c1 = new Circulo();
echo "<p>".$c1->GetX().",".$c1->GetY(). "," .$c1->GetRaio()."</p>";
$c1->Inflar(2);
echo "<p>".$c1->GetRaio()."</p>";
$c1->Mover(5,5);
echo "<p>".$c1->GetX().",".$c1->GetY(). "," .$c1->GetRaio()."</p>";
echo "<p>".$c1->Area()."</p>";

$c2 = new Circulo(10,10,2);
echo "<p>".$c2->GetX().",".$c2->GetY(). "," .$c2->GetRaio()."</p>";
$c2->Desinflar(1.5);
echo "<p>".$c2->GetRaio()."</p>";
$c2->Mover();
echo "<p>".$c2->GetX().",".$c2->GetY(). "," .$c2->GetRaio()."</p>";
echo "<p>".$c2->Area()."</p>";
?>