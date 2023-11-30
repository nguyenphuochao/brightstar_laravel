@extends('category.layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bảng quản trị</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Thêm hình ảnh</li>
            </ol>
            @include('error')
            <form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Hình ảnh</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary">Thêm</button>
                            <a href="{{route('image.index')}}" class="btn btn-warning">Quay về</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
