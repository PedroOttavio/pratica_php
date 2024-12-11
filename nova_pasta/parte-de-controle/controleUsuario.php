<?php
include '../model/crudUsuario.php';

$opcao = $_POST["opcao"];
switch ($opcao) {
    case 'Cadastrar':
        if (empty($_POST["NomeUsuario"]) || empty($_POST["LoginUsuario"]) || empty($_POST["SenhaUsuario"])) {
            echo "<script>
                alert('Preencha Corretamente todos os campos!');
                </script>";
            echo "<script>window.location='../view/cadastrarUsuario.php';</script>";
            exit();
        } else {
            cadastrarUsuario($_POST["NomeUsuario"], $_POST["LoginUsuario"], sha1($_POST["SenhaUsuario"]));
            header("Location: ../view/paginaLogin.php");
            break;
        }
    case 'Entrar':
        $LoginUsuario = $_POST["LoginUsuario"];
        $SenhaUsuario = sha1($_POST["SenhaUsuario"]);
        $resultados = buscarUsuario($LoginUsuario);
        foreach ($resultados as $linha)
            ;
        if ($LoginUsuario === $linha["LoginUsuario"]) {
            if ($SenhaUsuario === $linha["SenhaUsuario"]) {
                session_start();
                $_SESSION["LoginUsuario"] = $LoginUsuario;
                header("Location: ../view/cadastrarProduto.php");
            } else {
                echo "<script>alert('Senha Incorreta!');</script>";
                echo "<script>window.location='../view/paginaLogin.php';</script>";
            }
        } else {
            echo "<script>alert('Login Incorreto!');</script>";
            echo "<script>window.location='../view/paginaLogin.php';</script>";
        }
        break;
    case 'Deslogar':
        session_start();
        session_destroy();
        echo "<script>alert('Destruiu a Sessão!');</script>";
        echo "<script>window.location='../view/paginaLogin.php';</script>";
        break;
}
