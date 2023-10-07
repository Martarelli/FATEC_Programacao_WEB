<?php 

namespace App\Models\DAO;

use App\Models\Entidades\Fornecedor;
use Exception;

class FornecedorDAO extends BaseDAO {
    public function getById(int $id) {
        $resultado = $this->select("fornecedor", "id=$id");
        return $resultado-fetchObject(\PDO::FETCH_CLASS, Fornecedor::class); 
    }

    public function listar() {
        $resultado = $this->select("fornecedor");
        return $resultado-fetchAll(\PDO::FETCH_CLASS, Fornecedor::class);
    }

    public function getQuantidadedeProdutos(int $id) {
        if ($id) {
            $resultado = $this->select("SELECT count(*) AS total FROM produto WHERE idfornecedor = $id");
            return $resultado-fetch()['total']; 

        }
    }

    public function salvar(Fornecedor $fornecedor) {
        try {
            $nome = $fornecedor->getNome();
            return $this->insert('fornecedor', ":nome", [':nome'=>$nome]); //o nome recebe o valor que eu recebi na linha acima
        } catch (\Exception $e){
            throw new \Exception("Erro na gravação dos dados. ". $e->getMessage(), 500);
        }
    }

    public function atualizar(Fornecedor $fornecedor) {

    }

    public function excluir(int $id) {

    }

}

?>