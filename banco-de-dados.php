<?php
// db.php

// Dados de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "redeforte";


// Função para buscar todos os produtos
function pegarProdutos() {
    $conn = conectarNoBanco();
    $sql = "SELECT id_produto, nome, descricao, valor FROM produtos";
    $result = $conn->query($sql);
    $produtos = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
    }

    $conn->close();
    return $produtos;
}

// Função para conectar ao banco de dados
function conectarNoBanco() {
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("<div class='alert alert-danger'>Conexão falhou: " . $conn->connect_error . "</div>");
    }

    return $conn;
}

// buscar produto para depois usar nas outras funções
function getProdutoPeloId($id_produto) {
    $conn = conectarNoBanco();
    $sql = "SELECT nome, descricao, valor FROM produtos WHERE id_produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produto);
    $stmt->execute();
    $result = $stmt->get_result();
    $produto = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $produto;
}

// atualizar produto
function atualizarProduto($id_produto, $nome, $descricao, $valor) {
    $conn = conectarNoBanco();
    $sql = "UPDATE produtos SET nome = ?, descricao = ?, valor = ? WHERE id_produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $nome, $descricao, $valor, $id_produto);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $success;
}

// excluir produto
function deletarProduto($id_produto) {
    $conn = conectarNoBanco();
    $sql = "DELETE FROM produtos WHERE id_produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produto);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $success;
}


?>