<?php
require_once 'db.php';

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $senha = $_POST['senha'];
    $csenha = $_POST['csenha'];
    $cemail = $_POST['cemail'];

    if (isset($cemail, $csenha) && strcmp($cemail, $email) == 0 && strcmp($csenha, $senha) == 0) {
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM registros WHERE data = ?');
        $stmt->execute([$data]);
        $count = $stmt->fetchColumn();

        $stmt = $pdo->prepare('INSERT INTO registros (nome, email, senha, data) VALUES (:nome, :email, :senha, :data)');
        $stmt->execute([
            'nome' => $nome,
            'email' => $email,
            'senha' => $senha,
            'data' => $data
        ]);
    } else {
        echo "<span class='erro'>Os campos de email ou senha não coincidem.</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Keania+One&display=swap" rel="stylesheet" />
    <link href="./css/cadastro.css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
    <link rel="manifest" href="./images/site.webmanifest">
    <title>Cadastro</title>
</head>
<body>
    <div class="fundo"></div>
    <div class="container"></div>
    <form method="post">
        <span class="cadastro">Cadastro</span>
        <div class="logo"></div>
        <span class="nome">Nome:</span>
        <span class="data">Data de Nascimento:</span>
        <span class="email">Email:</span>
        <span class="cemail">Confirme seu Email:</span>
        <span class="senha">Senha:</span>
        <span class="csenha">Confirme sua Senha:</span>
        <div class="ret-nome"></div>
        <input type="text" name="nome" id="nome">
        <div class="ret-data"></div>
        <input type="date" name="data" id="data">
        <div class="ret-email"></div>
        <input type="email" name="email" id="email">
        <div class="ret-cemail"></div>
        <input type="email" name="cemail" id="cemail">
        <div class="ret-senha"></div>
        <input type="password" name="senha" id="senha">
        <div class="ret-csenha"></div>
        <input type="password" name="csenha" id="csenha">
        <div class="ret-botoes"></div>
        <div class="ret-cadastro"></div>
        <div class="ret-dados"></div>
        <div class="ret-login"></div>
        <div class="ret-ajuda"></div>
        <a href="login.php"><span class="login">Fazer Login</span></a>
        <a href="senha.php"><span class="dados">Banco de Dados</span></a>
        <button type="submit" name="submit"><span class="cadastrar">Cadastrar</span></button>
    </form>
    <a href="ajuda.php"><span class="ajuda">Ajuda</span></a>
</body>
</html>