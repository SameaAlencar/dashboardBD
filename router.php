<?php
/********************************************
 * Objetivo: Arquivo de rota, para segmentar as ações encaminhadas pela View
 *    (dados de um form, listagem de dados, ação de excluir ou atualizar).
 *    Esse arquivo será responsável por encaminhar as solicitações para 
 *    encaminhar a Controller
 * Autor: Samea
 * Data:  12/04/2022
 * Versão:1.0
 ********************************************/

    $action = (string) null;
    $componente = (string) null;

    if($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] =='GET'){

        $action = strtoupper($_GET['action']);
        $componente = strtoupper($_GET['componente']);

        switch($componente){

            case 'CATEGORIAS':

            require_once('./controller/controllerCategorias.php');

            if($action == 'DELETAR'){

            $idCategoria = $_GET['id'];
            $resposta = excluirCategoria($idCategoria);
            if(is_bool($resposta)){

                if($resposta)
                    echo("<script> alert('Registro excluído com sucesso!');
                    window.location.href='contatos.php';
                    </script>");

                }elseif(is_array($resposta))
                    echo("<script> alert ('".$resposta['message']."');
                    window.history.back;
                    </script>");
                 }

            
            case 'CONTATO':

                    require_once('./controller/controllerContatos.php');
        
                    if($action == 'DELETAR'){
        
                    $idContatos = $_GET['id'];
                    $resposta = excluirContatos($idContatos);
                    if(is_bool($resposta)){
        
                        if($resposta)
                            echo("<script> alert('Registro excluído com sucesso!');
                            window.location.href='contatos.php';
                            </script>");
        
                        }elseif(is_array($resposta))
                            echo("<script> alert ('".$resposta['message']."');
                            window.history.back;
                            </script>");
                    }

            case 'USUARIOS':

                    require_once('./controller/controllerUsuarios.php');
                
                    if($action == 'DELETAR'){
                
                    $idUsuarios = $_GET['id'];
                    $resultado = excluirUsuarios($idUsuarios);
                    if(is_bool($resultado)){
                
                        if($resultado)
                             echo("<script> alert('Registro excluído com sucesso!');
                             window.location.href='contatos.php';
                            </script>");
                
                        }elseif(is_array($resultado))
                            echo("<script> alert ('".$resultado['message']."');
                             window.history.back;
                            </script>");
                 }

            case 'PRODUTOS':

                require_once('./controller/controllerProdutos.php');

                    if($action == 'DELETAR'){

                        $idProdutos = $_GET['id'];
                        $resposta = excluirProdutos($idProdutos);

                            if(is_bool($resposta)){

                                if($resposta)
                                    echo("<script> alert('Registro excluído com sucesso!');
                                    window.location.href='contatos.php';
                                    </script>"
                                    );

                            }elseif(is_array($resposta))
                                echo("<script> alert ('".$resposta['message']."')
                                window.history.back;
                                </script>");

                    }

                 
       

     }

}
?>