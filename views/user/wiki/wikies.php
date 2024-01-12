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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                    <li><a class="nav-link scrollto " href="home">Home</a></li>
                    <li><a class="nav-link scrollto" href="home#about">About</a></li>
                    <li><a class="nav-link scrollto" href="home#services">categories</a></li>
                    <li><a class="nav-link scrollto active" href="wikies">Wikies</a></li>

                    <?php
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


        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title mt-5">
                    <h2>Explore Our Wikis</h2>
                    <p>Discover a variety of topics and insights created by our community</p>
                    <form class="d-none d-md-flex ms-4 justify-content-center">
                        <input class="form-control bg-light border-1" style="width:50%; margin:5% auto;" type="text" id="searchInput" placeholder="Enter search term">
                    </form>
                </div>
                <div class="row portfolio-container" id="searchResults">
                </div>

                <div class="row portfolio-container" id="otherdiv">
                    <?php foreach ($allowWikies as $allowWiki) : ?>


                        <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="<?= $allowWiki['image'] ?>" class="img-fluid" alt="">
                                    <a href="detailWiki?id=<?= $allowWiki['id']; ?>" class="link-details text-center" title="More Details"><i class="bx bx-link"></i></a>
                                </figure>

                                <div class="portfolio-info">
                                    <h4 class="title"><a href="detailWiki?id=<?= $allowWiki['id']; ?>"><?= $allowWiki['title'] ?></a></h4>
                                    <p class="content"><?= $allowWiki['content'] ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

            </div>
        </section>


    </main>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="/wiki/public/assets/purecounter/purecounter_vanilla.js"></script>
    <script src="/wiki/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/wiki/public/assets/glightbox/js/glightbox.min.js"></script>
    <script src="/wiki/public/assets/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/wiki/public/assets/swiper/swiper-bundle.min.js"></script>
    <script src="/wiki/public/assets/waypoints/noframework.waypoints.js"></script>
    <script src="/wiki/public/assets/php-email-form/validate.js"></script>

    <script src="/wiki/public/js/main.js"></script>
    <script>
        const searchInput = document.getElementById("searchInput");
        const searchResults = document.getElementById("searchResults");
        const otherdiv = document.getElementById("otherdiv");

        searchInput.addEventListener("input", handleSearch);

        async function handleSearch(e) {
            try {
                const query = e.target.value;
                const data = await fetchData(query);
                updateResults(data);
            } catch (error) {
                console.error(error);
            }
        }

        async function fetchData(query) {
            const response = await fetch("search?q=" + encodeURIComponent(query));
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.text();
        }

        function updateResults(data) {
            const results = JSON.parse(data);

            searchResults.innerHTML = "";
            otherdiv.style.display = "none";

            results.forEach((item) => {
                const card = document.createElement("div");
                card.className = "col-lg-4 col-md-6 portfolio-item wow fadeInUp mb-5";
                card.innerHTML = `
                <div class="portfolio-wrap">
                    <figure>
                        <img src="${item.image}" class="img-fluid" alt="">
                        <a href="detailWiki?id=${item.id}" class="link-details text-center" title="More Details">
                            <i class="bx bx-link"></i>
                        </a>
                    </figure>

                    <div class="portfolio-info">
                        <h4 class="title"><a href="detailWiki?id=${item.id}">${item.title}</a></h4>
                        <p class="content">${item.content}</p>
                    </div>
                </div>
            `;
                searchResults.appendChild(card);
            });
        }
    </script>
</body>

</html>