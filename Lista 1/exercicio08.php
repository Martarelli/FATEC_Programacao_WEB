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
    private string $dimensao;
    private array $fronteira;

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

    public function setDimensao(string $dimensao)
    {
        $this->dimensao = $dimensao;
    }

    public function getFronteira()
    {
        return $this->fronteira;
    }

    public function adicionarFronteira(Pais $pais)
    {
        $this->fronteira[] = $pais;
    }
}
?>