<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location:../pages/login/login-page.php");
        exit;
    }

    require_once '../config/configMysql.php';

    $id = $_GET['id'] ?? null;

    if(!$id) exit("ID não Encontrado");

    $stmt = $pdo -> prepare ("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt -> fetch(PDO::FETCH_ASSOC);

    if(!$produto) exit("Não foi possivel encontrar Porduto");
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $imagem = $_POST['imagem'];
        $descricao = $_POST['descricao'];
        
        $stmt = $pdo -> prepare("UPDATE produtos SET nome = ?, preco = ?, quantidade = ?, imagem = ?, descricao = ? WHERE id = ?");
        $stmt -> execute([$nome, $preco, $quantidade, $imagem, $descricao, $id]);
        header("Location:../crud/produtos/read-produtos.php");
        exit;
    }
?>