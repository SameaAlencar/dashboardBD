<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleContato.css">
    <title>Document</title>
</head>
<body>
    <header>
       <div class="titulo">
           <div class="cms">
              CMS
           </div>
           <div class="loja">
            Style Sam's
           </div>
       </div>   
       <div class="gerenciamento">
        Gerenciamento de conteúdo do site
       </div>
    </header>
    <section class="div">
        <ul class="adm">
            
            <li class="produtos">
                <img src="img/produto.png" alt="" id="imagem-produto">
                <a href="">Adm.Produtos</a>  
            </li>
            <li class="categorias">
                <img src="img/categoria.png" alt="" id ="imagem-categoria">
                <a href=""> Adm.Categorias </a>  
            </li>
            <li class="contatos">
                <img src="img/contatos.png" alt="" id="imagem-contato">
                <a href="contatos.php">Contatos</a>  
            </li>
            <li class="usuarios">
                <img src="img/usuarios.png" alt="" id="imagem-usuario">
                <a href="">Usuários</a>  
            </li>
            
        </ul>

    </section>
    <section class="sessao">
        <div id="consultaDeDados">
                <table id="tblConsulta" >
                    <tr>
                        <td id="tblTitulo" colspan="6">
                            <h1> Consulta de Dados.</h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Nome </td>
                        <td class="tblColunas destaque"> Telefone </td>
                        <td class="tblColunas destaque"> Email </td>
                        <td class="tblColunas destaque"> Opções </td>
                    </tr>
                    
                
                    <tr id="tblLinhas">
                        <td class="tblColunas registros">a</td>
                        <td class="tblColunas registros">x</td>
                        <td class="tblColunas registros">s</td>
                    
                        <td class="tblColunas registros">
                                

                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                
                        </td>
                    </tr>
                </table>
            </div>

    </section>
    <footer>
        <div class="copyright">
            Copyright 2021 ©| Samea Alencar
        </div>
        <div class="versao">
            Versão 1.0.0
        </div>
    </footer>
</body>
</html>