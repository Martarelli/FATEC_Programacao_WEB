<?php 

/* Exercício 08: Escreva uma classe que represente um país. Um país tem como atributos o seu nome, o nome da capital, sua dimensão em Km2 e uma lista de países com os quais ele faz fronteira. Represente a classe e forneça os seguintes construtores e métodos:
    • Construtor que inicialize o nome, capital e a dimensão do país;
    • Métodos de acesso (obter/get) para as propriedades indicadas no item (a);
    • Um método que permita verificar se dois países são iguais. Dois países são iguais se tiverem o mesmo nome e a mesma capital.
    • Um método que define quais outros países fazem fronteira (note que um país não pode fazer fronteira com ele mesmo);
    • Um método que retorne a lista de países que fazem fronteira;
    • Um método que receba um outro país como parâmetro e retorne uma lista de vizinhos comuns aos dois países. */

class Pais{
    private string $nome;
    private string $capital;
    private float $dimensao;
    private array $fronteira = [];

    public function __construct(string $nome, string $capital, float $dimensao) 
    {
        $this->setNome($nome);
        $this->setCapital($capital);
        $this->setDimensao($dimensao);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getCapital()
    {
        return $this->capital;
    }

    public function setCapital(string $capital)
    {
        $this->capital = $capital;
    }

    public function getDimensao()
    {
        return $this->dimensao;
    }

    public function setDimensao(float $dimensao)
    {
        $this->dimensao = $dimensao;
    }

    public function getFronteira()
    {
        return $this->fronteira;
    }

    public function adicionarFronteira(Pais $pais)
    {
        if(!$this->isEqual($pais))
        {
            $this->fronteira[] = $pais;
        }
    }

    public function isEqual(Pais $pais)
    {
        return ($this->getNome() == $pais->getNome() && $this->getCapital() == $pais->getCapital());
    }

    public function vizinhosComuns(Pais $pais) 
    {
        foreach ($this->getFronteira() as $paisFronteira) 
        {
            if (in_array($paisFronteira, $pais->getFronteira())) 
            {
                echo "<p>" . $paisFronteira->getNome(). "</p>";
            }
        }
    }
}

$p1 = new Pais("País 1", "Capital 1", 1000.34);
$p2 = new Pais("País 2", "Capital 2", 2000.34);
$p3 = new Pais("País 3", "Capital 3", 3000.34);
$p4 = new Pais("País 4", "Capital 4", 4000.34);
$p5 = new Pais("País 5", "Capital 5", 5000.34);
$p6 = new Pais("País 6", "Capital 6", 6000.34);

echo  "<h3>País 1</h3>";
$p1->adicionarFronteira($p1);
$p1->adicionarFronteira($p2);
$p1->adicionarFronteira($p3);
$p1->adicionarFronteira($p6);

$p2->adicionarFronteira($p1);
$p2->adicionarFronteira($p3);
$p2->adicionarFronteira($p4);
$p2->adicionarFronteira($p5);
$p2->adicionarFronteira($p6);
echo  "<p>Fronteiras em comum com o Pais 2:</p>";
$p1->vizinhosComuns($p2);

?>