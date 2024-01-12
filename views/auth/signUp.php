<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/wiki/public/css/sign_login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="/wiki/public/assets/aos/aos.css" rel="stylesheet">
    <link href="/wiki/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/wiki/public/assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/wiki/public/assets/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/wiki/public/assets/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/wiki/public/assets/remixicon/remixicon.css" rel="stylesheet">
    <link href="/wiki/public/assets/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/wiki/public/css/style.css" rel="stylesheet">
</head>

<body>
    <style>
        .profile {
            width: 70px;
            height: 70px;
            display: inline-block;
            position: relative;
        }

        .profile img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }
    </style>
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
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto  " href="wikies">Wikies</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="header-social-links d-flex align-items-center">
                <a href="signup" class="btn-get-started scrollto active">Get Started</a>
            </div>

        </div>
    </header><!-- End Header -->
    <section class="img-background p-100 m-100">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="sign col-md-6">
                    <form id="signupForm" action="registerUser" method="post" enctype="multipart/form-data" class="form-container p-5 rounded shadow-sm mx-auto">
                        <h1 class="text-white text-3xl text-center mb-4">
                            Sign Up
                        </h1>
                        <p class="text-white text-center">Create your account for free</p>
                        <div class="form">
                            <div class="form-input mb-3 mx-auto">
                                <label for="input-file" class="cursor-pointer">
                                    <div class="profile">
                                        <img id="image" class="rounded-full overflow-hidden m-auto bg-gray-300" src="/wiki/public/images/froggy.png" alt="Preview">
                                    </div>
                                </label>
                                <input type="file" id="input-file" accept="image/jpg,image/png,image/jpeg" name="photo" style="display: none;">
                            </div>

                            <div class="form-input mb-3 ">
                                <input type="text" id="full-name" class="form-control" placeholder="Fullname" name="name" required>
                                <span id="fullNameError" class="text-danger"></span>
                            </div>

                            <div class="form-input mb-3 ">
                                <input type="email" id="email" class="form-control" placeholder="name@flowbite.com" name="email" required>
                                <span id="emailError" class="text-danger"></span>
                            </div>

                            <div class="form-input mb-3 ">
                                <input type="password" id="password" class="form-control" placeholder="password" name="password" required>
                                <span id="passwordError" class="text-danger"></span>
                            </div>

                            <div id="button-submit" class="form-input mb-3 mx-auto">
                                <button type="submit" name="signup" class="btn btn-success">Submit</button>
                                <a href="signin" class="text-white ms-3" style="padding-top: 10%;">Already Have an account!!
                                    <span class="text-primary">Login</span></a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/wiki/public/js/sign_login.js"></script>
<script>
    let image = document.getElementById("image");
    let input = document.getElementById("input-file");

    image.onclick = () => {
        input.click();
    };

    input.onchange = () => {
        image.src = URL.createObjectURL(input.files[0]);
    };
</script>

</html>