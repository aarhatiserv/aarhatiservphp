<!DOCTYPE html>
<html lang="en">
<?php require_once("layouts/config.php");?>
  <head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="favicon.ico" />
    <title>AARHAT iSERV | SAAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="title"
      content="AARHAT iSERV- SaaS Software | Website Development Company | Start-up Kit "
    />
    <meta
      name="description"
      content="AARHAT is a start-up company delivering secure, and robust SaaS software, website designing & ios/android app."
    />
    <meta
      name="keywords"
      content="Website Development SaaS Start-up Kit ios/android app"
    />
    <!-- bootstrap cdn -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    />
    <!-- fontawesome cdn -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- global css for all page -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/global.css" />
    <!-- saas page css -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/saas.css" />
  </head>

  <body>
    <div class="main">
      <div id="top"></div>
      <div class="corner"></div>
      <!--    navigation start-->
      <!-- included nav -->
      <?php include('layouts/navigation.php') ?>
        <!-- included nav -->
      <!-- navigation ends here -->

      <!-- hero section -->
      <div class="container">
        <div class="jumbotron bg-transparent">
          <div class="row">
            <div class="col-md-6">
              <div class="col-md-12 pt-5">
                <h1 class="display-4 font-weight-bold mt-5">
                  Take a Look at our Software Services
                </h1>
              </div>
            </div>
            <div class="col-md-6 mt-3 mt-md-5">
              <img
                class="img-fluid"
                src="<?=ROOT_URL?>assets/images/saas_banner.png"
                alt="bg image"
              />
            </div>
          </div>
        </div>
      </div>
      <!--  hero section ends-->

      <!--  medic section-->
      <section class="medicSection">
        <div class="greenline"></div>
        <div class="container">
          <div class="row py-5">
            <div class="col-md-6">
              <img
                class="img-fluid"
                src="<?=ROOT_URL?>assets/images/medic_emr.png"
                alt="bg image"
              />
            </div>
            <div class="col-md-6">
              <div class="row py-5">
                <div class="col-md-12 py-5">
                  <h3>
                    Secure & easy online practice management for digital
                    practice
                  </h3>
                  <p class="text-left">
                    Our up to date & powerful patient management solution for
                    doctors is an AI-based cloud solution to manage all your
                    requirements. Transfer your entire ERP system to the cloud
                    as this will not only serve but also improve productivity
                    and access to your data.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- medic section ends -->

      <!--  doc section-->
      <section class="docSection">
        <div class="greenline1"></div>
        <div class="container">
          <div class="row py-5">
            <div class="col-md-6">
              <div class="row py-5">
                <div class="col-md-12 py-5">
                  <h3>Personal health management app anywhere anytime</h3>
                  <p class="text-left">
                    DocRx is an open, cloud-based platform that collects,
                    compiles and analyzes clinical and other data from a wide
                    range of devices and sources. It provides services such as
                    calorie tracking, one-on-one nutrition and fitness coaching,
                    and diet and workout plans.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <img
                class="img-fluid"
                src="<?=ROOT_URL?>assets/images/doctor_rx.png"
                alt="bg image"
              />
            </div>
          </div>
        </div>
      </section>
      <!-- doc section ends -->
      <!-- tasync section -->
      <section class="tasyncSection">
        <div class="greenline"></div>

        <div class="container">
          <div class="row py-5">
            <div class="col-md-6">
              <img
                class="img-fluid"
                src="<?=ROOT_URL?>assets/images/tasync.png"
                alt="bg image"
              />
            </div>
            <div class="col-md-6">
              <div class="row py-5">
                <div class="col-md-12 py-5">
                  <h3>All-in-one Cloud-Based OMS</h3>
                  <p class="text-left">
                    Tasync is a Cloud-Based OMS with all type of platform
                    friendly. It's easy to use features will assist you directly
                    from managing workflows, communicating, scheduling meetings,
                    task management and HRM. All in one Office Management
                    System.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- tasync section ends -->
      <!-- todo contact form -->
        <!--footer section start from here-->
        <?php require_once("layouts/footer.php");?>
        <!--footer section end from here-->
    </div>
    <!-- boostrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
