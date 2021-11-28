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

$table_id = $_GET['tbl_id'];


switch ($table_id) {
    case '0': // categorii - categories
        # code...
        $categories = query("SELECT * FROM categories ORDER BY id");//id, category_name
        $rows = mysqli_num_rows($categories);
        ?>               

        <table class="table table-hover">
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMagLabel">Adauga Categorie Nouă</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="catName" class="form-label">Nume Categorie</label>
                                <input type="text" class="form-control" id="catName" name="catName" aria-describedby="catHelp" placeholder="Denumirea Categoriei">
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
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="redactMagLabel">Redacteaza Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="catName" class="form-label">Nume Categorie</label>
                                <input type="text" class="form-control" id="catName" name="catName" aria-describedby="catHelp" placeholder="Denumirea Categoriei">
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
            // when update button is clicked, change modal id and send the id to php matching to the current category
            function setModalId(element, curId, parentId){ // element - button pressed, curID - current subcat id, parentId - category id
                $("#updateCat").attr("data-currentId", curId); // set the editing modal form id just in case
                console.log(curId);
                $("#updateSubcategory").attr("data-subcat-id", curId) // updating the save button's id matching the current subcategory thats edited
                var curName = $(element).closest("tr").find("td[data-field=subcategory_name]").text();
                $("#uSelectedCategory").val(parentId).change();
                $("#uNameSubCategory").val(curName);
                console.log(curName);
                // $.ajax({
                //     url: location.href,
                //     dataType: "text",
                //     type: "GET",
                //     data: {
                //         newCat: newId
                //     },
                //     success: function(returndata) {
                //         if (!$.trim(returndata)){  
                //             console.log("empty");
                //         } 
                //         else {
                //             //console.log(returndata);
                //         }
                //     }
                // });
            }
        
        </script>
        <!-- CHANGE FORM ID AND UPDATE PHP VAR FOR ID OF THE CURRENT SUBCAT THAT IS CHANGED -->


        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nume Subcategorie</th>
                <th scope="col">Nume Categorie</th>
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
                        <td><button data-parentCat="<?php echo $subcat['category_id'] ?>" data-catId="<?php echo $subcat['id'] ?>" data-bs-toggle="modal" data-bs-target="#updateCat" 
                        onclick="setModalId( this, $(this).attr('data-catId'), $(this).attr('data-parentCat') )" class="btn btn-warning">Redacteaza</button></td>
                        <td><button class="btn btn-danger">Sterge</button></td>
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMagLabel">Adauga Subcategorie Nouă</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="catName" class="form-label">Nume Subcategorie</label>
                                <input type="text" class="form-control" id="catName" name="catName" aria-describedby="catHelp" placeholder="Denumirea Subcategorie">
                                <div id="errMessage" class="form-text"></div>
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
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="redactMagLabel">Redacteaza Subcategoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form>

                        <div class="modal-body">


                            <div class="mb-3">
                                <label for="updateSubcategory" class="form-label">Denumirea Subcategoriei</label>
                                <input id="uNameSubCategory" type="text" name="catName" class="form-control" aria-describedby="subcategoryHelp" placeholder="Denumire subcategorie">
                                <div id="subcategoryHelp" class="form-text"></div>
                            </div>

                            <label for="selectCategory" class="form-label">Categoria</label>
                            <div class="mb-3">
                                <select id="uSelectedCategory" class="custom-select custom-select-lg mb-3" style="width: 100%; min-height: 50px;"
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


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                            <button id="updateSubcategory" data-subcat-id="" type="button" class="btn btn-primary">Salveaza</button>
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

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nume</th>
                <th scope="col">Adaugat (Persoana)</th>
                <th scope="col">Produse</th>
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
                        <td> <?php echo $shop['market_name'] ?> </td>
                        <td> <?php echo $shop['surname'] ?> <?php echo $shop['name'] ?> </td>
                        <td> 100 </td>
                        <td><button data-bs-toggle="modal" data-bs-target="#updateMag" class="btn btn-warning">Redacteaza</button></td>
                        <td><button class="btn btn-danger">Sterge</button></td>
                        <td></td>
                    </tr>
                
                <?php endfor ?>

                <!-- magazin data -->

            </tbody>
        </table>

        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addMag" style="margin: 1em 1em 1em 0em">Adauga magazin</button>

        <!-- Modal magazin -->
        <div class="modal fade" id="addMag" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMagLabel">Adauga Magazin Nou</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="accesEmail" class="form-label">Email acces</label>
                                <input type="email" class="form-control" id="accesEmail" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Email Persoanei care are acces la magazin.</div>
                            </div>
                            <div class="mb-3">
                                <label for="nameStore" class="form-label">Nume Magazin</label>
                                <input type="text" class="form-control" id="nameStore">
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

        <div class="modal fade" id="updateMag" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="redactMagLabel">Redacteaza acces, magazin: <?php echo "Name Magazin"?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="redactEmail" class="form-label">Email acces</label>
                                <input type="email" class="form-control" id="accesEmail" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Email Persoanei care are acces la magazin.</div>
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
    
    default:
        # code...
        break;
}

?>