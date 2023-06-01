<!DOCTYPE html>
<html lang="en">
     <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Keania+One&display=swap" rel="stylesheet" />
        <link href="./css/senha.css" rel="stylesheet" />
        <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
<link rel="manifest" href="./images/site.webmanifest">
        <title>Acessar Banco de Dados</title>
    </head>
    <body>
        <form action="senha.php" method="post">
        <div class="fundo">
            <div class="logo"></div>
            <div class="container"><?php
            if(isset($_POST['senha'])){ 
                $senha = $_POST['senha']; 
            
                if($senha == "1234"){ 
                    header("Location: dados.php");
                    exit();
                } else {
                    $mensagem = "Acesso Negado";
                    $classeRetSenha = "ret-senha erro";
    }
} else {
    $classeRetSenha = "ret-senha"; 
}
            ?></div>
            <div class="ret-botoes">
            </div>
            <div class="botao-enviar"></div>
            <div class="botao-voltar"></div>
            <button type="submit"><span class="enviar">Entrar</span></button>
            <a href="login.php"><span class="voltar">Voltar</span></a>
            <span class="titulo">Esta Área é apenas para Administradores!! Por favor, para acessá-la, insira a senha abaixo.</span>
            <div class="<?php echo $classeRetSenha; ?>"></div>
            <div class="ret-senha">
            </div>
            <?php if(isset($mensagem)): ?>
            <div class="mensagem-erro"><?php echo $mensagem; ?></div>
        <?php endif; ?>
            <input type="password" name="senha" id="senha">
            
        </div>
    </form>
    </body>
    </html>
