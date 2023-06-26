<style>
    #nav-bar {
        color: #203D4A;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }

    #navbarSupportedContent ul li a:hover {
        color: aqua;
    }

    #provider-register {
        color: #203D4A;
        background-color: aqua;
        font-size: 16px;
        font-weight: bold;
        border-radius: 30px;
    }

    #sign-up {
        color: #1383b5;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }
</style>

<header>
    <nav class="navbar navbar-expand-lg bg-white shadow">
        <div class="container">
            <a href="/home" class="navbar-brand">
                <img src="images/brand.png" alt="apple" width="80" height="50" class=" d-inline-block align-middle">
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav text-center">
                    <li class="nav-item mx-3" id="login"><a href="/login" class="nav-link" id="nav-bar">Login</a></li>
                    <li class="nav-item mx-3" id="signup"><a href="/register-user" class="nav-link" id="sign-up">Sign Up</a></li>
                    <button class="btn navbar-btn mx-3" id="provider-register" onclick="location.href='/register-provider'">Register as Provider</button>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>