@extends('admin.layouts.app')
@section('title', 'Trang admin/category')
@section('content')

    @php
        session_start();
    @endphp

    <!-- Main content -->
    <section class="content">
        <a href="/admin/addCategory" class="btn btn-success mb-3">Thêm danh mục</a>
        <div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng đăng ký</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($categorys as $category)                        
                    <tr>
                        <td class="align-middle text-center">{{$count++}}</td>
                        <td class="align-middle text-center">{{$category->name_category}}</td>
                        <td class="align-middle text-center">
                            <img width="100px" height="100px" src="{{$category->url_category}}" alt="">
                        </td>
                        <td class="align-middle text-center">
                            <a href="">{{ $category->categoryChildren->count() }}</a>
                            
                        </td>
                        <td class="align-middle text-center">                            
                            <a href="{{ route('admin.editCategory', $category->id) }}" class="btn btn-warning">Edit</a>

                            @if ($category->categoryChildren->count() == 0)
                                <form class="delete-form" action="/admin/category/delete/{{ $category->id }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-danger">Delete</button>
                                </form>
                            @else
                                <button class="btn btn-danger" disabled>Delete</button>
                            @endif

                            <script>
                                function confirmDelete() {
                                    return confirm('Bạn có chắc chắn muốn xóa danh mục này?');
                                }
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.content -->
    @endsection
