<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}
$_SESSION['email'];
require 'classes/Users.php';
require 'classes/Category.php';
$objUser = new Users();
$objUser->setEmail($_SESSION['email']);
$userData = $objUser->getUserIDByEmail();
$objUser = new Category();
$categoryData = $objUser->getCategoryDataByUserId($userData);
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
                            <p class="text-right"> Hello, <strong> <?php echo $_SESSION['email']; ?></strong></p>
                            <a href='logout.php' class="btn btn-primary float-right mb-2 ml-2" role="button"><i
                                    class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <!-- buttom for adding Category-->
                            <button type="button" class="btn btn-primary my-3" data-toggle="modal"
                                data-target="#myModal"><i class="fas fa-plus"></i> Category</button>
                        </div>
                    </div>
                    <div class="row">
                        <!--Table Create for adding Category-->
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">Category</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($categoryData as $row) { ?>
                                    <tr>
                                        <td> <?php echo $i ?></td>

                                        <td><?php echo $row['category_name'] ?></td>

                                        <?php $i++; ?>
                                        <td id="viewId">
                                            <button onclick="viewCategory(<?php echo $row['id'] ?>)"
                                                class="btn  showID"><i class="far fa-eye"
                                                    style='font-size:20px;color:#FFC600'></i></button>
                                            <button onclick="updateCategory(<?php echo $row['id'] ?>,)" class="btn"><i
                                                    class='fas fa-pen'
                                                    style='font-size:20px;color:#0892A5'></i></button>
                                            <button onclick="deleteCategory(<?php echo $row['id'] ?>)" class="btn"><i
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
    <!-- Modal box for adding Category-->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="getUserID">
                        <input class="user_id" type="hidden" id="user_id" value="<?php echo $userData ?>"
                            required></input>
                    </div>
                    <form action="" method="POST" id="addCategory" class="tagForm">
                        <div class="form-group">
                            <label for="Category-text" class="col-form-label">Category</label>
                            <input class="form-control" name="category" id="category" required></input>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="submitCategory">
                        <button type="submit" class="btn btn-primary" name="addCategory" id="Category_data_clicked">Add
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--modal for edit and view in Category-->
    <div class="modal" id="modalBox" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- view model of Category -->
                <div class="modal-body" id="viewModalID">
                    <P id="show_category"></P>
                </div>
                <!-- edit model of Category -->
                <div class="modal-body" id="editModalID">
                    <form action="" class="form-horizontal" id="editCategory-form">
                        <div class="form-group">
                            <label for="Category-text" class="col-form-label">Category</label>
                            <input type="text" class="form-control" name="category" id="showUpdateCategory" required>
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
</body>

</html>