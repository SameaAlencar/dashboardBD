<?php
/********************************************
Objetivo: arquivo responsável por manipular dados de contato
 obs(esse arquivo fará ponte entre a view e a model)
Autor:Samea Alencar
Versão:1.0
********************************************/

function listarCategorias(){
    require_once('model/bd/categoria.php');

    $dados = selectAllCategoria();
 
    if(!empty($dados))
        return $dados;
    else
        return false;
}

function excluirCategoria($id){

    //verifica se o número do id é válido
    if($id != 0 && !empty($id) && is_numeric($id)){

        require_once('model/bd/categoria.php');

        if(deleteCategoria($id))
            return true;
        else
            return array('idErro'    => 3,
                         'message'   =>'Não é possível excluir o registro');
    }else{ 
        return array ('idErro'       => 3,
                      'message'      =>'Não é possível excluir o registro com id inválido');
    }
}


?>