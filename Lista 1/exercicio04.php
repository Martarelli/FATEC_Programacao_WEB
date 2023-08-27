<?php 
/* Exercício 04: Escreva uma classe Ponto2D que represente um ponto no plano cartesiano. Além dos atributos por você identificados, a classe deve oferecer os seguintes membros:
    • Construtor que permita a inicialização do ponto na origem ou em um local informado por parâmetros.
    • Método para definir o local do ponto a partir de outro ponto;
    • Método de comparação de pontos;
    • Métodos de acesso getter e setter.
    • Método que permita calcular a distância do ponto que recebe a mensagem para outro.
    • Método que permita a criação de um novo ponto no mesmo local do ponto que recebeu a mensagem(clone).
 */

class Ponto2D {
    private int $x;
    private int $y;

    public function __construct($x = 0, $y = 0){
            $this->SetX($x);
            $this->SetY($y);
    }
    
    public function GetX(){
        return $this->x;
    }
    public function SetX($x){
        $this->x = $x;
    }
    public function GetY(){
        return $this->y;
    }
    public function SetY($y){
        $this->y = $y;
    }

    public function SetPonto($x, $y) {
        $this->SetX($x);
        $this->SetY($y);
    }

    public function ComparaPontos($outroPonto) {
        if($this->GetX() == $outroPonto->GetX() && $this->GetY() == $outroPonto->GetY()){
            return "Mesmo Ponto";
        } else {
            return "Ponto Diferente";
        }
    }

    public function DistanciaDoisPontos($Ponto) {
        $distX = $this->GetX() - $Ponto->GetX();
        if($distX < 0){
            $distX *= -1;
        }

        $distY = $this->GetY() - $Ponto->GetY();
        if($distY < 0){
            $distY *= -1;
        }

        return sqrt($distX * $distX + $distY * $distY);
    }

    public function ClonePonto() {
        return new Ponto2D($this->GetX(), $this->GetY());
    }
}

$p1 = new Ponto2D(1, 5);
$p2 = new Ponto2D();
$p3 = $p2->ClonePonto();

echo "<p>".$p1->GetX().",".$p1->GetY()."</p>";
echo "<p>".$p2->GetX().",".$p2->GetY()."</p>";

$p1->SetPonto(10,12);
echo "<p>" . $p2->ComparaPontos($p1) . "</p>";
echo "<p>" . $p2->ComparaPontos($p3) . "</p>";
echo "<p>" . $p1->DistanciaDoisPontos($p3) . "</p>";

?>