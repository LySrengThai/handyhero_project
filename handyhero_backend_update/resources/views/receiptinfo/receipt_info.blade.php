@extends('layout.master')
<title>Receipt Info</title>
<style>
    .table {
        border-collapse: separate;
    }

    .table-bordered {
        border: 2px solid #203D4A !important;
    }

    .table-head {
        position: sticky;
        top: 0;
        z-index: 1;
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

    #receiptinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }
</style>

@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">Receipt Information</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="tbl-fixed scrollable" style="width: 100%;" id="table-container">
                @if (count($receipt_detail) > 0)
                <table class="table table-bordered table-hover" id="fixed-table">
                    <thead class="table-head text-center text-white" style="background-color:#0e638b;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-body text-center">
                        @foreach ($receipt_detail as $receipt)
                            <tr class="text-nowrap">
                                <td scope="col">{{ $receipt->receipt_id }}</td>
                                <td scope="col">{{ $receipt->company_name }}</td>
                                <td scope="col">{{ $receipt->service_name }}</td>
                                <td scope="col">{{ $receipt->user_fname }} {{ $receipt->user_lname }}</td>
                                <td scope="col">{{ $receipt->receipt_date }}</td>
                                <td scope="col">៛{{ number_format($receipt->receipt_price) }}</td>
                                <td scope="col">
                                    <a href="{{ url('/receipt_view' . $receipt->receipt_id) }}"
                                        class="btn btn-sm btn-primary">View</a>
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
            {{ $receipt_detail->onEachSide(1)->links() }}
        </div>
    </div>
@stop
