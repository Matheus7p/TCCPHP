<?php

 if(!empty($_GET['idResponsavel'])){
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();
        $id = $_GET['idResponsavel'];
        $sqlSelect = "SELECT * FROM responsavel_familia WHERE id_responsavel =$id";
        $result = $con->query($sqlSelect);

        if($result->rowCount() > 0){
            $sqlDelete= "UPDATE saidaEstoque SET responsavel_saidaEstoque = null  WHERE responsavel_saidaEstoque = $id";
            $sqlDelete2 = "DELETE FROM responsavel_familia WHERE id_responsavel=$id";
            $sqlDelete3 = "DELETE FROM contato WHERE id_contato=$id";
            $resultDelete = $con->query($sqlDelete);
            $resultDelete2 = $con->query($sqlDelete2);
            $resultDelete3 = $con->query($sqlDelete3);
        }
    }header('location: ../../pages/responsavelFamilia/responsavelFamilia.php');

?>