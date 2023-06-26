@extends('layout.master')
<title>Companies</title>
<style>
    #container1 {
        background-color: #203D4A;
        /* green background */
    }
    #companies a{
        color: aqua;
        text-decoration: underline;
    }
</style>
@section('content')

<div id="container1">
    <div class="container py-5">
        <div class="row">
            <div class="text-center">
                <img src="/images/white-logo.png" alt="apple" width="170" height="100"><br>
                <h1 class="text-white pb-4">The easy, reliable way to take care of your home.</h1>
                <div class="mx-auto form-outline col-8">
                    <input type="search" id="form1" class="form-control rounded" placeholder=" &#xf002; Search company or service that you need..." aria-label="Search" style="font-family: FontAwesome;" />
                </div><br>
            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <div class="row">

    
    @foreach($companydetail as $company)
        <div class="col-12 col-md-6 col-lg-4 py-3">
            <div class="card">
                <div class="row g-0">
                    <div class="col-4 col-md-12 col-lg-4">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <img src="/images/fixmelogo.png" alt="FixMeHome" class="img-fluid rounded-circle p-1" style="width: 80px;">
                        </div>
                    </div>
                    <div class="col-8 col-md-12 col-lg-8">
                        <div class="p-2">
                            <h4 class="mb-2"><a href="/company_detail" class="text-decoration-none" style="color: #1383b5;">{{$company->company_name}}</a></h4>
                            <div class="d-flex align-items-center">
                                <span class="fa fa-star star-checked mr-1"></span>
                                <span class="mr-2"><strong>4.2</strong></span>
                                <p class="text-muted mb-0">(37 People rate this)</p>
                            </div>
                            <div class="d-flex mt-2">
                                <p class="mb-0 m-1">Service:</p>
                                <div class="m-1">
                                    <button class="btn btn-sm py-0 px-1" style="border-radius: 200px; color: #203D4A; background-color: #DEDEDE;">
                                        Handyman
                                    </button>
                                </div>
                                <div class="m-1">
                                    <button class="btn btn-sm py-0 px-1" style="border-radius: 200px; color: #203D4A; background-color: #DEDEDE;">
                                        Electrical
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

       


    </div>
</div>
@stop