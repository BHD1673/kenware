@extends('admin.layouts.master')

@section('title')
    Danh sách bài viết
@endsection

@section('main-content')
    <h2>Danh sách sản phẩm</h2>

    <a href="/admin/san-pham/them-moi" class="btn btn-primary">Thêm một sản phẩm mới ?</a>

    <!-- Full version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @if (session('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    @endif

    

    <table class="table" id="table_danh_muc">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thông tin</th>
                <th>Danh mục sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Trạng thái sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                <img src="assets/images/products/img-1.png" alt="prodimg" class="img-fluid d-block">
                            </div>
                            <div>
                                <h5 class="fs-14 my-1"><a href="{{ url('/admin/san-pham/1/chi-tiet') }}"
                                        class="text-reset">{{ $product['ten_san_pham'] }}</a></h5>
                                <span class="text-muted">Số lượng sản phẩm: {{ $product['so_luong'] }}</span>
                            </div>
                        </div>
                    </td>
                    <td>{{$product->category->ten_danh_muc}}</td>
                    <td>
                        <span class="text-muted">Giá gốc:</span> {{ $product['gia_san_pham'] }} VNĐ
                        <br>
                        <span class="text-muted">Giá khuyến mãi:</span> {{ $product['gia_khuyen_mai'] }} VNĐ
                    </td>
                    <td>
                        @if ($product['trang_thai'] == 1)
                            <span class="badge bg-danger">Đã bị ẩn sản phẩm</span>
                        @elseif ($product['trang_thai'] == 0)
                            <span class="badge bg-success">Sản phẩm đang bán</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/admin/bai-viet/chi-tiet/1">Xem chi tiết</a>

                        <form action="{{ route('products.destroy', $product['id']) }}" method="post" display="block-inline">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Bạn có chắc muốn xoá không ?')">Xoá
                                </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{-- @foreach ($categories as $category) 
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['name'] }}</td>
                    <td>{{ $category['slug'] }}</td>
                    <td><a href='/admin/users/{{ $category['created_by_id'] }}'>{{ $category['created_by_name'] }}</a></td>
                    <td>{{ $category['created_at'] }}</td>
                    <td>{{ $category['updated_at'] }}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/danh-muc/chi-tiet/{{ $category['id'] }}">Xem chi tiết</a>
                        <a class="btn btn-danger" href="/admin/danh-muc/xoa/{{ $category['id'] }}" onclick="return confirm('Chắc chắn muốn xóa không?')">Xoá</a>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>

    <!-- Pagination controls -->
    {{-- @if ($totalPage > 1)
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @if ($currentPage > 1)
                    <li class="page-item">
                        <a class="page-link" href="/admin/danh-muc/trang/{{ $currentPage - 1 }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                @for ($i = 1; $i <= $totalPage; $i++)
                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                        <a class="page-link" href="/admin/danh-muc/trang/{{ $i }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($currentPage < $totalPage)
                    <li class="page-item">
                        <a class="page-link" href="/admin/danh-muc/trang/{{ $currentPage + 1 }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif --}}
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
