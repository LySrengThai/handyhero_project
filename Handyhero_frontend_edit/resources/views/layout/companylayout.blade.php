<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
        integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/605594b358.js" crossorigin="anonymous"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .star-checked {
        color: orange;
    }

    .move-right {
        float: right;
    }

    .reviewer-name {
        color: #1383b5;
    }

    #nav-bar {
        color: #203D4A;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }

    #navbarSupportedContent ul li a:hover {
        color: aqua;
    }
    </style>
</head>

<body class="bg-light">
    <header>

        <nav class="navbar navbar-expand-lg bg-white shadow">
            <div class="container">
                <a href="/home" class="navbar-brand">
                    <img src="images/brand.png" alt="apple" width="80" height="50" class=" d-inline-block align-middle">
                </a>

                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav text-center">
                        <li class="nav-item mx-3" id="homepage"><a href="/home" class="nav-link" id="nav-bar"><i
                                    class="bi bi-bell-fill"></i></a>
                        </li>
                        <div class="dropdown open mx-2">
                            <button class="btn py-1 px-3" style="border-radius: 200px; background-color: aqua;"
                                onclick="location.href = ' /logout'">
                                Sign out</button>


                        </div>
                    </ul>
                </div>
            </div>
        </nav>

    </header>


    @yield('content')
    <footer style="background-color: #203D4A;">
        <div class="container d-flex flex-wrap justify-content-between align-items-center py-3 text-white">
            <p class="col-md-4 mb-0 ">&copy; 2023 HandyHero All Rights Reserved</p>

            <ul
                class="nav col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto text-decoration-none ">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white"><i
                            class="fa-brands fa-youtube fa-xl"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white"><i
                            class="fa-brands fa-facebook-f  fa-xl"></i></a></li>

                <li class="nav-item"><a href="#" class="nav-link px-2 text-white"><i
                            class="fa-brands fa-twitter fa-xl"></i></a></li>

            </ul>

            <ul class="nav col-md-4 justify-content-end ">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Privacy Policy</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Terms and Conditions</a></li>
            </ul>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>