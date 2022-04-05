<?php
/**************************
 * Objetivo: criar conexão com o banco de dados Mysql
 * Autor: Samea Alencar
 * Versão 1.0
 * ************************/

 const SERVER = 'localhost';
 const USER = 'root';
 const PASSWORD = 'bcd127';
 const DATABASE = 'dbcontato';

 function conexaoMySql(){

    $conexao = array();

    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    if($conexao){
        return $conexao;
    }else{
        return false;
    }

 }

 function fecharMySql($conexao){
     mysqli_close($conexao);

 }

 var_dump(conexaoMySql());





?>