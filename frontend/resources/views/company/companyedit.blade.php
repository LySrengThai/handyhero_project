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
    @if (Session::has('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/companypage">Company</a></li>
            <li class="breadcrumb-item" aria-current="page">Service</li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/images/working.png" height="450px">
            </div>
            <div class="col-md-8">
                <div class="card-body bg-white">
                    <div class="col-7 py-2">
                        <h3>{{ $service->service_name }} </h3>
                        <h5><span class="badge text-bg-primary">Update</span></h5>
                    </div>
                    <form action="{{ route('services.update', $service) }}" class="needs-validation" novalidate method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="servicename">Service Name</label>
                                <input type="text" class="form-control rounded-pill" id="ServiceName"  value="{{ $service->service_name }}" name="servicename" required>
                                <div class="invalid-feedback">
                                    Valid service name is required.
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <label for="companyname">Company Name</label>
                                <input type="text" disabled class="form-control rounded-pill" value="{{ $service->comp->company_name }}" readonly>
                            </div>

                            <div class="col-sm-6">
                                <label for="category">Category</label>
                                <select class="form-control rounded-pill" aria-label="Default select example" name="category" required>
                                    <option selected disabled>Please Select Category</option>
                                    @foreach ($category as $cat)
                                    <option value="{{ $cat->cate_id }}" {{ $service->cate_id == $cat->cate_id ? 'selected' : '' }}>
                                        {{ $cat->category }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="serviceprice">Price</label>
                                <input type="text" class="form-control rounded-pill" id="Price" value="{{ $service->service_price }}" name="serviceprice" required>
                                <div class="invalid-feedback">
                                    Valid last price is required.
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control rounded" id="desc" rows="10" name="serdescription"  required>{{ $service->service_description}}</textarea>
                            </div>
                            <button class="w-50 btn btn-primary btn-lg rounded-pill" type="submit" style="background-color: #34868C;">Update service</button>
                            <a class="w-50 btn btn-light btn-lg rounded-pill" type="button"  href="/companypage">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Font Awesome CSS -->

@stop