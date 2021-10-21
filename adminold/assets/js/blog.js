$(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#display_pic').removeAttr('hidden');
            reader.onload = function (e) {
                $('#display_pic').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Preview Image
    $("#image").on('change',function(){
        readURL(this);
    });

    // This function is used for deleting blog in modal....
    $('body').on('click','.deleteBlog',function(){
        var id = $(this)[0].id;
        // alert(id);
        $.ajax({
            url: "action.php",
            method: "GET",
            data: "id=" + id + "&action=deleteBlogRecords",
            success: function(data) {
                if (data == 'success') {
                    swal("Success!", "Blog deleted", "success");
                    setInterval("location.reload()", 2000);
                } else {
                    swal("Error!", data, "error");
                }
            },
        });
    });


    //This function is used for showing blog in modal..
    $('body').on('click','.viewBlog',function(){
        var id = $(this)[0].id;
        // alert(id);
        $.ajax({
            url: "action.php",
            method: "GET",
            data: "id=" + id + "&action=viewBlogRecords",
            success: function(responseData) {
                var response = JSON.parse(responseData);
                $("#modalBox").modal("show");
                $("#modalBox #editModalID").hide();
                $("#viewModalID #show_title").html(response.data.blog_title);
                $("#viewModalID #show_description").html(response.data.blog_description);
                $("#viewModalID #show_category").html(response.data.blog_category);
                $("#viewModalID #show_tags").html(response.data.blog_tags);
            },
        });
    });


    $('body').on('click','.editBlog',function(){
        var id = $(this)[0].id;

        $("#modalBox").modal("show");
        $("#modalBox #editModalID").show();
        $("#modalBox #viewModalID").hide();
        $("#modalBox #editModalID #showLinkInput").hide();
        $.ajax({
            url: "action.php",
            method: "GET",
            data: "id=" + id + "&action=viewBlogRecords",
            success: function(responseData) {
                var response = JSON.parse(responseData);
                var image = "./assets/images/blog_post/"+response.data.blog_image;
                $("#editModalID #showUpdateTitle").val(response.data.blog_title);
                // $("#editModalID #showUpdateDescription").val(response.data.blog_description);
                CKEDITOR.instances['showUpdateDescription'].setData(response.data.blog_description);
                $("#editModalID #showUpdateCategory").val(response.data.blog_category);
                $("#editModalID #showTagInput #tags").val(response.data.blog_tags);
                $("#editModalID #display_pic").attr('src',image);
            },
        });
        $("#recordsUpdate").click(function(event) {
            event.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            // var formData = $("form#editBlog-form").serialize();
            // formData.append('image', $('input[type=file]')[0].files[0]); 
            // formData = formData + "&id=" + id + "&action=updateBlogRecords";
            // console.log(formData);
            var form = $('form#editBlog-form')[0]; //Use standard javascript object here
            var formData = new FormData(form);

            formData.append('action', 'updateBlogRecords');
            formData.append('id', id);
            // Attach file
            formData.append('image', $('input[type=file]')[0].files[0]); 

            $.ajax({
                url: "action.php",
                method: "POST",
                data: formData,
                success: function(data) {
                    // console.log(data);
                    // var response = JSON.parse(data);
                    $("#modalBox").hide();
                    //location.reload();
                    if (data == 'success') {
                        swal("Success!", "Successfully updated", "success");
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

});