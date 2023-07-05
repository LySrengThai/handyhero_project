@extends ('layout.master')
<title>Service Detail</title>
<style>
    #services a {
        color: aqua;
        text-decoration: underline;
    }
</style>
@section('content')
<div class="container">
    <div class="top-image">
        <img class="rounded border" src="/images/repair.jpg" width="100%" height="40%">
    </div><br>
    <div class="row">
        <div class="col">
            <h1 style="color: #203D4A;">{{ \Illuminate\Support\Str::limit($servicedetail->service_name, 50) }}</h1>
            <button class="btn py-1 px-3" style="border-radius: 200px; background-color: aqua;">{{ \Illuminate\Support\Str::limit($servicedetail->category, 50) }}</button>
            <p class="pt-2">From <b>៛{{number_format($servicedetail->service_price)}}</b></p>
            <div class="d-flex">
                <p><b>Service by </b><a href="{{ url('/company_detail' . $servicedetail->company_id) }}" style="color:#1383b5;">{{ \Illuminate\Support\Str::limit($servicedetail->company_name, 50) }}</a></p>
                <div class="flex-shrink-0">
                    <img src="/images/fixmelogo.png" alt="Generic placeholder image" class="img-fluid rounded-circle p-1" style="width: 30px;">
                </div>
            </div>

        </div>
        <div class="col">
            <div class="move-right">
                <button class="btn btn-lg py-0 px-3" style="background-color: #1383b5; border-radius: 200px;">
                    <a href="/booking" class="link-offset-2 link-underline link-underline-opacity-0 text-white">Book Service</a></button>
            </div>
        </div>
    </div>

    <div class="row">
        <div style="color: #203D4A;">
            <div class="col-7 py-4">
                <h2 style="font-size: 32px;">Service Description</h2>
            </div>

            <div class="col-7" style="font-size: 24px;">
                <p>{!! nl2br(e($servicedetail->service_description)) !!}</p>
            </div>
        </div>
    </div>


    <div class="row">
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

</div><br>

@stop