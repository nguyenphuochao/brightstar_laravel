@extends('category.layout')
@section('content')
    <style>
        table tbody tr:hover {
            background-color: rgb(223, 218, 218)
        }
    </style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bảng quản trị</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Danh mục</li>
            </ol>
            <div class="row">
                {{-- Nội dung --}}
                @if (request()->session()->has('success'))
                    <div class="alert alert-success">{{ request()->session()->pull('success') }}</div>
                @endif
                <table class="table table-responsive" id="table_category">
                    <thead>
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Ngày cập nhật</th>
                            <th>Người sửa</th>
                            <th>Danh mục con</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            @if ($category->parent_id == 0)
                                <tr>
                                    <td scope="row">{{ $category->name }}</td>
                                    <td>{{ $category->date_end }}</td>
                                    <td>{{ $category->user->username }}</td>
                                    <td>
                                        @foreach ($category->children as $child)
                                            <a href="{{ route('category.edit', ['id' => $child->id]) }}">{{ $child->name }}</a> &nbsp;
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('show', ['slug' => $category->alias]) }}"
                                            class="btn btn-success">Xem</a>
                                        <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                            class="btn btn-warning">Sửa</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter" id="button_modal" name="button_modal" value="{{$category->id}}">
                                            Thêm mục con
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh mục con</b>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('category.add_category_child') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name">Tên danh mục</label>
                                                                <input type="text" placeholder="Tên danh mục con"
                                                                    class="form-control" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" name="parent_id" id="parent_id">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Đóng</button>
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

@endsection
