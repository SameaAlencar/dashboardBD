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
                        $foto = $_GET['foto'];
            
                        //Criamos um array para encaminhar os valores do id e da foto para a controller
                        $arrayDados = array(
                           "id"    => $idProdutos,
                           "foto"  => $foto
                        );
            
                        $resposta = excluirProdutos($arrayDados);
            
                            if(is_bool($resposta)){
            
                          
                                if(is_bool($resposta)){
                                    echo("<script>
                                        alert('Registro excluido com sucesso!');
                                        window.location.href='contatos.php';
                                        </script>");
                                
                                }elseif(is_array($resposta)){
                                    echo("<script>
                                        alert('".$resposta['message']."');
                                        window.history.back();
                                        </script>");
                    
                    
                                }
                                
                    
                        }

                    }elseif($action == 'INSERIR'){

                        if(isset($_FILES) && !empty($_FILES)){
                            //chama a função de inserir na controller
                            $resposta = inserirProdutos($_POST, $_FILES);
                         }else{
                            $resposta = insertProdutos($_POST, null);
                         }
       
                        //Valida o tipo de dados que a controller retornou
                        if(is_bool($resposta)){ //se for bolleano
       
                           //Verificar se o retorno foi verdadeiro
                           if($resposta)
                           echo("<script>
                           alert('Registro inserido com sucesso');
                           window.location.href = 'contatos.php';
                               </script>");
                        
                         //Se o retorno foi array significa que houve um erro no processo de inserção
                       }elseif(is_array($resposta))
                        echo("<script>
                           alert('".$resposta['message']."');
                           window.history.back();
                            </script>");


                    }elseif($action == 'EDITAR'){
                          //recebe o id do registro que deverá ser excluído, que foi enviado pela url
                            //no link da imagem do excluir que foi acionado na index
                            $idProdutos = $_GET['id'];

                            //chama a função editar na controller
                            $dados = editarProdutos($idProdutos);

                            //ativa a utilização de variáveis de sessão no servidor
                            session_start();


                            $_SESSION['dadosContato'] = $dados;

                            require_once('contatos.php');

                    }elseif($action == 'ATUALIZAR'){
                        //recebe 
                        $idProdutos = $_GET['id'];
                        //recebe o nome da foto que foi enviada pelo get do form
                        $foto = $_GET['foto'];
            
                        //cria um array contendo o id e o nome da foto para enviar a controller
                        $arrayDados = array(
                            "id"   => $idProdutos,
                            "foto" => $foto,
                            "file" =>$_FILES
                        );
                        
                        //chama a funcao de editar na controller
                        $resposta = atualizarProdutos($_POST, $arrayDados);
                        //valida o tipo de dados que a controller retornou
                        if(is_bool($resposta))//se for booleano
                        { 
                            
                            //verifica se o retorno foi verdadeiro
                            if($resposta)
                                echo("<script>
                                alert('Registro inserido com sucesso!');
                                window.location.href = 'contatos.php';
                                </script>");
                        //se o retorno for um array significa erro no processo de inserção
                        }elseif(is_array($resposta)){
                            echo("<script>
                            alert('".$resposta['message']."');
                            window.history.back();
                            </script>");
                            }
                    }
                    break;

    }

}
?>