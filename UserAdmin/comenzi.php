<?php



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">

        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
            <img class="bi me-2" width="80em" src="../assets/goto.png" aria-label="Bootstrap" alt="logo marketplace">
        </a>

        <ul class="nav me-auto">
            <li class="nav-item"><a href="settings" class="nav-link link-dark px-2 active" aria-current="page">Setari</a></li>
            <li class="nav-item"><a href="comenzi" class="nav-link link-dark px-2">Comenzi</a></li>
            <li class="nav-item"><a href="product" class="nav-link link-dark px-2">Produse</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">User</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Log-Out</a></li>
        </ul>
    </div>
</nav>
<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <span class="fs-4">Comenzi: </span>
        </a>
    </div>
</header>
<section class="comenzi">
    <div class="container">
        <table class="table table-info">
            <thead>
            <tr>
                <th scope="col">ID Comanda</th>
                <th scope="col">Produs comandat</th>
                <th scope="col">Client</th>
                <th scope="col">Statut</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>
                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">ID2122</li>
                            <li class="list-group-item">COD003</li>
                        </ul>
                    </div>
                </td>
                <td><?php echo "Sandu" ?></td>
                <td>
                    <select class="form-select" aria-label="Stock status">
                        <option selected>Alege o optiune</option>
                        <option value="1">In stock</option>
                        <option value="2">Fara stock</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>
                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">ID2122</li>
                        </ul>
                    </div>
                </td>
                <td><?php echo "Nicu" ?></td>
                <td>
                    <select class="form-select" aria-label="Stock status">
                        <option selected>Alege o optiune</option>
                        <option value="1">In stock</option>
                        <option value="2">Fara stock</option>
                    </select>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</section>
</body>
</html>