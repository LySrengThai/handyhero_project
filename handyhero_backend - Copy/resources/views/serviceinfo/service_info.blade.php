@extends('layout.master')
<title>Service Info</title>
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

    #serviceinfo {
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
            <h2 class="text-white text-truncate">{{ $service_detail[0]->service_name }} Information</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-7">
                <div class="b_btn">
                    <button class="btn btn-sm btn-back" type="submit"
                        onclick="location.href = '/service_info'">Back</button>
                </div>
                <div>
                    <small>Click on the content to edit (except ID)</small>
                </div>
            </div>
            <form action="serviceInfo_update{{ $service_detail[0]->service_id }}" method="post">
                @csrf
                <div class="data_scroll">
                    @foreach ($service_detail as $service)
                        <table class="table table-bordered table-hover" id="fixed-table">
                            <tbody class="table-body text-center p-4">
                                <tr>
                                    <th scope="col">ID</th>
                                    <td scope="col">{{ $service->service_id }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="align-middle">Company Name</th>
                                    <td scope="col text-bold">{{ $service->company_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="align-middle">Service Name</th>
                                    <td scope="col">
                                        <input type="text" name="servicename" placeholder="Service Name"
                                            value="{{ $service->service_name }}" onfocus="removeBorder(this);">
                                        <span class="text-danger">
                                            @error('servicename')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" class="align-middle">Service Price</th>
                                    <td scope="col">
                                        <input type="text" name="serviceprice" placeholder="Service Price in riel"
                                            value="៛{{ number_format($service->service_price) }}"
                                            onfocus="removeBorder(this);">
                                        <span class="text-danger">
                                            @error('serviceprice')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" class="align-middle">Category</th>
                                    <td>
                                        <select class="form-control" aria-label="Default select example" name="category">
                                            @foreach ($service_cate as $cate)
                                                @if ($cate->cate_id == $service->cate_id)
                                                    <option value="{{ $cate->cate_id }}" selected>{{ $cate->category }}
                                                    </option>
                                                @else
                                                    <option value="{{ $cate->cate_id }}">{{ $cate->category }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('category')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" class="align-middle">Service Description</th>
                                    <td scope="col">
                                        <textarea id="description" name="servicedescription" placeholder="Service Description" onfocus="removeBorder(this);">{{ $service->service_description }}</textarea>
                                        <span class="text-danger">
                                            @error('servicedescription')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
                <div class="b_btn pt-2">
                    <button type="submit" class="btn">Done</button>
                </div>

            </form>
        </div>
    </div>
@stop
