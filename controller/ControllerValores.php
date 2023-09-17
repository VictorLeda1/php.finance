<?php 
require_once("../model/conexao.php");
class valoresController{

    private $lista;
    public function __construct(){
        $this->lista = new Conexao();
    }    

    function pegaTotal(){
        $total = 0;
        $row = $this->lista->getConta();
        if($row >= 1){
            foreach ($row as $valor){
                $total += $valor['valor'];
            }
        }
        return $total;
    }

    function pegaPositivo(){
        $valoresPositivos = null;
        $row = $this->lista->getConta();
        if($row >= 1){
            foreach ($row as $valor) {
                if ($valor['valor'] >= 0){
                    $valoresPositivos += $valor['valor'];
                }
            }
        }
        return $valoresPositivos;
    }

    function pegaNegativo(){
        $valoresNegativo = 0;
        $row = $this->lista->getConta();
        if($row >= 1){
            foreach ($row as $valor) {
                if ($valor['valor'] <= 0){
                    $valoresNegativo += $valor['valor'];
                }
            }
        }
        return $valoresNegativo;
    }
}

?>