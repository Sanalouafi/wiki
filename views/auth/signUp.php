<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/wiki/public/css/tailwind.css" rel="stylesheet">
    <link href="/wiki/public/css/sign_login.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>

    <style>
        .profile {
            width: 50px !important;
            height: 50px !important;
            display: inline-block;
            position: relative;
            /* Ensure relative positioning */
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



    <section class="img-background p-0 m-0">

        <div class="form-container max-w-sm mx-auto mt-20">
            <form id="signupForm" class="max-w-sm mx-auto" enctype="multipart/form-data" action="registerUser" method="post">
                <h1 class="text-3xl text-white font-bold text-center">
                    Sign Up
                </h1>
                <p class="text-white font-sans text-center">Create your account for free</p>
                <div class="form-input mb-2 pt-5">
                    <label for="input-file" class="cursor-pointer">
                        <div class="profile">
                            <img id="image" class="rounded-full overflow-hidden mx-auto bg-gray-300" src="/wiki/public/images/froggy.png" alt="Preview">
                        </div>
                    </label>
                    <input type="file" id="input-file" accept="image/jpg , image/png , image/jpeg" name="photo" class="hidden">
                </div>
                <div class="form-input mb-2 pt-5">
                    <input type="text" id="full-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Fullname" name="name" required>
                    <span id="fullNameError" class="error-message"></span>
                </div>
                <div class="form-input mb-2 pt-2">
                    <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" name="email" required>
                    <span id="emailError" class="error-message"></span>
                </div>
                <div class="form-input mb-2 pt-2">
                    <input type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="password" name="password" required>
                    <span id="passwordError" class="error-message"></span>
                </div>
                <div class="form-input mb-5 pt-2">
                <button type="submit" name="signup" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <a href="signin" class=" text-black p-5">Already Have an account !!<span class="text-white hover:text-blue-500 p-1">Login</span></a>


                </div>
            </form>
        </div>
    </section>

</body>

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