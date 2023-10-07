<?php

namespace App\Lib\Conexao;

abstract class BaseDAO {
    private $conexao;   

    public function __construct()
    {
        $this->conexao = Conexao::getConnection();
    }

    public function select($table, $where = null)
    {
        if($where) {
            $sql = "SELECT * FROM {$table} WHERE {$where}";
        } else {
            $sql = "SELECT * FROM {$table}";
        }

        if(!empty($table))
        {
            return $this->conexao->query($sql);
        }
    }

    public function insert($table, $cols, $values)
    {
        if(!empty($table) && !empty($cols) && !empty($values))
        {
            $parametros = $cols;
            $colunas = str_replace(":", "", $cols);

            $stmt = $this->conexao->prepare ("INSERT INTO $table ($colunas) VALUES ($parametros)");
            $stmt->execute($values);

            return $this->conexao->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($table, $cols, $values, $where = null)
    {
        if(!empty($table) && !empty($cols) && !empty($values)){
            if($where){
                $where = " WHERE $where ";
            }

            $stmt = $this->conexao-prepare("UPDATE $table SET $cols $where");
            $stmt->execute($values);

            return $stmt->rowCount();
        } else {
            return false;
        }
    }

    public function delete($table, $where = null)
    {

    }

}