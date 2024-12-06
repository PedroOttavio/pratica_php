<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8CkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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
            <a class="navbar-brand" href="./home.php"><strong>RedeForte</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-black" aria-current="page" href="./cadastrarProdutos.php">Cadastrar Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="./listarProdutos.php">Listar Produtos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Listar Produtos</h2>

        <?php
        // Dados de conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "redeforte";

        // Conectando ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificando a conexão
        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Conexão falhou: " . $conn->connect_error . "</div>");
        }

        // Buscando produtos no banco de dados
        $sql = "SELECT id_produto, nome, descricao, valor FROM produtos";
        $result = $conn->query($sql);

        // Verificando se há produtos cadastrados
        if ($result->num_rows > 0) {
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
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_produto"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";
                echo "<td>R$ " . number_format($row["valor"], 2, ',', '.') . "</td>";
                echo "<td><a href='editarProdutos.php?id=" . $row["id_produto"] . "' class='btn btn-warning btn-sm fw-bold'>Editar</a></td>";
                echo "<td><a href='excluirProdutos.php?id=" . $row["id_produto"] . "' class='btn btn-danger btn-sm fw-bold'>Excluir</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-info'>Nenhum produto cadastrado.</div>";
        }

        // Fechando a conexão
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>