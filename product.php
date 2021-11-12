<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php  require_once 'include/adds.php' ?>
    <style>
        .p-image {
            max-width: 500px;
            width:100%;
        }
        .product {
            margin-top: 4em;
        }
    </style>
</head>
<body>

<?php  require_once 'include/generaltopnav.php' ?>

<section class="product">
    <div class="container">

        <div class="row">
            <div class="col">
                <div id="product-image" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://s13emagst.akamaized.net/products/22495/22494116/images/res_2617ed635c7737bf1b9215124dd4dd69.jpg" class="p-image img-thumbnail rounded mx-auto d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://s13emagst.akamaized.net/products/22495/22494116/images/res_2617ed635c7737bf1b9215124dd4dd69.jpg" class="p-image img-thumbnail rounded mx-auto d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://s13emagst.akamaized.net/products/22495/22494116/images/res_2617ed635c7737bf1b9215124dd4dd69.jpg" class="p-image img-thumbnail rounded mx-auto d-block" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#product-image" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#product-image" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
             </div>
            <div class="col">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2"> Magazin: <?php echo "Trash IT" ?></strong>
                    <h3 class="mb-0" id="name-product">Samsung Galaxy A10</h3>
                    <div class="mb-1 text-muted" id="add-date">Adaugat la data: <?php echo date("m.d.y") ?></div>
                    <strong class="card-text mb-auto text-primary">Descriere scruta:</strong>
                    <p class="card-text mb-auto" id="shor-describe"><?php echo "orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more re"?></p>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <div class="row">
                        <div class="col">
                            <strong>Pret: <?php echo "500"?> lei</strong>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning">Adauga in cos</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>
