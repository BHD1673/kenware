@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục bài viết
@endsection

@section('main-content')
    <h2>Chi tiết danh mục bài viết:</h2>

    {{-- <a href="/admin/danh-muc/them-moi" class="btn btn-primary">Thêm danh mục</a> --}}

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Thêm mới danh mục
    </button>

    <a href="{{ url('admin/danh-muc/trang/1') }}" class="btn btn-secondary">Quay trở lại trang danh sách danh mục</a>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action=" {{ url('admin/danh-muc/them-moi') }}" method="POST">
                        <div class="form-group">
                            <label for="name">Tên :</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug (Có thể để trống):</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin danh mục</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="mx-n6">
                        <div data-simplebar="init" style="max-height: 450px;" class="px-3 simplebar-scrollable-y">
                            <form action="{{ url('admin/danh-muc/' . $category['id']) }}/xu-ly" method="POST">
                                @csrf <!-- Add CSRF token for Laravel forms -->
                                @method('PUT')
                                <div class="form-group">
                                    <label for="categoryId">ID danh mục</label>
                                    <input type="text" class="form-control" id="categoryId" name="id" value="{{ $category['id'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="categoryName">Tên danh mục</label>
                                    <input type="text" class="form-control" id="categoryName" name="ten_danh_muc" value="{{ $category['ten_danh_muc'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="categoryDesc">Mô tả</label>
                                    <input type="text" class="form-control" id="catogoryDesc" name="mo_ta" value="{{ $category['mo_ta'] }}">
                                </div>
                                <div class="form-group text-right" style="padding-top: 20px;">
                                    <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách bài viết của danh mục này</h4>
                    <div class="flex-shrink-0">
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">
                        Những bài viết thuộc danh mục
                    </p>
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table table-striped table-nowrap align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">01</td>
                                        <td>Bobby Davis</td>
                                        <td>Nov 14, 2021</td>
                                        <td>$2,410</td>
                                        <td><span class="badge bg-success">Confirmed</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">02</td>
                                        <td>Christopher Neal</td>
                                        <td>Nov 21, 2021</td>
                                        <td>$1,450</td>
                                        <td><span class="badge bg-warning">Waiting</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">03</td>
                                        <td>Monkey Karry</td>
                                        <td>Nov 24, 2021</td>
                                        <td>$3,500</td>
                                        <td><span class="badge bg-success">Confirmed</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">04</td>
                                        <td>Aaron James</td>
                                        <td>Nov 25, 2021</td>
                                        <td>$6,875</td>
                                        <td><span class="badge bg-danger">Cancelled</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-none code-view">
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>




    <!-- Full version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    </div>
@endsection

@section('scripts')
@endsection
