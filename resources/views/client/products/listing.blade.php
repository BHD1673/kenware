@extends('client.layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Tìm kiếm sản phẩm</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{url('/')}}">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Tìm kiếm</p>
        </div>
    </div>
</div>


<div class="row px-xl-5 pb-3">
    @foreach ($products as $product)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4">
            <div
                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                @if ($product->images->isNotEmpty())
                    <img class="img-fluid w-100" alt="prodimg"
                        src="{{ asset('images/products/' . $product->images->first()->link_anh) }}">
                @else
                    <img class="img-fluid w-100" alt="prodimg"
                        src="{{ asset('images/products/default.jpg') }}">
                @endif
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3">{{ $product->ten_san_pham }}</h6>
                <div class="d-flex justify-content-center">
                    <h6>{{ $product->gia_san_pham }} VND</h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('product', $product->id) }}"
                    class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                    tiết</a>
                <a href="/products/{{ $product->id }}/add-to-cart" class="btn btn-sm text-dark p-0"><i
                        class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection