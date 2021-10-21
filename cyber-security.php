<!DOCTYPE html>
<html lang="en">
<?php require_once("layouts/config.php");?>
  <head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="favicon.ico" />
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
    <!-- cyber security css -->
    <link rel="stylesheet" href="<?=ROOT_URL?>assets/css/cyber-security.css" />
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
      <section id="banner" class="banner">
        <video src="<?=ROOT_URL?>assets/videos/Matrix.mp4" width="100%"></video>
        <div class="container" id="overlay">
          <div class="jumbotron bg-transparent">
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-3">
                  <h1
                    class="display-4 text-white font-weight-bold"
                    style="text-shadow: initial"
                  >
                    Cyber Security
                  </h1>
                </div>
              </div>
              <div class="col-md-6">
                <img
                  src="<?=ROOT_URL?>assets/images/cyber_sec_banner.png"
                  alt="cyber security image"
                  id="cyberSecurityImage"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="greenline-cyber"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h3 class="text-center">
                <strong>What is cyber security</strong>
              </h3>
              <p class="p-5 text-left">
                Cybersecurity is the system of defending systems, networks, and
                applications from cyber-attacks. These attacks on IT
                infrastructure are usually aimed at assessing, modifying, or
                damaging delicate information; forcing money from users, or
                disrupting regular business methods. Internet attacks are an
                evolving threat to corporations, employees and customers. They
                may be created to obtain or damage delicate information or
                extract funds. These can ruin companies and corrupt their
                economic and individual lives.
              </p>
            </div>
            <div class="col-md-6">
              <h3 class="text-center">
                <strong>Why it is necessery</strong>
              </h3>
              <p class="p-5 text-left">
                Cybersecurity is essential because it includes everything that
                concerns protecting delicate data, particularly identifiable
                information (PII), protected health information (PHI), private
                data, intelligent assets, information, and national and
                enterprise information systems from fraud and loss tried by
                crooks and opponents. Because of the huge rise in hacks and
                hacking attempts, IT security has grown an inevitable issue of
                discussion in the past few years. Incidents that happen in the
                cybersecurity activity can and frequently do have global
                consequences and the probability of fatal outcomes.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section id="services">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Cyber Security Service</h1>
            </div>
            <!-- cyber security services card  -->
            <div class="col-md-6">
              <div class="mt-4">
                <div class="p-md-2 serviceCard">
                  <div class="row">
                    <img
                      src="<?=ROOT_URL?>assets/images/cybersec.png"
                      alt="cyber Security"
                    />
                    <h3 class="text-secondary ml-3 font-weight-bold">
                      ANDROID APP SECURITY TESTING
                    </h3>
                    <p class="text-secondary font-weight-bold serviceCardtext">
                      Aarhat IT security specialists can handle your App data
                      security. We attempt app penetration and vulnerability
                      assessment assistance for all popular mobile platforms, as
                      well as iOS, Android, and Windows.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mt-4">
                <div class="p-md-2 serviceCard">
                  <div class="row">
                    <img
                      src="<?=ROOT_URL?>assets/images/cybersec.png"
                      alt="cyber Security"
                    />
                    <h3 class="text-secondary ml-3 font-weight-bold">
                      WEB APLICATION SECURITY TESTING
                    </h3>
                    <p class="text-secondary font-weight-bold serviceCardtext">
                      AARHAT iSERV offering a strong blend of automation, method
                      and speed to secure the web applications.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mt-4">
                <div class="p-md-2 serviceCard">
                  <div class="row">
                    <img
                      src="<?=ROOT_URL?>assets/images/cybersec.png"
                      alt="cyber Security"
                    /><br>
                    <h3 class="text-secondary ml-3 text-aglin center  font-weight-bold">
                     SOURCE   CODE   REVIEW &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                    </h3>
                    <p class="text-secondary font-weight-bold serviceCardtext">
                      AARHAT iSERV security specialists provide the solution for
                      your organizations to identify the application security
                      weaknesses through Source code review
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mt-4">
                <div class="p-md-2 serviceCard">
                  <div class="row">
                    <img
                      src="<?=ROOT_URL?>assets/images/cybersec.png"
                      alt="cyber Security"
                    />
                    <h3 class="text-secondary ml-3 font-weight-bold">
                      IT SECURITY AWARENESS TRAINING
                    </h3>
                    <p class="text-secondary font-weight-bold serviceCardtext">
                      Our Cyber Security Awareness training programme has been
                      developed to empower employers and employees with a wide
                      knowledge of the threats to cyber/information security.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- :todo contact form -->
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
