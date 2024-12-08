<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    // Excluindo o produto no banco de dados
    if (deleteProduto($id_produto)) {
        echo "<div class='alert alert-success'>Produto excluído com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao excluir produto.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID do produto não fornecido.</div>";
}

// Redirecionando para a lista de produtos
header("Location: listarProdutos.php");
exit();



?>