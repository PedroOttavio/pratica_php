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
        <h2><strong>Editar Produto</strong></h2>

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

        // Verificando se o ID do produto foi passado
        if (isset($_GET['id'])) {
            $id_produto = $_GET['id'];

            // Buscando o produto no banco de dados
            $sql = "SELECT nome, descricao, valor FROM produtos WHERE id_produto = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_produto);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $produto = $result->fetch_assoc();
            } else {
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

            $sql = "UPDATE produtos SET nome = ?, descricao = ?, valor = ? WHERE id_produto = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdi", $nome, $descricao, $valor, $id_produto);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Produto atualizado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao atualizar produto: " . $stmt->error . "</div>";
            }
        }

        // Fechando a conexão
        $conn->close();
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
            <button type="submit" class="btn btn-warning mt-3 fw-bold">Salvar</a></button>
            <button type="button" class="btn btn-secondary mt-3 fw-bold" onclick="window.location.href='./listarProdutos.php'">Voltar</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>