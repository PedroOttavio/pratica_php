<?php
include '../../conexaoBD.php';

function cadastrarProduto($nome, $valor, $descricao)
{
    connect();
    query("INSERT INTO produtos (nome, valor, descricao) VALUES ('$nome', '$valor', '$descricao')");
    close();
}

function excluirProdutos($id_produto)
{
    connect();
    query("DELETE FROM produtos WHERE id_produto=$id_produto");
    close();
}

function alterarProdutos($id_produto, $nome, $valor, $descricao)
{
    connect();
    query("UPDATE produtos
    SET 
    nome='$nome',
    valor='$valor', 
    descricao='$descricao'
    WHERE id_produto='$id_produto'");
    close();
}

function mostrarProdutos()
{
    connect();
    $resultados = query("SELECT * FROM produtos");
    close();
    return $resultados;
}

function mostrarProdutosEditar($id_produto)
{
    connect();
    $resultados = query("SELECT * FROM produtos WHERE id_produto = $id_produto");
    close();
    return $resultados;
}
?>