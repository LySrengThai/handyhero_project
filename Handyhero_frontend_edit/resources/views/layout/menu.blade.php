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
                    <li class="nav-item mx-3" id="homepage"><a href="/home" class="nav-link" id="nav-bar">Home</a></li>
                    <li class="nav-item mx-3" id="services"><a href="/service" class="nav-link" id="nav-bar">Services</a></li>
                    <li class="nav-item mx-3" id="companies"><a href="/company" class="nav-link" id="nav-bar">Companies</a></li>
                    <li class="nav-item mx-3" id="contactus"><a href="/contact" class="nav-link" id="nav-bar">Contact Us</a></li>
                    <div class="vr"></div>
                    <div class="dropdown open mx-2">
                        <button class="btn border-none dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="mx-2">User</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerID">
                            <button class="dropdown-item" onclick="location.href = '/logout'">Sign Out</button>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

</header>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>