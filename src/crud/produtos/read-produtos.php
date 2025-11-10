<?php
    if(!isset($_SESSION['user_id'])){
        header("Location:../pages/login/login-page.php");
        exit;
    }
    require_once '../config/configMysql.php';

    $stmt = $pdo->query("SELECT * FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>