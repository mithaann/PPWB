@extends('layouts.admin')
@section('list')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Tables</h4>
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
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        {{ __('Laporan') }}
                    </h2>
                    <div class="card-tools">
                        <a href="{{ route('form_negara') }}" class="btn btn-outline-dark btn-sm">
                            <i class="fas fa-plus"></i> Input Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($negara->isEmpty())
                        <div class="alert alert-danger text-center">
                            No Data To Be Read
                        </div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>no</th>
                                <th>Negara</th>
                                <th>Benua</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($negara as $neg)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $neg->negara_name }}</td>
                                    <td>{{ $neg->benua->benua_name }}</td>
                                    <!-- Assuming you have a relationship named 'benua' in your Negara model -->
                                    <td>
                                        <img src="{{ asset('storage/country/' . $neg->negara_image) }}" alt="Negara Image" width="50">
                                    </td>
                                    <td>
                                        <form action="{{ route('hapus_negara', $neg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ?');">
                                            <a href="{{ route('update_page_negara', $neg->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <footer class="footer text-center mt-4">
                All Rights Reserved by Matrix-admin. Designed and Developed by
                <a href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
@endsection
