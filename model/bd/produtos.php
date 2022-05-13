<?php
/************************************
 * Objetivo : arquivo resposável por manipular dados dentro do BD
 * Autor:Samea Alencar
 * Versão 1.0
 */


require_once('conexao.php');

function insertProdutos($dadosProdutos){

     //declaraçãode variável para utilizar
     $statusResposta = (boolean) false;

     $conexao = conexaoMysql();
 
   //Monta o script para enviar para o BD
     $sql = "insert into tblproduto
                 (desconto,
                 percentualValor,
                 foto)
          values
                ('".$dadosProdutos['desconto']."',
                 '".$dadosProdutos['percentualValor']."',
                 '".$dadosProdutos['foto']."')";
                
 
    //executa o script no BD
 
         
 
         // Validação para verificar se o script sql esta correto
         if (mysqli_query($conexao, $sql)){
 
             //Validação para verificar se uma linha foi acrescentada no BD
             if(mysqli_affected_rows($conexao))
               $statusResposta = true;
             else
               $statusResposta = false;
         }
         else{
             $statusResposta = false;
         }
 
         //solicita o fechamento da conexao com o banco de dados
         fecharMySql($conexao);
         return $statusResposta;
}


function sellectAllProdutos(){

    $conexao = conexaoMySql();

    $sql = "select * from tblproduto order by idproduto desc";

    $resultado = mysqli_query($conexao, $sql);

        if($resultado){

            $cont = 0;
                while ($rsDados = mysqli_fetch_assoc($resultado)){

                 $arrayInfo[$cont] = array (
                     "id"              => $rsDados['idproduto'],
                     "desconto"        => $rsDados['desconto'],
                     "percentualValor" => $rsDados['percentualValor']
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

function deleteProdutos($id){

    $verificacao = (boolean) false;

    $conexao = conexaoMySql();
     
    $sql = "delete from tblproduto where idproduto=".$id;

        if(mysqli_query($conexao, $sql)){

            if(mysqli_affected_rows(($conexao))){
                $verificacao = true;
            }
        }

    fecharMySql($conexao);
        return $verificacao;


}

function updateProdutos($dadosProdutos){
    $statusResposta = (boolean) false;
    //abre a conexao com o banco
        $conexao = conexaoMysql();

        $sql = "update tblproduto set
        desconto          = '".$dadosProdutos['desconto']."',
        percentualValor   = '".$dadosProdutos['percentualValor']."',
        foto              = '".$dadosProdutos['foto']."'
       
         where idproduto = ".$dadosProdutos['id'];
  
        
         //executa o script no bd
         //validacao para identificar se o script esta certo
        if(mysqli_query($conexao,$sql)){
           //validacao para verificae se uma linha foi acrescentada no DB
           
            if(mysqli_affected_rows($conexao))
            {
             $statusResposta = "true";
        
            }
        
        }

       
        // solicita o fechamento 
        fecharMySql($conexao);
        return $statusResposta;
}

function selectByIdProdutos($id){

    //Abre conexão com  BD
    $conexao = conexaoMysql();

    //script para listar todos os dados do BD
    $sql ="select * from tblproduto where idproduto = ".$id;

    //Executa o script sql no BD e guarda o retorno dos dados, se houver
    $result = mysqli_query($conexao, $sql);

    //Valida se o BD retornou registros
    if($result)
    {
        //mysqli_fetch_assoc() - permite converter os dados para o BD em um array para manipulação do PHP
        //Nesta repetição estamos convertendo os dados do BD em um array ($rsDados), além de
        //o próprio while conseguir gerenciar a quantidade de vezes que deverá ser feita a reperição
        
        if($rsDados = mysqli_fetch_assoc($result)){
            
            //Cria um array com os dados do BD
            $arrayDados = array(
                "id"                  => $rsDados['idproduto'],
                "desconto"            => $rsDados['desconto'],
                "percentualDesconto"  => $rsDados['percentualValor'],
                "foto"                => $rsDados['foto']
            );
          
        }
        //Solicita o fechamento da conexao com o BD
        fecharMysql($conexao);

        if(isset($arrayDados))
            return $arrayDados;
        else        
            return false;
    }
}




?>