<?php
    require_once '../config/configMysql.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha'], PASSWORD_DEFAULT);

        try{
            $stmt = $pdo -> prepare("INSERT INTO users (nome, email, senha) values (?, ?, ?)");
            $stmt -> execute ([$nome, $email, $senha]);
        }catch(PDOException){
            echo "Cadastro não realizado".$e->getMessage();
        }
    }
?>