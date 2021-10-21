<!DOCTYPE html>
<html lang="en">
<?php 
require_once("layouts/config.php");
?>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AARHAT iSERV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </meta>
    <meta name="title" content="Blogs on various topics including Digital Marketing,  Social Media Marketing etc. " />
    <meta name="description"
        content="AARHAT is a start-up company delivering secure, and robust SaaS software, website designing & ios/android app." />
    <meta name="keywords" content="Website Development SaaS Start-up Kit ios/android app" />
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- global css for all page -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/global.css">
    <!-- css for index page -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/vblog.css">
</head>

<body>

    <div class="main">
        <div id="top"></div>
        <div class="corner"></div>

        <!--    navigation start-->
        <!-- included nav -->
        <?php require_once 'layouts/navigation.php';?>


        <!-- included nav -->
        <!-- navigation ends here -->

        <!-- hero section vblog page -->
        <section id="hero">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/728x300.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/728x300.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/728x300.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <!-- hero section end -->
        <!-- add area -->
        <section id="addAra ">
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-12">
                        <div class="addArea">
                            <h1><?php 
                        //  session_start();
                            
                        ?></h1>
                            <span class="float-righ">Add Area</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- add area ENDS -->
        <!-- search section -->
        <section id="search">
            <div class="container">
                <div class="row my-5 px-0 ">
                    <div class="col-md-8">
                        <div class="row float-left py-1 mr-4 ">
                       
                            <?php  if(isset($_GET['slug'])): ?>
                            <a href="<?=ROOT_URL?>vblog" style="color: grey;">
                                Back
                            </a>
                            <?php endif; ?>
                            <!-- <span class={`${styles.filterIcon}  rounded-circle `}>
                        <i class={`fas fa-sort-amount-down `}></i>
                      </span>  -->
                        </div>
                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-md-3 pl-md-0">
                        <div class="searchBox">
                            <form class="form-inline my-2 my-lg-0">
                                <div class="input-group searchInput">
                                    <input class="form-control border-0 bg-transparent" type="search"
                                        placeholder="Search" aria-label="Search" />

                                    <div class="input-group-append ">
                                        <div class="input-group-text bg-transparent border-0" style="color: #4BD39C;">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- search section ends -->
        <!-- blog main -->
        <section id="blog-posts">
            <div class="container">
                <div class="row">
                <?php  if(isset($_GET['slug'])): ?>
                   
                    <div class="col-md-2"></div>
                    <div class="col-md-8" id="details">

                    <?php  else:?>

                        <div class="col-md-8" id="bposts">
                    <?php endif;?>
                        <?php 
            


             
                if(isset($_GET['slug'])){
                    require_once "layouts/config.php";
                    // Create connection
                    $servername = DB_HOST;
                    $username = DB_USER;
                    $password = DB_PASS;
                    $dbname = DB_NAME;
                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password,$dbname);
                    // Check connection
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }
                    $slug = $_GET['slug'];
                    // sql code for fetching blog articles 
                    $sql = "SELECT * from blog where slug_url='".$slug."'";
                    $result = mysqli_query($conn, $sql);
                    // print_r($_GET);
                    // Fetch all
                    $row = mysqli_fetch_assoc($result);
                    // print_r($row);
                    ?>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h3><?=$row['blog_title']?></h3>
                            <small class="text-secondary">Published on <?=$row['auto_createdOn']?></small>
                        </div>
                        <div class="col-md-12 pt-3">
                            <div><?=$row['blog_description']?></div>
                        </div>
                    </div>
                    <?php
                        }else {
                    ?>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">

                        <ul class="list-group py-3 list-group-flush bgCat">
                            <li class="list-group-item bgDDD">
                                Information Security
                            </li>
                            <li class="list-group-item bgDDD">SAAS</li>
                            <li class="list-group-item bgDDD">IT & Software</li>
                            <li class="list-group-item bgDDD">Marketing</li>
                            <li class="list-group-item bgDDD">Busniess</li>
                            <li class="list-group-item bgDDD">Design</li>
                            <li class="list-group-item bgDDD">Startup</li>
                        </ul>

                    </div>
                    <?php
                    
                    }
                    ?>
                </div>
            </div>
        </section>
        <!--footer section start from here-->
        <?php require_once("layouts/footer.php");?>
        <!--footer section end from here-->
    </div>







    <!-- boostrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <?php if(isset($_GET['slug'])): ?>
    <?php else:?>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url: "<?=ROOT_URL?>admin/api",
                method: "GET",
                success: (res) => {
                    let data = JSON.parse(res);
                    console.log(data);
                    let posts = [];
                    data.posts.forEach((data) => {
                        posts.push(`<div class="card mb-3 cardBorder">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?=ROOT_URL?>assets/images/blogCardImg.png" class="card-img" alt="Card image" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body pb-0">

                                        <a class="card-title h3" href="<?=ROOT_URL?>vblog/${data.title_slug}+" style="font-weight: bold;font-size: 22px;">
                                            ` + data.title + `
                                        </a>

                                        <!-- <p >{props.description}</p> -->
                                        <div>` + data.summary + `</div>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                    });
                    $("#bposts").html(posts);
                }
            });
        });
    </script>
    <?php endif;?>
</body>

</html>