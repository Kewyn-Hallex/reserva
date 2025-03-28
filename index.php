<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["usuario"])) {
    header("Location: cadastr.php"); // Se não estiver logado, redireciona para a página de cadastro
    exit();
}

// Destruir a sessão e remover os cookies quando o usuário sair
if (isset($_GET['logout'])) {
    session_unset(); // Remove todas as variáveis de sessão
    session_destroy(); // Destrói a sessão

    // Remove os cookies de login
    setcookie("usuario", "", time() - 3600, "/");
    setcookie("senha", "", time() - 3600, "/");

    header("Location: login.php"); // Redireciona para a página de login
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve seu evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=18_up_rating" />
    <link rel="stylesheet" href="styles/initPage.css">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="bi bi-ticket-detailed"></i> ReserveNow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" id="offcanvasDarkNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">MENU</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="#"><i class="bi bi-house-fill"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/user.php"><i class="bi bi-person-lines-fill"></i> Usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/minhasCompras.php"><i class="bi bi-bag-fill"></i> Minhas compras</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <h1 class="title text-center">Eventos</h1>
        <div class="search mb-3">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar evento">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="container-eventos">
            <div class="row">
                <?php if (!empty($_SESSION['eventos'])): ?>
                    <?php foreach ($_SESSION['eventos'] as $evento): ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <?php if (!empty($evento['imagem'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" class="card-img-top" alt="Imagem do Evento">
                                <?php else: ?>
                                    <img src="uploads/default.jpg" class="card-img-top" alt="Imagem padrão">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($evento['nome']) ?></h5>
                                    <p><strong>Data:</strong> <?= htmlspecialchars($evento['data_inicio']) ?></p>
                                    <p><strong>Local:</strong> <?= htmlspecialchars($evento['local_evento']) ?></p>
                                    <p><strong>Valor:</strong> R$ <?= htmlspecialchars($evento['valor_ingresso']) ?></p>

                                    <?php if ($evento['evento_maiores'] == "Sim"): ?>
                                        <p>
                                            <span class="material-symbols-outlined" style="font-size: 35px;">
                                                18_up_rating
                                            </span>
                                        </p>
                                    <?php else: ?>
                                        <p><strong></strong></p>
                                    <?php endif; ?>

                                    <a href="pages/pageEvento.php" class="btn btn-primary">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Nenhum evento encontrado.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>