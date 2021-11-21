<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 active" aria-current="page">Setari</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Comenzi</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Produse</a></li>
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
            <span class="fs-4">Produse: </span>
        </a>
    </div>
</header>
<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModal">Completeaza toate spatiile cu informatia despre produs !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="CodProdus" class="form-label">Cod Produs</label>
                        <input type="text" class="form-control" id="cod-produs">
                    </div>
                    <div class="mb-3">
                        <label for="NumeProdus" class="form-label">Nume Produs</label>
                        <input type="text" class="form-control" id="name-produs">
                    </div>
                    <div class="mb-3">
                        <label for="PretProdus" class="form-label">Pret Produs</label>
                        <input type="number" class="form-control" id="produc-price">
                    </div>
                    <div class="mb-3">
                        <label for="prozaprodus1" class="form-label">Poza produs #1</label>
                        <input class="form-control" type="file" id="pozaprodus1">
                        <label for="prozaprodus2" class="form-label">Poza produs #2</label>
                        <input class="form-control" type="file" id="pozaprodus2">
                        <label for="prozaprodus3" class="form-label">Poza produs #3</label>
                        <input class="form-control" type="file" id="pozaprodus3">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="DescriereScurta" class="form-label">Descriere scurta:</label>
                            <textarea class="form-control" id="DescriereScurta" rows="3"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunta</button>
                <button type="button" class="btn btn-primary">Salveaza</button>
            </div>
            </form>
        </div>
    </div>
</div>

<section class="product-list">
    <div class="container">


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Adauga produs
        </button>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cod Produs</th>
                <th scope="col">Nume Produs</th>
                <th scope="col">Sterge</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>COD123</td>
                <td>Produs 1</td>
                <td><form><button class="btn btn-danger" id="delete-product">Sterge</button> </form></td>
            </tr>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>