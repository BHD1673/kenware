@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('main-content')
    <h2>Danh sách danh mục</h2>

    {{-- <a href="/admin/danh-muc/them-moi" class="btn btn-primary">Thêm danh mục</a> --}}

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Thêm mới danh mục
</button>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ session('success') }}</li>
        </ul>
    </div>
@endif


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=" {{ url('admin/danh-muc/xu-ly-them')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Tên :</label>
                        <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" value="">
                    </div>
                    <div class="form-group">
                        <label for="slug">Mô tả : </label>
                        <input type="text" class="form-control" id="mo_ta" name="mo_ta" value="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Full version of jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <table class="table" id="table_danh_muc">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category) 
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['ten_danh_muc'] }}</td>
                    <td>{{ $category['mo_ta'] }}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/danh-muc/{{ $category['id'] }}/edit">Xem chi tiết</a>
                        <form action="{{ route('categories.destroy', $category['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
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