@extends('layout.homemaster')
<title>Login</title>
<link href="asset/css/style1.css" rel="stylesheet">

<style>
    #login a {
        color: aqua;
        text-decoration: underline;
    }
</style>

@section('homecontent')
<div class="container p-5">
    <div class="title">Log In To Your Account</div>

    <div class="content">
        <form action="{{route ('userLoggedIn')}}" method="post" >

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('Success')}}
            </div>
            @endif

            @if(Session::has('fail'))
            <div class="alert alert-success">
                {{Session::get('fail')}}
            </div>
            @endif
            

            @csrf
            <div class="user-details">

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="user_email" placeholder="Enter your email" >
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="user_password" placeholder="Confirm your password">
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Register" onclick="location.href='/home';">
            </div>

        </form>
    </div>
</div>

@stop