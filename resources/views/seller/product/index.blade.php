@extends('seller.layouts.app')
@section('title', 'Quản lý sản phẩm')
@section('content')
<a href="/seller1/products/create" class="btn btn-success mb-3">Thêm sản phẩm</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th class="text-center">Số lượng hiện còn</th>
            <th class="text-center">Số lượng đã bán</th>
        </tr>
    </thead>
    <tbody>
        @php
        $count=1
        @endphp
        @foreach ($products as $product)
        <tr>
            <td>{{$count++}}</td>
            <td>{{ \Illuminate\Support\Str::limit($product->name_product, 40, ' ...') }}</td>
            <td>{{ $product->category_child->name_category_child }}</td>
            <td class="align-middle text-center">{{ $product->totalProductNumber }}</td>
            <td class="align-middle text-center">{{ $product->totalQuantity }}</td>
            <td><a href="">Chi tiết sản phẩm</a></td>
        </tr>
        @endforeach
        {{-- @foreach ($categories_child as $category_child)
        <tr>
            <td>{{ $category_child->id }}</td>
        <td>{{ $category_child->name_category_child }}</td>
        <td>{{ $category_child->category->name_category }}</td>
        <td>
            <a href="/seller1/categories-child/update/{{ $category_child->id }}" class="btn btn-warning">Edit</a>
            <form class="delete-form" action="/seller1/categories-child/delete/{{ $category_child->id }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete btn-danger">Delete</button>
            </form>

            <script>
                function confirmDelete() {
                    return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');
                }
            </script>
        </td>
        </tr>
        @endforeach --}}
    </tbody>
</table>
@endsection