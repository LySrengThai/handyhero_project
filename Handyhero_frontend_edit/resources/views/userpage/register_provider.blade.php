@extends('layout.homemaster')
<title>Registration - Provider</title>
<link href="asset/css/style1.css" rel="stylesheet">

@section('homecontent')

    <div class="container p-5">
        <div class="title">Let's Build You A Company's Account</div>
        <div class="content">

            <form action="companyregister_dataInsert" method="post" enctype="multipart/form-data">
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

                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Company's Name</span>
                        <input type="text" name="company_name" placeholder="Enter Company's Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Company's Email</span>
                        <input type="text" name="company_email" placeholder="Enter Company's Email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Company's Number</span>
                        <input type="text" name="company_number" placeholder="Company's Contact Number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Company's Address</span>
                        <input type="text" name="company_address" placeholder=" Company's Address" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" name="company_password" placeholder="Create A Password" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="text" name="company_description" placeholder="Description" required>
                    </div>

                </div>

                <div class="button">
                    <input type="submit" value="Create Company's Page">
                </div>
            </form>



            <div class="title">Already have a page?</div>
            <div class="login">
                <div class="button">
                    <input type="submit" value="Login Company's Page" onclick="location.href='/companylogin';">
                </div>
            </div>
        </div>
    </div>

@stop
