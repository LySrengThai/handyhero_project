@extends('layout.master')
<title>HandyHero</title>
<style>
    #container1 {
        background-color: #203D4A;
        /* green background */
    }

    #homepage a {
        color: aqua;
        text-decoration: underline;
    }

    .search-container {
        display: flex;
        align-items: center;
    }

    .search-icon {
        background-color: #f8f9fa;
        /* Set the background color to match the input field */
        padding: 0.5rem;
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .search-icon i {
        color: #6c757d;
        /* Set the icon color to match the input field */
    }
</style>

@section('content')

    <div id="container1" class="py-5">
        <div class="container pt-5 mb-2">
            <div class="row">
                <div class="col-md-6 ">
                    <div>
                        <div class="titletext1 text-white">
                            <h5 class="fs-3 lead ">HandyHero</h5>
                        </div>
                        <div class="titletext2 text-white">
                            <h1 style="font-size: 40px;">The easy, reliable way to take care of your home.</h1>
                        </div>
                        {{-- <div class="form-outline mt-5">
                        <input type="search" id="form1" class="form-control rounded-pill py-2" placeholder=" &#xf002; Search company or service that you need..." aria-label="Search" style="font-family: FontAwesome;" />
                    </div> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bigpic">
                        <td>
                            <img src="images/bigpic1.png" alt="bigpic" width="550">
                        </td>
                    </div>
                </div>
                <div class="col-12 ">
                    <p id="seemore" class="lead fs-6 text-info text-decoration-none " style="cursor:pointer"><i
                            class="bi bi-arrow-down mx-2"></i>Scroll down to see more</p>
                </div>
            </div>

        </div>
    </div>


    <div id="mysection" class="container">

        <div class="d-flex justify-content-between mt-3">
            <div>
                <div>
                    <h2>Services</h2>
                </div>
            </div>
            <div class="ml-5" style="font-size: 20px;">
                <a href="/service" style="color: #1383b5;">See all</a>
            </div>
        </div>


        <div class="row">
            @foreach ($servicedetail as $service)
                <div class="col-sm-4 my-3">
                    <div class="card">
                        <img class="card-img-top" src="/images/repair.jpg" width="30" height="100">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h6 class="card-title text-truncate">
                                        {{ \Illuminate\Support\Str::limit($service->service_name, 20) }}</h6>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button class="btn py-1 px-3"
                                        style="border-radius: 200px; background-color: aqua;">{{ \Illuminate\Support\Str::limit($service->category, 11) }}</button>
                                </div>
                            </div>
                            <div class="d-flex">
                                <span class="fa fa-star star-checked pt-2"></span>
                                <span class="px-2 py-1"><b>4.2</b></span>
                                <p class="py-1 text-muted">(37 People rate this)</p>
                            </div>
                            <div>
                                <p>from <b>៛{{ number_format($service->service_price) }}</b></p>
                                <div class="d-flex">
                                    <p><b>Service by </b><a href="{{ url('/company_detail' . $service->company_id) }}" style="color:#1383b5;">
                                            {{ \Illuminate\Support\Str::limit($service->company_name, 10) }}
                                        </a></p>
                                    <div class="flex-shrink-0">
                                        <img src="/images/fixmelogo.png" alt="Generic placeholder image"
                                            class="img-fluid rounded-circle p-1" style="width: 30px;">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="move-right"><a href="{{ url('/service_detail' . $service->service_id) }}"
                                        class="link-offset-2 link-underline link-underline-opacity-0"
                                        style="color:#1383b5;">Book Service <span style='font-size:20px;'>&#8594;</span></a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div><br>

        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <div>
                        <h2>Companies</h2>
                    </div>
                </div>
                <div class="ml-5" style="font-size: 20px;">
                    <a href="/company" style="color: #1383b5;">See all</a>
                </div>
            </div>
            @foreach ($companydetail as $company)
                <div class="col-12 col-md-6 col-lg-4 py-3">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-4 col-md-12 col-lg-4">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="/images/fixmelogo.png" alt="FixMeHome" class="img-fluid rounded-circle p-1"
                                        style="width: 80px;">
                                </div>
                            </div>
                            <div class="col-8 col-md-12 col-lg-8">
                                <div class="p-2">
                                    <h4 class="mb-2 text-truncate">
                                        <a href="{{ url('/company_detail' . $company->company_id) }}"
                                            class="text-decoration-none"
                                            style="color: #1383b5;">{{ $company->company_name }}</a>
                                    </h4>
                                    <div class="d-flex align-items-center">
                                        <span class="fa fa-star star-checked mr-1"></span>
                                        <span class="mr-2"><strong>4.2</strong></span>
                                        <p class="text-muted mb-0">(37 People rate this)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><br>

    </div>
    <script>
        document.getElementById('seemore').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('mysection').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>



    <!-- END OF company as service provider -->
@stop
