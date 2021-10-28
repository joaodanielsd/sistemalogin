<?php require_once("conexao/conexao.php"); ?>
<?php
        //iserção de dados
        if (isset($_POST["nomecompleto"])){
            $nome = $_POST["nomecompleto"];
            $endereco = $_POST["endereco"];
            $numero = $_POST["numero"];
            $ddd = $_POST["ddd"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estados"];
            $cep = $_POST["cep"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            $inserir = "INSERT INTO clientes ";
            $inserir .= "(nomecompleto,endereco,numero,ddd,cidade,estadoID,cep,email,telefone,usuario,senha) ";
            $inserir .= "VALUES ";
            $inserir .="('$nome','$endereco','$numero', '$ddd', '$cidade',$estado,'$cep','$email','$telefone','$usuario','$senha')";

            $operacao_inserir = mysqli_query($conecta,$inserir);

            if(!$operacao_inserir){
                 die("Falha ao inserir");   
            }
        }

        //seleciona estados
        $select = "SELECT estadoID, nome ";
        $select .= "FROM estados ";
        $lista_estados = mysqli_query($conecta,$select);

        if(!$lista_estados){
            die("Falha no banco");

        }

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/form.css" rel="stylesheet">
    </head>

    <body>
 
        
        <main>  
            <div id="janela_formulario">
                <form action="cadastrar.php" method="post">
                    <input type="text" name="nomecompleto" placeholder="Nome Completo">
                    <input type="text" name="endereco" placeholder="Endereço">
                    <input type="text" name="numero" placeholder="Numero">
                    <input type="text" name="ddd" placeholder="DDD">
                    <input type="text" name="telefone" placeholder="Telefone">
                    <input type="text" name="cidade" placeholder="Cidade">
                    <select name="estados">
                        <?php 
                            while($linha = mysqli_fetch_assoc($lista_estados)){
                        ?>
                                <option value="<?php echo $linha["estadoID"];?>">
                                <?php echo $linha["nome"];?></option>
                     <?php 
                         }
                        ?>
                    </select>
                    <input type="text" name="cep" placeholder="CEP">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                     <input type="submit" value="Inserir">
                </form>
            </div>
          <div id="msg1">Cadastro realizado com sucesso!<br><br>Redirecionando para a página inicial...</div>
                    <script type="text/javascript">
                    setTimeout("window.location='login.php';",3000);
                    </script>
            </div>
            
        </main>

   
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>