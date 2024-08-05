@extends('admin.layouts.master')

@section('title')
    Tạo bài viết mới
@endsection

@section('main-content')
    <div class="container">
        <h1>Create Product</h1>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('products.edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" value="{{ old('ten_san_pham') }}" required>
            </div>
            <div class="form-group">
                <label for="so_luong">Số lượng sản phẩm</label>
                <input type="number" name="so_luong" id="so_luong" class="form-control" value="{{ old('so_luong') }}" required>
            </div>
            <div class="form-group">
                <label for="gia_san_pham">Giá sản phẩm</label>
                <input type="text" name="gia_san_pham" id="gia_san_pham" class="form-control" value="{{ old('gia_san_pham') }}" required>
            </div>
            <div class="form-group">
                <label for="gia_khuyen_mai">Giảm giá sản phẩm</label>
                <input type="text" name="gia_khuyen_mai" id="gia_khuyen_mai" class="form-control" value="{{ old('gia_khuyen_mai') }}">
            </div>
            <div class="form-group">
                <label for="mo_ta">Mô tả</label>
                <textarea name="mo_ta" id="mo_ta" class="form-control">{{ old('mo_ta') }}</textarea>
            </div>
            <div class="form-group">
                <label for="danh_muc_id">Chọn danh mục sản phẩm</label>
                <select name="danh_muc_id" id="danh_muc_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->ten_danh_muc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="trang_thai">Trạng thái sản phẩm</label>
                <select name="trang_thai" id="trang_thai" class="form-control" required>
                    <option value="0" {{ old('trang_thai') == 0 ? 'selected' : '' }}>Hiển thị sản phẩm ngay</option>
                    <option value="1" {{ old('trang_thai') == 1 ? 'selected' : '' }}>Ẩn sản phẩm</option>
                </select>
            </div>
            <div class="form-group">
                <label for="images">Chọn ảnh sản phẩm</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng sản phẩm</button>
        </form>
        
    </div>
@endsection

