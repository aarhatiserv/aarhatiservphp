<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['email'])) {
    header("Location:index.php");
}
$_SESSION['email'];
require 'classes/Portfolio.php';
$objUser = new PortfolioSubmenuData();
$portfolioData = $objUser->getPortfolioData();

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
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class=" col-md-6 d-flex justify-content-end align-items-center">
                            <p class="text-right"> Hello, <strong> <?php echo $_SESSION['email']; ?></strong>
                            </p>
                            <a href='logout.php' class="btn btn-primary float-right mb-2 ml-2" role="button"><i class="fas fa-sign-out-alt"></i></a>
                        </div>


                    </div>
                    <div class="row d-flex">

                        <!-- buttom for adding Portfolio-->
                        <button type="button" class="btn btn-primary my-3 ml-3" data-toggle="modal" data-target="#myMenuModal"><i class="fas fa-plus"></i> Menu</button>

                        <!-- buttom for adding Portfolio-->
                        <button type="button" class="btn btn-primary my-3 ml-2" data-toggle="modal" data-target="#mySubmenuModal"><i class="fas fa-plus"></i> Portfolio</button>

                    </div>
                    <div class="row">

                        <!--Table Create for adding Portfolio-->
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu Id</th>
                                        <th scope="col">Submenu</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($portfolioData as $row) { ?>
                                        <tr>
                                            <td> <?php echo $i ?></td>
                                            <td><?php echo $row['parent_id'] ?></td>
                                            <td><?php echo $row['submenu_name'] ?></td>
                                            <td> <?php echo $row['title'] ?> </td>
                                            <td>
                                                <img src="assets/images/<?php echo $row['images'] ?>">
                                            </td>
                                            <td><a href="<?php echo $row['link'] ?>"> Please Visit this URL </a></td>

                                            <?php $i++; ?>
                                            <td id="viewId">
                                                <button onclick="viewPortfolio(<?php echo $row['id'] ?>)" class="btn  showID"><i class="far fa-eye" style=' font-size:20px;color:#FFC600'></i></button>
                                                <button onclick="updatePortfolio(<?php echo $row['id'] ?>,)" class="btn"><i class='fas fa-pen' style='font-size:20px;color:#0892A5'></i></button>
                                                <button onclick="deletePortfolio(<?php echo $row['id'] ?>)" class="btn"><i class="fas fa-trash" style='font-size:20px;color:red'></i></button>
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

    <!-- Modal box for adding Portfolio Submenu-->
    <div class="modal fade" id="myMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="" id="addPortfolio" class="tagForm" enctype="multipart/form-data">
                        <label for="portfolio" class="col-form-label">Portfolio</label>
                        <select name="submenuParentId" class="form-control" id="submenuParentId" required>
                            <option value="1">Logo</option>
                            <option value="2">Branding</option>
                            <option value="3">UI/UX</option>
                            <option value="4">Motion Design</option>
                            <option value="5">Layout Design</option>
                            <option value="6">Our Projects</option>
                        </select>
                        <br>

                        <label for="sel1">Submenu</label>
                        <input class="form-control" id="submenu" name="submenu" required></input>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addPortfolioMenu" id="Portfolio_submenu_clicked">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal box for adding Portfolio submenu data -->
    <div class="modal fade" id="mySubmenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Portfolio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="" id="addPortfolio" class="tag_Form" enctype="multipart/form-data">
                        <label for="portfolio" class="col-form-label">Portfolio</label>
                        <select name="parent_id" class="form-control" id="parent_id" required>
                            <option value="1">Logo</option>
                            <option value="2">Branding</option>
                            <option value="3">UI/UX</option>
                            <option value="4">Motion Design</option>
                            <option value="5">Layout Design</option>
                            <option value="6">Our Projects</option>
                        </select>

                        <label for="sel1">Submenu</label>
                        <select class="form-control" id="submenuName" name="submenuName" required></select>

                        <label for="title-name" class="col-form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>

                        <label for="upload-image" class="col-form-label">Upload Image</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="upload_image" name="upload_image" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <label for="link" class="col-form-label">Link</label>
                        <input type="text" class="form-control" name="link" id="link" required>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addPortfolioSubmenu" id="Portfolio_submenuData_clicked">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!--modal for edit and view in Portfolio-->
    <div class="modal" id="modalBox" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Portfolio Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--view model of Portfolio-->
                <div class="modal-body" id="viewModalID">
                    <p id="menu_id"></p>
                    <h3 id="submenu"></h3>
                    <p id="menu_id"></p>
                    <p id="title"></p>
                    <div id="image"></div>
                    <div id="link"></div>
                </div>
                <!-- edit model of Portfolio -->
                <div class="modal-body" id="editModalID">
                    <form action="" class="form-horizontal" id="editPortfolio-form">
                        <label for="sel1">Submenu</label>
                        <input class="form-control" id="showUpdatesubmenu" name="submenu" required></input>
                        <label for="title-name" class="col-form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="showUpdatetitle" required>
                        <label for="upload-image" class="col-form-label">Upload Image</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="showUpdateimage" name="upload_image" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <label for="Links" class="col-form-label">Link</label>
                        <input type="text" class="form-control" id="showUpdatelink" name="link" required>
                    </form>
                    <br>
                    <button value="Update" id="recordsUpdate" class="btn btn-primary">Update
                        Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- js started -->
    <?php include('layout/scripts.php'); ?>
    <!-- js ends here -->

</body>

</html>