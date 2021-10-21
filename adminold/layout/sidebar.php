<!DOCTYPE html>
<html lang="en">

<head>
    <title> welcome to ADMIN PANEL</title>

    <!-- custom css-->
    <link href="<?= $base_url ?>assets\css\sidenav.css" rel="stylesheet">


</head>

<body>


    <!-- Sidebar -->
    <ul class="navbar-nav sidenav">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center text-decoration-none justify-content-center pt-5"
            href="index.php">
            <div class="sidebar-brand-icon">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3 font-weight-bold">SB Admin</div>

        </a>

        <!-- Divider -->
        <div>
            <hr>
        </div>


        <!-- Nav Item - Dashboard -->
        <li class=" nav-item active pl-3">
            <a class="nav-link sideIcons" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <div>
            <hr>
        </div>
        <!-- Heading -->
        <div class="sidebar-heading pl-3">
            Interface
        </div>

        <!-- Nav Item - Category Collapse Menu -->
        <li class="nav-item  pl-3">
            <a class="nav-link collapsed sideIcons" href="category.php"  >
                <i class="fas fa-fw fa-cog"></i>
                <span>Category</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="cards.html">Cards</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Vlog Collapse Menu -->
        <li class="nav-item  pl-3">
            <a class="nav-link sideIcons" data-toggle="collapse" href="#Vlog"  type="button">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Vlog</span>

            </a>
            <!--
            <div id="Vlog" class="collapse-inner collapse pr-3">
                <div class=" bg-white py-2 rounded" id="Vlog" class="collapse-inner collapse pr-3">
                    <h6 class="collapse-header">Custom Vlogs:</h6>
                    <a class="collapse-item d-block" href="utilities-color.html">Information Security</a>
                    <a class="collapse-item d-block" href="utilities-border.html">SAAS</a>
                    <a class="collapse-item d-block" href="#">IT & Software</a>
                    <a class="collapse-item d-block" href="utilities-other.html">Marketing</a>
                    <a class="collapse-item d-block" href="utilities-other.html">Busniess</a>
                    <a class="collapse-item d-block" href="utilities-other.html">Design</a>
                    <a class="collapse-item d-block" href="utilities-other.html">Startup</a>
                </div>
            </div>-->
        </li>



        <!-- Nav Item -Blog Collapse Menu -->
        <li class="nav-item  pl-3">
            <a class="nav-link collapsed sideIcons" href="blog.php" >
                <i class="fas fa-fw fa-wrench"></i>
                <span>Blog</span>
            </a>
            
        </li>
         <!-- Nav Item -Blog Collapse Menu -->
         <li class="nav-item  pl-3">
            <a class="nav-link collapsed sideIcons" href="#" >
                <i class="fas fa-fw fa-wrench"></i>
                <span>Portfolio</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <div>
            <hr>
        </div>


    </ul>
    <!-- End of Sidebar -->





</body>

</html>