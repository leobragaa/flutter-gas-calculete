<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location:../pages/login/login-page.php");
    }

    require_once '../config/configMysql.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = trim($_POST['nome']);
        $preco = trim($_POST['preco']);
        $quantidade = trim($_POST['quantidade']);
        $imagem = trim($_POST['imagem']);
        $descricao = trim($_POST['descricao']);

        $stmt = $pdo -> prepare ();
        $stmt -> execute ([$nome, $preco, $quantidade, $imagem, $descricao]);
        header("Location:../crud/produtos/read-produtos.php");
        exit;
    }
?>