<?php
require_once("../model/cadastroValores.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setDescricao($_POST['descricao']);
        $this->cadastro->setValor($_POST['valor']);
        $this->cadastro->setData(date('d/m/YYYY',strtotime($_POST['data'])));
        $result = $this->cadastro->incluir();
        if($result >= 1){
            header("Location:../view/index.php");
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
new cadastroController();