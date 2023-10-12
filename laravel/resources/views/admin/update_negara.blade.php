@extends('layouts.admin')
@section('form')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Form Basic</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Library
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <form class="form-horizontal" method="POST" action="{{ route('edit_negara', $negara->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h4 class="card-title">Nama Negara Terdaftar</h4>
                                <div class="form-group row">
                                    <label for="negara_name" class="col-sm-3 text-end control-label col-form-label">Nama Negara</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="negara_name" name="negara_name"
                                            placeholder="Nama Negara" value="{{ $negara->negara_name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="negara_image"
                                        class="col-sm-3 text-end control-label col-form-label">Gambar</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control @error('negara_image') is-invalid @enderror"
                                            name="negara_image">
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/country/' . $negara->negara_image) }}" alt="Buah Image" width="150">
                                            </div>
                                        @error('negara_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="benua_id"
                                        class="col-sm-3 text-end control-label col-form-label">Benua</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="benua_id" name="benua_id" required>
                                            <option value="" disabled>Select Benua</option>
                                            @foreach ($benuas as $benua)
                                                <option value="{{ $benua->id }}" {{ $benua->id == $negara->benua_id ? 'selected' : '' }}>
                                                    {{ $benua->benua_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- editor -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection
