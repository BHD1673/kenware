@extends('client.layouts.master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{url('/')}}">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Tìm kiếm</p>
        </div>
    </div>
</div>


@if (session('success'))
<div class="alert alert-success">
    <ul>
        <li>{{ session('success') }}</li>
    </ul>
</div>
@endif

<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    @if($product->images->isNotEmpty())
                        @foreach($product->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="w-100 h-100" src="{{ asset('images/products/' . $image->link_anh) }}" alt="Image">
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="https://placehold.co/600x400/orange/white" alt="Image">
                        </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>
        

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product->ten_san_pham }}</h3>
            <h3 class="font-weight-semi-bold mb-4">{{ $product->gia_san_pham }} VND</h3>
            <p class="mb-4">{{ strlen($product->mo_ta) > 50 ? substr($product->mo_ta, 0, 50) . '...' : $product->mo_ta }}</p>

            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                        <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Comment sản phẩm</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>{{ $product->mo_ta }}</p>
                    
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Review sản phẩm</h4>
                            {{-- <div class="media mb-4">
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div> --}}

                            @foreach ($comments as $comment)
                            <div class="media mb-4">
                                <div class="media-body">
                                    <h6>{{ $comment->ten_nguoi_dung }}<small> - <i>{{ $comment->created_at }}</i></small></h6>
                                    <p>{{ $comment->noi_dung }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Comment sản phẩm</h4>
                            <small>Email của bạn sẽ không công khai. Những vùng có dấu * là những vùng cần thiết</small>
                            <div class="d-flex my-3">
                            </div>
                            <form class="comment-form" action="{{route('comment')}}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="san_pham_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="message">Comment của bạn *</label>
                                    <textarea id="message" cols="30" rows="5" name="noi_dung" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên của bạn*</label>
                                    <input type="text" class="form-control" id="name" name="ten_nguoi_dung">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email của bạn *</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Gửi comment của bạn" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form.comment-form');
        form.addEventListener('submit', validateForm);

        function validateForm(event) {
            event.preventDefault(); // Prevent form submission

            // Get form fields
            const message = document.getElementById('message').value.trim();
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();

            // Regular expression for email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Clear previous error messages
            const errorElements = document.getElementsByClassName('error');
            while (errorElements[0]) {
                errorElements[0].parentNode.removeChild(errorElements[0]);
            }

            let isValid = true;

            // Validate message
            if (message === "") {
                showError('message', 'Comment của bạn không được để trống.');
                isValid = false;
            }

            // Validate name
            if (name === "") {
                showError('name', 'Tên của bạn không được để trống.');
                isValid = false;
            }

            // Validate email
            if (email === "") {
                showError('email', 'Email của bạn không được để trống.');
                isValid = false;
            } else if (!emailRegex.test(email)) {
                showError('email', 'Email của bạn không hợp lệ.');
                isValid = false;
            }

            // If the form is valid, submit it
            if (isValid) {
                form.submit();
            }
        }

        function showError(elementId, message) {
            const element = document.getElementById(elementId);
            const errorElement = document.createElement('div');
            errorElement.className = 'error text-danger';
            errorElement.innerText = message;
            element.parentNode.appendChild(errorElement);
        }
    });
</script>
@endsection