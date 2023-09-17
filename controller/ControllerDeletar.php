<?php
require_once("../model/conexao.php");
class deleta{
    private $deleta;

    public function __construct($id){
        $this->deleta = new Conexao();
        if($this->deleta->deleteConta($id)== TRUE){
            header("Location:../view/index.php");
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
new deleta($_GET['id']);
?>