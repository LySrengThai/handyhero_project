@extends('layout.master')
<title>Booking Info</title>
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

    #bookinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        margin: 3%;
        border-radius: 25px;
    }
</style>

@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">Booking Information</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="tbl-fixed scrollable" style="width: 100%;" id="table-container">

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

                @if (count($book_detail) > 0)
                    <table class="table table-bordered table-hover" id="fixed-table">
                        <thead class="table-head text-center text-white" style="background-color:#0e638b;">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User Booked</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Company Booked</th>
                                <th scope="col">Service Booked</th>
                                <th scope="col">Book Date</th>
                                <th scope="col">Booking Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body text-center">

                            @foreach ($book_detail as $book)
                                <tr">
                                    <td scope="col">{{ $book->book_id }}</td>
                                    <td scope="col" class="text-wrap text-truncate">{{ $book->f_name }}
                                        {{ $book->l_name }}</td>
                                    <td scope="col">{{ $book->email }}</td>
                                    <td scope="col">{{ substr_replace($book->number, '-', 3, 0) }}</td>
                                    <td scope="col">{{ $book->company_name }}</td>
                                    <td scope="col">{{ $book->service_name }}</td>
                                    <td scope="col">{{ $book->book_date }}</td>
                                    <td scope="col">{{ $book->address }}</td>
                                    @if ($book->status == 1)
                                        <td scope="col" class="fw-bold text-success">Completed</td>
                                        <td scope="col" style="background-color:#0e638b;"></td>
                                    @elseif ($book->status == 0)
                                        <td scope="col" class="fw-bold text-danger">Incomplete</td>
                                        <td scope="col" class="">
                                            <a href="{{ route('booking.complete', $book->book_id) }}"
                                                class="btn btn-sm btn-success">Done</a>
                                            <a href="{{ route('booking.cancel', $book->book_id) }}"
                                                class="btn btn-sm btn-danger">Cancel</a>
                                        </td>
                                    @else
                                        <td scope="col" class="fw-bold text-danger">Canceled</td>
                                        <td scope="col" style="background-color:#0e638b;"></td>
                                    @endif
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
            {{ $book_detail->onEachSide(1)->links() }}
        </div>
    </div>
@stop
