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
            <img class="bi me-2" width="80em" src="../include/goto.png" aria-label="Bootstrap" alt="logo marketplace">
        </a>

        <ul class="nav me-auto">
            <li class="nav-item"><a href="settings.php" class="nav-link link-dark px-2 active" aria-current="page">Setari</a></li>
            <li class="nav-item"><a href="comenzi.php" class="nav-link link-dark px-2">Comenzi</a></li>
            <li class="nav-item"><a href="product.php" class="nav-link link-dark px-2">Produse</a></li>
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
            <span class="fs-4">Setari: </span>
        </a>
    </div>
</header>
<section class="subcategory">
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nume categorie</th>
                <th scope="col">Poza</th>
                <th scope="col">Sterge</th>
            </tr>
            </thead>
            <tbody>
            <form>
            <tr>
                <th scope="row">1</th>
                <td>Categorie 1</td>
                <td><input type="file" id="image-category"></td>
                <td><button class="btn btn-danger">Sterge</button></td>
            </tr>
            </form>
            <form>
                <tr>
                    <th scope="row">#</th>
                    <td> <input type="text" class="form-control" placeholder="Nume categorie" id="name-subcategory"></td>
                    <td><input type="file" id="image-category"></td>
                    <td><button class="btn btn-success">Adauga</button></td>
                </tr>
            </form>

            </tbody>
        </table>
    </div>
</section>
</body>
</html>