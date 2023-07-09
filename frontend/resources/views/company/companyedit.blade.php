@extends('layout.companylayout')
<title>Company</title>

@section('content')
<div class="container my-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/companypage">Company</a></li>
            <li class="breadcrumb-item" aria-current="page">Profile</li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="col">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image href="https://info.ehl.edu/hubfs/Blog-EHL-Insights/Blog-Header-EHL-Insights/service%20design1.jpeg" width="100%" height="100%" />
                        <text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                    </svg>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('company.update', $company) }}" class="needs-validation" novalidate method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h5 class="card-title">Company Update</h5>
                            <div class="col-12">
                                <textarea class="form-control rounded" id="desc" rows="10" name="description" required>{{$company->description}}</textarea>
                            </div>
                        </div>
                        <div class="card-body">
                            <button class="w-1/2 btn btn-primary btn-lg rounded-pill" type="submit" style="background-color: #34868C;">Update service</button>
                            <a class="w-50 btn btn-light btn-lg rounded-pill" type="button" href="/companypage">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@stop