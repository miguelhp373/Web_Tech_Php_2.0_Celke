<?php
$host = 'localhost'; //host type
$port = '3306'; //host port
$dbname = 'virtualshop'; //data base name
$user = 'root'; //user database
$pass = 'root'; //password from database


try {
    $connection = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
} catch (PDOException $error) {
    echo $error->getMessage();
    die('<br>Erro Ao Tentar se comunicar com o banco de dados, se persistir o erro entre em contato com o administrador do site!');
}
