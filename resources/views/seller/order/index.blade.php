@extends('seller.layouts.app')
@section('title', 'Danh sách đơn hàng')
@section('content')
<section id="tabs" class="project-tab">
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">Tất cả ({{ $allCount }})</a>
                    <a class="nav-item nav-link" id="nav-confirm-tab" data-toggle="tab" href="#nav-confirm" role="tab" aria-controls="nav-confirm" aria-selected="false">Chờ xác nhận @if ($confirmCount > 0) ({{ $confirmCount }}) @endif</a>
                    <a class="nav-item nav-link" id="nav-pickup-tab" data-toggle="tab" href="#nav-pickup" role="tab" aria-controls="nav-delivery" aria-selected="false">Chờ lấy hàng @if ($pickupCount > 0) ({{ $pickupCount }}) @endif</a>
                    <a class="nav-item nav-link" id="nav-delivery-tab" data-toggle="tab" href="#nav-delivery" role="tab" aria-controls="nav-delivery" aria-selected="false">Đang giao hàng @if ($deliveryCount > 0) ({{ $deliveryCount }}) @endif</a>
                    <a class="nav-item nav-link" id="nav-complete-tab" data-toggle="tab" href="#nav-complete" role="tab" aria-controls="nav-complete" aria-selected="false">Hoàn thành @if ($completeCount > 0) ({{ $completeCount }}) @endif</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetailsList as $orderDetail)
                            <tr>
                                <td>{{ $orderDetail->id }}</td>
                                <td>{{ $orderDetail->order->buyer->account_name }}</td>
                                <td>{{ $orderDetail->productDetail->product->name_product }}</td>
                                <td>{{ $orderDetail->quantity }}, {{ $orderDetail->size }}, {{ $orderDetail->productDetail->name_product_detail}}</td>
                                <td>{{ number_format($orderDetail->price, 2, ',', '.') }}</td>
                                <td>{{ $orderDetail->order->payment_methods }}</td>
                                <td>
                                    <a href="/seller1/orders/detail/{{ $orderDetail->id }}" class="btn btn-warning"><i class="nav-icon fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-confirm" role="tabpanel" aria-labelledby="nav-confirm-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetailsList as $orderDetail)
                            @if ($orderDetail->confirmStatus())
                            <tr>
                                <td>{{ $orderDetail->id }}</td>
                                <td>{{ $orderDetail->order->buyer->account_name }}</td>
                                <td>{{ $orderDetail->productDetail->product->name_product }}</td>
                                <td>{{ $orderDetail->quantity }}, {{ $orderDetail->size }}, {{ $orderDetail->productDetail->name_product_detail }}</td>
                                <td>{{ number_format($orderDetail->price, 2, ',', '.') }}</td>
                                <td>{{ $orderDetail->order->payment_methods }}</td>
                                <td>
                                    <form class="confirm-form" action="/seller1/orders/confirm/{{ $orderDetail->id }}" method="POST" style="display: inline;" onsubmit="return confirmConfirm()">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-confirm btn-success">Xác nhận</button>
                                    </form>

                                    <script>
                                        function confirmConfirm() {
                                            return confirm('Bạn có chắc chắn muốn xác nhận đơn hàng này?');
                                        }
                                    </script>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-pickup" role="tabpanel" aria-labelledby="nav-pickup-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetailsList as $orderDetail)
                            @if ($orderDetail->pickupStatus())
                            <tr>
                                <td>{{ $orderDetail->id }}</td>
                                <td>{{ $orderDetail->order->buyer->account_name }}</td>
                                <td>{{ $orderDetail->productDetail->product->name_product }}</td>
                                <td>{{ $orderDetail->quantity }}, {{ $orderDetail->size }}, {{ $orderDetail->productDetail->name_product_detail }}</td>
                                <td>{{ number_format($orderDetail->price, 2, ',', '.') }}</td>
                                <td>{{ $orderDetail->order->payment_methods }}</td>
                                <td>
                                    <form class="pickup-form" action="/seller1/orders/pickup/{{ $orderDetail->id }}" method="POST" style="display: inline;" onsubmit="return confirmConfirm()">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-confirm btn-success">Xác nhận</button>
                                    </form>

                                    <script>
                                        function confirmConfirm() {
                                            return confirm('Xác nhận lấy hàng?');
                                        }
                                    </script>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetailsList as $orderDetail)
                            @if ($orderDetail->deliveryStatus())
                            <tr>
                                <td>{{ $orderDetail->id }}</td>
                                <td>{{ $orderDetail->order->buyer->account_name }}</td>
                                <td>{{ $orderDetail->productDetail->product->name_product }}</td>
                                <td>{{ $orderDetail->quantity }}, {{ $orderDetail->size }}, {{ $orderDetail->productDetail->name_product_detail }}</td>
                                <td>{{ number_format($orderDetail->price, 2, ',', '.') }}</td>
                                <td>{{ $orderDetail->order->payment_methods }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetailsList as $orderDetail)
                            @if ($orderDetail->completeStatus())
                            <tr>
                                <td>{{ $orderDetail->id }}</td>
                                <td>{{ $orderDetail->order->buyer->account_name }}</td>
                                <td>{{ $orderDetail->productDetail->product->name_product }}</td>
                                <td>{{ $orderDetail->quantity }}, {{ $orderDetail->size }}, {{ $orderDetail->productDetail->name_product_detail }}</td>
                                <td>{{ number_format($orderDetail->price, 2, ',', '.') }}</td>
                                <td>{{ $orderDetail->order->payment_methods }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection