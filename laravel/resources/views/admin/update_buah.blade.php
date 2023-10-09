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
                        <form class="form-horizontal" method="POST" action="{{ route('edit_buah', $buahs->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h4 class="card-title">Buah Info</h4>
                                <div class="form-group row">
                                    <label for="buah_nama" class="col-sm-3 text-end control-label col-form-label">Nama Buah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="buah_nama" name="buah_nama" placeholder="Nama Buah Here" value="{{ old('buah_nama', $buahs->buah_nama) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-3 text-end control-label col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Here" value="{{ old('harga', $buahs->harga) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gambar" class="col-sm-3 text-end control-label col-form-label">Gambar</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/fruit/' . $buahs->buah_gambar) }}" alt="Buah Image" width="150">
                                        </div>
                                        @error('gambar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="negara_id" class="col-sm-3 text-end control-label col-form-label">Negara</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('negara_id') is-invalid @enderror" id="negara_id" name="negara_id" required>
                                            <option value="" disabled>Select Negara</option>
                                            @foreach ($negara as $neg)
                                                <option value="{{ $neg->id }}" {{ old('negara_id', $buahs->negara_id) == $neg->id ? 'selected' : '' }}>{{ $neg->negara_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('negara_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stock" class="col-sm-3 text-end control-label col-form-label">Stock</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock Here" value="{{ old('stock', $buahs->stock) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Masukkan Keterangan Buah" required>{{ old('keterangan', $buahs->keterangan) }}</textarea>
                                        @error('keterangan')
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
