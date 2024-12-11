<?php
include 'conexaoBD.php';
function cadastrarProduto($NomeProduto, $ValorProduto, $DataProduto)
{
    connect();                /*query insere na tabela Produto, campos com o exato mesmo nome respectivamente da tabela*/
    query("INSERT INTO produtos (NomeProduto,ValorProduto,Dataproduto) VALUES ('$NomeProduto','$$ValorProduto','$DataProduto')");
    close();
}
function excluirProdutos($codigo)
{
    connect();
    query("DELETE FROM produtos WHERE codigo=$codigo");
    close();
}
function alterarProdutos($codigo, $NomeProduto, $ValorProduto, $DataProduto)
{
    connect();
    query("UPDATE produtos
    SET 
    NomeProduto='$NomeProduto',
    ValorProduto='$ValorProduto', 
    DataProduto='$DataProduto' 
    WHERE codigo='$codigo'");
    close();
}
function mostrarProdutos()
{
    connect();
    $resultados = query("SELECT * FROM produtos");
    close();
    return $resultados;
}
function mostrarProdutosEditar($codigo)
{
    connect();
    $resultados = query("SELECT * FROM produtos Where codigo = $codigo");
    close();
    return $resultados;
}