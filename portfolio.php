<!DOCTYPE html>
<?php require_once("layouts/config.php");?>
<html lang="en">
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
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <!-- fontawesome cdn -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- global css for all page -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/global.css" />
    <!-- css for portfolio page -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/portfolio.css" />
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
                <div class="col-md-3">
                  <h1 class="font-weight-bold mt-5">Our Portfolio</h1>
                </div>
                <div class="col-md-10">
                  <p>
                    Providing the simplest solution for the most complex problem
                    We Help You Invent the Future.
                  </p>
                </div>
              </div>
              <div class="col-md-6 mt-n5">
                <img
                  class="img-fluid"
                  src="<?=ROOT_URL?>assets/images/portfolio_banner.png"
                  alt="bg image"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="portfolio_dec">
        <div class="portfolio-desc-section">
          <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
              <div class="col-md-10">
                <p>
                  Our Portfolio displays some of our work to represent what are
                  our skills and what type of services we can provide you. Our
                  Portfolio is rich with loads of our works created so far.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="portfolio">
        <div class="portfolioNav my-5">
          <div class="container">
            <div class="row d-flex justify-content-center">
              <div class="col-md-10 py-2">
                <nav
                  class="navbar navbar-expand-lg navbar-light bg-light shadow portNav"
                >
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a
                        class="nav-link mx-3 text-dark sec-nav"
                        onclick="getPorrtfollio('ALL')"
                      >
                        ALL
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        class="nav-link mx-3 text-dark sec-nav"
                        onclick="getPorrtfollio('Logo')"
                      >
                        Logo
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        class="nav-link mx-3 text-dark sec-nav"
                        onclick="getPorrtfollio('Branding')"
                      >
                        Branding
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        class="nav-link mx-3 text-dark sec-nav"
                        onclick="getPorrtfollio('UI/UX')"
                      >
                        UI/UX
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        class="nav-link mx-3 text-dark sec-nav"
                        onclick="getPorrtfollio()"
                      >
                        Motion Design
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        class="nav-link mx-3 text-dark sec-nav"
                        onclick="getPorrtfollio()"
                      >
                        Layout Design
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        class="nav-link mx-3 text-dark sec-nav"
                        onclick="getPorrtfollio()"
                      >
                        Website Design
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="row mt-5 d-flex justify-content-center">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <ul class="nav" id="category_types">
                  <!-- <li class="nav-item">
                          <a class="nav-link active" href="#">
                            Option
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="#">
                            Option
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="#">
                            Option
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="#">
                            Option
                          </a>
                        </li> -->
                </ul>
              </div>
            </div>
            <div class="container-fluid">
              <div class="row mt-5 mb-3" id="photo-gallery">
                <!-- <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src="/assets/images/portfoilo/branding/banners/gg_banner.jpg"
                                            class="img-fluid"></img>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src="/assets/images/portfoilo/branding/banners/motokit_banner.jpg"
                                            class="img-fluid"></img>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src="/assets/images/portfoilo/branding/brouchers_letterhead/artboard9.jpg"
                                            class="img-fluid"></img>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row  my-5">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src="/assets/images/portfoilo/branding/brouchers_letterhead/gg_broucher.jpg"
                                            class="img-fluid"></img>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src="/assets/images/portfoilo/branding/banners/gg_banner.jpg"
                                            class="img-fluid"></img>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src="/assets/images/portfoilo/branding/brouchers_letterhead/zuno.jpg"
                                            class="img-fluid"></img>
                                    </div>
                                </div>
                            </div> -->
              </div>
            </div>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      function getPorrtfollio(type) {
        let protfolio_type = type;
        if (protfolio_type == undefined) {
          swal("Coming soon");
        } else {
          $.getJSON("./portfolio.json", (res) => {
            //  console.log(res);
            let gallery = [];
            let category_types = [];

            function onlyUnique(value, index, self) {
              return self.indexOf(value.type) != value.type;
            }
            let shorteddata = res.filter(
              (data) => data.category == protfolio_type
            );
            let unique_data_types = shorteddata.filter(onlyUnique);
            console.log(shorteddata);
            if (shorteddata.length !== 0) {
              shorteddata.forEach((data) => {
                gallery.push(
                  `<div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src=` +
                    data.image +
                    `
                                            class="img-fluid"></img>
                                    </div>
                                </div>`
                );
              });
            } else {
              shorteddata = res;
              shorteddata.forEach((data) => {
                gallery.push(
                  `<div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body py-5 shadow">
                                        <img src=` +
                    data.image +
                    `
                                            class="img-fluid"></img>
                                    </div>
                                </div>`
                );
              });
            }
            // // for category types
            // if (shorteddata.length !== 0) {
            //     unique_data_types.forEach(data => {
            //         category_types.push(`<li class="nav-item">
            //       <a class="nav-link text-dark" href="#">
            //         `+data.type+`
            //       </a>
            //     </li>`);
            //     });
            // } else {
            //     shorteddata = res;
            //     unique_data_types.forEach(data => {
            //         category_types.push(`<li class="nav-item">
            //       <a class="nav-link text-dark" href="#">
            //         `+data.type+`
            //       </a>
            //     </li>`);
            //     });
            // }

            $("#photo-gallery").html(gallery);
            // $("#category_types").html(category_types);
          });
        }
      }
      // loading portfolio default category with ALL
      $(document).ready(() => {
        getPorrtfollio("ALL");
      });

      //  active nav
      $(document).ready(function () {
        $(".nav-item").on("click", function () {
          // $('.nav-item').removeClass('active');
          $(".nav-item").find("a").removeClass("active");
          $(this).find("a").addClass("active");
          // $(this).addClass('active');
        });
      });
    </script>
  </body>
</html>
