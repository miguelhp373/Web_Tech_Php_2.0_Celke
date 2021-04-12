<?php
include_once('../model/connection.php');

$homeUrl = '../index.php';
$AdmUrl = '../Login/index.php';
$courseID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$access = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['course']; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb41ae50aa.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <?php
        $query = 'SELECT id, name, images, price, description FROM products Where id = :id LIMIT 1;';
        $executeQuery = $connection->prepare($query);
        $executeQuery->bindParam(':id', $courseID, PDO::PARAM_INT);
        $executeQuery->execute();


        if ($executeQuery->rowCount() > 0) {
            $productsResult = $executeQuery->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "<h2 class='mt-5 ml-5'>Produto Não Encontrado</h2>";
            $productsResult = [];
        }

        foreach ($productsResult as $item) {
            $price_rise = ($item['price'] * 0.50) + $item['price'];
        ?>
            <h1 class="display-6 mt-5"><?php echo $item['name']; ?></h1>
            <div class="row">
                <div class="col-md-6 mt-5">
                    <img src="<?php echo '../images/products/' . $item['images'] ?>" class="card-img-top">
                </div>
                <div class="col-md-6 mt-5">
                    <p>De R$: <?php echo number_format($price_rise, 2, ',', '.') ?></p>
                    <p>Por R$ <?php echo number_format($item['price'], 2, ',', '.') ?></p>
                    <p>
                        <a href="checkout.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Comprar</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5 mb-5">
                    <?php echo $item['description']; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>