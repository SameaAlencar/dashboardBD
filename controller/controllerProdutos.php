<?php
/********************************************
Objetivo: arquivo responsável por manipular dados de contato
 obs(esse arquivo fará ponte entre a view e a model)
Autor:Samea Alencar
Versão:1.0
********************************************/

function listarProdutos(){

    require_once('./model/bd/produtos.php');

    $dados = sellectAllProdutos();

    if(!empty($dados))
        return $dados;
    else
        return false;
}

function excluirProdutos($id){

    if($id != 0 && !empty($id) && is_numeric($id)){

        require_once('./model/bd/produtos.php');

        if(deleteProdutos($id))
            return true;
        else    
            return array ('idErro'   => 3,
                          'message ' => "Não é possível excluir o registro" );
    
    }else{
        return array ('idErro'  =>3,
                      'message' => "Não é possível excluir um registro com id inválido!");
    }

}







?>