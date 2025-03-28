<?php
$arquivo = "bd/organizadores.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $empresa = $_POST["empresa"];
    $data = $_POST["data"];
    $trabalhos = $_POST["trabalhos"];

    $dados = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\n";
    $dados .= "Empresa: " . (!empty($empresa) ? $empresa : "Não informado") . "\n";
    $dados .= "Data de Nascimento: " . (!empty($data) ? $data : "Não informado") . "\n";
    $dados .= "Trabalhos Realizados: " . (!empty($trabalhos) ? $trabalhos : "Não informado") . "\n";
    $dados .= "------------------------------------\n";

    file_put_contents($arquivo, $dados, FILE_APPEND);

    $_SESSION['is_organizer'] = true;

    header("Location: user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Organizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles/organizador.css">
</head>

<body>

    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><i class="bi bi-ticket-detailed"></i> ReserveNow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MENU</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php"><i class="bi bi-house-fill"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user.php"><i class="bi bi-person-lines-fill"></i> Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-bag-fill"></i> Minhas compras</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <form id="formulario" class="formulario-login" method="POST">
        <h2>Cadastro de Organizador</h2>

        <label>Nome Completo:</label><br>
        <input type="text" name="nome" required><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" required><br>

        <label>Data de Nascimento</label><br>
        <input type="date" name="data"><br>

        <label>Trabalhos Realizados(opcional):</label><br>
        <input type="text" name="trabalhos"><br>

        <label>Nome da Empresa (opcional):</label><br>
        <input type="text" name="empresa"><br>
        <input type="submit" value="Cadastrar">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
