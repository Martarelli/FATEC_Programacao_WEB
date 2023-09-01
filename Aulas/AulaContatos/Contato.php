<?php 

class Contatos {
    private int $id;
    private string $nome;
    private string $email;
    private string $datanasc;
    private string $created_at;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDatanasc()
    {
        return $this->datanasc;
    }
    
    public function setDatanasc($datanasc)
    {
        $this->datanasc = $datanasc;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

}

?>