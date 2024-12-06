<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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
        <h2>Cadastrar Produto</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Dados de conexão com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = ""; // Adicione sua senha, se houver
            $dbname = "redeforte";

            // Conectando ao banco de dados
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificando a conexão
            if ($conn->connect_error) {
                die("<div class='alert alert-danger'>Conexão falhou: " . $conn->connect_error . "</div>");
            }

            // Recebendo dados do formulário
            $nome = $_POST['nome'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $valor = $_POST['valor'] ?? 0;

            // Inserindo dados no banco usando prepared statements
            $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, valor) VALUES (?, ?, ?)");
            $stmt->bind_param("ssd", $nome, $descricao, $valor);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Produto cadastrado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao cadastrar produto: " . $stmt->error . "</div>";
            }

            // Fechando a conexão
            $stmt->close();
            $conn->close();
        }
        ?>

        <!-- Formulário de Cadastro -->
        <form action="" method="POST">
            <div class="mb-3 col-md-9">
                <label for="nome" class="form-label mt-4">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3 col-md-9">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>
            <div class="mb-3 col-md-9">
                <label for="valor" class="form-label">Preço</label>
                <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-warning mt-3 fw-bold">Cadastrar</button>
        </form>
    </div>

</body>

</html>