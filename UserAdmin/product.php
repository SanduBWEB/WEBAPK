<?php
session_start();


function query($queryString) {
    require $_SERVER['DOCUMENT_ROOT'] . "/generalConfig.php";

    //echo $queryString . "\n";
    $query = mysqli_query($link,$queryString);
    if (!$query)
    {
        die('Database querry error( tableData.php:8 ): ' . mysqli_error($link));
    } 

    return $query;
}


$productData = query("SELECT a.* FROM `market_admins` b JOIN
`product_data` a ON b.market_id = a.market_id
WHERE
b.user_id = ".$_SESSION['user_id']." ");

$lastId= mysqli_fetch_assoc( query("SELECT a.id, b.market_id, c.subcategory_id, c.category_id, b.user_id FROM `market_admins` b JOIN
`product_data` a ON b.market_id = a.market_id
JOIN `market_data` c ON b.market_id = c.id
WHERE
b.user_id = ".$_SESSION['user_id']." ORDER BY a.id DESC LIMIT 1") );

$lastIdVal= intval($lastId['id']) + 1;
$marketIdVal = intval($lastId['market_id']) ;
$catIdVal = intval($lastId['category_id']) ;
$subCatIdVal = intval($lastId['subcategory_id']) ;



?>
<script>
    console.log("last product is- <?php echo $lastIdVal; ?>&market-id=<?php echo $marketIdVal;?>&category-id=<?php echo $catIdVal;?>&subcat-id=<?php echo $subCatIdVal;?>")
</script>
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


            <style>

                @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
                @import url('https://fonts.googleapis.com/css?family=Roboto');


                #file-drag:hover i{

                    color:white;
                    transition: 0.2s;
                }

                #file-drag:hover {
                    background: #03a9f49c;
                    transition: 0.2s;
                }

                #file-drag:active {
                    background: #008dcb9a;
                }
                
                .carousel-item {
                    transition: transform .6s ease-in-out;
                }
                
            </style>

            <!-- <script>
                // File Upload
                // 
                $( document ).ready(function ()
                {
                    function Init() {

                        console.log("Upload Initialised");

                        var fileSelect    = document.getElementById('file-upload'),
                            fileDrag      = document.getElementById('file-drag'),
                            submitButton  = document.getElementById('submit-button');

                        fileSelect.addEventListener('change', fileSelectHandler, false);

                        // Is XHR2 available?
                        var xhr = new XMLHttpRequest();
                        if (xhr.upload) {
                        // File Drop
                        fileDrag.addEventListener('dragover', fileDragHover, false);
                        fileDrag.addEventListener('dragleave', fileDragHover, false);
                        fileDrag.addEventListener('drop', fileSelectHandler, false);
                        }
                    }

                    function fileDragHover(e) {
                        var fileDrag = document.getElementById('file-drag');

                        e.stopPropagation();
                        e.preventDefault();

                        fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
                    }

                    function fileSelectHandler(e) {
                        // Fetch FileList object
                        var files = e.target.files || e.dataTransfer.files;

                        // Cancel event and hover styling
                        fileDragHover(e);

                        // Process all File objects
                        for (var i = 0, f; f = files[i]; i++) {
                        parseFile(f);
                        uploadFile(f);
                        }
                    }

                    // Output
                    function output(msg) {
                        // Response
                        var m = document.getElementById('messages');
                        m.innerHTML = msg;
                    }

                    function parseFile(file) {

                        console.log(file.name);
                        output(
                        '<strong>' + encodeURI(file.name) + '</strong>'
                        );
                        
                        // var fileType = file.type;
                        // console.log(fileType);
                        var imageName = file.name;

                        var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
                        if (isGood) {
                        document.getElementById('start').classList.add("hidden");
                        document.getElementById('response').classList.remove("hidden");
                        document.getElementById('notimage').classList.add("hidden");
                        // Thumbnail Preview
                        document.getElementById('file-image').classList.remove("hidden");
                        document.getElementById('file-image').src = URL.createObjectURL(file);
                        }
                        else {
                        document.getElementById('file-image').classList.add("hidden");
                        document.getElementById('notimage').classList.remove("hidden");
                        document.getElementById('start').classList.remove("hidden");
                        document.getElementById('response').classList.add("hidden");
                        document.getElementById("file-upload-form").reset();
                        }
                    }

                    function setProgressMaxValue(e) {
                        var pBar = document.getElementById('file-progress');

                        if (e.lengthComputable) {
                        pBar.max = e.total;
                        }
                    }

                    function updateFileProgress(e) {
                        var pBar = document.getElementById('file-progress');

                        if (e.lengthComputable) {
                        pBar.value = e.loaded;
                        }
                    }

                    function uploadFile(file) {

                        var xhr = new XMLHttpRequest(),
                        fileInput = document.getElementById('class-roster-file'),
                        pBar = document.getElementById('file-progress'),
                        fileSizeLimit = 100; // In MB
                        if (xhr.upload) {
                        // Check if file is less than x MB
                        if (file.size <= fileSizeLimit * 1024 * 1024) {
                            // Progress bar
                            pBar.style.display = 'inline';
                            xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                            xhr.upload.addEventListener('progress', updateFileProgress, false);

                            // File received / failed
                            xhr.onreadystatechange = function(e) {
                            if (xhr.readyState == 4) {
                                // Everything is good!

                                // progress.className = (xhr.status == 200 ? "success" : "failure");
                                // document.location.reload(true);
                            }
                            };

                            // Start upload
                            xhr.open('POST', document.getElementById('file-upload-form').action, true);
                            xhr.setRequestHeader('X-File-Name', file.name);
                            xhr.setRequestHeader('X-File-Size', file.size);
                            xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                            xhr.send(file);
                        } else {
                            output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                        }
                        }
                    }

                    // Check for the various File API support.
                    if (window.File && window.FileList && window.FileReader) {
                        Init();
                    } else {
                        document.getElementById('file-drag').style.display = 'none';
                    }

                });
            </script> -->
            
            <script>
                
                function fileUpload(file, fileName, filePath, productId) { // filename is the id.extension of the added/updated element (ex: product with id:1 in the db)

                    var extension = file.name.split('.').pop().toLowerCase();
                    console.log(extension);
                    //console.log(element);

                    var formData = new FormData();
                    var blob = file;
                    newFile = new File([blob],fileName+".png",{type: 'image/png'}); // file (filedata, filename, filetype  )
                    formData.append('file', newFile);
                    formData.append('filePath', filePath); // the path in wich file will be uploaded (starting from the host root folder aka: marketplace/)
                    var fileName = (newFile['name']);
                    formData.append('contentType', 'product');
                    formData.append('productId', productId);
                    console.log("Final file name that gone to the database is : "+fileName+ " into " + filePath);

                    // upload the file on the host/
                    $.ajax({

                        url: '../MainAdmin/uploadFile.php',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,  // tell jQuery not to set contentType
                        success: function (data) {
                            console.log(`exitStatus:  ${data}`);
                            //popupEvent(data);
                        }

                    });

                }

                const NEW_UPLOAD_FORM = '<div class="carousel-item" style="height: 100%;">'+
                    '                        <img class="product-new-image" src="#" style="max-width: 100%; padding: 1vh; display:none;">'+
                    '                        <!-- Upload  -->'+
                    '                        <div id="file-upload-form" class="product-image-upload" style="height: 100%;">'+
                    '                            <input class="product-image-upload" id="file-upload" type="file" name="update-product-image" accept="image/*" style="display: none; "/>'+
                    '                            <label for="file-upload" id="file-drag" style="transform: translate(0%, 50%); cursor: pointer; border-radius: 1rem; padding: 1rem;" >'+
                    '                                <img id="file-image" src="#" alt="Preview" class="hidden" style="display:none;">'+
                    '                                <div id="start">'+
                    '                                 <i class="fa fa-download" aria-hidden="true" style="font-size: 7vh;"></i>'+
                    '                                 <div>Selectează o imagine</div>'+
                    '                                 <!-- <div id="notimage" class="hidden">Please select an image</div> -->'+
                    '                                 <!-- <span id="file-upload-btn" class="btn btn-primary">Selecteaza imagine</span> -->'+
                    '                                </div>'+
                    '                                <div id="response" class="hidden">'+
                    '                                <div id="messages"></div>'+
                    '                                <progress class="progress" id="file-progress" value="0" style="display:none;">'+
                    '                                    <span>0</span>%'+
                    '                                </progress>'+
                    '                                </div>'+
                    '                            </label>'+
                    '                        </div>'+
                    '                        <!-- Upload  -->'+
                '                    </div>';
                
                var productFiles = [];

                //product-image-upload
                $('body').on('change','input[type=file][class="product-image-upload"]',function()
                {
                    console.log("uploaded product picture");

                    if (this.files && this.files[0])
                    {
                        var imgElement = $(this).closest("div[class*=carousel-item]").find("img")
                        $(this).closest('div').hide();
                        var reader = new FileReader();
                        productFiles.push(this.files[0]);
                        reader.onload = function (e) {
                            $(imgElement).attr('src', e.target.result)
                            $(imgElement).show();
                            //$('#imgshow').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                        if (productFiles.length < 3) 
                        {
                            $(this).closest("div[class*=carousel-inner]").append(NEW_UPLOAD_FORM);
                        }

                        $(this).closest('div').remove();

                        console.log(productFiles);
                        console.log("length " + productFiles.length);
                    }

                });

                $( document ).ready(function() {

                    $('button#cancel-add-product').click(function() {

                        console.log("should emty modal-- ");
                        productFiles = [];
                        $("div[class*=carousel-inner]").html(NEW_UPLOAD_FORM);
                        $("div[class*=carousel-item]").attr('class', 'carousel-item active');

                    });

                    
                    $("#add-product").submit(function(e) {

                        e.preventDefault();
                        var form = $(this).serialize();
                        form = form + `&market-id=<?php echo $marketIdVal;?>&category-id=<?php echo $catIdVal;?>&subcat-id=<?php echo $subCatIdVal;?>`
                        console.log(`add subcat submited, data: \n${form}`);
                        var i = 0;
                        productFiles.forEach(file => {
                            
                            i++;
                            //console.log(i);
                            fileUpload(file, i, "/assets/products/<?php echo $lastIdVal; ?>/", <?php echo $lastIdVal; ?>);

                        });

                        $.ajax({   /// request update on the db
                            url: '../MainAdmin/requests.php', // ../ to start from root directory(prolly)
                            dataType: 'text',
                            type:'POST',
                            data: {
                                formData: form, 
                                table: "products",
                                type: "add"
                            },
                            success: function (returndata) {  // if the request was done with success
                            //
                            console.log(returndata);
                            }
                        });

                        location.reload();

                    });

                
                });

            </script>

            <form id="add-product">

                <div class="modal-body">

                    <!-- FIELDS -->
                    <div class="mb-3">
                        <label class="form-label">Cod Produs</label>
                        <input type="text" class="form-control" id="cod-produs" name="product-code">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nume Produs</label>
                        <input type="text" class="form-control" id="name-produs" name="product-name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pret Produs</label>
                        <input type="number" class="form-control" id="produc-price" name="product-price">
                    </div>

                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="DescriereScurta" class="form-label">Descriere scurta:</label>
                            <textarea name="product-desc"class="form-control" id="product-desc" rows="3"></textarea>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="update-picture" class="form-label">Imagine nouă</label>
                        <!-- <input id="update-product-image" type="file" name="update-product-image" class="form-control"> -->
                        
                        <div id="product-updated-image" style="display: grid; min-height: 30vh; background: #dadada30; border: 2px solid #afaaaa59; text-align: center; margin-bottom: 10px;">
                                
                            <!-- View  -->
                            <div id="product-images" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false" style="padding: 1vh;">
                                
                                <div class="carousel-inner" style="height: 100%;">

                                    <div class="carousel-item active" style="height: 100%;">
                                        
                                        <img class="product-new-image" src="#" alt="" style="max-width: 100%; padding: 1vh; display:none;">

                                        <!-- Upload  -->
                                        <div id="file-upload-form" class="product-image-upload" style="height:100%;">
                                            
                                            <input class="product-image-upload" id="file-upload" type="file" name="update-product-image" accept="image/*" style="display: none; "/>

                                            <label for="file-upload" id="file-drag" style="transform: translate(0%, 50%); cursor: pointer; border-radius: 1rem; padding: 1rem;" >
                                                
                                                <!-- <img id="file-image" src="#" alt="Preview" class="hidden" style="display:none;"> -->
                                                <div id="start">

                                                    <i class="fa fa-download" aria-hidden="true" style="font-size: 7vh;"></i>
                                                    <div>Selectează o imagine</div>
                                                    <!-- <div id="notimage" class="hidden">Please select an image</div> -->
                                                    <!-- <span id="file-upload-btn" class="btn btn-primary">Selecteaza imagine</span> -->
                                                    <!-- <div id="response" class="hidden"></div>
                                                    <div id="messages"></div> -->

                                                    <!-- <progress class="progress" id="file-progress" value="0" style="display:none;">
                                                        <span>0</span>%
                                                    </progress> -->
                                                
                                                </div>
                                                
                                            </label>

                                        </div>
                                        <!-- Upload  -->

                                    </div>

                                    <!-- Carousel item  -->
                                    <!-- <div class="carousel-item">
                                        <img src="../assets/goto.png" class="p-image img-thumbnail rounded mx-auto d-block" alt="...">
                                    </div> -->
                                    <!-- Carousel item  -->

                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#product-images" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#product-images" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div>
                            <!-- View  -->

                            
                        </div>

                        <div id="product-help" class="form-text"></div>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label">Poza produs #1</label>
                        <input class="form-control" type="file" id="pozaprodus1">
                        <label class="form-label">Poza produs #2</label>
                        <input class="form-control" type="file" id="pozaprodus2">
                        <label class="form-label">Poza produs #3</label>
                        <input class="form-control" type="file" id="pozaprodus3">
                    </div> -->

                   
                    <!-- FIELDS -->

                </div>

                <div class="modal-footer">
                    <button id="cancel-add-product" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunta</button>
                    <button type="submit" class="btn btn-primary">Salveaza</button>
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

        <table class="table" id="product-table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cod Produs</th>
                <th scope="col">Nume Produs</th>
                <th scope="col">Pret Produs, lei</th>
                <th scope="col">Sterge</th>
            </tr>
            </thead>

            <tbody>
                <?php

                    $rows = mysqli_num_rows($productData);
                    for ($i=0; $i < $rows; $i++): 
                    $product = mysqli_fetch_assoc($productData);?>


                    <tr>
                        <th data-field="row-id" scope="row"> <?php echo $product['id'] ?>  </th>
                        <td data-field="product-id" > <?php echo $product['product_id'] ?> </td>
                        <td data-field="product-name"> <?php echo $product['product_name'] ?> </td>
                        <td data-field="product-price"> <?php echo $product['product_price'] ?>  </td>
                        <td><button class="delete-product btn btn-danger">Sterge</button> </td>
                    </tr>

                <?php endfor ?>

            </tbody>

        </table>
    </div>
</section>
</body>
</html>