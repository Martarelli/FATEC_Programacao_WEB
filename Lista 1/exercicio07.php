<?php 

/* Exercício 07: Traduza o seguinte conjunto de classes em um programa PHP.
a)Classe: Porta - Atributos: aberta, cor, dimensaoX, dimensaoY, dimensaoZ Métodos: void abre(), void fecha(), void pinta(String s).

b)Classe: Casa - Atributos: cor, porta1, porta2, porta3 Métodos: void pinta(String s),totalDePortas ) int quantasPortasEstaoAbertas() int.

c)Classe: Edifício -  Atributos: cor, totalDePortas, totalDeAndares, portas[] Métodos: void pinta(String s), int quantasPortasEstaoAbertas(), void adicionaPorta(Porta p), int totalDePortas(), void adicionarAndar(), int totalDeAndares().

d)As classes Casa e edifício ficaram muito parecidas. Crie a classe Imóvel e coloque nela tudo o Casa e Edifício tem em comum. Faça Imóvel superclasse de Casa e Edifício.    */

class Porta{
    private bool $aberta;
    private string $cor;
    private int $dimensaoX;
    private int $dimensaoY;
    private int $dimensaoZ;


    public function __construct(bool $aberta = false, string $cor = "black", int $dx = 1, int $dy = 1, int $dz = 1) 
    {
        $this->setAberta($aberta);
        $this->setCor($cor);
        $this->setDimensaoX($dx);
        $this->setDimensaoY($dy);
        $this->setDimensaoZ($dz);
    }

	public function getAberta() 
    {
		return $this->aberta;
	}
	
	public function setAberta(bool $aberta)
    {
		$this->aberta = $aberta;
	}

	public function getCor()
    {
		return $this->cor;
	}
	
	public function setCor(string $cor) 
    {
		$this->cor = $cor;
	}
	
	public function getDimensaoX()
    {
		return $this->dimensaoX;
	}
	
	public function setDimensaoX(int $dimensaoX) 
    {
		$this->dimensaoX = $dimensaoX;
	}

	public function getDimensaoY()
    {
		return $this->dimensaoY;
	}

	public function setDimensaoY(int $dimensaoY) 
    {
		$this->dimensaoY = $dimensaoY;
	}
	
	public function getDimensaoZ()
    {
		return $this->dimensaoZ;
	}
	
	public function setDimensaoZ(int $dimensaoZ)
    {
		$this->dimensaoZ = $dimensaoZ;
	}

    public function abre()
    {
        $this->setAberta(true);
    }
    public function fecha()
    {
        $this->setAberta(false);
    }
    public function pinta(String $s)
    {
        $this->setCor($s);
    }
}

$porta = new Porta(true, "white", 10, 10, 2);
echo  "<h3>Porta</h3>";
echo  "<p>" .$porta->getAberta() . "</p>";
echo  "<p>" .$porta->getCor() . "</p>";
echo  "<h3>Porta Alterada</h3>";
$porta->fecha();
$porta->pinta("red");
echo  "<p>" .$porta->getAberta() . "</p>";
echo  "<p>" .$porta->getCor() . "</p>";

class Imovel {
    private string $cor;
    private array $portas;

    public function __construct(string $cor = "") 
    {
        $this->setCor($cor);
    }

    public function getCor()
    {
		return $this->cor;
	}
	
	public function setCor(string $cor) 
    {
		$this->cor = $cor;
	}

    public function adicionarPorta(Porta $porta) 
    {
        $this->portas[] = $porta;
    }
    
    public function getPortas()
    {
        return $this->portas;
    }
}

class Casa extends Imovel{

    public function pinta(String $s)
    {
       parent::setCor($s);
    }

    public function totalDePortas()
    {
        return count(parent::getPortas());
    }
    
    public function quantasPortasEstaoAbertas()
    {
        $abertas = 0;
        foreach(parent::getPortas() as $pt){
            if ($pt->getAberta()) {
                $abertas++;
            }
        }
        return $abertas;
    }
}

class Edificio extends Imovel{

    private int $andares;

    public function __construct(string $cor = "white", int $andares = 1) 
    {
        parent::__construct($cor);
        $this->setAndares($andares);
    }

    public function getAndares()
    {
        return $this->andares;
    }

    public function setAndares(int $andares)
    {
        $this->andares = $andares;
    }

    public function pinta(String $s)
    {
       parent::setCor($s);
    }

    public function totalDePortas()
    {
        return count(parent::getPortas());
    }
    
    public function quantasPortasEstaoAbertas()
    {
        $abertas = 0;
        foreach(parent::getPortas() as $pt){
            if ($pt->getAberta()) {
                $abertas++;
            }
        }
        return $abertas;
    }

    public function adicionarAndar()
    {
        $this->setAndares($this->getAndares() + 1);
    }

     public function totalDeAndares()
     {
        return $this->getAndares();
     }

}

$pt1 = new Porta(true, "white", 1, 1, 1);
$pt2 = new Porta(true, "red", 1, 1, 1);
$pt3 = new Porta(false, "blue", 1, 1, 1);
$pt4 = new Porta(true, "blue", 1, 1, 1);
$pt5 = new Porta(false, "red", 1, 1, 1);
echo  "<h3>Casa</h3>";
$casa = new Casa("cyan");
$casa->adicionarPorta($pt1);
$casa->adicionarPorta($pt2);
$casa->adicionarPorta($pt3);
$casa->adicionarPorta($pt5);
echo  "<p>Cor: " .$casa->getCor() . "</p>";
$casa->pinta("black");
echo  "<h3>Casa Alterada</h3>";
echo  "<p>Cor: " .$casa->getCor() . "</p>";
echo  "<p>Portas abertas: " .$casa->quantasPortasEstaoAbertas() . "</p>";
echo  "<p>Total de portas: " .$casa->totalDePortas() . "</p>";

echo  "<h3>Edificio</h3>";
$ed = new Edificio();
$ed->adicionarPorta($pt1);
$ed->adicionarPorta($pt1);
$ed->adicionarPorta($pt2);
$ed->adicionarPorta($pt3);
$ed->adicionarPorta($pt4);
$ed->adicionarPorta($pt5);
echo  "<p>Cor: " .$ed->getCor() . "</p>";
echo  "<p>Andares: " .$ed->totalDeAndares() . "</p>";
$ed->pinta("yellow");
$ed->adicionarAndar();
$ed->adicionarAndar();

echo  "<h3>Edificio Alterada</h3>";
echo  "<p>Cor: " .$ed->getCor() . "</p>";
echo  "<p>Andares: " .$ed->totalDeAndares() . "</p>";
echo  "<p>Portas abertas: " .$ed->quantasPortasEstaoAbertas() . "</p>";
?>