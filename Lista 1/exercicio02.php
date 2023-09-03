<?php 

/* Exercício 02: A fim de representar empregados em uma firma, crie uma classe chamada Empregado que inclui as três informações a seguir como atributos:
    • um primeiro nome
    • um sobrenome
    • um salário mensal.
    Sua classe deve ter um construtor que inicializa os três atributos. Forneça um método set e get para cada atributo. Se o salário mensal não for positivo, configure-o como 0.0. Crie um método que exibe o salário anual e um que dê 10% de aumento no salário. */

class Empregado {

    private string $nome;
    private string $sobrenome;
    private float $salario;

    public function __construct(string $nome, string $sobrenome, float $salario)
    {
        $this->SetNome($nome);
        $this->SetSobrenome($sobrenome);

        if ($salario >= 0) {
            $this->SetSalario($salario);
        } else {
            $this->SetSalario(0);
        }
    }
    
    public function GetNome(){
        return $this->nome;
    }
    public function SetNome($nome){
        $this->nome = $nome;
    }
    
    public function GetSobrenome(){
        return $this->sobrenome;
    }
    public function SetSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function GetSalario()
    {
        return $this->salario;
    }
    public function SetSalario($salario)
    {
        $this->salario = $salario;
    }

    public function Aumento()
    {
        $newSalario = $this->GetSalario() * 1.1;
        $this->SetSalario($newSalario);
        return $this->GetSalario();
    }

    public function SalarioAnual()
    {
        return $this->GetSalario() * 12;
    }
}

$func1 = new Empregado("Renan", "Martarelli", 1000.00);
echo "<p>Nome: ". $func1->GetNome() . "</p>";
echo "<p>Sobrenome: ". $func1->GetSobrenome() . "</p>";
echo "<p> Salário Atual: R$". $func1->GetSalario() . "</p>";
echo "<p> Salário Anual: R$". $func1->SalarioAnual() . "</p>";
echo "<p> Salário Aumento: R$". $func1->Aumento() . "</p>";
echo "<p> Salário Anual Aumento: R$". $func1->SalarioAnual() . "</p>";

?>