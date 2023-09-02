<?php 

/* Exercício 06: Crie uma classe para representar datas. 
Represente uma data usando três atributos: o dia, o mês, e o ano.
• Sua classe deve ter um construtor que inicializa os três atributos e verifica a
validade dos valores fornecidos.
• Forneça um método set um get para cada atributo.
• Forneça o método date para retornar uma representação da data. Considere que
a data deve ser formatada mostrando o dia, o mês e o ano separados por barra
(/).
• Forneça uma operação para avançar uma data para o dia seguinte.  */

class Datas {
    private int $dia;
    private int $mes;
    private int $ano;

    public function __construct(int $dia = 1, int $mes = 1, int $ano = 2023){
        
        if($dia >= 1 && $dia <= 31){
            $this->setDia($dia);
        }

        if($mes >= 1 && $mes <= 12){
            $this->setMes($mes);
        }

        if($ano >= 1 && $ano <= 9999){
            $this->setAno($ano);
        }
    }
    
    public function getDia()
    {
        return $this->dia;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function date(){
        $data = $this->getDia() . "/" . $this->getMes() ."/". $this->getAno();
        return $data;
    }

    public function nextDay(){
        if($this->getDia() <= 30){
            $this->setDia($this->getDia() + 1);
        } else if ($this->getMes() <= 11) {
            $this->setDia(1);
            $this->setMes($this->getMes() + 1);
        } else {
            $this->setDia(1);
            $this->setMes(1);
            $this->setAno($this->getAno() + 1);
        }
    }
}

$dt1 = new Datas(31,12,2000);
echo  "<p>" .$dt1->date() . "</p>";
$dt1->nextDay();
echo  "<p>" .$dt1->date() . "</p>";

?>