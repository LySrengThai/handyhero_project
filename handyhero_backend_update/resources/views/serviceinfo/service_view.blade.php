@extends('layout.master')
<title>Service Info</title>
<style>
    .table {
        min-width: max-content;
        border-collapse: separate;
    }

    .table-bordered {
        border: 2px solid #203D4A !important;
    }

    .table-head {
        position: sticky;
        top: 0;
    }

    .table-head th {
        border: 2px solid #203D4A !important;
    }

    .table-body {
        max-height: 200px;
        overflow-y: auto;
    }

    .table-body td {
        border: 2px solid #203D4A !important;
    }

    #serviceinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }
</style>

@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">Service Information</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5">

            <form action="" class="col my-0">
                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <div class="boxcontainer">
                            <table class="elementscontainer">
                                <tr>
                                    <td>
                                        <input type="text" name="search" class="search" placeholder="Search Service"
                                            value="{{ $search }}">
                                    </td>
                                    <td>
                                        <button class="btn"><i class='bx bx-search searchicon'></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </form>

            <div class="tbl-fixed scrollable" style="width: 100%;" id="table-container">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (count($service_detail) > 0)
                <table class="table table-bordered table-hover" id="fixed-table">
                    <thead class="table-head text-center text-white" style=" background-color:#0e638b;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Service Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-body text-center">
                        @foreach ($service_detail as $service)
                            <tr>
                                <td scope="col">{{ $service->service_id }}</td>
                                <td scope="col">{{ $service->service_name }}</td>
                                <td scope="col">{{ $service->company_name }}</td>
                                <td scope="col">{{ $service->category }}</td>
                                <td scope="col">៛{{ number_format($service->service_price) }}</td>
                                <td>
                                    <a href="{{ url('/service_view' . $service->service_id) }}"
                                        class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ url('/service_delete' . $service->service_id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3 class="text-center">No data available</h3>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center pt-2">
            {{ $service_detail->onEachSide(1)->links() }}
        </div>
    </div>
@stop
