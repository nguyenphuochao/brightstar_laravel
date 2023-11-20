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
                <li class="breadcrumb-item active">Slider quảng cáo</li>
            </ol>
            <a href="{{route('slider.create')}}" class="btn btn-primary">Thêm mới</a>
            <div class="row">
                {{-- Nội dung --}}
                @if (request()->session()->has('success'))
                    <div class="alert alert-success">{{request()->session()->pull('success')}}</div>
                @endif
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên slider</th>
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
                        @foreach ($sliders as $slider)
                            <tr>
                                <td scope="row">{{$index++}}</td>
                                <td>{{$slider->name}}</td>
                                <td><img src="../img/{{$slider->image}}" alt="{{$slider->name}}" class="img-fluid" width="200px"></td>
                                <td>{{$slider->date_start}} / {{$slider->date_end ?? 'chưa sửa' }}</td>
                                <td>{{$slider->user->username}}</td>
                                <td>
                                    <form action="{{route('slider.destroy',['slider'=>$slider->id])}}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Bạn chắc xóa')">Xóa</button>
                                    </form>
                                    <a href="{{route('slider.edit',['slider'=>$slider->id])}}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
