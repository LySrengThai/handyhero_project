@extends('layout.master')
<title>User Info</title>
<style>
    #serviceinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }
</style>
@section('content')

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7" style="font-size: 32px;">
            <h2 class="text-white text-truncate">{{ $service_detail[0]->service_name }} Delete</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center pt-5">
                <div class="card">
                    <h4 class="card-header text-capitalize">do you want to Delete? {{ $service_detail[0]->service_name }}
                    </h4>
                    <div class="card-body">
                        <a href="/service_info" class="btn btn-sm btn-primary">No</a>
                        <a href="/servicedelete/{{ $service_detail[0]->service_id }}" class="btn btn-sm btn-danger">Yes</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4"></div>
        </div>
    </div>
@stop
