<?php
include '../model/crudProduto.php';
$opcao = isset($_POST["opcao"]) ? $_POST["opcao"] : null;


switch ($opcao) {
    case 'Cadastrar':
        if (empty($_POST["NomeProduto"]) || empty($_POST["ValorProduto"]) || empty($_POST["DataProduto"])) {
            echo "<script>
                alert('Preencha Corretamente todos os campos!');
                </script>";
            echo "<script>window.location='../view/cadastrarProduto.php';</script>";
            exit();
        } else {
            cadastrarProduto($_POST["NomeProduto"], $_POST["ValorProduto"], $_POST["DataProduto"]);
            echo "<script>
            alert('Produto Inserido!');
            </script>";
            echo "<script>window.location='../view/cadastrarProduto.php';</script>";
            break;
        }
    case 'Alterar':
        alterarProdutos(
            $_POST["codigo"],
            $_POST["NomeProduto"],
            $_POST["ValorProduto"],
            $_POST["DataProduto"],
        );
        header("Location: ../view/MostrarProdutos.php");
        break;
    case 'Excluir':
        excluirProdutos($_POST["codigo"]);
        header("Location: ../view/MostrarProdutos.php");
        break;
    case 'Deslogar':
        session_start();
        session_destroy();
        echo "<script>alert('Destruiu a Sessão!');</script>";
        echo "<script>window.location='../view/paginaLogin.php';</script>";
        break;
}
