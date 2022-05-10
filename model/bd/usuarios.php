<?php
/************************************
 * Objetivo : arquivo resposável por manipular dados dentro do BD
 * Autor:Samea Alencar
 * Versão 1.0
 */

 require_once('conexao.php');

  function sellectAllUsuarios(){

    $conexao = conexaoMySql();

    $sql = "select * from tblusuario order by idusuario desc";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){

        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($resultado)){

            $arrayInfo[$cont] = array(
                "id"    => $rsDados['idusuario'],
                "nome"  => $rsDados['nome'],
                "email" => $rsDados['email'],
                "senha" => $rsDados['senha']

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

 function deleteUsuario($id){

    $verificacao = (boolean) false;

    $conexao = conexaoMySql();

    $sql = "delete from tblusuario where idusuario =".$id;

    if(mysqli_query($conexao, $sql)){

        if(mysqli_affected_rows(($conexao))){
            $verificacao = true;
        }

    }

    fecharMySql($conexao);
    return $verificacao;

 }




?>