<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="https://fonts.googleapis.com/css?family=Keania+One&display=swap" rel="stylesheet" />
        <link href="./css/dados.css" rel="stylesheet" />
        <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
<link rel="manifest" href="./images/site.webmanifest">
        <title>Banco de Dados</title>
    </head>
    <body>
        <div class="fundo">
            <?php
$stmt = $pdo->query('SELECT * FROM registros ORDER BY id');
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($clientes) == 0) {
    echo "<div class='banco'>";
    echo "<h1>Nenhum registro enviado</h1>";
    echo '</div>';
} else {
    echo "<div class='banco'>";
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Data</th><th>E-mail</th><th>Senha</th><th colspan="2">Deletar?</th></tr></thead>';
    echo '<tbody>';

    foreach ($clientes as $cliente) {
        echo '<tr>';
        echo '<td>' . $cliente['nome'] . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($cliente['data'])) . '</td>';
        echo '<td>' . $cliente['email'] . '</td>';
        echo '<td>' . $cliente['senha'] . '</td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' . $cliente['id'] . '">Deletar</a></td>';
        echo '</tr>';
        echo '</div>';
        
    }
    echo '</tbody>';
    echo '</table>';
}
?>
            </div>
            <span class="text-banco">Banco de Dados dos Clientes Registrados</span>
            <div class="ret-voltar"></div>
            <div class="logo"></div>
            <a href="senha.php"><span class="voltar">Voltar</span></a>
        </div>
    </body>
    </html>