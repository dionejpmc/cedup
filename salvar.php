<?php
$nome = $_GET["nome"];
$passwd = $_GET["password"];
$user = $_GET["nickName"];

try {
    $host = "localhost";
    $database = "cedup";
    $username = "cedup";
    $password = "cedup";

    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $conn = new PDO($dsn, $username, $password, $options);

    $sql = "INSERT INTO usuarios (nome, login, senha) VALUES (:nome, :login, :senha)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':login', $user);
    $stmt->bindParam(':senha', $passwd);

    if ($stmt->execute()) {
        echo "Novo registro inserido.";
    } else {
        echo "Erro: " . $stmt->errorInfo()[2];
    }

    $conn = null;
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>


