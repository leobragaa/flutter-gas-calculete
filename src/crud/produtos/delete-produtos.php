<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location:../pages/login/login-page.php");
        exit;
    }
    require_once '../config/configMysql.php';

    $id = $_GET['id'] ?? null;

    $id = $_GET['id'] ?? null;

    if($id){
        $stmt = $pdo -> prepare ("DELETE FROM produtos WHERE id = ?");
        $stmt -> execute ([$id]);
    }

    header("Location:../crud/produtos/read-produtos.php");
    exit;
?>