<?php
if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>wiki follow your dream</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="/wiki/public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="/wiki/public/css/dashboard.css" rel="stylesheet">
    </head>

    <body>
        <style>
            .cube {
                height: 10vh !important;

            }
        </style>
        <div class="container-xxl position-relative bg-white d-flex p-0">

            <div class="sidebar pe-4 pb-3">
                <nav style="background: #28323A;" class="navbar bg-light navbar-light">
                    <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary">WIKI</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="<?= $_SESSION['photo'] ?>" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                            </div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><?= $_SESSION['name'] ?></h6>
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="dashboard" class="nav-item nav-link" id="dashboard-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="categoryAdmin" class="nav-item nav-link "><i class="fa fa-plus me-2"></i>Categories & tag</a>
                        <a href="author" class="nav-item nav-link "><i class="fa fa-user me-2"></i>Author</a>
                    </div>

                </nav>
            </div>
        </div>


        <div class="content">

            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-home"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?= $_SESSION['photo'] ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $_SESSION['name'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>


            <div class="container-fluid pt-4 px-4" id="content-container">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Categories</p>
                                <h5 class="mb-0"><?php echo $categoryCount['allCat']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Tags</p>
                                <h5 class="mb-0"><?php echo $tagCount['allTag']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Allowed wikies</p>
                                <h5 class="mb-0"><?php echo $allowedWikiCount['allWiki']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Arshived  wikies</p>
                                <h5 class="mb-0"><?php echo $arshivedWikiCount['allWiki']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-dark text-center rounded p-4">
                                <table class="table table-hover text-center">
                                    <thead class="table-dark">
                                        <tr data-aos="fade-left" data-aos-duration="1500">
                                            <th scope="col-6" data-aos="fade-left">photo</th>
                                            <th scope="col-6" data-aos="fade-left"> title</th>
                                            <th scope="col-6" data-aos="fade-left"> content</th>
                                            <th scope="col-6" data-aos="fade-left">Status</th>
                                            <th scope="col-6" data-aos="fade-left">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody" data-aos="fade-right" data-aos-duration="1500">
                                        <?php foreach ($wikies as $wiki) : ?>
                                            <tr>
                                                <td> <img class="rounded-circle" src="<?= $wiki['image'] ?>" alt="" style="width: 40px; height: 40px;">
                                                </td>
                                                <td><?= $wiki['title'] ?></td>
                                                <td><?= $wiki['content'] ?></td>
                                                <td><?= $wiki['status'] ?></td>

                                                <td>
                                                    <?php
                                                    if ($wiki['status'] == 'allow') { ?>
                                                        <a href="updateStatusWiki?id=<?= $wiki['id'] ?>&status=deny" class="link-danger">
                                                            <i class='bx bxs-lock fs-6'></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="updateStatusWiki?id=<?= $wiki['id'] ?>&status=allow">
                                                            <i class='bx bxs-lock fs-6'></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>



                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-6 col-xl-6">

                        </div>

                        <div class="col-sm-12 col-md-6 col-xl-6">

                        </div>
                    </div>
                </div>
            </div>



        </div>
        </div>

        <!-- Content End -->


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    <script>
        var currentPage = window.location.href;

        var navLinks = document.querySelectorAll(".navbar-nav .nav-link");

        navLinks.forEach(function(link) {
            if (link.href === currentPage) {
                link.classList.add("active");
            }
        });
    </script>
    <script>
        // Sidebar Toggler
        document
            .querySelector(".sidebar-toggler")
            .addEventListener("click", function() {
                document.querySelector(".sidebar").classList.toggle("open");
                document.querySelector(".content").classList.toggle("open");
                return false;
            });
        AOS.init();
    </script>

    </html>
<?php } else{
    header('Location:index');
    }
    ?>