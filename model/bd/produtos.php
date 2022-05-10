<?php
/************************************
 * Objetivo : arquivo resposável por manipular dados dentro do BD
 * Autor:Samea Alencar
 * Versão 1.0
 */


require_once('conexao.php');

    function sellectAllProdutos(){

    $conexao = conexaoMySql();

    $sql = "select * from tblproduto order by idproduto desc";

    $resultado = mysqli_query($conexao, $sql);

        if($resultado){

            $cont = 0;
                while ($rsDados = mysqli_fetch_assoc($resultado)){

                 $arrayInfo[$cont] = array (
                     "id"              => $rsDados['idproduto'],
                     "desconto"        => $rsDados['desconto'],
                     "percentualValor" => $rsDados['percentualValor']
                     );
                $cont++;
        }

        fecharMySql($conexao);

            if(isset($arrayInfo))
                return $arrayInfo;
            else
                return false;
    }

}

function deleteProdutos($id){

    $verificacao = (boolean) false;

    $conexao = conexaoMySql();
     
    $sql = "delete from tblproduto where idproduto=".$id;

        if(mysqli_query($conexao, $sql)){

            if(mysqli_affected_rows(($conexao))){
                $verificacao = true;
            }
        }

    fecharMySql($conexao);
        return $verificacao;


}




?>