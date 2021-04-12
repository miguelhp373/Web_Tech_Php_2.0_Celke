<?php
session_start();
session_destroy();
session_start();
$_SESSION['msg'] = "<div class='alert alert-success text-center mt-3' role='alert'>Deslogado com sucesso!</div>";
header("Location: ../index.php");
die("Erro: Página não encontrada!<br>");
