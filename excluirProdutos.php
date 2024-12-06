<?php
// Dados de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "redeforte";

// Conectando ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificando se o ID do produto foi passado
if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    // Apagando o produto do banco de dados
    $sql = "DELETE FROM produtos WHERE id_produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produto);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Produto apagado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao apagar produto: " . $stmt->error . "</div>";
    }

    // Fechando a conexão
    $stmt->close();
    $conn->close();

    // Redirecionando de volta para a página de listagem de produtos
    header("Location: listarProdutos.php");
    exit;
} else {
    echo "<div class='alert alert-danger'>ID do produto não fornecido.</div>";
}
?>