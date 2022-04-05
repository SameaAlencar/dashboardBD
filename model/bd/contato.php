<?php
/************************************
 * Objetivo : arquivo resposável por manipular dados dentro do BD
 * Autor:Samea Alencar
 * Versão 1.0
 */

 require_once('conexao.php');

 function selectAllContato(){

    $conexao = conexaoMysql();

    //script para listar todos os dados do BD
    $sql ="select * from tblcontato order by idcontato desc";
    //Executa o script sql no BD e guarda o retorno dos dados, se houver
    $result = mysqli_query($conexao, $sql);

    //Valida se o BD retornou registros
    if($result)
    {
        //mysqli_fetch_assoc() - permite converter os dados para o BD em um array para manipulação do PHP
        //Nesta repetição estamos convertendo os dados do BD em um array ($rsDados), além de
        //o próprio while conseguir gerenciar a quantidade de vezes que deverá ser feita a reperição
        $cont = 0;
        while($rsDados = mysqli_fetch_assoc($result)){
            
            //Cria um array com os dados do BD
            $arrayDados[$cont] = array(
                "id"        => $rsDados['idcontato'],
                "nome"      => $rsDados['nome'],
                "telefone"  => $rsDados['telefone'],
                "email"     => $rsDados['email'],
            );
            $cont++;
        }
        //Solicita o fechamento da conexao com o BD
        fecharMysql($conexao);

        return $arrayDados;
    }

    
 }

     var_dump(selectAllContato());



?>