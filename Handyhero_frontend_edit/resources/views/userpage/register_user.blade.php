@extends('layout.homemaster')
<title>Registration - User</title>
<link href="asset/css/style1.css" rel="stylesheet">

<style>
     #signup a {
        color: aqua;
        text-decoration: underline;
    }
</style>

@section('homecontent')
<div class="container p-5">
    <div class="title">Let’s create your account.</div>
    <div class="content">

        <form action="dataInsert" method="post" enctype="multipart/form-data" >
            @csrf

            <!-- form filling -->
            <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" name="user_fname" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="user_lname" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="user_email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="user_number" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="text" name="user_password" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="user_address"  placeholder="Enter Your Address" required>
                </div>
            </div>

            <!-- gender -->
            <div class="gender-details">
                <input type="radio" name="user_gender"  id="dot-1" value="Male">
                <input type="radio" name="user_gender"  id="dot-2" value="Female">
                <input type="radio" name="user_gender"  id="dot-3" value="Other">
                <span class="gender-title">Gender</span>
              <div class="category">
                <div>
                    <input class="form-check-input" type="radio" >
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label> 
                </div>
                <div>
                    <input class="form-check-input" type="radio" >
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" >
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefer not to say</span>
                    </label>
                </div>
              </div>
            </div>

            <!-- submit -->
            <div class="button">
                <input type="submit"  onclick="location.href='/login'" value="Register">
            </div>

        </form>
    </div>
</div>

@stop