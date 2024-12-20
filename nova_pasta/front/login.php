<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Login</title>
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
        <h2 class="text-center mt-5 mb-5">Entrar</h2>
        <form method="post" action="../parte-de-controle/controleUsuario.php">
          <div class="mb-3">
            <label for="LoginUsuario" class="form-label">Login</label>
            <div class="input-group">
              <input type="text" class="form-control" id="LoginUsuario" name="LoginUsuario" placeholder="Nome de usuário" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="SenhaUsuario" class="form-label">Senha</label>
            <div class="input-group">
              <input type="password" class="form-control" id="SenhaUsuario" name="SenhaUsuario" placeholder="Senha" required>
            </div>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Lembrar de mim</label>
          </div>
          <div class="mb-3">
            <button type="submit" name="opcao" value="Entrar" class="btn btn-secundary w-100 btn-custom-border">Entrar</button>
          </div>
          <a href="cadastrarUsuario.php" class="float-start no-underline text-black">Criar conta</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>