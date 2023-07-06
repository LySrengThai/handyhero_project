@extends('layout.master')
<title>Company Info</title>
<style>
    form {
        width: 100%;
    }

    .b_btn button {
        background-color: #1383b5;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .b_btn button:hover {
        background-color: aqua;
        color: white;
    }

    .table-bordered {
        border: 2px solid #203D4A !important;
    }

    .table-body th {
        border: 2px solid #203D4A !important;
        background-color: #0e638b;
        color: white;
    }

    .table-body {
        max-height: 200px;
        overflow-y: auto;
    }

    .table-body td {
        border: 2px solid #203D4A !important;
    }

    .table-body td input {
        width: 100%;
        height: 100%;
        text-align: center;
        border: none;
        background-color: transparent;
        padding: 10px 50px;
    }

    .table-body td select {
        width: 100%;
        height: 100%;
        text-align: center;
        border: none;
        background-color: transparent;
        color: black;
    }

    #companyinfo {
        background: rgb(32, 61, 74);
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
    }

    .invisible-border {
        border: none;
        outline: none;
    }

    #description {
        border: none;
        outline: none;
        background-color: transparent;
        resize: none;
        width: 100%;
    }
</style>

<script>
    function removeBorder(element) {
        element.classList.add("invisible-border");
    }

    window.addEventListener('DOMContentLoaded', function() {
        var textarea = document.getElementById('description');

        // Set the initial height based on the content length
        textarea.style.height = textarea.scrollHeight + 'px';

        // Update the height when the content changes
        textarea.addEventListener('input', function() {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        });
    });
</script>
@section('content')

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">{{ $company_detail[0]->company_name }} Information</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-7 ">
                <div class="b_btn">
                    <button class="btn btn-sm btn-back" type="submit" onclick="history.back()">Back</button>
                </div>
                <div style="width:100%;">
                    {{-- <h2 style="color: #203D4A; font-size: 32px;" class="text-truncate">Company Name: {{ $company_detail[0]->company_name }}</h2> --}}
                    <small>Click on the content to edit (except ID)</small>
                </div>
            </div>
            <form action="/companyInfo_update{{ $company_detail[0]->company_id }}" method="post">
                @csrf
                <div class="data_scroll">
                    <table class="table table-bordered table-hover" id="fixed-table">
                        <tbody class="table-body text-center p-4">

                            {{-- Column for Company ID number --}}
                            <tr>
                                <th scope="col">ID</th>
                                <td scope="col">{{ $company_detail[0]->company_id }}</td>
                            </tr>

                            {{-- Column for Company Name --}}
                            <tr>
                                <th scope="col" class="align-middle">Company Name</th>
                                <td scope="col">
                                    <input type="text" name="companyname" placeholder="Company Name"
                                        value="{{ $company_detail[0]->company_name }}" onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('companyname')
                                            <span class="text-danger text-capitalize">Please enter a company name.</span>
                                        @enderror
                                    </span>

                                </td>
                            </tr>

                            {{-- Column for Company Phone Number --}}
                            <tr>
                                <th scope="col" class="align-middle">Company Phone Number</th>
                                <td scope="col">
                                    <input type="text" name="company_phone" placeholder="Phone Number"
                                        value="{{ substr_replace($company_detail[0]->company_number, '-', 3, 0) }}"
                                        onfocus="removeBorder(this)">
                                    <span class="text-danger">
                                        @error('company_phone')
                                            <span class="text-danger text-capitalize">Please enter a company number.</span>
                                        @enderror
                                    </span>
                                </td>
                            </tr>

                            {{-- Column for Company Email --}}
                            <tr>
                                <th scope="col" class="align-middle">Company Email</th>
                                <td scope="col">
                                    <input type="email" name="company_email" placeholder="Email Address"
                                        value="{{ $company_detail[0]->company_email }}" onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('company_email')
                                            <span class="text-danger text-capitalize">Please enter a company email.</span>
                                        @enderror
                                    </span>
                                </td>
                            </tr>

                            {{-- Column for Company Publish Date --}}
                            <tr>
                                <th scope="col" class="align-middle">Publish Date</th>
                                <td scope="col">
                                    {{ \Carbon\Carbon::parse($company_detail[0]->created_at)->format('Y-m-d') }}</td>
                            </tr>

                            {{-- Column for Company Address --}}
                            <tr>
                                <th scope="col" class="align-middle">Company Address</th>
                                <td>
                                    <input type="text" name="company_address" placeholder="Company Address"
                                        value="{{ $company_detail[0]->company_address }}" onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('company_address')
                                            <span class="text-danger text-capitalize">Please enter a company address.</span>
                                        @enderror
                                    </span>
                                </td>
                            </tr>

                            {{-- Column for company description --}}
                            <tr>
                                <th scope="col" class="align-middle">Company Description</th>
                                <td scope="col">
                                    <textarea id="description" name="description" placeholder="Company Description" onfocus="removeBorder(this);">{{ $company_detail[0]->description }}</textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            <span class="text-danger text-capitalize">Please enter a company description.</span>
                                        @enderror
                                    </span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                {{-- Button to submit the new update after finish all the edit --}}
                <div class="b_btn pt-2">
                    <button type="submit" class="btn">Done</button>
                </div>

            </form>
        </div>
    </div>
@stop

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
