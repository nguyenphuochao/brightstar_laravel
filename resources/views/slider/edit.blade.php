@extends('category.layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bảng quản trị</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Sửa slider</li>
            </ol>
            @include('error')
            <form action="{{route('slider.update',['slider'=>$slider->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tên slider</label>
                            <input type="text" class="form-control" value="{{$slider->name}}"  placeholder="Nhập tên slider" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                            <div><img src="{{asset('img')}}/{{$slider->image}}" alt="" width="200px"></div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary">Sửa</button>
                            <a href="{{route('slider.index')}}" class="btn btn-warning">Quay về</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
