<div class="sidebar closed">
    <div class="logo-details">
        <img src="assets/images/white-logo.png" class="pl-2" alt="" width="90" height="45">
        <span class="logo_name pl-2">Handyhero</span>
    </div>
    <ul class="nav-links">
        <li class="navlist">
            <a href="/dashboard" id="dashboard">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/dashboard">Dashboard</a></li>
            </ul>
        </li>
        <li class="navlist">
            <div class="iocn-link" id="userinfo">
                <a href="/user_info">
                    <i class='bx bx-group'></i>
                    <span class="link_name">User Info</span>
                </a>
            </div>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/user_info">User Info</a></li>
            </ul>
        </li>
        <li class="navlist">
            <div class="iocn-link" id="companyinfo">
                <a href="/company_info">
                    <i class='bx bx-building'></i>
                    <span class="link_name">Company Info</span>
                </a>
            </div>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/company_info">Company Info</a></li>
            </ul>
        </li>
        <li class="navlist" id="serviceinfo">
            <a href="/service_info">
                <i class='bx bx-wrench'></i>
                <span class="link_name">Service Info</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/service_info">Service Info</a></li>
            </ul>
        </li>
        <li class="navlist">
            <a href="/booking_info" id="bookinfo">
                <i class='bx bx-calendar'></i>
                <span class="link_name">Booking Info</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/booking_info">Booking Info</a></li>
            </ul>
        </li>
        <li class="navlist" id="receiptinfo">
            <div class="iocn-link">
                <a href="/receipt_info">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="link_name">Receipt Info</span>
                </a>
            </div>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/receipt_info">Receipt</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link" id="setting">
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a href="#">Edit Profile</a></li>
                <li><a href="/admin_register" id="register">Register Profile</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <i class='bx bx-user' id="img"></i>
                <div class="name-job">
                    <div class="profile_name text-capitalize">{{ $data->admin_name }}</div>
                </div>
                <a href="/logout"><i class='bx bx-log-out' id="logout"></i></a>
            </div>
        </li>
    </ul>
</div>
<section class="home-section">
    @yield('content')
</section>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("closed");
    });
</script>

