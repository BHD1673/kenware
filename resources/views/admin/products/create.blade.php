@extends('admin.layouts.master')

@section('title')
    Tạo bài viết mới
@endsection

@section('main-content')
    {{-- <h2>Thêm một bài viết mới</h2>
    <a href="{{ url('admin/bai-viet/trang/1') }}" class="btn btn-primary">Quay về danh sách bài viết</a>
    <form id="postForm" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thông tin bài viết</h4>
                </div><!-- end card header -->
    
                <div class="card-body">
                    <p class="text-muted">Những nội dung cần thiết cho bài viết ở đây</p>
                    <div class="live-preview">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Tiêu đề bài viết" name="post_title" aria-label="Tiêu đề bài viết" required>
                            </div>
                            <!--end col-->
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="URL bài viết - Từ khoá bài viết (Có thể bỏ qua)" name="post_slug" aria-label="Slug">
                            </div>
                            <!--end col-->
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Các từ khoá cho bài viết (Cách nhau bằng dấu phẩy)" name="post_keywords" aria-label="Các từ khoá bài viết (Cách nhau bằng dấu phẩy)">
                            </div>
                            <div class="col-sm-5">
                                <select class="form-select rounded-pill mb-3" name="post_status" aria-label="Default select example" required>
                                    <option selected="" disabled>Lựa chọn đăng bài</option>
                                    <option value="publish_now">Đăng bài ngay</option>
                                    <option value="publish_later">Đăng bài sau</option>
                                    <option value="draft">Lưu nháp</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="post_image">Ảnh</label>
                                    <input type="file" class="form-control" id="post_image" name="post_image" required>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0">Mô tả sản phẩm</h4>
                </div><!-- end card header -->
    
                <div class="card-body">
                    <!-- Snow Editor container -->
                    <div id="editor-container" style="height: 300px;">
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    
        <div class="mb-3 d-flex justify-content-center">
            <button type="reset" class="btn btn-outline-secondary me-3" onclick="return confirm('Bạn có chắc không? Những gì bạn vừa nhập vào sẽ bị xoá')">Nhập lại</button>
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </div>
    </form>
    
    
    <script>
        document.getElementById('postForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get form data
            const formData = new FormData(this);
            let isValid = true;
    
            // Validate required fields
            if (!formData.get('post_title')) {
                alert('Tiêu đề bài viết là bắt buộc.');
                isValid = false;
            }
            if (!formData.get('post_status')) {
                alert('Phải chọn lựa chọn đăng bài.');
                isValid = false;
            }
            if (!formData.get('post_image').name) {
                alert('Ảnh là bắt buộc.');
                isValid = false;
            }
    
            if (isValid) {
                // Display form data in an alert
                let formInfo = '';
                formData.forEach((value, key) => {
                    if (key === 'post_image') {
                        formInfo += `${key}: ${value.name}\n`; // Get file name
                    } else {
                        formInfo += `${key}: ${value}\n`;
                    }
                });
                alert(formInfo);
    
                // Send form data via AJAX to the relative link
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'bai-viet/xu-ly', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('input[name="_token"]').value);
    
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle response from server
                        alert('Success: ' + xhr.responseText);
                    } else if (xhr.readyState === 4) {
                        // Handle error from server
                        alert('Error: ' + xhr.responseText);
                    }
                };
    
                xhr.send(formData);
            }
        });
    </script>
    
    
    
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Add custom fonts to the font list
        var Font = Quill.import('formats/font');
        Font.whitelist = [
            'sans-serif', 'serif', 'monospace', 
            'roboto', 'oswald', 'montserrat', 'lato', 'raleway'
        ];
        Quill.register(Font, true);

        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Hãy tạo ra những bài viết hay...',
            modules: {
                toolbar: [
                    [{ 'font': Font.whitelist }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'header': 1 }, { 'header': 2 }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });
    </script> --}}

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
    
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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

