<?php
session_start();

$usuario_correto = "admin";
$senha_correta = "12345";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario === $usuario_correto && $senha === $senha_correta) {
        $_SESSION["usuario"] = $usuario;
        header("Location: initPage.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve seu evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

    <form id="formulario" class="formulario-login" method="POST">
        <h2>Login</h2>
        <?php if (isset($erro)) echo "<p style='color: red; text-align: center;'>$erro</p>"; ?>
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="submit" value="Entrar" />
        <a href="#" title="Cadastro" onclick="mudarParaCadastro()">Cadastro</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="script/cadastro.js"></script>
</body>
</html>