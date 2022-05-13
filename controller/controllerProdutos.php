<?php
/********************************************
Objetivo: arquivo responsável por manipular dados de contato
 obs(esse arquivo fará ponte entre a view e a model)
Autor:Samea Alencar
Versão:1.0
********************************************/

require_once('modulo/config.php');

function inserirProdutos($dadosProdutos, $file){
    

    $nomeFoto = (string) null;
    // validação para verficar se o objeto está vazio
    if(!empty($dadosProdutos)){

        //Validação de caixa vazia dos elementos nome, celular e email, pois são obrigatórios no banco de dados
        if(!empty($dadosProdutos['txtDesconto']) && !empty($dadosProdutos['txtPercentualValor'])){

            //validação para identificar se chegou um arquivo para upload
            if($file['fleFoto']['name'] != null){
                //import da função de upload
                require_once('modulo/upload.php');
                //chama a função de upload
                $nomeFoto = uploadFile($file['fleFoto']);

                if(is_array($nomeFoto)){
                    //caso aconteça algum erro no processo de upload, a função irá retornar um array com a possível mensagem de erro
                    //Esse array será retornado para a router e ela irá exibir a mensagem para o usuário
                    return $nomeFoto;
                }
               
            }
           


            //Criação do array de dados que será encaminhado a model para inserir no BD,
            //é importante criar este array conforme as necessidades de manipulação do BD.
            //   OBS: Criar as chaves do array conforme os nomes dos atributos do BD.
            $arrayDados = array(
                "desconto"         => $dadosProdutos['txtDesconto'], 
                "percentualValor"  => $dadosProdutos['txtPercentualValor'],
                "foto"             => $nomeFoto
                
            );

            //import do arquivo de modelagem para manipular o BD
            require_once('model/bd/produtos.php');
            //Chama a função que fará o insert no BD(essa função está na model)
            if(insertProdutos($arrayDados))
                return true;
            else
                return array('idErro' =>1,
                            'message' => 'Não foi possível inserir os dados no BD');

        }else{
            return array('idErro' =>2,
                        'message' => 'Existem campos obrigatórios que não foram preenchidos');
        }
    } 

 }

//função para receber dados da View e encaminhar para a model(atualizar)
function atualizarProdutos($dadosProdutos, $arrayDados){

    $statusUpload = (boolean) false;

    //recebe o id enviado pelo arrayDados
    $id = $arrayDados['id'];
    //recebe a foto enviada pelo arrayDados (foto já existente no BD)
    $foto = $arrayDados['foto'];
    //recebe o objeto de array referebte a nova foto que poderá ser enviada ao servidor
    $file = $arrayDados['file'];

    // empty verifica seo objeto esta vazio
    if(!empty($dadosContato))
    {
      //validacao de caixa vazia dos elementos nome, email, celular, pois sao campos
      //obrigatorios no BD
      if(!empty($dadosProdutos['txtDesconto']) && !empty($dadosProdutos['txtPercentualValor'])){

        //validacao para garantir que  o id é valido
        if(!empty($id) && $id !=0 && is_numeric($id))
        {
            //validacao para identificar se será enviado ao servidor uma nova foto
                if($file['fleFoto']['name'] != null){
                //import da função de upload
                require_once('modulo/upload.php');
                //chama a função de upload
                $novaFoto = uploadFile($file['fleFoto']);
                $statusUpload = true;

                
             }else{
                 //permanece a mesma foto no banco de dados
                 $novaFoto = $foto;
             }
                
            


        //cracao do array de dados que sera encaminhado a model 
        //para inserir no BD, é importante criar este array conforme
        //as necessidades de manipulaçao do BD
        //OBS: criar chaves do array conforme os nomes dos atributos do bd
              $arrayDados= array(

                'id'              =>  $id,
                'desconto'        => $dadosProdutos['txtDesconto'],
                'percentualValor' => $dadosProdutos['txtPercentualValor'],
                'foto'            => $novaFoto
                );

             

              //import do arquivo de modelagem para manipular o BD
              require_once('./model/bd/produtos.php');

              //chama a funçao que fara o insert no BD(esta funçao esta na model)
              if (updateProdutos($arrayDados)){

                    //validação para verificar se será necessário apagar a foto antiga
                    //está variável foi ativada em true na linha 94, quando realizamos
                    //o upload de uma nova foto para o servidor
                    if($statusUpload){
                        unlink(DIRETORIO_FILE_UPLOAD.$foto);
                    }
                    return true; 
              }
              else
                return array('idErro' => 1,
                            'message' => 'não foi possivel atualizar os dados no Banco de Dados');
        }else{
          return array('idErro' => 4,
          'message' => 'Não é possivel editar um registro sem informar um id válido.');
        }

      }else
         return array('idErro' => 2,
                      'message' => 'Existem campos obrigatórios que nao foram preenchidos '); 
   }
 }



function listarProdutos(){

    require_once('./model/bd/produtos.php');

    $dados = sellectAllProdutos();

    if(!empty($dados))
        return $dados;
    else
        return false;
 }

function excluirProdutos($arrayDados){

    //Recebe o id do registro que será excluído 
    $id = $arrayDados['id'];
    //Recebe o nome da foto que será excluída da pasta do servidor
    $foto = $arrayDados['foto'];

    //validação para verificar se o id contém um número válido
    if($id != 0 && !empty($id) && is_numeric($id)){

        //import do arquivo de contato e configurações do arquivo
        require_once('model/bd/produtos.php');
        require_once('modulo/config.php');

        //chama a função da model e valida se o retorno foi verdadeiro ou falso
        if(deleteProdutos($id)){

            if($foto!=null){

            //unlink:função para apagar um arquivo de um diretorio
            //permite apagar a foto fisicamente do diretorio no servidor
            if(unlink(DIRETORIO_FILE_UPLOAD.$foto))
                return true;
            else
                return array('idErro'    => 5,
                'message'    => 'O registro do banco de dados foi excluído com sucesso,
                                porém a imagem não foi excluída do diretório do servidor!');
            }else
                return true;


        }else
            return array('idErro'    => 3,
                        'message'    => 'O banco de dados não pode excluir o registro');
    }else{
        return array('idErro'    => 3,
        'message'    => 'Não é possível excluir um registro sem informar um id válido');
    }

   

}

function editarProdutos($id){
     //validação para verificar se o id contém um número válido
     if($id != 0 && !empty($id) && is_numeric($id)){

        //import do arquivo de contato
        require_once('model/bd/produtos.php');

        //chama a função na model e vai buscar no BD
        $dados = selectByIdProdutos($id);

        //valida se existem dados para serem devolvidos
        if(!empty ($dados)){
            return $dados;
        }else{
            return false;
        }

    }else{
        return array('idErro'    => 3,
        'message'    => 'Não é possível excluir um registro sem informar um id válido');
    
    }

}







?>