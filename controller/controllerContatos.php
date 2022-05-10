<?php
/********************************************
Objetivo: arquivo responsável por manipular dados de contato
 obs(esse arquivo fará ponte entre a view e a model)
Autor:Samea Alencar
Versão:1.0
********************************************/

function listarContatos(){
    require_once('./model/bd/contato.php');

    $dados = selectAllContato();

    if(!empty($dados))
        return $dados;
    else
        return false;
}

function excluirContatos($id){

    if($id != 0 && !empty($id) && is_numeric($id)){

        require_once('./model/bd/contato.php');

        if(deleteContato($id))
            return true;
        else
            return array('idErro'  => 3,
                         'message' => 'Não é possível esxcluir o registro');
    }else{
        return array('idErro'   => 3,
                    'message'   => 'Não é possível excluir um resgistro com id inválido');
    }

}






?>