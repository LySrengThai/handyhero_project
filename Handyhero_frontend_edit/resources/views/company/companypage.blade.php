@extends('layout.companylayout')
<title>Company</title>
<style>
#companies a {
    color: aqua;
    text-decoration: underline;
}

.nav-link.active {
    border-bottom: 2px solid black;
}

.nav-link:focus,
.nav-link:active {
    outline: none;
    border-bottom: 2px solid black;
}
</style>
@section('content')
<div class="container my-5">
    <div class="col d-flex align-items-start my-2">
        <div
            class="text-body-emphasis  d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
            <img src="/images/fixmelogo.png" alt="Generic placeholder image" class="img-fluid rounded-circle"
                style="width: 150px;">
        </div>
        <div>
            <h3 class="fs-2 mb-3" style="color:#1383b5;">Fix me Home</h3>
            <div class="d-flex mb-3">
                <a class="btn py-1 px-3 "
                    style="border-radius: 200px; background-color: aqua;font-weight: 490; ">Handyman</a>
                <a class="btn py-1 px-3 mx-2"
                    style="border-radius: 200px; background-color: aqua; font-weight: 490; ">Electrical</a>
            </div>
            <div class="my-4">
                <p style="font-weight:600;" class="h5 mb-2">Email: fixmehome@gmail.com</p>
                <p style="font-weight:600;" class="h5">Phone number: 023 300 300</p>
            </div>
        </div>
    </div>
    <div class="row border-top my-6 ">
        <ul class="nav justify-content-center  nav-justified" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fs-5 nav-link " id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="true" style="font-weight:600;color:#203D4A"><i
                        class="fa-sharp fa-solid fa-bag-shopping mx-4"></i>Company Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class=" fs-5 nav-link " id="pills-service-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-service" type="button" role="tab" aria-controls="pills-service"
                    aria-selected="true" style="font-weight:600;color:#203D4A"><i
                        class="fa-sharp fa-solid fa-house-chimney mx-4"></i>Service</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="fs-5 nav-link " id="pills-booking-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-booking" type="button" role="tab" aria-controls="pills-booking"
                    aria-selected="true" style="font-weight:600;color:#203D4A"><i
                        class="fa-solid fa-window-restore mx-4"></i>Booking</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="fs-5 nav-link " id="pills-setting-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-setting" type="button" role="tab" aria-controls="pills-setting"
                    aria-selected="true" style="font-weight:600;color:#203D4A"><i
                        class="fa-solid fa-gear mx-4"></i>Setting</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Company Profile</h2>
                    </div>
                    <div class="col-7" style="font-size: 24px;">
                        <p class="lead">At FixMeHome, we deal with all kinds of fence damage caused by everything from
                            extreme
                            weather to a simple accident.
                            Some of the most common fence repair we handle include:
                        </p>
                        <ul class="lead">
                            <li>Tightening loose fence boards.</li>
                            <li>Replacing missing fence panels</li>
                            <li>Fixing broken fence gates</li>
                            <li>Fixing broken fence hardware, like hinges and latches</li>
                        </ul>
                    </div>
                    <div class="container position-relative">
                        <a href="#" class=" text-black px-4 border border-success rounded-pill"
                            style="position: absolute; right: 0;"><i class="fa-solid fa-pen-to-square"></i><span
                                style="margin-left: 10px;">Edit</span></a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Service</h2>
                    </div>
                    <div class="row">

                        <?php
                        for ($i = 0; $i < 3; $i++) {
                        ?>


                        <div class="col">
                            <div class="card">
                                <img class="card-img-top" src="/images/repair.jpg">
                                <div class="card-body">

                                    <h5 class="card-title">Fence and Gate Repair</h5>


                                    <div>
                                        <p class="font-weight-bold">from <b>៛20,000</b></p>
                                        <div class="d-flex justify-content-center">
                                            <!-- <a href="#" class="btn btn-primary mx-2">Go somewhere</a>
                                                <a href="#" class="btn btn-primary mx-2">Go somewhere</a>
                          -->
                                            <a href="#"
                                                class=" text-black px-4 border border-success rounded-pill mx-2"><i
                                                    class="fa-solid fa-pen-to-square"></i><span
                                                    style="margin-left: 10px;">Edit</span></a>
                                            <a href="#"
                                                class=" text-black px-4 border border-success rounded-pill mx-2"><i
                                                    class="fa-sharp fa-solid fa-trash"></i><span
                                                    style="margin-left: 10px;">Delete</span></a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php
                        }
                        ?>

                    </div>
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Add new service</h2>
                    </div>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">

                                <input type="text" class="form-control rounded-pill" id="ServiceName"
                                    placeholder="service name" value="" required>
                                <div class="invalid-feedback">
                                    Valid service name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control rounded-pill" id="Price"
                                    placeholder="Price start from" value="" required>
                                <div class="invalid-feedback">
                                    Valid last price is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control rounded" id="desc" rows="10"
                                    placeholder="Service Description"></textarea>

                            </div>
                            <div class="col-12">

                                <label for="serviceimage" class="form-label fs-5">Upload Photo</label>
                                <div class="input-group has-validation">

                                    <input type="file" class="form-control rounded-pill" id="username"
                                        placeholder="Add service" required>
                                    <div class="invalid-feedback">
                                        Your image is required.
                                    </div>
                                </div>
                            </div>
                            <button class="w-100 btn btn-primary btn-lg rounded-pill" type="submit"
                                style="background-color: #34868C;">Add new service</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-booking" role="tabpanel" aria-labelledby="pills-booking-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Booking information</h2>
                    </div>
                    <div class="table-responsive-xl">
                        <table class="table table-hover">
                            <thead>
                                <tr class="align-item-center" style="background-color: #34868C;">
                                    <th class="rounded-start-pill" scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Service Booking</th>
                                    <th scope="col">Book Date</th>
                                    <th class="rounded-end-pill" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-muted">1</th>
                                    <td><img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                                            width="20px" class="rounded-circle mx-2">Ly seng</td>
                                    <td>025792523</td>
                                    <td class="text-muted">exampksfn@gmail.com</td>
                                    <td class="text-muted">Phnom Penh</td>
                                    <td>Cleaning Service</td>
                                    <td>22-06-2023</td>
                                    <td>
                                        <a href="#" style="color:grey"><i
                                                class="fa-sharp fa-solid fa-trash fa-lg"></i></a>
                                        <a href="#" cla style="color:grey"><i
                                                class="fa-solid fa-circle-check fa-lg mx-3"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-muted">1</th>
                                    <td><img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                                            width="20px" class="rounded-circle mx-2">Ly seng</td>
                                    <td>025792523</td>
                                    <td class="text-muted">exampksfn@gmail.com</td>
                                    <td class="text-muted">Phnom Penh</td>
                                    <td>Cleaning Service</td>
                                    <td>22-06-2023</td>
                                    <td>
                                        <a href="#" style="color:grey"><i
                                                class="fa-sharp fa-solid fa-trash fa-lg"></i></a>
                                        <a href="#" cla style="color:grey"><i
                                                class="fa-solid fa-circle-check fa-lg mx-3"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-muted">1</th>
                                    <td><img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                                            width="20px" class="rounded-circle mx-2">Ly seng</td>
                                    <td>025792523</td>
                                    <td class="text-muted">exampksfn@gmail.com</td>
                                    <td class="text-muted">Phnom Penh</td>
                                    <td>Cleaning Service</td>
                                    <td>22-06-2023</td>
                                    <td>
                                        <a href="#" style="color:grey"><i
                                                class="fa-sharp fa-solid fa-trash fa-lg"></i></a>
                                        <a href="#" cla style="color:grey"><i
                                                class="fa-solid fa-circle-check fa-lg mx-3"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <nav class="justify-content-center nav" aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
            <div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Edit Profile</h2>
                    </div>
                    <div class="d-flex align-items-center my-4">
                        <div class="flex-shrink-0">
                            <img src="/images/fixmelogo.png" alt="Generic placeholder image"
                                class="img-fluid rounded-circle" style="width: 100px;">
                        </div>
                    </div>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">

                                <input type="text" class="form-control rounded-pill" id="CompanyName"
                                    placeholder="company name" value="" required>
                                <div class="invalid-feedback">
                                    Valid Company name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="email" class="form-control rounded-pill" id="Email" placeholder="Email"
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid Email is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="password" class="form-control rounded-pill" id="Password"
                                    placeholder="Password" value="" required>
                                <div class="invalid-feedback">
                                    Valid Password is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="password" class="form-control rounded-pill" id="NewPassword"
                                    placeholder="New password" value="" required>
                                <div class="invalid-feedback">
                                    Valid new password is required.
                                </div>
                            </div>


                            <div class="container text-center my-3">

                                <div class="row justify-content-end">
                                    <div class="col-3">
                                        <a class=" btn btn-secondary btn-md rounded-pill" type="submit">Cancel</a>
                                        <a class=" btn btn-success btn-md rounded-pill" type="submit">Save Changes</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Font Awesome CSS -->

@stop