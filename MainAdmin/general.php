<?php




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Chorme, FireFox, Opera -->
    <meta name="theme-color" content="#36A26B">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#36A26B">
    <!-- Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#36A26B">

    <?php  require_once '../include/adds.php' ?>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <style>
        .c-gen-info {
            background-color: rgba(12, 84, 96, 0.11);
        }
        form {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            width: 50%;
            height: 80%;
            border: 20px solid transparent;
            margin-left: 1em;
            margin-bottom: 3em;

        }
        form input {
            margin: 1em 1em 1em 0;
        }

        .divider
        {
            position: relative;
            margin-top: 90px;
            height: 1px;
        }

        .div-transparent:before
        {
            content: "";
            position: absolute;
            top: 0;
            left: 5%;
            right: 5%;
            width: 90%;
            height: 1px;
            background-image: linear-gradient(to right, transparent, rgb(48,49,51), transparent);
        }
        .l-ex-ad img{
            max-width: 10em;
            margin: 1em 1em 1em 0;
        }
        input {
            padding:5px;
            border:2px solid #ccc;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }
    </style>


    <title>Dashboard</title>
</head>
<body>



<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <?php require_once 'adminSidebar.php' ?>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0"><li class="nav-item active">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User-Name</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Log-Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid c-gen-info">
            <p class="text-center">Logotip: </p>
            <form class="form-logo">
                <div class="form-group">
                    <label>Logotipul actual:</label>
                </div>
                <div class="grid">
                    <div class="g-col-6 g-col-md-4">
                        <img style="width: 150px;" src="../include/goto.png" alt="logo">
                        <input type="file" class="form-control-file" id="changelogo">
                    </div>
                </div>
            </form>

            <div class="divider div-transparent"></div>
            <p class="text-center">Bannere principale: </p>
            <form class="form-logo">
                <div class="form-group">
                    <label>Bannerele actuale:</label>
                </div>
                <div class="form-group l-ex-ad">
                    <div class="grid">
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/b-category-1.png" alt="b1">
                            <input type="file" class="form-control-file" id="changebanner1">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/b-category-2.png" alt="b2">
                            <input type="file" class="form-control-file" id="changebanner2">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/b-category-3.png" alt="b3">
                            <input type="file" class="form-control-file" id="changebanner3">
                        </div>
                    </div>
                </div>
            </form>

            <div class="divider div-transparent"></div>
            <p class="text-center">Bannere categorii: </p>
            <form class="form-logo">
                <div class="form-group">
                    <label>Bannerele actuale:</label>
                </div>
                <div class="form-group l-ex-ad">
                    <div class="grid">
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-1.png" alt="logo">
                            <input type="file" class="form-control-file" id="bc-category-1.png">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-2.png" alt="logo">
                            <input type="file" class="form-control-file" id="bc-category-2.png">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-3.png" alt="logo">
                            <input type="file" class="form-control-file" id="bc-category-3.png">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-4.png" alt="logo">
                            <input type="file" class="form-control-file" id="bc-category-4.png">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-5.png" alt="logo">
                            <input type="file" class="form-control-file" id="bc-category-5.png">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-6.png" alt="logo">
                            <input type="file" class="form-control-file" id="bc-category-6.png">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php  require_once '../include/fadmin.php' ?>
    </div>
</div>


</body>

<script>

    // when user uploads file, update the image source for an html element
    $('body').on('change','input[type=file]',function()
    {

        var element = $(this).attr('id');
        console.log(`input changed for file ${element}`);
        var inputImageSource = $(this).parent().find("img");
        var extension = this.files[0].name.split('.').pop().toLowerCase();
        console.log(extension);

        if (this.files && this.files[0])
        {
            var reader = new FileReader();

            reader.onload = function(e) {
                //$("#output-"+id).attr('src', e.target.result);
                $(inputImageSource).attr('src', e.target.result);
                console.log(`changed src for element ${$(inputImageSource)} from ${this} `);
            }
            reader.readAsDataURL(this.files[0]); // convert to base64 string

            var formData = new FormData();
            var newImage = this.files[0];
            var blob = newImage;
            newFile = new File([blob],element,{type: 'image/png'}); // edit so the name is the needen filename for the this.files[0].name
            formData.append('file', newFile);
            var fileName = (newFile['name']);
            console.log("Final file name that gone to the database is : "+fileName);

            $.ajax(
                {
                    url: 'uploadFile.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    success: function (data) {
                        console.log(`targetPath is ${data}`);
                        //popupEvent(data);
                    }

                });
        }




    });


    /*

    $("#pfp-form").submit(function(e) {

            e.preventDefault();
            var url_string = window.location.href;
            var url = new URL(url_string);
            var uid = url.searchParams.get("id");
            var formData = new FormData();
            var new_pfp = $("#upload-pfp")[0].files[0];
            var blob = new_pfp;
            newFile = new File([blob],uid+'.'+"jpg",{type: 'image/png'});
            formData.append('file', newFile);
            var pfp_name = (newFile['name']);
            console.log("Final file name that gone to the database is : "+pfp_name);

            $.ajax({
                url: 'upload_pfp.php',
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function (data) {
                    console.log(data);
                    popupEvent(data);
                }

            });


        });


    console.log(this);
    console.log(id);
    var image = $("#output-"+id);
    var icon_name = $(this).val().split('\\').pop();
    console.log(image,icon_name);
    document.getElementById(image).src =
    image.src = icon_name;
    */
    //$(image).src()


</script>

</html>