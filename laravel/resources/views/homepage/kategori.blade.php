@extends('layouts.template')
@section('content')
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Category
                </h2>
            </div>
            <div class="row">
                @foreach ($produk as $p)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ route('item_content') }}">
                                <div class="img-box">
                                    <img src="{{ asset('storage/fruit/' . $p->buah_gambar) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6>{{ $p->buah_nama }}</h6>
                                    <h6>Rp. <span>{{ $p->harga }}</span></h6>
                                </div>
                                <img src="{{ asset('storage/country/' . $p->negara->negara_image) }}" alt=""
                                    class="new">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
