@extends('layout.master')
<title>Register Admin</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    .btn-register {
        background-color: #1383b5;
        color: #fff;
        border: outset;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-register:hover {
        background-color: #0e638b;
    }

    #setting, #register {
        background: linear-gradient(90deg, rgba(32, 61, 74, 1) 0%, rgba(14, 99, 139, 1) 43%);
        border-radius: 25px;
        margin: 3%;
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
            <h2 class="text-white text-truncate">Register New Admin</h2>
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="row px-5 d-flex justify-content-center">
            <div class="card text-white my-5" style="border-radius: 1rem; background-color: #203D4A;">
                <div class="card-body px-5 text-center">
                    <div class="mb-md-5 mt-md-4 pb-5">
                        <img src="assets/images/white-logo.png" alt="" width="120" height="80">
                        <h2 class="fw-bold mb-2 text-uppercase text-truncate">Admin Register</h2>
                        <form action="{{ route('registeredadmin') }}" method="post">

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

                            @csrf
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="admin_name" name="admin_name" class="form-control form-control-lg"
                                    placeholder="Username" value="{{ old('admin_name') }}" />
                                <label class="form-label">Username</label><br>
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="admin_password" name="admin_password"
                                    class="form-control form-control-lg" placeholder="Password" />
                                <label class="form-label" for="typePasswordX">Password</label><br>
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <input type="hidden" name="logged_in_user" value="{{ $data->admin_name }}">

                            <button class="btn btn-outline-light btn-lg px-5 btn-register"
                                type="submit"><b>Register</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
