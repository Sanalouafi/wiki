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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
    <style>
        .cube {
            height: 10vh !important;

        }

        .card {
            width: 100%;
            border: none;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card img {
            width: 200px;
            border-radius: 10%;
            object-fit: cover;
        }

        .card label {
            margin-top: 30px;
            text-align: center;
            height: 40px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 20px;
            color: white;
        }

        .card input {
            display: none;
        }

        .form-input-label,
        .form-label {
            color: black;

        }

        .form-control {
            height: 80% !important;
        }
    </style>
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
                    <li><a class="nav-link scrollto" href="#services">categories</a></li>
                    <li><a class="nav-link scrollto " href="wikies">Wikies</a></li>
                    <li> <a href="addWiki" class="nav-link scrollto active">add wiki</a>
                    </li>
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


    <main id="main" class="form-container">
        <div class="container-fluid pt-4 px-4" id="content">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light text-center rounded p-4">

                            <div class="container d-flex justify-content-center" style="margin-top:5%;">
                                <form method="POST" action="addWikies" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                                    <input type="hidden" class="form-control" name="userId" value="<?= $_SESSION['id'] ?>" required>

                                    <div class="card">
                                        <img src="/wiki/public/images/froggy.png" alt="image" id="image">
                                        <label for="input-file" class="text-dark">Choose Image</label>
                                        <input type="file" accept="image/jpg , image/png , image/jpeg" id="input-file" name="photo" required>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="form-label mb-2">Title:</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-2">Description:</label>
                                        <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="form-label mb-2">Category:</label>
                                            <select name="category" class="form-control">
                                                <?php foreach ($categories as $cat) : ?>
                                                    <option value="<?= $cat['id'] ?>"><?= $cat['category_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label class="form-label mb-2">Tag:</label>
                                            <select name="tags[]" class="form-control" multiple id="tagsSelect">
                                                <?php foreach ($tags as $tag) : ?>
                                                    <option value="<?= $tag['id'] ?>"><?= $tag['tag_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row ms-1 mt-5 justify-content-center">
                                        <button type="submit" name="submit" class="btn btn-success col-3 me-3">Add Wiki</button>
                                        <a href="wikies" class="btn btn-danger col-3">Cancel</a>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </main>

    </main>

   

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/wiki/public/assets/purecounter/purecounter_vanilla.js"></script>
    <script src="/wiki/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/wiki/public/assets/glightbox/js/glightbox.min.js"></script>
    <script src="/wiki/public/assets/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/wiki/public/assets/swiper/swiper-bundle.min.js"></script>
    <script src="/wiki/public/assets/waypoints/noframework.waypoints.js"></script>
    <script src="/wiki/public/assets/php-email-form/validate.js"></script>

    <script src="/wiki/public/js/main.js"></script>
    <script>
        let image = document.getElementById("image");
        let input = document.getElementById("input-file");

        input.onchange = () => {
            image.src = URL.createObjectURL(input.files[0]);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#tagsSelect").select2({
                maximumSelectionLength: 10
            });
        });
    </script>

</body>

</html>