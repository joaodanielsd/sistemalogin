<?php require_once("conexao/conexao.php"); ?>
<?php
        session_start();

      
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tela Inicial</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>

        
        <main>  
            <?php
                    unset($_SESSION["usuario"]);


                    session_destroy();
            ?>
            
        </main>

   
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>