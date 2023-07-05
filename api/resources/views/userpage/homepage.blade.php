@extends('layout.homemaster')
<style>
    #container1 {
        background-color: #203D4A;
        height: 100vh;
        display: flex;
    }

    .text {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
    }
</style>
@section('homecontent')

<div id="container1">
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <div class="text">
                    <div class="titletext1 text-white">
                        <h5 style="font-size: 18px;">HandyHero</h5>
                    </div>
                    <div class="titletext2 text-white">
                        <h1 style="font-size: 50px;">The easy, reliable way to take care of your home.</h1>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="bigpic">
                    <img src="images/bigpic1.png" alt="bigpic" width="650" height="550">
                </div>
            </div>
        </div>
    </div>
</div>
@stop