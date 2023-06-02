<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: dados.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM registros WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: dados.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$stmt = $pdo->prepare('DELETE FROM registros WHERE id = ?');
$stmt->execute([$id]);
header ('Location: dados.php');
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Keania+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/deletar.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
    <link rel="manifest" href="./images/site.webmanifest">
    <title>Deletar Registro</title>
</head>
<body>
    <h1>Deletar Registro</i>
    <div class="logo"></div>
    <p>Tem certeza que deseja deletar o registro de
    <?php echo $appointment ['nome'] , "?"; ?>
    <form method="post">
    <button type="submit"><span class= "sim">Sim</span></button>
    <button><a href="dados.php"><span class= "nao">Não</span></a></button>
</form></body></html>
