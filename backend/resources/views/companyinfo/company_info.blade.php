@extends('layout.master')
<title>Company Info</title>
<style>
    .table {
        min-width: max-content;
        border-collapse: separate;
    }

    .table-bordered {
        border: 2px solid #203D4A !important;
    }

    .table-head {
        background-color: #0e638b;
        position: sticky;
        top: 0px;
    }

    .table-head th {
        border: 2px solid #203D4A !important;
    }

    .table-body td {
        border: 2px solid #203D4A !important;
    }

    #companyinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }
</style>

@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">Company Information</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        {{-- new row and make padding of x-axis times 3 --}}
        <div class="row px-5">
            {{-- Search bar column  --}}
            <form action="" class="col my-0">
                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <div class="boxcontainer">
                            <table class="elementscontainer">
                                <tr>
                                    <td>
                                        <input type="text" name="search" class="search" placeholder="Search Company"
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
                {{-- Alert after update new info or delete info --}}
                @if (Session::has('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger" id="fail-alert">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @if (count($company_detail) > 0)
                    <table class="table table-bordered table-hover" id="fixed-table">
                        <thead class="table-head text-center text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Company Phone</th>
                                <th scope="col">Company Email</th>
                                <th scope="col">Publish Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body text-center">
                            @foreach ($company_detail as $company)
                                <tr>
                                    <td scope="col">{{ $company->company_id }}</td>
                                    <td scope="col">{{ $company->company_name }}</td>
                                    <td scope="col">{{ substr_replace($company->company_number, '-', 3, 0) }}</td>
                                    <td scope="col">{{ $company->company_email }}</td>
                                    <td scope="col">{{ \Carbon\Carbon::parse($company->created_at)->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/company_view' . $company->company_id) }}"
                                            class="btn btn-sm btn-primary">View</a>
                                        <a href="{{ url('/company_delete' . $company->company_id) }}"
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
            {{ $company_detail->onEachSide(1)->links() }}
        </div>
    </div>
@stop
