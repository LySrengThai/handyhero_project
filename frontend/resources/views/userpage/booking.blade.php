@extends('layout.master')
<title>Booking</title>
<link type="text/css" rel="stylesheet" href="/asset/css/style1.css">

<style>
    #login a {
        color: aqua;
        text-decoration: underline;
    }
</style>

@section('content')
    <div class="container p-5">

        <div class="content">
            <h1 class="max-w-2xl mb-4 font-semibold tracking-tight leading-none text-3xl md:text-5xl xl:text-4xl dark:text-white"
                style="color: #2C6775;">
                {{ $servicedetail->service_name }}
            </h1>
            <span class="bg-cyan-500 shadow-lg shadow-cyan-500/50 p-2 text-xs rounded-full"><i
                    class="fa fa-briefcase pr-2 "></i> {{ $servicedetail->cat->category }}</span>
            <p style="color: #2C6775;" class="mt-3 tracking-tight my-2 lead">from <span class=" font-semibold text-sm/11">៛
                    {{ $servicedetail->service_price }}</span> </p>
            <h2 class="mr-auto tracking-tight my-2 lead">
                <span style="color: #2C6775;" class="font-semibold">Service</span> by
                <a style="color:#1B9C85" href="/company_detail" class="underline font-bold">
                    {{ $servicedetail->comp->company_name }}</a>
                <span class="rounded-full bg-cyan-500 text-xs p-2">

                    <img src="/images/fixmelogo.png" alt="Generic placeholder image" class="img-fluid rounded-circle p-1"
                        style="width: 30px;">

                </span>
            </h2>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif

            <form action="{{ route('bookingservice', ['service_id' => $servicedetail->service_id]) }}" method="post">
                @csrf
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="f_name" placeholder="Enter your first name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Last name</span>
                        <input type="text" name="l_name" placeholder="Enter your last name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" name="address" placeholder="Enter your address" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" name="number" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input type="date" name="book_date" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Book This Service">
                </div>
            </form>

        </div>
    </div>
@endsection
