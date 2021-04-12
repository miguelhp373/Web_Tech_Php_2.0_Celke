<?php

if ((!isset($_SESSION['user_id'])) or (!isset($_SESSION['user_email'])) or (!isset($_SESSION['user_key']))) {
    session_destroy();
    session_start();
    $_SESSION['msg'] = "<div class='alert alert-danger text-center mt-3' role='alert'>Para Acessar Faça o Login!</div>";
    header('Location: ../index.php');
    die('ERRO: Página Não Encontrada!<br>');
}
