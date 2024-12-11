<?php
include 'conexaoBD.php';
function cadastrarUsuario($NomeUsuario, $LoginUsuario, $SenhaUsuario)
{
    connect();                /*query insere na tabela USUARIO, campos com o exato mesmo nome respectivamente da tabela*/
    query("INSERT INTO usuario (NomeUsuario,LoginUsuario,SenhaUsuario) VALUES ('$NomeUsuario','$LoginUsuario','$SenhaUsuario')");
    close();
}
function buscarUsuario($LoginUsuario)
{
    connect();
    $resultados = query("SELECT * FROM usuario WHERE LoginUsuario='$LoginUsuario'");
    close();
    return $resultados;
}