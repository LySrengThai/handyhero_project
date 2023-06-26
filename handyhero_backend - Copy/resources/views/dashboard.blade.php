@extends('layout.master')
<title>Dashboard</title>
<style>
    #dashboard {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }
</style>

@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">Dashboard</h2>
        </div>
    </div>

    <div class="container-fluid pt-3">
        <div class="row px-5">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-truncate">Total Users</h5>
                        <i class='bx bx-group' style="font-size: 24px;"></i>
                    </div>

                    <h1 class="d-flex justify-content-end">{{ $totaluser }}</h1>
                    <a href="/user_info" class="text-white d-flex justify-content-end">View</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-info text-white mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-truncate">Total Companies</h5>
                        <i class='bx bx-building' style="font-size: 24px;"></i>
                    </div>

                    <h1 class="d-flex justify-content-end">{{ $totalcompany }}</h1>
                    <a href="/company_info" class="text-white d-flex justify-content-end">View</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-truncate">Total Service</h5>
                        <i class='bx bx-wrench' style="font-size: 24px;"></i>
                    </div>

                    <h1 class="d-flex justify-content-end">{{ $totalservice }}</h1>
                    <a href="/service_info" class="text-white d-flex justify-content-end">View</a>
                </div>
            </div>

            {{-- If the count of booking during that month is more than 0, the color to the card is green.  --}}
            @if ($thisMonthBook > 0)
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="text-truncate">This Month Booking</h5>
                            <i class='bx bx-calendar' style="font-size: 24px;"></i>
                        </div>
                        <h1 class="d-flex justify-content-end">{{ $thisMonthBook }}</h1>
                        <a href="/booking_info" class="text-white d-flex justify-content-end">View</a>
                    </div>
                </div>
                {{-- Else if the count of booking during that month is 0, the color to the card is red --}}
            @else
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="text-truncate">This Month Booking</h5>
                            <i class='bx bx-calendar' style="font-size: 24px;"></i>
                        </div>
                        <h1 class="d-flex justify-content-end">{{ $thisMonthBook }}</h1>
                        <a href="/booking_info" class="text-white d-flex justify-content-end">View</a>
                    </div>
                </div>
            @endif
        </div>

        <div class="row px-5">
            <div class="col-12 col-sm-6 pb-2">
                <div class="card">
                    <div class="card-head bg-dark text-white py-3">
                        <div class="d-flex justify-content-between px-3">
                            <h5 class="text-truncate">Latest Users</h5>
                            <a href="/user_info" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover m-0" style="width: 100%;">
                                <thead class="table-head text-center text-white" style="background-color:#0e638b;">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gender</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body text-center">
                                    @foreach ($user_detail as $detail)
                                        <tr>
                                            <td scope="col">{{ $detail->user_fname }} {{ $detail->user_lname }}</td>
                                            <td scope="col">{{ $detail->user_gender }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 pb-2">

            </div>

        </div>
    </div>

@stop
