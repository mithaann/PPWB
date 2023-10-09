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
                    <form class="form-horizontal" method="POST" action="/" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Laporan Info</h4>
                            <div class="form-group row">
                                <label for="judul_laporan" class="col-sm-3 text-end control-label col-form-label">Judul
                                    Laporan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="judul_laporan" name="judul_laporan"
                                        placeholder="Judul Laporan Here" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lokasi"
                                    class="col-sm-3 text-end control-label col-form-label">Lokasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                                        placeholder="Lokasi Here" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar"
                                    class="col-sm-3 text-end control-label col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        name="gambar" required>
                                    @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-3 text-end control-label col-form-label">Isi
                                    Laporan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                        rows="5" placeholder="Masukkan Konten Post" required>{{ old('content') }}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
