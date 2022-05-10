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
                            <h1> Contatos </h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Nome </td>
                        <td class="tblColunas destaque"> Telefone </td>
                        <td class="tblColunas destaque"> Email </td>
                        <td class="tblColunas destaque"> Opções </td>
                    </tr>

                    <?php
                        require_once('./controller/controllerContatos.php');
                        $listarMsg = listarContatos();

                        if($listarMsg){
                            foreach ($listarMsg as $msg)
                            {
                                        
                    ?>
                    
                    
                
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$msg['nome']?></td>
                        <td class="tblColunas registros"><?=$msg['telefone']?></td>
                        <td class="tblColunas registros"><?=$msg['email']?></td>
                    
                        <td class="tblColunas registros">
                                
                        <a onclick="return confirm('Tem certeza que deseja excluir?');" 
                                        href="router.php?componente=contato&action=deletar&id=<?=$msg['id']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a> 
                        </td>
                    </tr>

                    <?php
                            }
                        }
                ?>
                </table>
            </div>

    </section>
    <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Categorias </h1>
                
            </div>
            <div id="cadastroInformacoes">
                <form  action="router.php?componente=contatos&action=inserir" name="frmCadastro" method="post" >
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Categoria: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=isset($categoria)?$categoria:null?>" placeholder="Digite uma categoria" maxlength="100">
                        </div>
                    </div>
                                
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <section id="sessao">
        <div id="consultaDeDados">
                <table id="tblConsulta" >
                    <tr>
                        <td id="tblTitulo" colspan="6">
                            <h1>Categorias</h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Categorias </td>
                        <td class="tblColunas destaque"> Opções </td>
                    </tr>

                    <?php
                        require_once('./controller/controllerCategorias.php');
                        $listarCateg = listarCategorias();
                        if($listarCateg)
                        {
                                foreach ($listarCateg as $item)
                                {
                                                
                            ?>
                            
                            <tr id="tblLinhas">
                                <td class="tblColunas registros"><?=$item['categoria']?></td>
                            
                                <td class="tblColunas registros">
                                        
                                <a onclick="return confirm('Tem certeza que deseja excluir?');"
                                                href="router.php?componente=categorias&action=deletar&id=<?=$item['id']?>">
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                        
                                </td>
                            </tr>

                            <?php
                                }
                            }
                    ?>
                </table>
            </div>

    </section>

    <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Usuários </h1>
                
            </div>
            <div id="cadastroInformacoes">
                <form  action="router.php?componente=contatos&action=inserir" name="frmCadastro" method="post" >
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=isset($nome)?$nome:null?>" placeholder="Digite seu nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> E-mail: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?=isset($email)?$email:null?>" placeholder="Digite seu email" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?=isset($senha)?$senha:null?>" placeholder="Digite sua senha" maxlength="100">
                        </div>
                    </div>
                    
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <section id="sessao">
        <div id="consultaDeDados">
                <table id="tblConsulta" >
                    <tr>
                        <td id="tblTitulo" colspan="6">
                            <h1>Usuários</h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Nome </td>
                        <td class="tblColunas destaque"> Email </td>
                        <td class="tblColunas destaque"> Senha </td>
                        <td class="tblColunas destaque"> Opções </td>
                    </tr>

                    <?php
                        require_once('./controller/controllerUsuarios.php');
                        $listarLogin = listarUsuarios();


                        if($listarLogin){
                                foreach ($listarLogin as $unidade)
                                 {
                                        
                    ?>
                    
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$unidade['nome']?></td>
                        <td class="tblColunas registros"><?=$unidade['email']?></td>
                        <td class="tblColunas registros"><?=$unidade['senha']?></td>
                    
                        <td class="tblColunas registros">
                                
                        <a onclick="return confirm('Tem certeza que deseja excluir?');"
                                         href="router.php?componente=usuarios&action=deletar&id=<?=$unidade['id']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                                
                        </td>
                    </tr>

                    <?php
                        }
                    }
            ?>
                </table>
            </div>

    </section>
    <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Produtos </h1>
                
            </div>
            <div id="cadastroInformacoes">
                <form  action="router.php?componente=contatos&action=inserir" name="frmCadastro" method="post" >
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Desconto: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=isset($desconto)?$desconto:null?>" placeholder="Digite seu nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Percentual de valor: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?=isset($percentualValor)?$percentualValor:null?>" placeholder="Digite seu email" maxlength="100">
                        </div>
                    </div>
                    
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <section id="sessao">
        <div id="consultaDeDados">
                <table id="tblConsulta" >
                    <tr>
                        <td id="tblTitulo" colspan="6">
                            <h1>Produtos</h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Desconto </td>
                        <td class="tblColunas destaque"> Percentual de valor </td>
                        <td class="tblColunas destaque"> Foto </td>
                        <td class="tblColunas destaque"> Opções </td>
                    </tr>

                    <?php
                        require_once('./controller/controllerProdutos.php');
                        $listarProdutos = listarProdutos();
                        
                            if($listarProdutos){
                                foreach ($listarProdutos as $unidade)
                                 {
                                        
                    ?>
                    
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$unidade['desconto']?></td>
                        <td class="tblColunas registros"><?=$unidade['percentual de desconto']?></td>
                        <td class="tblColunas registros"><?=$unidade['foto']?></td>
                    
                        <td class="tblColunas registros">
                                
                        <a onclick="return confirm('Tem certeza que deseja excluir?');"
                                         href="router.php?componente=produtos&action=deletar&id=<?=$unidade['id']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                                
                        </td>
                    </tr>

                    <?php
                        }
                    }
            ?>
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