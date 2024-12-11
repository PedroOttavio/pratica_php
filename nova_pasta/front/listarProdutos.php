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
    <title>Mostrar Produtos</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="div">
                <div class="card-header">
                    <h3>Produtos Cadastrados</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Data de Validade</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../model/crudProduto.php'; // Incluindo a lógica de acesso aos dados dos produtos
                            $resultados = mostrarProdutos(); // Função que retorna todos os produtos cadastrados
                            foreach ($resultados as $linha) {
                                echo "
                                        <tr>
                                            <td>$linha[NomeProduto]</td>
                                            <td>$linha[ValorProduto]</td>
                                            <td>$linha[DataProduto]</td>
                                            <td><a href=editarProdutos.php?codigo=$linha[codigo] class='btn btn-warning'>Editar</a></td>

                                            

                                                
                                        </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="cadastrarProduto.php" class="btn btn-primary">Cadastrar Novo Produto</a>
                    <form method="post" action="../control/controleUsuario.php" class="float-right">
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