@extends('layout.master')
<title>User Info</title>
<style>
    form {
        width: 100%;
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

    #userinfo {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;

    }

    .invisible-border {
        border: none;
        outline: none;
    }
</style>

<script>
    function removeBorder(element) {
        element.classList.add("invisible-border");
    }
</script>
@section('content')
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <div class="col-7 py-4 " style="font-size: 32px;">
            <h2 class="text-white text-truncate">{{ $user_detail[0]->user_fname }} Detail</h2>
        </div>
    </div><br>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-7 py-4 ">
                <div class="b_btn">
                    <button class="btn btn-sm btn-back" type="submit" onclick="history.back()">Back</button>
                </div>
                <div class="pt-1">
                    <small>Click on the content to edit (except ID)</small>
                </div>
            </div>
            <form action="/userInfo_update{{ $user_detail[0]->user_id }}" method="post">
                @csrf
                <div class="data_scroll">
                    <table class="table table-bordered table-hover" id="fixed-table">
                        <tbody class="table-body text-center p-4">
                            <tr>
                                <th scope="col">ID</th>
                                <td scope="col">{{ $user_detail[0]->user_id }}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="align-middle">First Name</th>
                                <td scope="col">
                                    <input type="text" name="fname" placeholder="First Name"
                                        value="{{ $user_detail[0]->user_fname }}" onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('fname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="align-middle">Last Name</th>
                                <td scope="col">
                                    <input type="text" name="lname" placeholder="Last Name"
                                        value="{{ $user_detail[0]->user_lname }}" onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('lname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="align-middle">Gender</th>
                                <td>
                                    <select class="form-control" aria-label="Default select example" name="gender">
                                        <option value="Male" <?php if ($user_detail[0]->user_gender === 'Male') {
                                            echo 'selected';
                                        } ?>>Male</option>
                                        <option value="Female" <?php if ($user_detail[0]->user_gender === 'Female') {
                                            echo 'selected';
                                        } ?>>Female</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('gender')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="align-middle">Phone Number</th>
                                <td scope="col">
                                    <input type="text" name="user_phone" placeholder="Phone Number"
                                        value="{{ substr_replace($user_detail[0]->user_number, '-', 3, 0) }}"
                                        onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('user_phone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="align-middle">Email</th>
                                <td scope="col">
                                    <input type="text" name="user_email" placeholder="Email Address"
                                        value="{{ $user_detail[0]->user_email }}" onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('user_email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="align-middle">Address</th>
                                <td scope="col">
                                    <input type="text" name="user_address" placeholder="Address"
                                        value="{{ $user_detail[0]->user_address }}" onfocus="removeBorder(this);">
                                    <span class="text-danger">
                                        @error('user_address')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="b_btn pt-2">
                    <button type="submit" class="btn">Done</button>
                </div>
            </form>
        </div>
    </div>
@stop
