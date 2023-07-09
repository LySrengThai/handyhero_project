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
<script>
    // Wait for the DOM to be ready
    document.addEventListener("DOMContentLoaded", function() {
        // Get all the delete buttons
        var deleteButtons = document.querySelectorAll(".delete-btn");

        // Add click event listeners to all delete buttons
        deleteButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                // Get the service ID from the data attribute
                var serviceId = button.getAttribute("data-service-id");

                // Make an AJAX request to the delete route
                fetch('/company/services/' + serviceId, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response
                    if (data.success) {
                        // Refresh the page or perform any other action
                        location.reload();
                    } else {
                        // Handle the error
                        console.error('Failed to delete service.');
                    }
                })
                .catch(error => {
                    // Handle the error
                    console.error(error);
                });
            });
        });
    });
</script>


@section('content')


<div class="container my-5">
    <div class="col d-flex align-items-start my-2">
        <div class="text-body-emphasis  d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
            <img src="/images/fixmelogo.png" alt="Generic placeholder image" class="img-fluid rounded-circle" style="width: 150px;">
        </div>
        <div>
            <h3 class="fs-2 mb-3" style="color:#1383b5;">{{ $company_data->company_name }}</h3>
            <div class="my-4">
                <p style="font-weight:600;" class="h5 mb-2">Email: {{ $company_data->company_email }}</p>
                <p style="font-weight:600;" class="h5">Phone number:
                    {{ substr_replace($company_data->company_number, '-', 3, 0) }}
                </p>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
    <div class="alert alert-success" data-bs-dismiss="alert" aria-label="Close">
        {{ Session::get('success') }}
    </div>
    @endif

    @if (Session::has('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif



    <div class="row border-top my-6 ">
        <ul class="nav justify-content-center  nav-justified" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fs-5 nav-link " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true" style="font-weight:600;color:#203D4A"><i class="fa-sharp fa-solid fa-bag-shopping mx-4"></i>Company Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class=" fs-5 nav-link " id="pills-service-tab" data-bs-toggle="pill" data-bs-target="#pills-service" type="button" role="tab" aria-controls="pills-service" aria-selected="true" style="font-weight:600;color:#203D4A"><i class="fa-sharp fa-solid fa-house-chimney mx-4"></i>Service</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="fs-5 nav-link " id="pills-booking-tab" data-bs-toggle="pill" data-bs-target="#pills-booking" type="button" role="tab" aria-controls="pills-booking" aria-selected="true" style="font-weight:600;color:#203D4A"><i class="fa-solid fa-window-restore mx-4"></i>Booking</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="fs-5 nav-link " id="pills-setting-tab" data-bs-toggle="pill" data-bs-target="#pills-setting" type="button" role="tab" aria-controls="pills-setting" aria-selected="true" style="font-weight:600;color:#203D4A"><i class="fa-solid fa-gear mx-4"></i>Setting</button>
            </li>
        </ul>

        {{-- Company Tab --}}
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Company Profile</h2>
                    </div>
                    <div class="col-7" style="font-size: 24px;">
                        <p class="lead">{!! nl2br(e($company_data->description)) !!}</p>
                    </div>
                    <div class="container position-relative">
                        <a href="{{ route('company.edit', $company_data->company_id)}}" class=" text-black px-4 border border-success rounded-pill" style="position: absolute; right: 0;"><i class="fa-solid fa-pen-to-square"></i><span style="margin-left: 10px;">Edit</span></a>
                    </div>
                </div>
            </div>

            {{-- Service Tab --}}
            <div class="tab-pane fade " id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Service</h2>
                    </div>
                    <div class="row">
                        @foreach ($services as $service)
                        <div class="col-3 col-md-4 mt-2">
                            <div class="card">
                                <img class="card-img-top" src="/images/repair.jpg">
                                <div class="card-body">

                                    <h5 class="card-title">
                                        {{ $service->service_name }}
                                    </h5>

                                    <div>
                                        <p class="font-weight-bold">from <b>៛
                                                {{ number_format($service->service_price) }}
                                            </b></p>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('services.edit', $service->service_id) }}" class="text-black px-4 border border-success rounded-pill mx-2"><i class="fa-solid fa-pen-to-square"></i><span style="margin-left: 10px;">Edit</span></a>
                                            <form action="{{ route('services.delete',$service->service_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger px-4 border border-danger rounded-pill mx-2"><i class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Add new service</h2>
                    </div>
                    <form class="needs-validation" action="{{ route('insertservice') }}" novalidate method="POST">

                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="servicename">Service Name</label>
                                <input type="text" class="form-control rounded-pill" id="ServiceName" placeholder="Service Name" name="servicename" required>
                                <div class="invalid-feedback">
                                    Valid service name is required.
                                </div>
                            </div>

                            <input type="hidden" value="{{ $company_data->company_id }}" name="companyID" readonly>

                            <div class="col-sm-6">
                                <label for="companyname">Company Name</label>
                                <input type="text" class="form-control rounded-pill" value="{{ $company_data->company_name }}" readonly>
                            </div>

                            <div class="col-sm-6">
                                <label for="sercategory">Category</label>
                                <select class="form-control rounded-pill" aria-label="Default select example" name="category" required>
                                    <option selected disabled>Please Select Category</option>
                                    @foreach ($category as $cate)
                                    <option value="{{ $cate->cate_id }}">{{ $cate->category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="serviceprice">Price</label>
                                <input type="text" class="form-control rounded-pill" id="Price" placeholder="Price Start From" name="serviceprice" required>
                                <div class="invalid-feedback">
                                    Valid last price is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control rounded" id="desc" rows="10" name="serdescription" placeholder="Service Description"></textarea>
                            </div>

                            {{-- <div class="col-12">

                                    <label for="serviceimage" class="form-label fs-5">Upload Photo</label>
                                    <div class="input-group has-validation">

                                        <input type="file" class="form-control rounded-pill" id="username"
                                            placeholder="Add service" required>
                                        <div class="invalid-feedback">
                                            Your image is required.
                                        </div>
                                    </div>
                                </div> --}}

                            <button class="w-100 btn btn-primary btn-lg rounded-pill" type="submit" style="background-color: #34868C;">Add new service</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="tab-pane fade" id="pills-booking" role="tabpanel" aria-labelledby="pills-booking-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Booking information</h2>
                    </div>
                    <div class="table-responsive-lg">
                        <table class="table table-hover">
                            <thead class="align-item-center text-center text-white" style="background-color: #34868C;">
                                <tr>
                                    <th class="rounded-start-pill" scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Book Date</th>
                                    <th class="rounded-end-pill" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $book)
                                <tr>
                                    <th scope="row" class="text-muted">{{ $loop->iteration }}</th>
                                    <td><img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" width="20px" class="rounded-circle mx-2">{{ $book->f_name }}&#160;{{ $book->l_name }}
                                    </td>
                                    <td>{{ $book->number }}</td>
                                    <td class="text-muted">{{ $book->email }}</td>
                                    <td class="text-muted">{{ $book->address }}</td>
                                    <td>{{ $book->service_name }}</td>
                                    <td class="text-nowrap">{{ $book->book_date }}</td>
                                    <td>
                                        <a href="" style="color: grey;"><i class="fa-sharp fa-solid fa-trash fa-lg"></i></a>
                                        <a href="#" style="color: grey; margin-left: 5%;"><i class="fa-solid fa-circle-check fa-lg"></i></a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="d-flex justify-content-center pt-2">
                        {{ $bookings->onEachSide(1)->links('pagination') }}
                    </div>
                    {{-- <nav class="justify-content-center nav" aria-label="...">
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
                        </nav> --}}
                </div>
            </div>
            <div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                <div style="color: #203D4A;">
                    <div class="col-7 py-4" style="font-size: 32px;">
                        <h2>Edit Profile</h2>
                    </div>
                    <div class="d-flex align-items-center my-4">
                        <div class="flex-shrink-0">
                            <img src="/images/fixmelogo.png" alt="Generic placeholder image" class="img-fluid rounded-circle" style="width: 100px;">
                        </div>
                    </div>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">

                                <input type="text" class="form-control rounded-pill" id="CompanyName" placeholder="company name" value="{{ $company_data->company_name }}" required>
                                <div class="invalid-feedback">
                                    Valid Company name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="email" class="form-control rounded-pill" id="Email" placeholder="Email" value="{{ $company_data->company_email }}" required>
                                <div class="invalid-feedback">
                                    Valid Email is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="password" class="form-control rounded-pill" id="Password" placeholder="Password" value="" required>
                                <div class="invalid-feedback">
                                    Valid Password is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="password" class="form-control rounded-pill" id="NewPassword" placeholder="New password" value="" required>
                                <div class="invalid-feedback">
                                    Valid new password is required.
                                </div>
                            </div>


                            <div class="container text-center my-3">

                                <div class="row justify-content-end">
                                    <div class="col-3">
                                        <a class=" btn btn-secondary btn-md rounded-pill" type="submit">Cancel</a>
                                        <a class=" btn btn-success btn-md rounded-pill" type="submit">Save
                                            Changes</a>
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