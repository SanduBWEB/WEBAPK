<?php

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


// get markets data + market admins srname+name;
$sql = "SELECT b.*, c.surname, c.name FROM market_admins a JOIN market_data b ON a.market_id = b.id
JOIN users c ON a.user_id = c.id";

//INSERT INTO `subcategories` VALUES (NULL, 'Instrumente electrice', '3'); inserare
//UPDATE `subcategories` SET `subcategory_name` = 'Papuci' WHERE `subcategories`.`id` = 6; update
// categories
$cat = "SELECT * FROM categories";

// subcategories
$subcat = "SELECT a.category_name, b.* FROM categories a JOIN subcategories b on a.id = b.category_id";
//SELECT b.* FROM categories a JOIN subcategories b on a.id = b.category_id WHERE a.id = 1 - get all for specific category

$tableId = $_GET['tblId'];

?>

<script>

    function fileUpload(file, fileName, filePath) { // filename is the id.extension of the added/updated element (ex: product with id:1 in the db)

        var extension = file.name.split('.').pop().toLowerCase();
        console.log(extension);
        //console.log(element);



        var formData = new FormData();
        var blob = file;
        newFile = new File([blob],fileName+".png",{type: 'image/png'}); // file (filedata, filename, filetype  )
        formData.append('file', newFile);
        formData.append('filePath', filePath); // the path in wich file will be uploaded (starting from the host root folder aka: marketplace/)
        var fileName = (newFile['name']);
        console.log("Final file name that gone to the database is : "+fileName+ " into " + filePath);

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
                    console.log(`exitStatus:  ${data}`);
                    //popupEvent(data);
                }

            });

    }

    // when update button is clicked, change modal id and send the id to php matching to the current category
    function setModalId(table, element, curId, parentId){ // element - button pressed, curID - current subcat id, parentId - category id
        
        switch (table) {

            case 'subcats': // subcategories

                $("#updateCat").attr("data-currentId", curId); // set the editing modal form id just in case
                console.log(curId);
                $("#update-subcategory").attr("data-subcat-id", curId) // updating the save button's id matching the current subcategory thats edited
                var curName =$(element).closest("tr").find("td[data-field=subcategory_name]").text();
                $("#selected-cat").val(parentId).change(); 
                $("#cur-subcat-name").val( $.trim(curName) );
                var curImage = $(element).closest("tr").find("img").attr("src");
                $("#current-subcat-image").attr("src", curImage);
                //$("#edit-subcategory").find("img").toggleClass("image-popped");
                $("#subcat-edit-modal").toggleClass("modal-popped");
                $("#subcat-add-modal").toggleClass("modal-popped"); // TODO: change so it only applies to the current opened modal 
                setTimeout(() => {
                    //$("#edit-subcategory").find("img").toggleClass("image-popped");
                    $("#subcat-edit-modal").toggleClass("modal-popped");
                    $("#subcat-add-modal").toggleClass("modal-popped");
                }, 250);
                
                
                console.log(curImage);
                console.log(curName);

            break;
        

            case 'shops':
                console.log("adapting modal to current id")
                $("#updateMag").attr("data-currentId", curId); // set the editing modal form id just in case
                console.log(curId);
                $("#update-shop").attr("data-shop-id", curId) // updating the save button's id matching the current subcategory thats edited
                var curImage = $(element).closest("tr").find("img").attr("src");
                //$("#edit-shop").find("img").toggleClass("image-popped");
                $("#shop-edit-modal").toggleClass("modal-popped");
                $("#shop-add-modal").toggleClass("modal-popped");
                //$("#edit-shop").find("img").toggleClass("image-popped");
                setTimeout(() => {
                    //$("#edit-shop").find("img").toggleClass("image-popped");
                    $("#shop-edit-modal").toggleClass("modal-popped");
                    $("#shop-add-modal").toggleClass("modal-popped");
                }, 250);
                $("#current-shop-image").attr("src", curImage);

            break;
        }
       
    }

    
    $('body').on('keyup','#admin-search', function() {
        var rows = $("#admin-table tr"); // tr[data-type=active]
        ////var removeHead = $("#active-table tr[id=table-header]");
        var input = $(this).val().toUpperCase();
        //console.log(input);
        ////rows.splice(0,1);
        //console.log(rows);

        //if (tableId == 0 || tableId == 2 || tableId == 5 || tableId == 7) {
            for (var i = 0; i < rows.length; i++) {
                //console.log("for tbl1,2");
                var td = rows[i].getElementsByTagName("td")[0];
                var td2 = rows[i].getElementsByTagName("td")[1];
                if (td && td2) 
                {
                    txtValue = $(td).html();
                    txtValue2 = $(td2).html();
                    //console.log(txtValue);
                    //console.log(txtValue2);
                    if (txtValue.toUpperCase().indexOf(input) > -1 || txtValue2.toUpperCase().indexOf(input) > -1) {
                        $(rows[i]).show();
                    } 
                    else 
                    {
                        $(rows[i]).hide();
                    }
                }
                else if(td) 
                {
                    txtValue = $(td).html();
                    //console.log(txtValue);
                    if (txtValue.toUpperCase().indexOf(input) > -1) 
                    {
                        $(rows[i]).show();
                    } 
                    else 
                    {
                        $(rows[i]).hide();
                    }
                }       
            }
        //var field2 = $("td[data-field=email]");
        //console.log("field1 are: "+ field1);
        //}
        // else if (tableId == 1 || tableId == 3 || tableId == 4) {
        //     for (var i = 0; i < rows.length; i++) {
        //         var td = rows[i].getElementsByTagName("td")[1];
        //         if (td) {
        //           txtValue = $(td).html();
        //           console.log(txtValue);
        //           if (txtValue.toUpperCase().indexOf(input) > -1) {
        //             $(rows[i]).show();
        //             $(rows_hidden[i]).hide();
        //           } else {
        //             $(rows[i]).hide();
        //             $(rows_hidden[i]).hide();
        //           }
        //         }       
        //     }
        // }
    });


</script>

<style>

    @keyframes popIn {
        from {transform: scale(0.5,0.5);}
        to {transform: scale(1,1);}
    }

    @keyframes modalPop {
        from {transform: scale(0.85,0.85);}
        to {transform: scale(1,1);}
    }

    .modal-popped{
        animation: modalPop 0.2s forwards; /** forwards: leaves the element in the final state at the end (doesnt repeat the anim) */
    }

    .image-popped{
        animation: popIn 0.25s forwards; /** forwards: leaves the element in the final state at the end (doesnt repeat the anim) */
    }

</style>


<?php
switch ($tableId) {
    case '0': // categorii - categories
        # code...
        $categories = query("SELECT * FROM categories ORDER BY id");//id, category_name
        $rows = mysqli_num_rows($categories);
        ?>               

        <table id="admin-table" class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nume Categorie</th>
                <th scope="col">R</th>
                <th scope="col">D</th>
                <th scope="col">#</th>
            </tr>
            </thead>

            <tbody>

                <?php for ($i=0; $i < $rows; $i++):
                    $cat = mysqli_fetch_assoc($categories);
                    ?>

                    <tr>
                        <th scope="row" data-id="<?php echo $cat['id'] ?>" ><?php echo $cat['id'] ?></th>
                        <td> <?php echo $cat['category_name'] ?> </td>
                        <td><button data-bs-toggle="modal" data-bs-target="#updateCat" class="btn btn-warning">Redacteaza</button></td>
                        <td><button class="btn btn-danger">Sterge</button></td>
                        <td> </td>
                    </tr>
                    
                    
                <?php endfor ?>
                    
            </tbody>
        </table>
                    
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addCat" style="margin: 1em 1em 1em 0em">Adauga Categorie</button>
        
        <!-- <script>

            $('.toggle-collapse').click( function(){  // if using  '() =>' or 'e =>' in function do e.target instead of this
                // $( $(this).attr("data-target") ).collapse('toggle');
                //console.log( $(this) );
                //console.log( $( $(this).attr("data-target") ) );
                $(this).toggleClass("btn-info")
                $( $(this).attr("data-target") ).toggleClass('show');
                console.log("collapsed");   
            });

        </script> -->

        <!-- Modal Category -->
        <!-- ADD -->
        <div class="modal fade" id="addCat" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="category-add-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMagLabel">Adauga Categorie Nouă</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="cat-name" class="form-label">Nume Categorie</label>
                                <input type="text" class="form-control" id="cat-name" name="cat-name" aria-describedby="catHelp" placeholder="Denumirea Categoriei">
                                <!-- <div id="errMessage" class="form-text"></div> -->
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                            <button type="button" class="btn btn-primary">Salveaza</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- EDIT ( edit it in js so it changed the form id or class to the respective current row thats edited) -->
        <div class="modal fade" id="updateCat" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="category-edit-modal">

                    <div class="modal-header">
                        <h5 class="modal-title" id="redactCatLabel">Redacteaza Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="cat-name" class="form-label">Nume Categorie</label>
                                <input type="text" class="form-control" id="cat-name" name="cat-name" aria-describedby="catHelp" placeholder="Denumirea Categoriei">
                                <!-- <div id="errMessage" class="form-text">Denumirea Categoriei</div> -->
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                            <button type="button" class="btn btn-primary">Salveaza</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- Modals -->


        <?php
        break;

    case '1': // subcategorii - subcategories
        $subcategories = query("SELECT a.category_name, b.* FROM categories a JOIN subcategories b on a.id = b.category_id ORDER BY id");//id, category_name
        $subcatRows = mysqli_num_rows($subcategories);
        ?>               

        <!-- CHANGE FORM ID AND UPDATE PHP VAR FOR ID OF THE CURRENT SUBCAT THAT IS CHANGED -->
        <?php 
            if (isset($_GET['newCat'])) {
                $currentCatId = $_GET['newCat'];  // update the parent cat when selecting to update a subcategory
                echo $currentCatId;
            }
        ?>
        <script> 

            $("#edit-subcategory").submit(function(e) {

                e.preventDefault();
                var form = $(this).serialize();
                var element = $("#update-subcategory").attr("data-subcat-id"); // get id from the "save" button in the edit form
                console.log(`edit subcat submited, data: \n${form}`);
                var newCatFile = $('#update-subcat-image').prop('files');
                //const [newCatFile] = $("#").files;
                
                if (newCatFile[0]) {
                    var curFile = newCatFile[0];
                    fileUpload(curFile, element, "/assets/subcategories/");
                }

                $.ajax({   /// request update on the db
                    url: 'requests.php',
                    dataType: 'text',
                    type:'POST',
                    data: {
                        formData: form, 
                        table: "subcategories",
                        type: "update",
                        entry_id: element
                    },
                    success: function (returndata) {  // if the request was done with success
                    //
                    console.log(returndata);
                    }
                });



            });
            

            $("#add-subcategory").submit(function(e) {

                e.preventDefault();
                var form = $(this).serialize();
                console.log(`add subcat submited, data: \n${form}`);

                $.ajax({   /// request update on the db
                    url: 'requests.php',
                    dataType: 'text',
                    type:'POST',
                    data: {
                        formData: form, 
                        table: "subcategories",
                        type: "add"
                    },
                    success: function (returndata) {  // if the request was done with success
                    //
                    console.log(returndata);
                    }
                });

            });

            $(".delete-subcategory").click(function() {

                var subcatId = $(this).attr("data-cat-id");
                console.log(`should delete subcat with id: ${subcatId}`);

                $.ajax({   /// request update on the db
                    url: 'requests.php',
                    dataType: 'text',
                    type:'POST',
                    data: {
                        formData: null, 
                        table: "subcategories",
                        type: "delete",
                        entryId: subcatId
                    },
                    success: function (returndata) {  // if the request was done with success
                    //
                    console.log(returndata);
                    }
                });

            });

            $('body').on('change','input[id="update-subcat-image"]',function()
            {
                console.log("changed input");
                const [file] = this.files;
                if (file) {
                    $("#subcat-new-image").attr('src', URL.createObjectURL(file));
                }
            });
            
        
        </script>
        <!-- CHANGE FORM ID AND UPDATE PHP VAR FOR ID OF THE CURRENT SUBCAT THAT IS CHANGED -->


        <table id="admin-table" class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nume Subcategorie</th>
                <th scope="col">Nume Categorie</th>
                <th scope="col">Imagine subcategorie</th>
                <th scope="col">R</th>
                <th scope="col">D</th>
            </tr>
            </thead>

            <tbody>

                <!-- subcategory data -->
                
                <?php for ($i=0; $i < $subcatRows; $i++): 
                    $subcat = mysqli_fetch_assoc($subcategories);?>
                    
                    <tr>
                        <th scope="row" data-id="<?php echo $subcat['id'] ?>" ><?php echo $subcat['id'] ?></th>
                        <td data-field="subcategory_name"> <?php echo $subcat['subcategory_name'] ?> </td>
                        <td data-field="category_name"> <?php echo $subcat['category_name'] ?> </td>
                        <td data-field="" style="text-align: center;"> 
                            <img class="subcat-img" src="../assets/subcategories/<?php echo $subcat['id'] ?>.png" style="max-height:6vh;cursor: zoom-in;" >
                            <!-- <div class="image-viewer" style="visibility: hidden; background: black; max-height: 5vh; max-width: 5vh; height: 5vh; position: absolute; margin-top: -36px; z-index: 1">                
                                <img class="subcat-img" src="../assets/subcategories/<?php echo $subcat['id'] ?>.jpg" style="max-height: 100%; max-width: 100%;">
                            </div>  -->
                        </td>
                        <td><button data-parentCat="<?php echo $subcat['category_id'] ?>" data-catId="<?php echo $subcat['id'] ?>" data-bs-toggle="modal" data-bs-target="#updateCat" 
                        onclick="setModalId('subcats', this, $(this).attr('data-catId'), $(this).attr('data-parentCat') )" class="btn btn-warning">Redacteaza</button></td>
                        <td><button class="delete-subcategory btn btn-danger" data-cat-id="<?php echo $subcat['id'] ?>">Sterge</button></td>
                        <td></td>
                    </tr>
                
                <?php endfor ?>

                <!-- subcategory data -->
                    
                    

            </tbody>
        </table>
                    
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addCat" style="margin: 1em 1em 1em 0em">Adauga Subcategorie</button>

        <!-- Modal Subcategory -->
        <!-- ADD -->
        <div class="modal fade" id="addCat" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="subcat-add-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMagLabel">Adauga Subcategorie Nouă</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="add-subcategory">

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="subcat-name" class="form-label">Nume Subcategorie</label>
                                <input type="text" class="form-control" id="subcat-name" name="subcat-name" aria-describedby="catHelp" placeholder="Denumirea Subcategorie">
                                <div id="errMessage" class="form-text"></div>
                            </div>
                            
                            <label for="selectCategory" class="form-label">Categoria</label>
                            <div class="mb-3">
                                <select id="selected-cat" name="selected-cat" class="custom-select custom-select-lg mb-3" style="width: 100%; min-height: 50px;"
                                onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                    
                                    <!-- <option selected>Open this select menu</option> -->

                                    <?php 
                                        $categories = query("SELECT * FROM categories ORDER BY id");//id, category_name
                                        $rows = mysqli_num_rows($categories);
                                        for ($i=0; $i < $rows; $i++): 
                                        $cat = mysqli_fetch_assoc($categories);
                                    ?>
                                    
                                    <option value="<?php echo $cat['id'] ?>">  <?php echo $cat['category_name'] ?> </option>
                                    
                                    <?php endfor ?>
                                </select>
                            </div>

                            <!-- <div class="mb-3">
                                <label for="update-picture" class="form-label">Banner Subcategorie</label>
                                <input id="update-subcat-image" type="file" name="update-subcat-image" class="form-control">
                                
                                <div id="subcat-updated-image" style="background: #dadada30; border: 2px solid #afaaaa59; text-align: center; margin-bottom: 10px;">
                                    <img id="subcat-new-image" src="" alt="" style="max-width: 100%; padding: 1vh;">
                                </div>
                                <div id="subcat-help" class="form-text"></div>
                            </div> -->




                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                            <button id="update-subcategory" type="submit" class="btn btn-primary" onClick="window.location.reload();">Salveaza</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- EDIT ( edit it in js so it changed the form id or class to the respective current row thats edited) -->
        <div class="modal fade" id="updateCat" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="subcat-edit-modal">

                    <div class="modal-header">
                        <h5 class="modal-title" id="redactSubCat">Redacteaza Subcategoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="edit-subcategory">

                        <div class="modal-body">


                            <div class="mb-3">
                                <label for="cur-subcat-name" class="form-label">Denumirea Subcategoriei</label>
                                <input id="cur-subcat-name" type="text" name="cur-subcat-name" class="form-control" aria-describedby="subcat-help" placeholder="Denumire subcategorie">
                                <div id="subcat-help" class="form-text"></div>
                            </div>

                            <label for="selectCategory" class="form-label">Categoria</label>
                            <div class="mb-3">
                                <select id="selected-cat" name="selected-cat" class="custom-select custom-select-lg mb-3" style="width: 100%; min-height: 50px;"
                                onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                    
                                    <!-- <option selected>Open this select menu</option> -->

                                    <?php 
                                        $categories = query("SELECT * FROM categories ORDER BY id");//id, category_name
                                        $rows = mysqli_num_rows($categories);
                                        for ($i=0; $i < $rows; $i++): 
                                        $cat = mysqli_fetch_assoc($categories);
                                    ?>
                                    
                                    <option value="<?php echo $cat['id'] ?>">  <?php echo $cat['category_name'] ?> </option>
                                    
                                    <?php endfor ?>
                                </select>
                            </div>
                            


                            <div class="mb-3">
                                <label for="update-picture" class="form-label">Banner Subcategorie</label>
                                <div id="subcat-edit-image" style="background: #dadada30; border: 2px solid #afaaaa59; text-align: center; margin-bottom: 10px;">
                                    <img id="current-subcat-image" src="" alt="" style="max-width: 100%; padding: 1vh;">
                                </div>
                                <label for="update-picture" class="form-label">Imagine nouă</label>
                                <input id="update-subcat-image" type="file" name="update-subcat-image" class="form-control">
                                
                                <div id="subcat-updated-image" style="background: #dadada30; border: 2px solid #afaaaa59; text-align: center; margin-bottom: 10px;">
                                    <img id="subcat-new-image" src="" alt="" style="max-width: 100%; padding: 1vh;">
                                </div>
                                <div id="subcat-help" class="form-text"></div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                            <button id="update-subcategory" data-subcat-id="" type="submit" class="btn btn-primary" onClick="window.location.reload();">Salveaza</button>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
        <!-- Modals -->
        
        <?php
        break;

    case '2': // magazine - market_data
        # code...
        $magazine = query("SELECT b.*, c.surname, c.name FROM market_admins a JOIN market_data b ON a.market_id = b.id
        JOIN users c ON a.user_id = c.id ORDER BY id");//id, category_name
        $rows = mysqli_num_rows($magazine);
        ?>

        <script> 

            $("#edit-shop").submit(function(e) {

                e.preventDefault();
                var element = $("#update-shop").attr("data-shop-id"); // get id from the "save" button in the edit form
                
                if ($("#cur-email").val().length > 1 )
                {
                    var form = $(this).serialize();
                    console.log(`edit shop submited, data: \n${form}`);

                    $.ajax({   /// request update on the db
                        url: 'requests.php',
                        dataType: 'text',
                        type:'POST',
                        data: {
                            formData: form, 
                            table: "market",
                            type: "update",
                            entry_id: element
                        },
                        success: function (returndata) {  // if the request was done with success
                            //
                            console.log(returndata);
                            $("#edit-email-help").text($.trim(returndata));
                        }
                    });
                
                }
                
                var newCatFile = $('#update-shop-image').prop('files');
                //const [newCatFile] = $("#").files;
                
                if (newCatFile[0]) {
                    var curFile = newCatFile[0];
                    fileUpload(curFile, element, "/assets/markets/");
                }

            });


            $("#add-shop").submit(function(e) {

                e.preventDefault();
                var form = $(this).serialize();
                //console.log(`add subcat submited, data: \n${form}`);

                $.ajax({   /// request update on the db
                    url: 'requests.php',
                    dataType: 'text',
                    type:'POST',
                    data: {
                        formData: form, 
                        table: "market",
                        type: "add"
                    },
                    success: function (returndata) {  // if the request was done with success
                    //
                    console.log(returndata);
                    $("#add-email-help").text($.trim(returndata));
                    }
                });

            });

            $(".delete-shop").click(function() {

                var subcatId = $(this).attr("data-cat-id");
                console.log(`should delete subcat with id: ${subcatId}`);

                $.ajax({   /// request update on the db
                    url: 'requests.php',
                    dataType: 'text',
                    type:'POST',
                    data: {
                        formData: null, 
                        table: "subcategories",
                        type: "delete",
                        entryId: subcatId
                    },
                    success: function (returndata) {  // if the request was done with success
                    //
                    console.log(returndata);                    
                    }
                });

            });

            $('body').on('change','input[id="update-shop-image"]',function()
            {
                console.log("changed input");
                const [file] = this.files;
                if (file) {
                    $("#shop-new-image").attr('src', URL.createObjectURL(file));
                }
            });


        </script>
        <!-- CHANGE FORM ID AND UPDATE PHP VAR FOR ID OF THE CURRENT SUBCAT THAT IS CHANGED -->
        
        <table id="admin-table" class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nume</th>
                <th scope="col">Adaugat (Persoana)</th>
                <th scope="col">Produse</th>
                <th scope="col">Imagine</th>
                <th scope="col">Setari Acces</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>

                <!-- magazin data -->

                <?php for ($i=0; $i < $rows; $i++): 
                    $shop = mysqli_fetch_assoc($magazine);?>
                    
                    <tr>
                        <th scope="row" data-id="<?php echo $shop['id'] ?>" ><?php echo $shop['id'] ?></th>
                        <td data-field='shop-name'> <?php echo $shop['market_name'] ?> </td>
                        <td data-field='owner-name'> <?php echo $shop['surname'] ?> <?php echo $shop['name'] ?> </td>
                        <td> 100 </td>
                        <td data-field="shop-banner" style="text-align: center;"> 
                            <img class="subcat-img" src="../assets/markets/<?php echo $shop['id'] ?>.png?t=<?php echo time(); ?>" style="max-height:6vh;cursor: zoom-in;" >
                        </td>
                        <td><button data-bs-toggle="modal" data-bs-target="#updateMag" class="btn btn-warning" data-shop-id="<?php echo $shop['id'] ?>"
                        onclick="setModalId('shops', this, $(this).attr('data-shop-id'))">Redacteaza</button></td>
                        <td><button class="delete-shop btn btn-danger" data-shop-id="<?php echo $shop['id'] ?>">Sterge</button></td>
                        <td></td>
                    </tr>
                
                <?php endfor ?>

                <!-- magazin data -->

            </tbody>
        </table>

        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addMag" style="margin: 1em 1em 1em 0em">Adauga magazin</button>

        <!-- Modal magazin -->
        <!-- ADD -->
        <div class="modal fade" id="addMag" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="shop-add-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMagLabel">Adauga Magazin Nou</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <form id="add-shop">

                        <div class="modal-body">

                            <!-- FIELDS -->
                            <div class="mb-3">
                                <label for="email-access" class="form-label">Email acces</label>
                                <input type="email" class="form-control" id="email-access" name="email-access" aria-describedby="email-help">
                                <div id="email-help" class="form-text"><span id="add-email-help">Email Persoanei care are acces la magazin.</span></div>
                            </div>

                            <div class="mb-3">
                                <label for="name-shop" class="form-label">Nume Magazin</label>
                                <input type="text" class="form-control" id="name-shop" name="name-shop" >
                            </div>

                            <label for="selectCategory" class="form-label">Categoria</label>
                            <div class="mb-3">
                                <select id="selected-cat" name="selected-cat" class="custom-select custom-select-lg mb-3" style="width: 100%; min-height: 50px;"
                                onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                    
                                    <!-- <option selected>Open this select menu</option> -->

                                    <?php 
                                        $categories = query("SELECT * FROM categories ORDER BY id");//id, category_name
                                        $rows = mysqli_num_rows($categories);
                                        for ($i=0; $i < $rows; $i++): 
                                        $cat = mysqli_fetch_assoc($categories);
                                    ?>
                                    
                                    <option value="<?php echo $cat['id'] ?>">  <?php echo $cat['category_name'] ?> </option>
                                    
                                    <?php endfor ?>
                                </select>
                            </div>

                            <!-- FIELDS -->

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                            <button type="submit" class="btn btn-primary">Salveaza</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
        <!-- ADD -->

        <!-- EDIT -->
        <div class="modal fade" id="updateMag" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="shop-edit-modal">

                    <form id="edit-shop">

                        <div class="modal-header">
                            <h5 class="modal-title" id="redactMagLabel">Redacteaza acces, magazin: <?php echo "Name Magazin"?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            <!-- FIELDS -->
                            <div class="mb-3">
                                <label for="cur-email" class="form-label">Email acces</label>
                                <input type="email" class="form-control" id="cur-email" name="cur-email" aria-describedby="edit-email-help">
                                <div class="form-text"><span id="edit-email-help">Email Persoanei care are acces la magazin.</span></div>
                            </div>

                            <div class="mb-3">
                                <label for="update-picture" class="form-label">Banner Magazin</label>
                                <div id="shop-edit-image" style="background: #dadada30; border: 2px solid #afaaaa59; text-align: center; margin-bottom: 10px;">
                                    <img id="current-shop-image" src="" alt="" style="max-width: 100%; padding: 1vh;">
                                </div>
                                <label for="update-picture" class="form-label">Imagine nouă</label>
                                <input id="update-shop-image" type="file" name="update-shop-image" class="form-control">
                                
                                <div id="shop-updated-image" style="background: #dadada30; border: 2px solid #afaaaa59; text-align: center; margin-bottom: 10px;">
                                    <img id="shop-new-image" src="" alt="" style="max-width: 100%; padding: 1vh;">
                                </div>
                                <div id="shop-help" class="form-text"></div>
                            </div>
                            <!-- FIELDS -->

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                            <button id="update-shop" data-shop-id="" type="submit" class=" btn btn-primary">Salveaza</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- EDIT -->
        <!-- Modals -->

        <?php
        break;
    
    default:
        # code...
        break;
}

?>