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

    public function __construct($x = null, $y = null){
        if ($x === null || $y === null) {
            $this->SetX(0);
            $this->SetY(0);
        } else {
            $this->SetX($x);
            $this->SetY($y);
        }
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
}

$p1 = new Ponto2D(1, 5);
$p2 = new Ponto2D();

echo "<p>".$p1->GetX().",".$p1->GetY()."</p>";
echo "<p>".$p2->GetX().",".$p2->GetY()."</p>";
?>