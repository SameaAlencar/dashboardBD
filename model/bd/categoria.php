<?php
/************************************
 * Objetivo : arquivo resposável por manipular dados dentro do BD
 * Autor:Samea Alencar
 * Versão 1.0
 */

 require_once('conexao.php');

 function selectAllCategoria(){

    $conexao = conexaoMySql();

    //script para listar as categorias do banco de dados
    $sql = "select * from tblcategoria order by idcategoria desc";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){

        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($resultado)){

            $arrayDados[$cont] = array(
                "id"        => $rsDados['idcategoria'],
                "categoria" => $rsDados['categoria']
            );
            $cont++;
        }
        
        fecharMySql($conexao);
     
        if(isset($arrayDados))
            return $arrayDados;
        else
            return false;
    }

 }

 function deleteCategoria($id){

    $verificacao = (boolean) false;
        
    $conexao = conexaoMysql();
    
    //deletar cadastro no banco de dados
    $sql = "delete from tblcategoria where idcategoria =".$id;
    

    //verifica se o script está certo no banco de dados
    if(mysqli_query($conexao, $sql)){

        if(mysqli_affected_rows(($conexao))){
            $verificacao = true;
        }
        
        
    }
    fecharMysql($conexao);
    return $verificacao;
    
}


?>