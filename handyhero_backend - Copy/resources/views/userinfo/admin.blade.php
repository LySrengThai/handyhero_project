@extends('layout.master')
<title>User Info</title>
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
    }

    .table-body td {
        border: 2px solid #203D4A !important;
    }

    #userinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }

</style>

@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">User Table</h2>
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
                                        <input type="text" name="search" class="search"
                                            placeholder="Search User" style="width: 100%" value="{{ $search }}">
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
                <table class="table table-bordered table-hover" id="fixed-table">

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

                    <thead class="table-head text-center text-white" style=" background-color:#0e638b;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-body text-center">
                        @foreach ($user_detail as $detail)
                            <tr>
                                <td scope="col">{{ $detail->user_id }}</td>
                                <td scope="col">{{ $detail->user_fname }} {{ $detail->user_lname }}</td>
                                <td scope="col">{{ $detail->user_gender }}</td>
                                <td scope="col">{{ substr_replace($detail->user_number, '-', 3, 0) }}</td>
                                <td scope="col">{{ $detail->user_email }}</td>
                                <td>
                                    <a href="{{ url('/user_view' . $detail->user_id) }}"
                                        class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ url('/user_delete' . $detail->user_id) }}"
                                        class="btn btn-sm btn-danger">Block</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-2">
            {{ $user_detail->onEachSide(1)->links() }}
        </div>
    </div>
@stop
