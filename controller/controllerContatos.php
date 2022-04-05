<?php
/********************************************
Objetivo: arquivo responsável por manipular dados de contato
 obs(esse arquivo fará ponte entre a view e a model)
Autor:Samea Alencar
Versão:1.0
********************************************/

function listarContatos(){
    require_once('../model/bd/contato.php');

    $dados = selectAllContato();

    if(!empty($dados))
        return $dados;
    else
        return false;
}






?>