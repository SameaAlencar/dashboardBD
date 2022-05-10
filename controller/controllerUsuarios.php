<?php
/********************************************
Objetivo: arquivo responsável por manipular dados de contato
 obs(esse arquivo fará ponte entre a view e a model)
Autor:Samea Alencar
Versão:1.0
********************************************/
function listarUsuarios(){
 
    require_once('model/bd/usuarios.php');

    $dados = sellectAllUsuarios();
    
    if(!empty($dados))
        return $dados;
    else
        return false;
}

function excluirUsuarios($id){

    if($id != 0 && !empty($id) && is_numeric($id)){

        require_once('./model/bd/usuarios.php');

        if(deleteUsuario($id))
                return true;
        else
           return array('idErro'    => 3,
                        'message'   => "Não é possível excluir o registro");
    }else{
        return array('idErro'       =>3,
                     'message'      =>"Não é possível excluir um registro com id inválido");
    }

}




?>