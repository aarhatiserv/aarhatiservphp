<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}
/*
$_SESSION['email'];
spl_autoload_register(function($class_name){
    include $class_name.'.php';
});*/
require 'classes/Users.php';
require 'classes/Blog.php';
require 'classes/Category.php';
$objUser = new Users();
$objUser->setEmail($_SESSION['email']);
$userData = $objUser->getUserIDByEmail();
$objUser = new Category();
$categoryData = $objUser->getCategoryDataByUserId($userData);
$objUser = new Blog();
$blogData = $objUser->getBlogDataByuserId($userData);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> welcome to ADMIN PANEL</title>
    <!-- style started -->
    <?php include('layout/style.php'); ?>
    <!-- style ends here -->

    <!-- custom css-->
    <link href="<?= $base_url ?>" rel="stylesheet">


</head>

<body>

    <!--content part begin-->
    <section>
        <div class="container-fluid bg-light">
            <div class="row">
                <div class="col-md-2 p-0">
                    <!-- sidebard strated -->
                    <?php include('layout/sidebar.php') ?>
                    <!-- sidebard ended here-->
                    <div class="col-md-9">
                        <div class="row">

                        </div>


                        <div class="row">


                        </div>

                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row shadow-sm py-4">
                        <div class="col-md-6">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i
                                        class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class=" col-md-6 d-flex justify-content-end align-items-center">
                            <p class="text-right"> Hello, <strong> <?php echo $_SESSION['email']; ?></strong>
                            </p>
                            <a href='logout.php' class="btn btn-primary float-right mb-2 ml-2" role="button"><i
                                    class="fas fa-sign-out-alt"></i></a>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- buttom for adding blog-->
                            <button type="button" class="btn btn-primary  my-3 float-left" data-toggle="modal"
                                data-target="#myModal"><i class="fas fa-plus"></i>
                                Articles</button>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!--Table Create for adding blog-->
                            <table class="table table-striped table-bordered " id="table-data">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Tags</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($blogData as $row) { ?>
                                    <tr>
                                        <td> <?php echo $i ?></td>
                                        <td> <?php echo $row['blog_title'] ?> </td>
                                        <td><?php echo substr($row['blog_description'], 0,25); ?></td>
                                        <td><?php echo $row['blog_category'] ?></td>
                                        <td><?php echo $row['blog_tags'] ?></td>
                                        <?php $i++; ?>
                                        <td id="viewId">
                                            <button class="btn showID viewBlog" id="<?= $row['id']; ?>"><i
                                                    class="far fa-eye"
                                                    style='font-size:20px;color:#FFC600'></i></button>
                                            <button class="btn editBlog" id="<?= $row['id']; ?>"><i
                                                    class='fas fa-pen'
                                                    style='font-size:20px;color:#0892A5'></i></button>
                                            <button class="btn deleteBlog" id="<?= $row['id']; ?>"><i
                                                    class="fas fa-trash" style='font-size:20px;color:red'></i></button>

                                        </td>
                                    </tr>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!--pagination part begin-->

                    <div class="row">
                        <nav class="container d-flex justify-content-center" aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" id="1" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" id="2" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" id="3" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--pagination part end-->
                </div>
            </div>
    </section>
    <!--content part end-->


    <!-- Modal box for adding blog -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Articles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="addBlog" class="tagForm">
                        <div class="form-group">
                            <label for="Title-name" class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                            <label for="User-Id" class="col-form-label d-none">User Id</label>
                            <div id="getUserID">
                                <input class="user_id" type="hidden" id="user_id" value="<?php echo $userData ?>"
                                    required></input>
                            </div>
                            <label for="Description-text" class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>

                            <div class="row">
                                <div class="col-md-6 mt-1">
                                    <label for="sel1">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <?php
                                        foreach ($categoryData as $c) {
                                            echo "<option value=\"{$c['category_name']}\">{$c['category_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="Tags" class="col-form-label">Tags</label>
                                    <input type="text" class="form-control" name="tags" id="tags" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-n2">
                            <!-- Start image file manual upload -->
                            <label for="image" class="col-form-label">Blog Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                            <!-- Preview Image -->
                            <img src="" id="display_pic" height="250px" width="250px" hidden>
                            <!-- End image file manual upload -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="submitBlog">
                        <button type="submit" class="btn btn-primary" name="addBlog" id="form_data_clicked">Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modal for edit and view in blog-->
    <div class="modal" id="modalBox" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Articles Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- view model in blog -->
                <div class="modal-body" id="viewModalID">
                    <h2 id="show_title" class="m-0"></h2>
                    <p id="show_description"></p>
                    <P id="show_category"></P>
                    <p id="show_tags"></p>
                </div>
                <!-- edit model in blog -->
                <div class="modal-body" id="editModalID">
                    <form action="" class="form-horizontal" id="editBlog-form">
                        <div class="form-group">
                            <label for="Title-name" class="col-form-label">Title</label>
                            <input id="showUpdateTitle" type="text" class="form-control" name="title" required>
                            <label for="Description-text" class="col-form-label">Description</label>
                            <textarea type="text" class="form-control" id="showUpdateDescription"
                                name="update_description" required></textarea>

                            <div class="row">
                                <div class="col-md-6 mt-1">
                                    <label for="Category-text" class="col-form-label">Category</label>
                                    <select class="form-control" id="showUpdateCategory" name="category">
                                        <?php
                                        foreach ($categoryData as $c) {
                                            echo "<option value=\"{$c['category_name']}\">{$c['category_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div id="showTagInput">
                                        <label for="Tags" class="col-form-label">Tags</label>
                                        <input type="text" class="form-control" id="tags" name="tags" required>
                                    </div>
                                </div>
                            </div>
                            <div id="showLinkInput">
                                <label for="Links" class="col-form-label">Links</label>
                                <input type="text" class="form-control" id="links" name="links" required>
                            </div>
                            <div class="form-group mt-n2">
                                <!-- Start image file manual upload -->
                                <label for="image" class="col-form-label">Blog Image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                                <!-- Preview Image -->
                                <img src="" id="display_pic" height="250px" width="250px">
                                <!-- End image file manual upload -->
                            </div>
                        </div>
                    </form>
                    <button value="Update" id="recordsUpdate" class="btn btn-primary">Update Data</button>
                </div>
                <br>
            </div>
        </div>
    </div>

    <!-- js started -->
    <?php include('layout/scripts.php'); ?>
    <script src="./assets/js/blog.js"></script>
    <!-- js ends here -->

    <!--using ckeditor-->
    <script>
    CKEDITOR.replace('description',{
        filebrowserUploadUrl: 'upload.php'
    });
    CKEDITOR.replace('showUpdateDescription');
    </script>
</body>

</html>