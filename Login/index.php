<?php
include_once('../model/connection.php');
session_start();

$access = true;

$homeUrl = '../index.php';
$cartUrl = '../View/checkout.php';

$hiddenClassLogin = 'visually-hidden';
$hiddenClassSearch = 'visually-hidden';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Entre Para Acessar</title>
    <link rel="stylesheet" href="styles/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb41ae50aa.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once('../View/navbar.php');

    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $msg = '';
    if (isset($data['btnsignin'])) {
        $empty_input = false;
        $data = array_map('trim', $data);
        if (in_array('', $data)) {
            $empty_input = true;
            $msg = "<div class='alert alert-danger text-center' role='alert'>Erro: Necessário preencher todos os campos!</div>";
            $password_crypted = password_hash($data['passfieldinput'], PASSWORD_DEFAULT);
        } elseif (!filter_var($data['emailfieldinput'], FILTER_VALIDATE_EMAIL)) {
            $empty_input = true;
            $msg = "<div class='alert alert-danger text-center' role='alert'>Erro: Necessário preencher com e-mail válido!</div>";
        }

        if (!$empty_input) {
            /*  echo password_hash($data['passfieldinput'],PASSWORD_DEFAULT); */
            try {
                $query = "SELECT id, name, email, password FROM users WHERE email = :email LIMIT 1";
                $resultQuery = $connection->prepare($query);
                $resultQuery->bindParam(':email', $data['emailfieldinput']);
                $resultQuery->execute();

                if ($resultQuery->rowCount() > 0) {
                    $rowQuery = $resultQuery->fetch(PDO::FETCH_ASSOC);

                    if (password_verify($data['passfieldinput'], $rowQuery['password'])) {
                        $_SESSION['user_id'] = $rowQuery['id'];
                        $_SESSION['user_name'] = $rowQuery['name'];
                        $_SESSION['user_email'] = $rowQuery['email'];
                        $_SESSION['user_key'] = password_hash($rowQuery['id'], PASSWORD_DEFAULT);
                        header('Location:pages/dashboard.php');
                    } else {
                        $msg = "<div class='alert alert-danger text-center mt-3' role='alert'>Usuario ou senha Incorreto!</div>";
                    }
                } else {
                    $msg = "<div class='alert alert-danger text-center mt-3' role='alert'>Usuario ou senha Incorreto!</div>";
                }
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }
    }
    ?>
    <?php
    if (!empty($msg)) {
        echo $msg;
        $msg = "";
    }
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div class="d-flex flex-row justify-content-center">

        <div class="content d-flex flex-column justify-content-center mt-3">

            <h1 class="text-center mt-5 mb-5"><i class="fas fa-user-alt"></i> Login</h1>

            <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center mt-4 mb-5 w-100">

                <input type="email" class="email-field" id="" name="emailfieldinput" placeholder="Endereço de Email" autofocus value="<?php if (isset($data)) {
                                                                                                                                            echo $data['emailfieldinput'];
                                                                                                                                        } ?>">
                <input type="password" class="pass-field mt-4" id="" name="passfieldinput" placeholder="Senha">
                <!-- <div class="check d-flex flex-row mt-4">
                    <input type="checkbox" name="check-connected-true" id="" class="mt-2">
                    <label for="check-connected-true" class="ml-3" style="margin-left: 10px;">Manter Conectado</label>
                </div> -->
                <button class="btn-submit mt-4" type="submit" name="btnsignin" value="btnsignin">Entrar</button>
                <a href="#" class="mt-4">Criar Conta</a>
            </form>

        </div>
    </div>
</body>

</html>