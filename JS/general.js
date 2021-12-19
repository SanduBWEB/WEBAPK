// $(document).ready(function(){
//     $('.items').slick({
//         infinite: true,
//         lazyLoad: 'ondemand',
//         slidesToShow: 3,
//         slidesToScroll: 3
//     });
// });



$(document).ready(function(){

    // magazine.php
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
            url: "../MainAdmin/tableData.php",
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

    });

    $('body').on('keyup','#admin-search', function() {
        var rows = $("#admin-table tr"); // tr[data-type=active]
        ////var removeHead = $("#active-table tr[id=table-header]");
        var input = $(this).val().toUpperCase();
        //console.log(input);
        ////rows.splice(0,1);
        //console.log(rows);
    
        //if (table_id == 0 || table_id == 2 || table_id == 5 || table_id == 7) {
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
        // else if (table_id == 1 || table_id == 3 || table_id == 4) {
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
    // magazine.php

    //tableData.php > subcategorii - subcategories
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
            url: '../MainAdmin/requests.php',
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
            url: '../MainAdmin/requests.php',
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
            url: '../MainAdmin/requests.php',
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
            this.closest("tr").remove();
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
    //tableData.php > subcategorii - subcategories


    //tableData.php > magazine - market_data
    $("#edit-shop").submit(function(e) {

        e.preventDefault();
        var element = $("#update-shop").attr("data-shop-id"); // get id from the "save" button in the edit form
        
        if ($("#cur-email").val().length > 1 )
        {
            var form = $(this).serialize();
            console.log(`edit shop submited, data: \n${form}`);

            $.ajax({   /// request update on the db
                url: '../MainAdmin/requests.php',
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
            url: '../MainAdmin/requests.php',
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
            this.closest("tr").remove();                    
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
    //tableData.php > magazine - market_data


    //tableData.php > categorii - categories

    // $('.toggle-collapse').click( function(){  // if using  '() =>' or 'e =>' in function do e.target instead of this
    //     // $( $(this).attr("data-target") ).collapse('toggle');
    //     //console.log( $(this) );
    //     //console.log( $( $(this).attr("data-target") ) );
    //     $(this).toggleClass("btn-info")
    //     $( $(this).attr("data-target") ).toggleClass('show');
    //     console.log("collapsed");   
    // });

    //tableData.php > categorii - categories


    //product.php
    
    //product.php

});

