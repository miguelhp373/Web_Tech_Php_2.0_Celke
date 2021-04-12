<?php

if (!$access) {
    header("Location:../index.php");
    die("Erro: Pagina nao encontrada!<br>");
}?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $homeUrl; ?>">Área Administrativa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item <?php echo $hiddenClassHome; ?>">
                        <a class="nav-link" aria-current="page" href="<?php echo $homeUrl; ?>"><i class="fas fa-shopping-cart"></i>&nbsp;Produtos</a>
                    </li>
                    <li class="nav-item <?php echo $hiddenClassLogin; ?>">
                        <a class="nav-link text-danger" href="../controller/logout.php"><i class="fas fa-door-open"></i>&nbsp;Sair</a>
                    </li>
                </ul>
                <form class="d-flex <?php echo $hiddenClassSearch; ?>" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar Cursos" aria-label="Search" name="search" id="search" required>
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>