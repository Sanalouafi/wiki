<?php
if (isset($_SESSION['role_id']) && $_SESSION['id'] == 2) {
?>
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

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto d-flex">
        <a href="home"><img src="/wiki/public/images/logo.png" alt="" class="img-fluid"></a>
        <h1><a href="home">Wiki</a></h1>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="home">Home</a></li>
          <li><a class="nav-link scrollto" href="home#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">categories</a></li>
          <li><a class="nav-link scrollto " href="wikies">Wikies</a></li>
          <?php if ($_SESSION['status'] == 'allow') { ?>
            <li> <a href="addWiki" class="nav-link scrollto ">add wiki</a>
            </li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

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

    </div>
  </header>

  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to <span>WIKI</span></h1>
      <h2>Discover, Learn, Share</h2>
      <a href="signup" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section>

  <main id="main">

    <section id="what-we-do" class="what-we-do">
      <div class="container">

        <div class="section-title">
          <h2>Explore Our Articles</h2>
          <p>Discover a variety of engaging articles covering diverse topics.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="#">Lorem Ipsum</a></h4>
              <p>Dive into articles that explore the origins and impact of Lorem Ipsum text.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="#">Perspiciatis Insights</a></h4>
              <p>Gain insights into the art and science of writing articles with clarity and precision.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="#">Magni Dolores</a></h4>
              <p>Explore articles that delve into exceptional stories and experiences.</p>
            </div>
          </div>

        </div>

      </div>
    </section>


    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="/wiki/public/images/about.jpg" class="img-fluid" alt="About Wiki Image">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>About Our Wiki</h3>
            <p>
              Welcome to our Wiki platform, dedicated to sharing knowledge and insights on a wide array of topics. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> Explore a vast collection of well-curated articles.</li>
              <li><i class="bx bx-check-double"></i> Contribute your knowledge and enrich our growing community.</li>
            </ul>
            <div class="row icon-boxes p-10">
              <div class="col-md-6">
                <i class="bx bx-receipt"></i>
                <h4>Discover Insights</h4>
                <p>Find valuable insights and information on diverse subjects.</p>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <i class="bx bx-cube-alt"></i>
                <h4>Community Collaboration</h4>
                <p>Collaborate with our community to expand the breadth of knowledge.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>the newest Categories</h2>
          <p>Discover a variety of topics and explore the wealth of knowledge in our diverse categories.</p>
        </div>

        <div class="row">
          <?php
          $counter = 0;
          $icons = ['bi bi-book', 'bi bi-star', 'bi bi-heart', 'bi bi-pen'];

          foreach ($lastCategories as $lastCat) :
            $iconClass = isset($icons[$counter]) ? $icons[$counter] : 'ri-question-fill';

            $counter = ($counter + 1) % count($icons);
          ?>
            <div class="col-md-6 p-2">
              <div class="icon-box">
                <i class="<?= $iconClass ?>"></i>
                <h4><a href="#"><?= $lastCat['category_name'] ?></a></h4>
              </div>
            </div>
          <?php endforeach; ?>
        </div>


      </div>
    </section>

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Explore the Latest Wikis</h2>
          <p>Discover a variety of topics and insights created by our community</p>

        </div>



        <div class="row portfolio-container">
          <?php foreach ($lastWikies as $lastWi) : ?>

            <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp">
              <div class="portfolio-wrap">
                <figure>
                  <img src="<?= $lastWi['image'] ?>" class="img-fluid" alt="">
                  <a href="detailWiki?id=<?= $lastWi['id']; ?>" class="link-preview" title="details"><i class="bx bx-link"></i></a>
                </figure>

                <div class="portfolio-info">
                  <h4><a href="detailWiki?id=<?= $lastWi['id']; ?>"><?= $lastWi['title']; ?></a></h4>
                  <p><?= $lastWi['content']; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>



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
            <form id="subscribeForm" action="" method="post" onsubmit="return validateForm()">
              <input type="email" name="email" id="emailInput" required>
              <p id="errorMessage" style="color: red;"></p>
              <input type="submit" value="Subscribe">
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
<?php } else{
    header('Location:index');
    }
    ?>