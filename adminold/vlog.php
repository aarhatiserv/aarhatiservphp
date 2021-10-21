<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}
$_SESSION['email'];
require 'classes/Users.php';
require 'classes/Vlog.php';
require 'classes/Category.php';
$objUser = new Users();
$objUser->setEmail($_SESSION['email']);
$userData = $objUser->getUserIDByEmail();
$objUser = new Category();
$categoryData = $objUser->getCategoryDataByUserId($userData);
$objUser = new Vlog();
$vlogData = $objUser->getVlogData($userData);



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
                        <div class="col-md-6 ">
                            <!-- buttom for adding vlog-->
                            <button type="button" class="btn btn-primary my-3" data-toggle="modal"
                                data-target="#myModal"><i class="fas fa-plus"></i> Videos </button>
                        </div>
                    </div>
                    <div class="row">

                        <!--Table Create for adding vlog-->
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Tags</th>
                                        <th scope="col">YouTube Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($vlogData as $row) { ?>
                                    <tr>
                                        <td> <?php echo $i ?></td>
                                        <td> <?php echo $row['vlog_title'] ?> </td>
                                        <td><?php echo $row['vlog_description'] ?></td>
                                        <td><?php echo $row['vlog_category'] ?></td>
                                        <td><?php echo $row['vlog_tags'] ?></td>
                                        <td><a href="<?php echo $row['vlog_links'] ?>"> Please Visit this URL </a></td>
                                        <?php $i++; ?>
                                        <td id="viewId">
                                            <button onclick="viewVlog(<?php echo $row['id'] ?>)" class="btn  showID"><i
                                                    class="far fa-eye"
                                                    style='font-size:20px;color:#FFC600'></i></button>
                                            <button onclick="updateVlog(<?php echo $row['id'] ?>,)" class="btn"><i
                                                    class='fas fa-pen'
                                                    style='font-size:20px;color:#0892A5'></i></button>
                                            <button onclick="deleteVlog(<?php echo $row['id'] ?>)" class="btn"><i
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



    <!-- Modal box for adding vlog -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Videos
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="addVlog" class="tagForm">
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
                            <label for="sel1">Category</label>
                            <select class="form-control" id="category" name="category">
                                <?php

                                foreach ($categoryData as $c) {
                                    echo "<option value=\"{$c['category_name']}\">{$c['category_name']}</option>";
                                }
                                ?>
                            </select>
                            <label for="Tags" class="col-form-label">Tags</label>
                            <input type="text" class="form-control" name="tags" id="tags" required>

                            <div id="submitVlog">
                                <label for="Tags" class="col-form-label">YouTube Link</label>
                                <input type="text" class="form-control" name="links" id="links" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="submitVlog">
                        <button type="submit" class="btn btn-primary" name="addVlog" id="vlog_data_clicked">Add
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--modal for edit and view in  vlog-->
    <div class="modal" id="modalBox" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Videos Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- view model in vlog -->
                <div class="modal-body" id="viewModalID">
                    <h2 id="show_title" class="m-0"></h2>
                    <P id="show_description"></P>
                    <P id="show_category"></P>
                    <p id="show_tags"></p>
                </div>
                <!-- edit model in vlog -->
                <div class="modal-body" id="editModalID">
                    <form action="" class="form-horizontal" id="editVlog-form">
                        <div class="form-group">
                            <label for="Title-name" class="col-form-label">Title</label>
                            <input id="showUpdateTitle" type="text" class="form-control" name="title" required>
                            <label for="Description-text" class="col-form-label">Description</label>
                            <textarea type="text" class="form-control" id="showUpdateDescription"
                                name="update_description" required></textarea>
                            <label for="Category-text" class="col-form-label">Category</label>
                            <input type="text" class="form-control" name="category" id="showUpdateCategory" required>

                            <div id="showTagInput">
                                <label for="Tags" class="col-form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" required>
                            </div>
                            <div id="showLinkInput">
                                <label for="Links" class="col-form-label">Links</label>
                                <input type="text" class="form-control" id="links" name="links" required>
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
    <!-- js ends here -->

    <!--using ckeditor-->
    <script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('update_description');
    </script>

</body>

</html>