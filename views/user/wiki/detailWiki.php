<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WIKI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="/wiki/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/wiki/public/assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/wiki/public/assets/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/wiki/public/assets/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/wiki/public/assets/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="/wiki/public/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto d-flex">
        <a href="home"><img src="/wiki/public/images/logo.png" alt="" class="img-fluid"></a>
        <h1><a href="home">Wiki</a></h1>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="home">Home</a></li>
          <li><a class="nav-link scrollto" href="home#about">About</a></li>
          <li><a class="nav-link scrollto" href="home#services">categories</a></li>
          <li><a class="nav-link scrollto active" href="wikies">Wikies</a></li>
          </li><?php
                if (isset($_SESSION['role_id'])) {


                  if ($_SESSION['status'] == 'allow') { ?>
              <li> <a href="addWiki" class="nav-link scrollto ">add wiki</a>
              </li>
            <?php }
                } else { ?>
            <li><a class="nav-link scrollto " href="signup">Get Started</a></li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <?php
      if (isset($_SESSION['role_id'])) { ?>
        <div class="header-social-links d-flex  align-items-center">
          <div class="nav-item dropdown px-5">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img class="rounded-circle me-lg-2" src="<?= $_SESSION['photo'] ?>" alt="" style="width: 40px; height: 40px;">
              <span class="d-none d-lg-inline-flex"><?= $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
              <a href="authorWikies?id=<?= $_SESSION['id'] ?>" class="dropdown-item">your Wikies</a>
              <a href="logout" class="dropdown-item">Log Out</a>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </header>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Wiki Details</h2>
          <ol>
            <li><a href="home">Home</a></li>
            <li>wiki Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">

              <div class="swiper-slide">
                <img src="<?php echo $detailWiki['image'] ?>" alt="">
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>wiki information</h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $detailWiki['category_name'] ?></li>
                <li><strong>tags</strong>: <?php echo $detailWiki['tag_names'] ?></li>
                <li><strong>wiki date</strong>: <?php echo $detailWiki['create_at'] ?></li>
                <li><strong>Author </strong>: <a href="#"><?php echo $detailWiki['fullname'] ?></a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2><?php echo $detailWiki['title'] ?></h2>
              <p>
                <?php echo $detailWiki['content'] ?> </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main>
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Wiki</h3>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="home">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home#services">Categories</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our categorie</h4>
            <ul>
              <?php foreach ($lastCategories as $lastCat) : ?>
                <li><i class="bx bx-chevron-right"></i> <a href="home#services"><?= $lastCat['category_name'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">


      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="/wiki/public/assets/purecounter/purecounter_vanilla.js"></script>
  <script src="/wiki/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/wiki/public/assets/glightbox/js/glightbox.min.js"></script>
  <script src="/wiki/public/assets/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/wiki/public/assets/swiper/swiper-bundle.min.js"></script>
  <script src="/wiki/public/assets/waypoints/noframework.waypoints.js"></script>
  <script src="/wiki/public/assets/php-email-form/validate.js"></script>

  <script src="/wiki/public/js/main.js"></script>

</body>

</html>