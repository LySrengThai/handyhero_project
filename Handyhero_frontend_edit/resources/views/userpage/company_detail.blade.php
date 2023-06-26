@extends('layout.master')
<title>Company Detail</title>
<style>
    #companies a{
        color: aqua;
        text-decoration: underline;
    }
</style>
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col">
         
            <!-- Company Profile Picture -->
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="/images/fixmelogo.png" alt="Generic placeholder image" class="img-fluid rounded-circle" style="width: 150px;">
                </div>
            </div>
            <!-- Company Name -->
            <div>
                <h1 style="color:#1383b5;">Fix me home<</h1>
            </div>
            <!-- Company Category -->
            <div class="d-flex">
                <div class="m-2">
                    <button class="btn py-1 px-3" style="border-radius: 200px; background-color: aqua;">Handyman</button>
                </div>
                <div class="m-2">
                    <button class="btn py-1 px-3" style="border-radius: 200px; background-color: aqua;">Electrical</button>
                </div>
            </div>
        </div>


        <!-- Company Description -->
        <div style="color: #203D4A;">
            <div class="col-7 py-4" style="font-size: 32px;">
                <h2>Company Description</h2>
            </div>
            

            <div class="col-7" style="font-size: 24px;">
                <p>At FixMeHome, we deal with all kinds of fence damage caused by everything from extreme weather to a simple accident.
                    Some of the most common fence repair we handle include:
                </p>
                <!-- <ul>
                    <li>Tightening loose fence boards.</li>
                    <li>Replacing missing fence panels</li>
                    <li>Fixing broken fence gates</li>
                    <li>Fixing broken fence hardware, like hinges and latches</li>
                </ul> -->
            </div>
        </div>
    

        <div style="color: #203D4A;">
            <div class="py-4">
                <h2>Service</h2>
            </div>

            <div class="row">

                <?php
                for ($i = 0; $i < 3; $i++) {
                ?>

                    <div class="col-sm-4 my-3">
                        <div class="card">
                            <img class="card-img-top" src="/images/repair.jpg" width="30" height="100">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <h6 class="card-title">Fence and Gate Repair</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <button class="btn py-1 px-3" style="border-radius: 200px; background-color: aqua;">Handyman</button>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <span class="fa fa-star star-checked pt-2"></span>
                                    <span class="px-2 py-1"><b>4.2</b></span>
                                    <p class="py-1 text-muted">(37 People rate this)</p>
                                </div>
                                <div>
                                    <p>from <b>៛20,000</b></p>
                                    <div class="d-flex">
                                        <p><b>Service by </b><a href="/company_detail" style="color:#1383b5;">FixMeHome</a></p>
                                        <div class="flex-shrink-0">
                                            <img src="/images/fixmelogo.png" alt="Generic placeholder image" class="img-fluid rounded-circle p-1" style="width: 30px;">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="move-right"><a href="/service_detail" class="link-offset-2 link-underline link-underline-opacity-0" style="color:#1383b5;">Book Service <span style='font-size:20px;'>&#8594;</span></a></p>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>

        <div style="color: #203D4A;">
            <div class="col-7 py-4">
                <h2>Review from Customers</h2>
            </div>
            <!-- Overall rating -->
            <div class="d-flex">
                <span class="fa fa-star star-checked pt-2"></span>
                <span class="fa fa-star star-checked pt-2"></span>
                <span class="fa fa-star star-checked pt-2"></span>
                <span class="fa fa-star star-checked pt-2"></span>
                <span class="fa fa-star pt-2"></span>
                <span class="px-2 py-1"><b>4.2</b></span>
                <p class="py-1 text-muted">(37 People rate this)</p>
            </div>

            <?php
            for ($i = 0; $i < 3; $i++) {
            ?>

                <div class="card">
                    <div class="row p-2">
                        <div class="col-sm-2 ">
                            <div class="flex-shrink-0 d-flex justify-content-center">
                                <img src="/images/avatar.jpg" alt="Generic placeholder image" class="img-fluid rounded-circle p-1" style="width: 80px;">
                            </div>
                            <div>
                                <h5 class="text-center reviewer-name">Ming Sok</h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <span class="fa fa-star star-checked pt-2"></span>
                                <span class="px-2 py-1"><b>4.2</b></span>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-muted pt-2" style="font-size: 16px;">20 May 2023</div>
                            <div>
                                <p style="font-size: 20px; color: #203D4A;" class="pt-4">The installers were very clean, polite, and efficient in doing the job and they patiently figured out the
                                    waterline was located even though I had no idea.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div>
                                <p class="text-muted pt-2 text-center">13 minutes ago</p>
                            </div>
                        </div>
                    </div>
                </div><br>

            <?php
            }
            ?>

        </div>

        <div class="pt-3 pb-5 px-4" style="font-size: 20px;">
            <a href="#" class="move-right" style="color: #1383b5;">Read all</a>
        </div>

    </div>

</div>
@stop