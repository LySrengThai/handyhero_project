@extends('layout.homemaster')
<title>Log Into Your Page</title>
<link href="asset/css/style1.css" rel="stylesheet">

<style>
    #login a {
        color: aqua;
        text-decoration: underline;
    }
</style>

@section('homecontent')
<div class="container p-5">
    <div class="title">Log In To Your Page</div>

    <div class="content">
        <form action="{{route ('companyLoggedIn')}}" method="post" >

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
                    <span class="details">Company's Email</span>
                    <input type="text" name="company_email" placeholder="Enter your email" >
                </div>
                <div class="input-box">
                    <span class="details">Company's Password</span>
                    <input type="password" name="company_password" placeholder="Confirm your password">
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Log Into Page" onclick="location.href='/companylogin';">
            </div>

        </form>
    </div>
</div>

@stop