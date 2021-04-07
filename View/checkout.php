<?php
include_once('../model/connection.php');
$homeUrl = '../index.php';
$courseID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//$hiddenClassCart = 'visually-hidden';
$hiddenClassSearch = 'visually-hidden';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🛒- Comprar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb41ae50aa.js" crossorigin="anonymous"></script>
    <script src="js/masks.js"></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="py-5 text-center">
            <img src="../images/logo/logo.jpg" alt="logo" height="72" width="72">
            <h2>Formulário de Pagamento</h2>
            <p class="lead">Cada grupo de formulários obrigatório possui um estado de validação que pode ser acionado ao tentar enviar o formulário sem preenchê-lo.</p>
        </div>



        <?php
        $query = 'SELECT id, name, price FROM products Where id = :id LIMIT 1;';
        $executeQuery = $connection->prepare($query);
        $executeQuery->bindParam(':id', $courseID, PDO::PARAM_INT);
        $executeQuery->execute();


        if ($executeQuery->rowCount() > 0) {
            $productsResult = $executeQuery->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }

        foreach ($productsResult as $item) { ?>
            <h2>🛒 Produto:</h2>
            <div class="row mb-5 mt-4 alert alert-info" role="alert">
                <div class="col-md-8 mt-2">
                    <h3><?php echo $item['name']; ?></h3>
                </div>
                <div class="col-md-4 mt-3 text-end">
                    <div class="mb-1 text-muted"><?php echo number_format($item['price'], 2, ",", "."); ?></div>
                </div>
            </div>
        <?php } ?>

        <div class="row mb-5" style="background-color: #f5f6fa;padding: 20px;box-sizing: border-box;border-radius: 7px;">
            <div class="col-md-12">
                <h4 class="mb-3">Informações Pessoais</h4>

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="first_name">Primeiro Nome</label>
                            <input type="text" name="first_name" id="first_name" class="form-control mt-2" placeholder="Primeiro nome" autofocus required>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label for="last_name">Último Nome</label>
                            <input type="text" name="last_name" id="last_name" class="form-control mt-2" placeholder="Último nome" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control mt-2" placeholder="Somente número do CPF" maxlength="14" oninput="cpfMask(this)" required>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label for="phone">Telefone</label>
                            <input type="text" name="phone" id="phone" class="form-control mt-2" placeholder="Telefone com o DDD" maxlength="14" oninput="maskPhone(this)" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-4">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Digite o seu melhor e-mail">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>