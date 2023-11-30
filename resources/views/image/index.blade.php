@extends('category.layout')
@section('content')
<style>
    table tbody tr:hover{
        background-color :rgb(223, 218, 218)
    }
</style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bảng quản trị</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Upload hình ảnh</li>
            </ol>
            <a href="{{route('image.create')}}" class="btn btn-primary">Thêm mới</a>
            <div class="row">
                {{-- Nội dung --}}
                @if (request()->session()->has('success'))
                    <div class="alert alert-success">{{request()->session()->pull('success')}}</div>
                @endif
                {{-- <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên hình</th>
                            <th>Hình ảnh</th>
                            <th>Ngày tạo / Ngày sửa</th>
                            <th>Người sửa</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($images as $image)
                            <tr>
                                <td scope="row">{{$index++}}</td>
                                <td>{{$image->name}}</td>
                                <td><img src="{{asset('')}}uploads/images/{{$image->image}}" alt="{{$image->name}}" class="img-fluid" width="100px"></td>
                                <td>{{$image->date_start}} / {{$image->date_end ?? 'chưa sửa' }}</td>
                                <td>{{$image->user->username}}</td>
                                <td>
                                    <form action="{{route('image.destroy',['image'=>$image->id])}}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Bạn chắc xóa')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table> --}}
                <div class="row mt-2">
                    @foreach ($images as $image)
                    <div class="col-md-2">
                        <img src="{{asset('')}}uploads/images/{{$image->image}}" alt="{{$image->name}}" width="200px" height="200px">
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>
@endsection
