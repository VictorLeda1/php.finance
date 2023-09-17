<?php
require_once("../model/conexao.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Conexao();
        $this->criarTabela();

    }

    private function criarTabela(){
        $row = $this->lista->getConta();
        if($row >= 1){
        foreach ($row as $value){
            echo "<tr>";
            echo "<td>".$value['descricao'] ."</td>";
            echo "<td>".$value['valor'] ."</td>";
            echo "<td>".$value['data'] ."</td>";
            echo "<td><a href='../controller/ControllerDeletar.php?id=".$value['id']."'><img src='./assets/minus.svg'></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td>Nenhuma conta encontrada!</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";
    }
    }
}