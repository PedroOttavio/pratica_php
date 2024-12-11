<?php
include '../control/controleProdutos.php';
$codigo = $_GET["codigo"];
$resultados = mostrarProdutosEditar($codigo);
foreach ($resultados as $linha)
    ;


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
    <title>Editar Produto</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Produto</h3>
                </div>
                <div class="card-body">
                    <form method="Post" action="../control/controleProdutos.php">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Descrição do Produto" id="NomeProduto"
                                name="NomeProduto" value="<?= $linha['NomeProduto'] ?>" required>
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Preço" id="ValorProduto"
                                name="ValorProduto" value="<?= $linha['ValorProduto'] ?>" required>
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="DataProduto" name="DataProduto"
                                value="<?= $linha['DataProduto'] ?>" required>
                        </div>

                        <input type="hidden" name="codigo" value="<?= $linha['codigo'] ?>">
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary" name="opcao" value="Alterar">Alterar</button>
                            <button type="submit" class="btn btn-danger" name="opcao" value="Excluir">Excluir</button>
                        </div>
                        <a href="mostrarProdutos.php" class="btn btn-light mt-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"
    type="text/javascript"></script>
<script src="jquery.mask.min.js" type="text/javascript"></script>
<script src="mascaras.js" type="text/javascript"></script>

</html>