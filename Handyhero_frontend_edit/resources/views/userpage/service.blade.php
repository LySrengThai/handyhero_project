@extends('layout.master')
<title>Service</title>
<style>
#container1 {
    background-color: #203D4A;
    /* green background */
}

#services a {
    color: aqua;
    text-decoration: underline;
}
</style>
@section('content')

<div id="container1">
    <div class="container py-5">
        <div class="row">
            <div class="text-center">
                <img src="/images/white-logo.png" alt="apple" width="170" height="100"><br>
                <h1 class="text-white pb-4">The easy, reliable way to take care of your home.</h1>
                <div class="mx-auto form-outline col-8 ">
                    <input type="search" id="serviceSearch" class="form-control rounded-pill p-2"
                        placeholder=" &#xf002; Search service that you need..." aria-label="Search"
                        style="font-family: FontAwesome;" />
                </div><br>
                <div class="row pb-5">
                    <div class="d-flex justify-content-center">
                        <div class="mx-2">
                            <button class="btn py-1 px-3"
                                style="background-color: aqua; border-radius: 200px; color: #203D4A;">All
                                Service</button>
                        </div>
                        <div class="mx-2">
                            <button class="btn py-1 px-3"
                                style="border-radius: 200px; color: #203D4A; background-color: #DEDEDE;">Handyman</button>
                        </div>
                        <div class="mx-2">
                            <button class="btn py-1 px-3"
                                style="border-radius: 200px; color: #203D4A; background-color: #DEDEDE;">Plumbing</button>
                        </div>
                        <div class="mx-2">
                            <button class="btn py-1 px-3"
                                style="border-radius: 200px; color: #203D4A; background-color: #DEDEDE;">Electrical</button>
                        </div>
                        <div class="mx-2">
                            <button class="btn py-1 px-3"
                                style="border-radius: 200px; color: #203D4A; background-color: #DEDEDE;">Cleaning</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">

        @foreach ($servicedetail as $service)
        <div class="col-sm-4 my-3 service-card" >
            <div class="card border-0 shadow bg-body rounded">
                <img class="card-img-top" src="/images/repair.jpg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h6 class="card-title">{{$service->service_name}}</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn py-1 px-3"
                                style="border-radius: 200px; background-color: aqua;">{{$service->category}}</button>
                        </div>
                    </div>
                    <div class="d-flex">
                        <span class="fa fa-star star-checked pt-2"></span>
                        <span class="px-2 py-1"><b>4.2</b></span>
                        <p class="py-1 text-muted">(37 People rate this)</p>
                    </div>
                    <div>
                        <p>from <b>៛{{number_format($service->service_price)}}</b></p>
                        <div class="d-flex">
                            <p><b>Service by </b><a href="/company_detail" style="color:#1383b5;">FixMeHome</a></p>
                            <div class="flex-shrink-0">
                                <img src="/images/fixmelogo.png" alt="Generic placeholder image"
                                    class="img-fluid rounded-circle p-1" style="width: 30px;">
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="move-right"><a href="/service_detail"
                                class="link-offset-2 link-underline link-underline-opacity-0"
                                style="color:#1383b5;">Book Service <span style='font-size:20px;'>&#8594;</span></a></p>
                    </div>

                </div>
            </div>
        </div>
        <!-- ------------------- -->
        @endforeach
        <div id="notFoundMessage"class="container align-items-center justify-content-center" style="display: none;">
            <div class="alert alert-info text-center">
                <h3 class="mb-4">No results found</h3>
                <p>Sorry, we couldn't find any matching results for your search.</p>
                <p>Please try again with a different search term.</p>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // Listen for changes in the search input
    $('#serviceSearch').on('input', function() {
        var searchText = $(this).val().toLowerCase(); // Get the entered search text
        var $serviceCards = $('.service-card'); // Get all service cards
        var $notFoundMessage = $('#notFoundMessage'); // Get the "Not Found" message element

        // Filter the service cards based on the search text
        var $filteredCards = $serviceCards.filter(function() {
            var serviceName = $(this).find('.card-title').text().toLowerCase(); // Get the service name
            return serviceName.includes(searchText);
        });

        // Show/hide service cards and "Not Found" message based on the search results
        if ($filteredCards.length > 0) {
            $serviceCards.hide();
            $filteredCards.show();
            $notFoundMessage.hide();
        } else {
            $serviceCards.hide();
            $notFoundMessage.show();
        }
    });
});

</script>


@stop