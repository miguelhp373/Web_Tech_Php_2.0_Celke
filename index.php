<?php
include_once('model/connection.php');

$homeUrl = 'index.php?search=';
$AdmUrl = 'Adm/index.php';
$cartUrl = 'View/checkout.php';
$hiddenClassHome = 'visually-hidden';

$access = true;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Shop Cursos</title>
    <link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb41ae50aa.js" crossorigin="anonymous"></script>
</head>
<style>
    a.card-link {
        text-decoration: none !important;
        color: black !important;
    }
</style>

<body>

    <?php
    $searchInput = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING));
    include('View/navbar.php');
    ?>

    <?php if (!empty($searchInput)) { ?>

        <?php

        $query = "SELECT id, name, images, price, description FROM products WHERE name LIKE '%" . $searchInput . "%' ORDER BY id ASC";
        $executeQuery = $connection->prepare($query);
        $executeQuery->execute();


        if ($executeQuery->rowCount() > 0) {
            $productsResult = $executeQuery->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <?php if ($executeQuery->rowCount() > 0) { ?>
            <div class="container">
                <h2 class="mt-5 ml-5"><?php echo $executeQuery->rowCount(); ?> Produtos Encontrados</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 mb-5 cards-products">
                    <?php foreach ($productsResult as $item) { ?>

                        <div class="col">
                            <div class="card">
                                <img src="<?php echo 'images/products/' . $item['images'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['name'] ?></h5>
                                    <p class="card-text">R$<?php echo number_format($item['price'], 2, ',', '.') ?></p>
                                    <a href="View/productDetails.php?id=<?php echo $item['id'] . '&course=' . $item['name'] ?>" class="btn btn-primary">Detalhes</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <h2 class="mt-5 ml-5">Nenhum Produto Encontrado</h2>
            </div>
        <?php } ?>

    <?php } else { ?>
        <div class="container">
            <h2 class="mt-5 ml-5">Produtos</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 mb-5 cards-products">
                <?php

                $query = 'SELECT id, name, images, price, description FROM products ORDER BY id ASC';
                $executeQuery = $connection->prepare($query);
                $executeQuery->execute();


                if ($executeQuery->rowCount() > 0) {
                    $productsResult = $executeQuery->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return [];
                }

                foreach ($productsResult as $item) { ?>

                    <div class="col">
                        <div class="card">
                            <img src="<?php echo 'images/products/' . $item['images'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['name'] ?></h5>
                                <p class="card-text">R$<?php echo number_format($item['price'], 2, ',', '.') ?></p>
                                <a href="View/productDetails.php?id=<?php echo $item['id'] . '&course=' . $item['name'] ?>" class="btn btn-primary">Detalhes</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php } ?>


</body>

</html>