<?php
session_start();



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


    <title>Dashboard</title>
</head>
<body>

<?php require_once 'adminHeader.php' ?>

<div class="row">
    <div class="col-md-1">
        <?php require_once 'adminSidebar.php' ?>
    </div>
    <div class="col-md-11">
        <div class="container">

            <!-- Project One -->
            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0" src="../assets/goto.png" alt="logo">

                    </div>
                    <div class="col-md-5">
                        <p>Alege logotip</p>
                        <input type="file" class="form-control-file" id="changelogo">
                    </div>
                </form>
            </div>

            <hr>


            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0" src="../assets/categories/b-category-1.png" alt="b1">

                    </div>
                    <div class="col-md-5">
                        <p>Alege banner carousel #1</p>
                        <input type="file" class="form-control-file" id="changebanner1">
                    </div>
                </form>
            </div>

            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0" src="../assets/categories/b-category-2.png" alt="b2">

                    </div>
                    <div class="col-md-5">
                        <p>Alege banner carousel #2</p>
                        <input type="file" class="form-control-file" id="changebanner2">
                    </div>
                </form>
            </div>

            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0"  src="../assets/categories/b-category-3.png" alt="b3">


                    </div>
                    <div class="col-md-5">
                        <p>Alege banner carousel #3</p>
                        <input type="file" class="form-control-file" id="changebanner3">
                    </div>
                </form>
            </div>


            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0"  src="../assets/categories/cat-1.png" alt="logo">


                    </div>
                    <div class="col-md-5">
                        <p>Alege banner categorie #1</p>
                        <input type="file" class="form-control-file" id="cat-1.png">
                    </div>
                </form>
            </div>


            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0"  src="../assets/categories/cat-2.png" alt="logo">


                    </div>
                    <div class="col-md-5">
                        <p>Alege banner categorie #2</p>
                        <input type="file" class="form-control-file" id="cat-2.png">
                    </div>
                </form>
            </div>

            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0"  src="../assets/categories/cat-3.png" alt="logo">


                    </div>
                    <div class="col-md-5">
                        <p>Alege banner categorie #3</p>
                        <input type="file" class="form-control-file" id="cat-3.png">
                    </div>
                </form>
            </div>

            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0"  src="../assets/categories/cat-4.png" alt="logo">

                    </div>
                    <div class="col-md-5">
                        <p>Alege banner categorie #4</p>
                        <input type="file" class="form-control-file" id="cat-4.png">
                    </div>
                </form>
            </div>


            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0"  src="../assets/categories/cat-5.png" alt="logo">


                    </div>
                    <div class="col-md-5">
                        <p>Alege banner categorie #5</p>
                        <input type="file" class="form-control-file" id="cat-5.png">
                    </div>
                </form>
            </div>

            <hr>

            <div class="row">
                <form class="form-logo">
                    <div class="col-md-7">

                        <img class="img-fluid rounded mb-3 mb-md-0"  src="../assets/categories/cat-6.png" alt="logo">


                    </div>
                    <div class="col-md-5">
                        <p>Alege banner categorie #6</p>
                        <input type="file" class="form-control-file" id="cat-6.png">
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
        //var inputImageSource = $(this).parent().find("img");
        var inputImageSource = $(this).closest("form").find("img"); // finds the img element in form
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
            formData.append('filePath', "/include/images/"); // the path in wich file will be uploaded (starting from the host root folder aka: marketplace/)
            var fileName = (newFile['name']);
            console.log("Final file name that gone to the database is : "+fileName);
            
            // upload the file on the host/
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