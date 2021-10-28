<?php require_once("conexao/conexao.php"); ?>
<?php
        session_start();

    if ( isset ( $_POST["usuario"] ) ){

      $usuario = $_POST["usuario"];
      $senha = $_POST["senha"];

      $login = "SELECT *";
      $login .= " FROM clientes ";
      $login .= "WHERE usuario = '{$usuario}' and senha = '{$senha}' ";

      $acesso = mysqli_query($conecta,$login);
        if ( !$acesso ){
            die ("Falha na consulta");
        }

        $informacao = mysqli_fetch_assoc($acesso);
        if( empty($informacao) ){
            $mensagem = "Login sem sucesso";
        ?>
            <script type="text/javascript">
                    setTimeout("window.location='login.php';",2000);
             </script>
    <?php
        }else{
            $_SESSION["user_portal"] = $informacao["clienteID"];
            header("location:listagem.php");

        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">
    </head>

    <body>
      
        
        <main>  
           <div id="janela_login">
               <form action="login.php" method="post">
                    <h2>Tela de Login</h2>
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="Login">

                    <?php
                        if ( isset($mensagem)){

                        
                    ?>
                        <p><?php echo $mensagem ?></p>
                    <?php
                        }
                    ?>
               </form>
               <form action="cadastro.php" method="post">
                    <input type="submit" value="Cadastre-se">
                </form>
           </div>
        </main>

     
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>