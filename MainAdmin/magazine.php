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


    <title>Document</title>
</head>
<body>



<?php require_once 'adminHeader.php' ?>


<div class="row">
    <div class="col-md-1">
        <?php require_once 'adminSidebar.php' ?>
    </div>
    <div class="col-md-11">

        <div class="container-fluid">

            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" style="min-height: 37px;">
                    <button class="table-list btn btn-outline-success" type="button" data-tblId="0">Categorii</button>
                    <button class="table-list btn btn-outline-secondary btn-sm" type="button" data-tblId="1">Subcategorii</button>
                    <button class="table-list btn btn-outline-secondary btn-sm" type="button" data-tblId="2">Magazine</button>
                </form>
            </nav>

            <div id="content-container">  <!-- data taken from database -->

                
            </div>

        </div>
        <?php  require_once '../include/fadmin.php' ?>
    </div>
</div>


</body>

<script>

const LISTA = document.getElementsByClassName("table-list");

$(LISTA).click( function() {
  /*  this.classList.toggle('table-list');*/
 /* lista.forEach(item => item.className = "table-list");*/
  for (var i=0 ; i < LISTA.length; i++) {
    LISTA.item(i).className = "table-list btn btn-outline-secondary btn-sm";
  }
  this.className = "table-list btn btn-outline-success";
  //var txt= $(this).text();
  //$("#table-name").text(txt);
  var table_id = $(this).attr("data-tblId"); //get table id name from the sidebar list (from up ->down) first- 0
  console.log(table_id);

  
  
  $.ajax({
      url: "tableData.php",
      dataType: "text",
      type: "GET",
      data: {
          tbl_id: table_id
      },
      success: function(returndata) {
        if (!$.trim(returndata)){  
            console.log("empty");
        } 
        else {
            $("#content-container").html(returndata); //display extracted db data into html as table, HERE .table-container
            //display_data(returndata);
            
            //changeSearchFilter(table_id);
        }
      }
  }); //.done(function(returndata) {

    //});

});


</script>


</html>
