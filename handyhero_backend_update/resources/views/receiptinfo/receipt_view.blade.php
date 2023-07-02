@extends('layout.master')
<title>Receipt Info</title>
<style>
    #receiptinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }


    .card-header {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
    }

    .address-wrap {
        word-wrap: break-word;
    }
</style>

@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">Receipt Detail</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-7 d-flex ">
                <div class="b_btn">
                    <button class="btn btn-sm btn-back" type="submit" onclick="history.back()">Back</button>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <h5 class="m-0 font-weight-bold text-center text-white mx-auto d-block">Handyhero Receipt</h5>
                        <img src="../assets/images/white-logo.png" alt="" width="100" height="60"
                            class="mx-auto d-block"><br>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Receipt Date:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>{{ $receipt_detail->receipt_date }}</p>
                            </div>
                        </div>
                        <hr class="mt-0">

                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Name of User:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>{{ $receipt_detail->user_fname }} {{ $receipt_detail->user_lname }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Phone Number:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>{{ substr_replace($receipt_detail->user_number, '-', 3, 0) }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Email Address:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>{{ $receipt_detail->user_email }}</p>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-between">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Address:</p>
                            </div>
                            <div class="col-8 text-right">
                                <p class="mb-0">{{ $receipt_detail->user_address }}</p>
                            </div>
                        </div>

                        <hr class="mt-0">

                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Company:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>{{ $receipt_detail->company_name }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Service:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>{{ $receipt_detail->service_name }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Booking Date:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>{{ $receipt_detail->booking_date }}</p>
                            </div>
                        </div>
                        <hr class="mt-0">

                        <div class="row">
                            <div class="col-4">
                                <p class="font-weight-bold text-left">Total Price:</p>
                            </div>
                            <div class="col-8 d-flex align-items-end justify-content-end">
                                <p>៛{{ number_format($receipt_detail->receipt_price) }}
                                <p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
