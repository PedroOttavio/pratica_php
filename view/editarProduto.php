<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

        <?php
        require 'db.php';

        // testar se o id do produto foi passado, se der algum problema, ele apresenta uma mensagem na tela dependendo do erro.
        if (isset($_GET['id'])) {
            $id_produto = $_GET['id'];
            $produto = getProdutoPeloId($id_produto);

            if (!$produto) {
                echo "<div class='alert alert-danger'>Produto não encontrado.</div>";
                exit;
            }
        } else {
            echo "<div class='alert alert-danger'>ID do produto não fornecido.</div>";
            exit;
        }

        // Atualizando o produto no banco de dados
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $valor = $_POST['valor'] ?? 0;

            if (atualizarProduto($id_produto, $nome, $descricao, $valor)) {
                echo "<div class='alert alert-success'>Produto atualizado com sucesso!</div>";
                header("Location: editarProduto.php?id=" . $id_produto);
                exit();
            } else {
                echo "<div class='alert alert-danger'>Erro ao atualizar produto.</div>";
            }
        }
        ?>

        <!-- Formulário de Edição -->
        <form action="" method="POST">
            <div class="mb-3 col-md-9">
                <label for="nome" class="form-label mt-4">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
            </div>
            <div class="mb-3 col-md-9">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
            </div>
            <div class="mb-3 col-md-9">
                <label for="valor" class="form-label">Preço</label>
                <input type="number" class="form-control" id="valor" name="valor" step="0.01" value="<?php echo htmlspecialchars($produto['valor']); ?>" required>
            </div>
            <button type="submit" class="btn btn-warning mt-3 fw-bold">Salvar</button>
            <button type="button" class="btn btn-secondary mt-3 fw-bold" onclick="window.location.href='./listarProdutos.php'">Voltar</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>