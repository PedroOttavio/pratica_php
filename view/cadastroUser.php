<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <a href="TelaLogin.php" class="text-decoration-none text-primary mb-3 d-block">Já possui uma conta?</a>
            <h1 class="text-center mb-4">Cadastrar Usuário</h1>
            <form method="post" action="ControleUsuario.php">
                <div class="mb-3">
                    <label for="nome" class="form-label">Usuário:</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="form-control">
                </div>
                <button type="submit" name="opcao" value="cadastrar" class="btn btn-primary w-100">Cadastrar</button>
            </form>
        </div>
    </div>
    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" type="text/JavaScript"></script>
    <script src="jquery.mask.min.js" type="text/javascript"></script>
    <script src="mascaras.js" type="text/javascript"></script>
</body>

</html>
