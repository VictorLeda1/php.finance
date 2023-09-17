<?php
 
require_once("../db.php");

class Conexao{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }


    public function setConta($descricao,$valor,$data){
        $stmt = $this->mysqli->prepare("INSERT INTO conta (`descricao`, `valor`, `data`) VALUES (?,?,?)");
        $stmt->bind_param("sss",$descricao,$valor,$data);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getConta(){
        $result = $this->mysqli->query("SELECT * FROM conta");
        $array = array(); // Inicializa o array vazio
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
            return $array;
    }

    public function deleteConta($id){
        if($this->mysqli->query("DELETE FROM `conta` WHERE `id` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }
    }
}