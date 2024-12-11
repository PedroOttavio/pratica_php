<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>


</head>


<body>

    <nav class="navbar navbar-expand-lg bg-light shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="./listarProdutos.php"><strong>RedeForte</strong></a>
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
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Adalberto
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Editar informações</a></li> -->
                        <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Listar Produtos</h2>

        <?php
        // Incluindo o arquivo de banco de dados
        include '../banco-de-dados.php'; 

        // Buscando produtos no banco de dados
        $produtos = pegarProdutos();

        // Verificando se há produtos cadastrados
        if (count($produtos) > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>";

            // Exibindo cada produto na tabela
            foreach ($produtos as $produto) {
                echo "<tr>";
                echo "<td>" . $produto["id_produto"] . "</td>";
                echo "<td>" . $produto["nome"] . "</td>";
                echo "<td>" . $produto["descricao"] . "</td>";
                echo "<td>R$ " . number_format($produto["valor"], 2, ',', '.') . "</td>";
                echo "<td><a href='editarProduto.php?id=" . $produto["id_produto"] . "' class='btn btn-warning btn-sm fw-bold'>Editar</a></td>";
                echo "<td><a href='excluirProdutos.php?id=" . $produto["id_produto"] . "' class='btn btn-danger btn-sm fw-bold'>Excluir</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-info'>Nenhum produto cadastrado.</div>";
        }
        ?>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>