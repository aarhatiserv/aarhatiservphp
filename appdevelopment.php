<!DOCTYPE html>
<html lang="en">
<?php require_once("layouts/config.php");?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AARHAT iSERV</title>
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
    <!-- app development css -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/app-development.css" />
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
      <section id="hero">
        <div class="container-fluid appBanner">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 py-5">
              <h1 class="pt-5">App Development</h1>
              <p>Building smarter applications for smart users</p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row py-5">
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-8 text-center">
              <p>
                We leverage the mobile device skills to build a significant
                end-user experience to encourage your brand’s growth. An
                advanced mobile app development company for world-class brands.
                Your idea, we are the craftsmen. To secure your thoughts we
                sure-fire our mobile app development method.
              </p>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </section>
      <section id="app-dev-pacakges">
        <!-- <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">
                            <strong>Digital Marketing Services</strong>
                        </h1>
                    </div>
                </div>
            </div> -->
        <div class="container">
          <div class="row">
            <!-- digital marketing services cards -->
            <div class="col-md-4 mt-4 colMd4">
              <div class="">
                <div class="p-md-2 serviceCard" style="min-height: 430px">
                  <div class="row">
                    <img
                      src="<?=ROOT_URL?>assets/images/cybersec.png"
                      class="px-5 py-3"
                      alt="Cyber Security"
                    />
                    <a href="/cyber-security">
                      <h3
                        class="text-secondary ml-5 font-weight-bold"
                        style="cursor: pointer"
                      >
                        PWA
                      </h3>
                    </a>
                    <p class="text-secondary font-weight-bold serviceCardText">
                      A progressive web application is a kind of application
                      software developed by the web, created utilising web
                      technologies like HTML, CSS and JavaScript to deliver
                      app-like experiences inside browsers, then users can use
                      it without downloading a mobile app.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- card 2 -->
            <div class="col-md-4 mt-4 colMd4">
              <div class="">
                <div class="p-md-2 serviceCard" style="min-height: 430px">
                  <div class="row">
                    <img
                      src="<?=ROOT_URL?>assets/images/cybersec.png"
                      class="px-5 py-3"
                      alt="Cyber Security"
                    />
                    <a href="cyber-security.html">
                      <h3
                        class="text-secondary ml-3 font-weight-bold"
                        style="cursor: pointer"
                      >
                        Native Apps
                      </h3>
                    </a>
                    <p class="text-secondary font-weight-bold serviceCardText">
                      Native app development is the development of software
                      programs that run on particular devices and platforms,
                      instantly associate with native APIs without depending on
                      middleware such as plugins and WebViews.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- card 3 -->
            <div class="col-md-4 mt-4 colMd4">
              <div class="">
                <div class="p-md-2 serviceCard" style="min-height: 430px">
                  <div class="row">
                    <img
                      src="<?=ROOT_URL?>assets/images/cybersec.png"
                      class="px-5 py-3"
                      alt="Cyber Security"
                    />
                    <a href="/cyber-security">
                      <h3
                        class="text-secondary ml-3 font-weight-bold"
                        style="cursor: pointer"
                      >
                        Hybrid apps
                      </h3>
                    </a>
                    <p class="text-secondary font-weight-bold serviceCardText">
                      A Hybrid app is a software application which blends
                      components of both native apps and web applications. The
                      core of a hybrid application is written with HTML, CSS,
                      and JavaScript, then wrapped inside a native application.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- services section ends -->
      <section id="stack">
        <div class="container">
          <div class="row py-5">
            <div class="col-md-12">
              <h1 class="text-center">
                <strong>In-Demand Technologies Used by Us</strong>
              </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 text-center">
              <h3 class="">Design</h3>
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/figma.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/xd.png"
              />
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2 text-center">
              <h3 class="text-center">Front End</h3>
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/react.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/flutter.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/ionic.png"
                height="90"
              />
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2 text-center">
              <h3 class="text-center">Backend</h3>
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/nodejs.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/django.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2 "
                src="<?=ROOT_URL?>assets/images/appdev/python.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/codeigniter.png"
                height="90"
              />
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2 text-center">
              <h3 class="text-center">Database</h3>
              <img
                class="img-fluid my-5 py-2 "
                src="<?=ROOT_URL?>assets/images/appdev/mongo-db.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2"
                src="<?=ROOT_URL?>assets/images/appdev/mysql.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2 "
                src="<?=ROOT_URL?>assets/images/appdev/firebase.png"
                height="90"
              />
              <img
                class="img-fluid my-5 py-2 "
                src="<?=ROOT_URL?>assets/images/appdev/graphql.png"
                height="90"
              />
            </div>
          </div>
        </div>
      </section>
      <!-- stack section -->
      <!--todo contact  -->
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
