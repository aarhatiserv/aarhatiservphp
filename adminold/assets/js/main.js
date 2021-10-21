$(document).ready(function() {
    //Sign up for admin
    $("#signup-form").submit(function(event) {
        event.preventDefault();
        var formData = $("#signup-form").serialize();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: formData + "&action=register",
            success: function(data) {
                var response = JSON.parse(data);
                if (response.status == 1) {
                    swal("Success!", response.msg, "success");
                    $("#signup-form")[0].reset();
                } else {
                    swal("Oops!", response.msg, "error");
                }
            },
        });
    });
    //Sign In for admin
    $("#signin-form").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: $("#signin-form").serialize() + "&action=login",
            success: function(data) {
                if (data) {
                    $(location).attr("href", "blog.php");
                } else {
                    swal("Oops!", response.msg, "error");
                }
            },
        });
    });
    //ResetPassword for admin
    $("#forgot-pass-form").submit(function(event) {
        event.preventDefault();
        var formData = $("#forgot-pass-form").serialize();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: formData + "&action=resetPass",
            success: function(data) {
                if (data == "Message has been sent") {
                    swal("Success!", "Your Account is Saved", "success");
                } else {
                    swal("Oops!", data, "error");
                }
            },
        });
    });
////////////////////////////////////////////////Blog Begin//////////////////////////////////////////////////////////

    //adding blog for users by admin
    $("#form_data_clicked").on("click", function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var form = $('form.tagForm')[0]; //Use standard javascript object here
        var formData = new FormData(form);
        let userid = $("#getUserID").find(".user_id").val();

        formData.append('action', 'addBlogRecords');
        formData.append('user_id', userid);
        // Attach file
        formData.append('image', $('input[type=file]')[0].files[0]); 

        $.ajax({
            url: "action.php",
            method: "POST",
            data: formData,
            success: function(data) {
                if (data == 'success') {
                    swal("Success!", "Successfully Posted Blog", "success");
                    $("#myModal").modal("hide");
                    setInterval("location.reload()", 2000);
                } else {
                    swal("Oops!", data, "error");
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});


//This function is used for updating blog in modal....
// function updateBlog(id) {
//     $("#modalBox").modal("show");
//     $("#modalBox #editModalID").show();
//     $("#modalBox #viewModalID").hide();
//     $("#modalBox #editModalID #showLinkInput").hide();
//     $.ajax({
//         url: "action.php",
//         method: "GET",
//         data: "id=" + id + "&action=viewBlogRecords",
//         success: function(responseData) {
//             var response = JSON.parse(responseData);
//             $("#editModalID #showUpdateTitle").val(response.data.blog_title);
//             // $("#editModalID #showUpdateDescription").val(response.data.blog_description);
//             CKEDITOR.instances['showUpdateDescription'].setData(response.data.blog_description);
//             $("#editModalID #showUpdateCategory").val(response.data.blog_category);
//             $("#editModalID #showTagInput #tags").val(response.data.blog_tags);
//         },
//     });
//     $("#recordsUpdate").click(function(event) {
//         event.preventDefault();
//         for (instance in CKEDITOR.instances) {
//             CKEDITOR.instances[instance].updateElement();
//         }
//         var formData = $("form#editBlog-form").serialize();
//         formData = formData + "&id=" + id + "&action=updateBlogRecords";
//         console.log(formData);
//         $.ajax({
//             url: "action.php",
//             method: "POST",
//             data: formData,
//             success: function(data) {
//                 console.log(data);
//                 var response = JSON.parse(data);
//                 $("#modalBox").hide();
//                 //location.reload();
//                 if (response.status == 1) {
//                     swal("Success!", response.msg, "success");
//                     setInterval("location.reload()", 2000);
//                 } else {
//                     swal("Oops!", response.msg, "error");
//                 }
//             },
//         });
//     });
// }


////////////////////////////////////////////////Blog End////////////////////////////////////////////////////////////


///////////////////////////////////////////////Vlog Begin///////////////////////////////////////////////////////////
//adding vlog for users by admin
$("#vlog_data_clicked").on("click", function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = $("form.tagForm").serialize();
        let userid = $("#getUserID").find(".user_id").val();
        formData = formData + "&user_id=" + userid;
        $.ajax({
            url: "action.php",
            method: "POST",
            data: formData + "&action=addVlogRecords",
            success: function(data) {
                var response = JSON.parse(data);
                if (response.status == 1) {
                    swal("Success!", response.msg, "success");
                    $("#myModal").modal("hide");
                     setInterval('location.reload()', 2000);
                } else {
                    swal("Oops!", response.msg, "error");
                }
            },
        });
});

//This function is used for showing vlog records in modal....
function viewVlog(id) {
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=viewVlogRecords",
        success: function(responseData) {
            var response = JSON.parse(responseData);
            $("#modalBox").modal("show");
            $("#modalBox #editModalID").hide();
            $("#viewModalID #show_title").html(
                "<pre>" + response.data.vlog_title + "</pre>"
            );
            $("#viewModalID #show_description").html(response.data.vlog_description);
            $("#viewModalID #show_category").html(response.data.vlog_category);
            $("#viewModalID #show_tags").html(response.data.vlog_tags);
        },
    });
}

//This function is used for updating vlog in modal....
function updateVlog(id) {
    $("#modalBox").modal("show");
    $("#modalBox #editModalID").show();
    $("#modalBox #viewModalID").hide();
    $("#modalBox #editModalID #showTagInput").show();
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=viewVlogRecords",
        success: function(responseData) {
            var response = JSON.parse(responseData);
            $("#editModalID #showUpdateTitle").val(response.data.vlog_title);
            $("#editModalID #showUpdateDescription").val(response.data.vlog_description );
            $("#editModalID #showUpdateCategory").val(response.data.vlog_category);
            $("#editModalID #showTagInput #tags").val(response.data.vlog_tags);
            $("#editModalID #showLinkInput #links").val(response.data.vlog_links);
        },
    });
    
    $("#recordsUpdate").click(function(event) {
        event.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = $("form#editVlog-form").serialize();
        formData = formData + "&id=" + id + "&action=updateVlogRecords";
        $.ajax({
            url: "action.php",
            method: "GET",
            data: formData,
            success: function(data) {
                var response = JSON.parse(data);
                $("#modalBox").hide();
                if (response.status == 1) {
                    swal("Success!", response.msg, "success");
                    setInterval("location.reload()", 2000);
                } else {
                    swal("Oops!", response.msg, "error");
                }
            },
        });
    });
}

//This function is used for deleting vlog records in modal....
function deleteVlog(id) {
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=deleteVlogRecords",
        success: function(data) {
            var response = JSON.parse(data);
            if (response.status == 1) {
                swal("Success!", response.msg, "success");
                setInterval("location.reload()", 2000);
            } else {
                swal("Error!", response.msg, "error");
            }
        },
    });
}
////////////////////////////////////////////Vlog End////////////////////////////////////////////////////////////////


/////////////////////////////////////////////Category Begin ////////////////////////////////////////////////////////
//Database Table Name->Category

//adding Category for users by admin
$("#Category_data_clicked").on("click", function(e) {
        e.preventDefault();
        var formData = $("form.tagForm").serialize();
        let userid = $("#getUserID").find(".user_id").val();
        formData = formData + "&user_id=" + userid;
        $.ajax({
            url: "action.php",
            method: "POST",
            data: formData + "&action=addCategoryRecords",
            success: function(data) {
                var response = JSON.parse(data);
                if (response.status == 1) {
                    swal("Success!", response.msg, "success");
                    $("#myModal").modal("hide");
                     setInterval('location.reload()', 2000);
                } else {
                    swal("Oops!", response.msg, "error");
                }
            },
        });
});
//This function is used for showing Category records in modal....
function viewCategory(id) {
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=viewCategoryRecords",
        success: function(responseData) {
            var response = JSON.parse(responseData);
            $("#modalBox").modal("show");
            $("#modalBox #editModalID").hide();
            $("#viewModalID #show_category").html(response.data.category_name);
        },
    });
}
//This function is used for deleting Category records in modal....
function deleteCategory(id){
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=deleteCategoryRecords",
        success: function(data) {
            var response = JSON.parse(data);
            if (response.status == 1) {
                swal("Success!", response.msg, "success");
                setInterval("location.reload()", 2000);
            } else {
                swal("Error!", response.msg, "error");
            }
        },
    });
}

//This function is used for updating Category in modal....
function updateCategory(id) {
    $("#modalBox").modal("show");
    $("#modalBox #editModalID").show();
    $("#modalBox #viewModalID").hide();
    $("#modalBox #editModalID #showTagInput").show();
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=viewCategoryRecords",
        success: function(responseData) {
            var response = JSON.parse(responseData);
            $("#editModalID #showUpdateCategory").val(response.data.category_name);

        },
    });
    $("#recordsUpdate").click(function(event) {
        event.preventDefault();
        var formData = $("form#editCategory-form").serialize();
        formData = formData + "&id=" + id + "&action=updateCategoryRecords";
        $.ajax({
            url: "action.php",
            method: "GET",
            data: formData,
            success: function(data) {
                var response = JSON.parse(data);
                $("#modalBox").hide();
                if (response.status == 1) {
                    swal("Success!", response.msg, "success");
                    setInterval("location.reload()", 2000);
                } else {
                    swal("Oops!", response.msg, "error");
                }
            },
        });
    });
}
/////////////////////////////////////////////Category End///////////////////////////////////////////////////////////


////////////////////////////////////////////Portfolio Begin////////////////////////////////////////////////////////

 //adding Portfolio submenu for users by admin
 $("#Portfolio_submenu_clicked").on("click", function(e) {
    e.preventDefault();
  var formData = $("form.tagForm").serialize();
    $.ajax({
        url: "action.php",
        method: "POST",
        data: formData  + "&action=addPortfolioSubmenuRecords",
        success: function(data) {
            var response = JSON.parse(data);
            console.log(response);
            if (response.status == 1) {
                swal("Success!", response.msg, "success");
                setInterval("location.reload()", 2000);
            } else {
                swal("Error!", response.msg, "error");
            }

        }
    });
});


// Add the following code if you want the name of the file appear on select
  $('select#parent_id').on('change', function() {
    var parent_id = $("#parent_id").val();
    $.ajax({
        url: "action.php",
        method: "GET",
        data:  "parent_id=" + parent_id + "&action=viewPortfolioList",
        success: function(dataResponse) {
            var response = JSON.parse(dataResponse);
            $('select#submenuName').empty();
            if(response.status == 1){
                var arrayData = response.msg;
                for(i in arrayData){
                    $('select#submenuName').append('<option value = '+arrayData[i].submenu_name+'>'+arrayData[i].submenu_name+'</option>');
                }
            }else{
                $('select#submenuName').append('<option selected="true" disabled="disabled" >No data found!</option>');
            }
        },
    });
});

//adding Portfolio submenu data for users by admin
$("#Portfolio_submenuData_clicked").on("click", function(e) {
    e.preventDefault();
  var formData = $("form.tag_Form").serialize();
  var file_data = $('#upload_image').prop('files')[0];

    $.ajax({
        url: "action.php",
        method: "POST",
        data: formData + "&upload_image=" + file_data.name + "&action=addPortfolioSubmenuDataRecords",
        success: function(data) {
            console.log(data);
            var response = JSON.parse(data);
            console.log(response);
            if (response.status == 1) {
                swal("Success!", response.msg, "success");
                setInterval("location.reload()", 2000);
            } else {
                swal("Error!", response.msg, "error");
            }
        }
    });
});

//This is used for showing image name in input field...
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

//This function is used for showing Portfolio records in modal....
function viewPortfolio(id) {
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=viewPortfolioRecords",
        success: function(responseData) {
            var response = JSON.parse(responseData);
            $("#modalBox").modal("show");
            $("#modalBox #editModalID").hide();
            $("#viewModalID #menu_id").html(response.data.menu_id);
            $("#viewModalID #submenu").html(response.data.submenu_name);
            $("#viewModalID #title").html(response.data.title);
            $("#viewModalID #image").html(response.data.images);
            $("#viewModalID #link").html(response.data.link);
        },
    });
}
//This function is used for deleting Portfolio records in modal....
function deletePortfolio(id){
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=deletePortfolioRecords",
        success: function(data) {
            var response = JSON.parse(data);
            if (response.status == 1) {
                swal("Success!", response.msg, "success");
                setInterval("location.reload()", 2000);
            } else {
                swal("Error!", response.msg, "error");
            }
        },
    });
}


//This function is used for updating Portfolio submenu in modal....
function updatePortfolio(id) {
    $("#modalBox").modal("show");
    $("#modalBox #editModalID").show();
    $("#modalBox #viewModalID").hide();
    $("#modalBox #editModalID #showTagInput").show();
    $.ajax({
        url: "action.php",
        method: "GET",
        data: "id=" + id + "&action=viewPortfolioRecords",
        success: function(responseData) {
            var response = JSON.parse(responseData);
            $("#editModalID #showUpdatesubmenu").val(response.data.submenu_name);
            $("#editModalID #showUpdatetitle").val(response.data.title);
            $("#editModalID #showUpdatelink").val(response.data.link);
        }
    });
    $("#recordsUpdate").click(function(event){
        event.preventDefault();
        var formData = $("form#editPortfolio-form").serialize();
        console.log(formData);
        var file_data = $('#showUpdateimage').prop('files')[0];
        $.ajax({
            url: "action.php",
            method: "GET",
            data:formData + "&id=" + id  + "&upload_image=" + file_data.name + "&action=updatePortfolioRecords",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                $("#modalBox").hide();
                if (response.status == 1) {
                    swal("Success!", response.msg, "success");
                    setInterval("location.reload()", 2000);
                } else {
                    swal("Oops!", response.msg, "error");
                }
            },
        });
    });
}
////////////////////////////////////////////////Portfolio End///////////////////////////////////////////////////////


