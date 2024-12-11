<?php
session_start();
if (!isset($_SESSION["LoginUsuario"])) {
    header("Location: ../view/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cadastrar Produtos</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Cadastrar Produto</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="../control/controleProdutos.php">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nome do Produto" id="NomeProduto"
                                name="NomeProduto" required>
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Valor" id="ValorProduto"
                                name="ValorProduto" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Data de Validade" id="DataProduto"
                                name="DataProduto" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="opcao" value="Cadastrar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <a href="listarProdutos.php" class="btn btn-primary">Listar Produtos</a>
                    <form method="post" action="../parte-de-controle/controleUsuario.php" class="float-right">
                        <input type="submit" name="opcao" value="Deslogar" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"
    type="text/JavaScript"></script>
<script src="jquery.mask.min.js" type="text/javascript"></script>
<script src="mascaras.js" type="text/javascript"></script>

</html>