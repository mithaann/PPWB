@extends('layouts.template')
@section('content')
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/banana.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Pisang
                </h6>
                <h6>
                  Rp.
                  <span>
                    30.000
                  </span>
                </h6>
              </div>
              <img src="{{asset('images\indonesia.jpg')}}" alt="" class="new">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/dragon fruit.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Buah Naga
                </h6>
                <h6>
                  Rp.
                  <span>
                    15.000
                  </span>
                </h6>
              </div>
              <img src="{{asset('images\usa (1).jpeg')}}" alt="" class="new">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/blueberry.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Blueberry
                </h6>
                <h6>
                  Rp.
                  <span>
                    35.000
                  </span>
                </h6>
              </div>
              <img src="{{asset('images\dutch (1).jpeg')}}" alt="" class="new">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
              <img src="images/peach.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Peach
                </h6>
                <h6>
                  Rp.
                  <span>
                    40.000
                  </span>
                </h6>
              </div>
              <img src="{{asset('images\kooreaa.png')}}" alt="" class="new">
            </a>
          </div>
        </div>
      <div class="btn-box">
        <a href="{{ route('kategori') }}">
          View All Products
        </a>
      </div>
    </div>
  </section>
  @endsection