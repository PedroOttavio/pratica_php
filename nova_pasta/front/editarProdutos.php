<?php
include '../control/controleProdutos.php';
$codigo = $_GET["codigo"];
$resultados = mostrarProdutosEditar($codigo);
foreach ($resultados as $linha);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><strong>RedeForte</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-black" aria-current="page" href="./cadastrarProduto.php">Cadastrar Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="./listarProdutos.php">Listar Produtos</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Adalberto
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Editar informações</a></li>
                    <li><a class="dropdown-item" href="#">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2><strong>Editar Produto</strong></h2>

        <!-- Formulário de Edição -->
        <form method="post" action="../control/controleProdutos.php">
            <div class="mb-3 col-md-9">
                <label for="NomeProduto" class="form-label mt-4">Nome do Produto</label>
                <input type="text" class="form-control" id="NomeProduto" name="NomeProduto" value="<?= htmlspecialchars($linha['NomeProduto']) ?>" required>
            </div>
            <div class="mb-3 col-md-9">
                <label for="ValorProduto" class="form-label">Preço</label>
                <input type="text" class="form-control" id="ValorProduto" name="ValorProduto" value="<?= htmlspecialchars($linha['ValorProduto']) ?>" required>
            </div>
            <div class="mb-3 col-md-9">
                <label for="DataProduto" class="form-label">Data</label>
                <input type="text" class="form-control" id="DataProduto" name="DataProduto" value="<?= htmlspecialchars($linha['DataProduto']) ?>" required>
            </div>
            <input type="hidden" name="codigo" value="<?= htmlspecialchars($linha['codigo']) ?>">
            <button type="submit" class="btn btn-warning mt-3 fw-bold" name="opcao" value="Alterar">Salvar</button>
            <button type="submit" class="btn btn-danger mt-3 fw-bold" name="opcao" value="Excluir">Excluir</button>
            <button type="button" class="btn btn-secondary mt-3 fw-bold" onclick="window.location.href='./mostrarProdutos.php'">Cancelar</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>