<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Cadastrar</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../estilo/estilo.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h2 class="text-center mt-5 mb-5">Cadastrar</h2>
        <form method="post" action="../parte-de-controle/controleUsuario.php">
          <div class="mb-3">
            <label for="NomeUsuario" class="form-label">Nome Completo</label>
            <div class="input-group">
              <input type="text" class="form-control" id="NomeUsuario" name="NomeUsuario" placeholder="Insira o nome Completo aqui" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="LoginUsuario" class="form-label">Login</label>
            <div class="input-group">
              <input type="text" class="form-control" id="LoginUsuario" name="LoginUsuario" placeholder="Insira o nome de usuário aqui" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="SenhaUsuario" class="form-label">Senha</label>
            <div class="input-group">
              <input type="password" class="form-control" id="SenhaUsuario" name="SenhaUsuario" placeholder="Insira uma senha" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="ConfirmarSenhaUsuario" class="form-label">Confirmar Senha</label>
            <div class="input-group">
              <input type="password" class="form-control" id="ConfirmarSenhaUsuario" name="ConfirmarSenhaUsuario" placeholder="Confirmar senha" required>
            </div>
          </div>
          <div class="mb-3">
            <button type="submit" name="opcao" value="Cadastrar" class="btn btn-secundary w-100 btn-custom-border">Cadastrar</button>
          </div>
          <div class="d-flex justify-content-center links">
            Já tem uma conta? <a href="paginaLogin.php" class="no-underline text-black ms-2">Fazer login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>