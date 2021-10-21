<!DOCTYPE html>
<html lang="en">
<?php require_once("layouts/config.php");?>
  <head>
    <link rel="shortcut icon" href="favicon.ico" />
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
    <!-- web development css -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/web-development.css" />
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
        <div class="container">
          <div class="jumbotron bg-transparent">
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-12 pt-5">
                  <h1 class="webDevelopmentHeading font-weight-bold mt-5">
                    Web Development
                  </h1>
                  <p>
                    Engaging, purposeful, and creative websites for growing
                    companies
                  </p>
                </div>
              </div>
              <div class="col-md-6 mt-n5">
                <img
                  class="img-fluid"
                  src="<?=ROOT_URL?>assets/images/modern_web_banner.png"
                  alt="bg image"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="web-dev-packages">
        <div class="container">
          <div class="row py-5">
            <div class="col-md-12">
              <h3 class="text-center">
                <strong>Our Packages</strong>
              </h3>
            </div>
          </div>
          <!-- packages cards  -->
          <div class="row py-3">
            <!-- card 1 -->
            <div class="col-md-4">
              <div
                class="card shadow-sm rounded px-0 my-3 px-md-3 my-md-5 packageCardBg"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <h3 class="font-weight-bold">Beginners Package</h3>
                      <p class="text-left font-weight-normal pt-2">
                        Web development Package
                      </p>
                    </div>
                    <div
                      class="col-12 col-md-12 p-2 d-flex flex-column justify-content-center align-items-center"
                    >
                      <h3 class="price">Rs. 6999</h3>
                      <button class="btn py-3 my-3 px-5 btnGreen">
                        Buy now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- card 1 ends -->
            <!-- card 1 -->
            <div class="col-md-4">
              <div
                class="card shadow-sm rounded px-0 my-3 px-md-3 my-md-5 packageCardBg"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <h3 class="font-weight-bold">Start Up Package</h3>
                      <p class="text-left font-weight-normal pt-2">
                        Web development Package
                      </p>
                    </div>
                    <div
                      class="col-12 col-md-12 p-2 d-flex flex-column justify-content-center align-items-center"
                    >
                      <h3 class="price">Rs. 15999</h3>
                      <button class="btn py-3 my-3 px-5 btnGreen">
                        Buy now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- card 1 ends -->
            <!-- card 1 -->
            <div class="col-md-4">
              <div
                class="card shadow-sm rounded px-0 my-3 px-md-3 my-md-5 packageCardBg"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <h3 class="font-weight-bold">Beginners Package</h3>
                      <p class="text-left font-weight-normal pt-2">
                        Ultimate Package
                      </p>
                    </div>
                    <div
                      class="col-12 col-md-12 p-2 d-flex flex-column justify-content-center align-items-center"
                    >
                      <h3 class="price">Rs. 29999</h3>
                      <button class="btn py-3 my-3 px-5 btnGreen">
                        Buy now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- card 1 ends -->
          </div>
          <!-- package cards section ends -->
          <!-- web develpment price list -->
          <div class="row py-3">
            <div class="col-md-12">
              <div class="card digiCard">
                <table class="table table-lg tableMain">
                  <thead style="font-size: large" class="tableHead">
                    <tr>
                      <th scope="col">Features</th>
                      <th scope="col" class="text-center">
                        Small Business Package
                      </th>
                      <th scope="col" class="text-center">Start Up Package</th>
                      <th scope="col" class="text-center">Ultimate Package</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Responsive Design</th>
                      <td class="text-center">Yes</td>
                      <td class="text-center">Yes</td>
                      <td class="text-center">Yes</td>
                    </tr>
                    <tr>
                      <th scope="row">Custom Homepage</th>
                      <td class="text-center">Yes</td>
                      <td class="text-center">Yes</td>
                      <td class="text-center">Yes</td>
                    </tr>
                    <tr>
                      <th scope="row">Contact Form</th>
                      <td class="text-center">Yes</td>
                      <td class="text-center">Yes</td>
                      <td class="text-center">Yes</td>
                    </tr>
                    <tr>
                      <th scope="row">Header Slideshow</th>
                      <td class="text-center">No</td>
                      <td class="text-center">Yes</td>
                      <td class="text-center">Yes</td>
                    </tr>
                    <tr>
                      <th scope="row">No Of Pages</th>
                      <td class="text-center">3</td>
                      <td class="text-center">5 to 8</td>
                      <td class="text-center">10 to 15</td>
                    </tr>
                    <tr>
                      <th scope="row">Custom jQuery/Animation</th>
                      <td class="text-center">No</td>
                      <td class="text-center">No</td>
                      <td class="text-center">Yes</td>
                    </tr>
                    <tr>
                      <th scope="row">Logo Design</th>
                      <td class="text-center">No</td>
                      <td class="text-center">2 Variations</td>
                      <td class="text-center">5 Variations</td>
                    </tr>
                    <tr>
                      <th scope="row">Package Deliverables</th>
                      <td class="text-center">HTML only</td>
                      <td class="text-center">HTML, PSD, AI</td>
                      <td class="text-center">HTML, PSD, AI</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- web develpment price list ends -->
        </div>
      </section>

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
