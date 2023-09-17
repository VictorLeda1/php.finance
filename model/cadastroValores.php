<?php
require_once("conexao.php");

class Cadastro extends Conexao {

    private $descricao;
    private $valor;
    private $data;

    //Metodos Set
    public function setDescricao($string){
        $this->descricao = $string;
    }
    public function setValor($number){
        $this->valor = $number;
    }
    public function setData($string){
        $this->data = $string;
    }
    //Metodos Get
    public function getDescricao(){
        return $this->descricao;
    }
    public function getValor(){
        return $this->valor;
    }
    public function getData(){
        return $this->data;
    }


    public function incluir(){
        return $this->setConta($this->getDescricao(),$this->getValor(),$this->getData());
    }
}
?>