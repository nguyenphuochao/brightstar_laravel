@extends('category.layout')
@section('content')
    <style>
        .cke {
            visibility: visible;
        }
    </style>
    <main>
        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
            @csrf
            <div class="container-fluid px-4">
                <h1 class="mt-4">Sửa danh mục - {{ $category->name }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
                <div class="form-group mb-2">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <textarea name="content" class="ckeditor" cols="30" rows="10">
            {{ $category->content }}
        </textarea>
                <br>
                <button class="btn btn-primary">Lưu</button>
                <a href="{{ route('category.index') }}" class="btn btn-warning">Quay về</a>
                @if($category->parent_id !=0)
                <a href="{{route('category.destroy',['id'=>$category->id])}}" onclick="return confirm('Bạn chắc xóa danh mục')" class="btn btn-danger">Xóa danh mục</a>
                @endif
            </div>
        </form>
    </main>
@endsection
