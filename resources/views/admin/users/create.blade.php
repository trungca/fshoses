@extends('admin.layouts.master')

@section('title')
    Accounts List
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box  align-items-center">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Accounts</a></li>
                        <li class="breadcrumb-item text-danger">Add New Product</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="col-md my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h3> Information </h3>
                        </div>
                    </div>


                    @if ($errors->any() || session('error'))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="width: 100%;">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class="alert alert-danger" style="width: 100%;">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Hiển thị thông báo thành công --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name: </label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is_invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Name ">
                                        @error('name')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address: </label>
                                        <input type="text" id="address" name="address"
                                            class="form-control @error('address') is_invalid @enderror"
                                            value="{{ old('address') }}" placeholder="Address ">
                                        @error('address')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="district" class="form-label">District: </label>
                                        <input type="text" id="district" name="district"
                                            class="form-control @error('district') is_invalid @enderror"
                                            value="{{ old('district') }}" placeholder="District ">
                                        @error('district')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province: </label>
                                        <input type="text" id="province" name="province"
                                            class="form-control @error('province') is_invalid @enderror"
                                            value="{{ old('province') }}" placeholder="Province ">
                                        @error('province')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="balance" class="form-label">Balance: </label>
                                        <input type="number" id="balance" name="balance" min="0"
                                            class="form-control @error('balance') is_invalid @enderror"
                                            value="{{ old('balance') }}" placeholder="Balance">
                                        @error('balance')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="zip_code" class="form-label">Zip Code: </label>
                                        <input type="number" id="zip_code" name="zip_code" min="0"
                                            class="form-control @error('zip_code') is_invalid @enderror"
                                            value="{{ old('zip_code') }}" placeholder="zip_code">
                                        @error('zip_code')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role_id" class="form-label">Role: </label>
                                        <select id="role_id" name="role_id" class="form-control">
                                            <option>-- Select Role --</option>
                                            @foreach ($role as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status: </label>
                                        <div class="col-sm-10 d-flex gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="gridRadios1" value="1" checked>
                                                <label class="form-check-label text-success" for="gridRadios1">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="gridRadios2" value="0">
                                                <label class="form-check-label text-danger" for="gridRadios2">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone: </label>
                                        <input type="number" id="phone" name="phone"
                                            class="form-control @error('phone') is_invalid @enderror"
                                            value="{{ old('phone') }}" placeholder="Phone Number ">
                                        @error('phone')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email: </label>
                                        <input type="text" id="email" name="email"
                                            class="form-control @error('email') is_invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Email ">
                                        @error('email')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password: </label>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is_invalid @enderror"
                                            value="{{ old('password') }}" placeholder="Mật khẩu ">
                                        @error('password')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">Avatar: </label>
                                        <input type="file" id="avatar" name="avatar" class="form-control"
                                            onchange="showImage(event)">
                                        <img id="img_danh_muc" src="" alt="Avatar"
                                            style="width: 80px; display:none">
                                    </div>

                                </div>

                                <div class="d-flex ">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <a href="{{ route('admin.users.index') }}"><i
                                            class="btn btn-success ri-arrow-go-back-fill"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        function showImage(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
