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
                    <h3 class="text-primary">DASHMIN</h3>
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
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="../../auth/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>


        <div class="container-fluid pt-4 px-4" id="content-container">

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="bg-dark text-center rounded p-4">

                            <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal" data-aos="fade-down" data-aos-duration="1500">Add New Category</a>

                            <!-- Add Modal -->
                            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Add New Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="addCategory">
                                                <div class="mb-3">
                                                    <label class="form-label">Name :</label>
                                                    <input type="text" class="form-control" name="category_name" placeholder="Entrer le nom de categorie" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr data-aos="fade-left" data-aos-duration="1500">
                                        <th scope="col-6" data-aos="fade-left"> nom</th>

                                        <th scope="col-6" data-aos="fade-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody" data-aos="fade-right" data-aos-duration="1500">

                                    <?php foreach ($categories as $category) : ?>
                                        <tr>
                                            <td><?= $category['category_name'] ?></td>

                                            <td>
                                                <a href="categoryAdmin?id=<?= $category['id'] ?>" class="link-dark" data-bs-toggle="modal" data-bs-target="#editCat<?= $category['id'] ?>" data-aos="fade-down" data-aos-duration="1500">
                                                    <i class='bx bxs-pencil fs-5 me-3'></i>
                                                </a>
                                                <a href="deleteCat?id=<?= $category['id'] ?>" class="link-danger">
                                                    <i class='bx bxs-user-x fs-5'></i>
                                                </a>
                                            </td>

                                        </tr>


                                        <!-- edit Modal -->
                                        <div class="modal fade" id="editCat<?= $category['id'] ?>" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Add New Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="editCategory">
                                                        <input type="hidden" class="form-control" value="<?= $category['id'] ?>" name="id" required>

                                                            <div class="mb-3">
                                                                <label class="form-label">Name :</label>
                                                                <input type="text" class="form-control" value="<?= $category['category_name'] ?>" name="category_name" placeholder="Entrer le nom de categorie" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="bg-dark text-center rounded p-4">

                            <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModalTag" data-aos="fade-down" data-aos-duration="1500">Add New Tag</a>

                            <!-- Add Modal -->
                            <div class="modal fade" id="addModalTag" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Add New Tag</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="post" action="addTag">
                                                <div class="mb-3">
                                                    <label class="form-label">Name :</label>
                                                    <input type="text" class="form-control" name="tag_name" placeholder="Entrer le nom de categorie" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr data-aos="fade-left" data-aos-duration="1500">
                                        <th scope="col-6" data-aos="fade-left"> nom</th>

                                        <th scope="col-6" data-aos="fade-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody" data-aos="fade-right" data-aos-duration="1500">
                                    <?php foreach ($tags as $tag) : ?>
                                        <tr>
                                            <td><?= $tag['tag_name'] ?></td>

                                            <td>
                                                <a href="categoryAdmin?id=<?= $tag['id'] ?>" class="link-dark" data-bs-toggle="modal" data-bs-target="#editTag<?= $tag['id'] ?>" data-aos="fade-down" data-aos-duration="1500">
                                                    <i class='bx bxs-pencil fs-5 me-3'></i>
                                                </a>
                                                <a href="deleteTag?id=<?= $tag['id'] ?>" class="link-danger">
                                                    <i class='bx bxs-user-x fs-5'></i>
                                                </a>
                                            </td>



                                            <!-- edit Modal -->
                                            <div class="modal fade" id="editTag<?= $tag['id'] ?>" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addModalLabel">Edit tag</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="editTag">
                                                                <input type="hidden" class="form-control" value="<?= $tag['id'] ?>" name="id" placeholder="Entrer le nom de categorie" required>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Name :</label>
                                                                    <input type="text" class="form-control" value="<?= $tag['tag_name'] ?>" name="tag_name" placeholder="Entrer le nom de categorie" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
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