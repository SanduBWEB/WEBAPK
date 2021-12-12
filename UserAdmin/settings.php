<?php
session_start();

require_once  $_SERVER['DOCUMENT_ROOT'] . "/generalConfig.php";
//echo "".$_GET['cat']."";
$sql = "SELECT a.*, b.market_name 
                FROM `subcategories` a 
                    JOIN `market_data` b ON a.market_id = b.id 
                    JOIN `market_admins` c ON b.id = c.market_id 
                WHERE c.user_id = ".$_SESSION['user_id']."";
print_r($sql);
//print_r($_SESSION['logged']);
$categories =  mysqli_query($link,$sql);
$market = mysqli_query($link, "SELECT a.* FROM `market_data` a  JOIN `market_admins` b ON a.id = b.market_id WHERE b.user_id = ".$_SESSION['user_id']."");
//$rows = mysqli_num_rows($market); //nr de inscrieri;

if (!$market || !$categories)
{
    die('Error in cautare' . mysqli_error($link));
} 
// else if ( $rows === 0) {
//     echo "Nu a fost găsit nici un rezultat";
//     die();
// } 
$marketData = mysqli_fetch_assoc($market);
print_r($marketData);

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
            <img class="bi me-2" width="80em" src="../include/goto.png" aria-label="Bootstrap" alt="logo marketplace">
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
            <span class="fs-4">Setari: <?php echo($marketData['market_name']);  ?></span>
        </a>
    </div>
</header>

<section class="type-activity">
    <div class="container">
        <form>
            <div class="mb-3">
                <label>Selectati tipul de activitate a magazinului dvs:</label>
                <select class="form-select" aria-label="Selecteaza tipul activitatii">
                    <option selected>Selecteaza tipul activitatii</option>
                    <option value="1">Imbracaminte</option>
                    <option value="2">Calculatoare si accesorii</option>
                    <option value="3">Electrocasnice</option>
                    <option value="4">Mobila</option>
                    <option value="5">Gradina</option>
                    <option value="6">Constructii</option>
                </select>
            </div>
        </form>
    </div>
</section>

<hr>

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

            <?php for ($i=0; $i < mysqli_num_rows($categories) ; $i++): 
                # code...
                $category = mysqli_fetch_assoc($categories);?>

                <form>
                <tr>
                    <th scope="row"> <?php echo $category['id'] ?> </th>
                    <td> <?php echo $category['subcategory_name'] ?> </td>
                    <td style="display:grid;grid-gap:5px;">
                        <img style="align-self:center;  max-width:100px; max-height:100px;" src="../markets/<?php echo $category['market_id'] ?>/categories/<?php echo $category['id'] ?>.jpg"> 
                        <input type="file" id="image-category">
                    </td>
                    <td><button data-categoryId="<?php echo $category['id']?>" class="btn btn-danger delete-subcategory">Sterge</button></td>
                </tr>
                </form>

            <?php endfor ?>
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
