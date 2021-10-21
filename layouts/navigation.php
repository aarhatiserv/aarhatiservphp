<?php require_once("config.php")?>

<div class="container">
            <nav class="navbar mt-4 navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="<?=ROOT_URL?>">
                    <img src="<?=ROOT_URL?>assets/images/aarhat_logo.png" alt="Aarhat Logo" height="50" />
                </a>
                <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            aria-label="Toggle navigation"
            data-target="#navbarSupportedContent"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">

                            <a href="<?=ROOT_URL?>about-us" class="nav-link mt-2 mr-5">About Us </a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mt-2 mr-5 dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>

                            <div class='dropdown-menu text-center dmenu' aria-labelledby="navbarDropdown">

                                <a href="<?=ROOT_URL?>saas" class="dropdown-item py-2">SAAS</a>



                                <a href="<?=ROOT_URL?>cyber-security" class="dropdown-item py-2">Cyber Security</a>


                                <a href="<?=ROOT_URL?>graphic-design" class="dropdown-item py-2">Graphic Design</a>


                                <a href="<?=ROOT_URL?>digital-marketing" class="dropdown-item py-2">Digital Marketing</a>



                                <a href="<?=ROOT_URL?>appdevelopment" class="dropdown-item py-2">App Development</a>


                                <a href="<?=ROOT_URL?>web-development" class="dropdown-item py-2">Web Development</a>

                            </div>
                        </li>
                        <li class="nav-item">

                            <a href="<?=ROOT_URL?>portfolio" class="nav-link mt-2 mr-5">Portfolio</a>

                        </li>
                        <li class="nav-item">

                            <a href="<?=ROOT_URL?>vblog" class="nav-link mt-2 mr-5">V-Blog </a>

                        </li>
                        <!--<li class="nav-link">

                            <a href="<?=ROOT_URL?>templates" class="btn btn-primary  aBtn">Templates</a>

                        </li>-->
                    </ul>
                </div>
            </nav>
        </div>