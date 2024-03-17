@extends('buyer.profile.index')
<style>
    .form fieldset {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        display: flex;
        margin-left: 50px;
        margin-right: 50px;
        justify-content: space-between;
    }

    fieldset legend {
        font-size: 18px;
        color: #333;
        display: flex;
        justify-content: space-between;
    }

    fieldset div {
        display: flex;
    }

    fieldset div div {
        display: block;
    }

    fieldset div img {
        height: 120px;
        width: 120px;
    }

    fieldset label {
        display: flex;
        margin-bottom: 5px;
    }

    .custom-file-input-container {
        display: flex;
        align-items: center;
    }

    .custom-file-input {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: pointer;
        display: block;
    }

    .custom-file-label {
        position: relative;
        overflow: hidden;
    }

    .custom-file-label i {
        margin-left: 5px;
        /* Khoảng cách giữa icon và label */
    }

    .custom-file-input:hover+.custom-file-label i,
    .custom-file-input:active+.custom-file-label i {
        color: #007bff;
    }

    .custom-file-input {
        cursor: pointer;
    }
</style>
@section('content1')
    @if (session('ok'))
        <div class="alert alert-success" id="success-alert">
            {{ session('ok') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 3000);
        </script>
    @endif
    <div class="profile-container">

        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                Tất cả đơn hàng
            </button>
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".1">
                Chờ duyệt
            </button>
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".2">
                Đã giao hàng
            </button>
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".3">
                Đã nhận hàng
            </button>
        </div>
        <div class="separator"></div>
        <div class="form isotope-grid">
            @foreach ($orderDetails as $orderDetail)
                <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Đánh giá sản phẩm</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form id="reviewForm" action="{{ route('submit.review', $orderDetail->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="modal-body">
                                    <label for="starRating">Đánh giá sao:</label>
                                    <div class="star-rating">
                                        <i class="far fa-star" data-rating="1"></i>
                                        <i class="far fa-star" data-rating="2"></i>
                                        <i class="far fa-star" data-rating="3"></i>
                                        <i class="far fa-star" data-rating="4"></i>
                                        <i class="far fa-star" data-rating="5"></i>
                                    </div>
                                    <input type="hidden" id="starRatingInput" name="starRating">
                                    <div>
                                        <label>Thêm nhận xét:</label>
                                        <textarea class="form-control mt-0" name="comment" placeholder="Nhận xét"></textarea>
                                    </div>
                                    <label class="custom-file-label" for="coverImageInput">
                                        Thêm hình ảnh: <i class="fas fa-image"></i>
                                    </label>
                                    <div class="preview-container">
                                        <img id="cover_image_preview" class="preview-image" src="" alt="Preview">
                                    </div>
                                    <input type="file" name="images[]" class="form-control-file" id="coverImageInput"
                                        onchange="previewImage(this, 'cover_image_preview')">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                                </div>
                            </form>
                            <script>
                                $(document).ready(function() {
                                    $(".star-rating i").click(function() {
                                        var rating = $(this).data("rating");
                                        $(".star-rating i").removeClass("fas text-warning").addClass("far");
                                        $(this).prevAll().addBack().removeClass("far").addClass("fas text-warning");
                                        $("#starRatingInput").val(rating);
                                    });

                                    $('#feedback').on('show.bs.modal', function(event) {
                                        var button = $(event.relatedTarget);
                                        var orderDetailId = button.data('order-id');
                                        var form = $('#reviewForm');
                                        form.attr('action', form.attr('action').replace(/\/\d+$/, '/' + orderDetailId));
                                    });

                                });

                                function previewImage(input, previewId) {
                                    var preview = document.getElementById(previewId);
                                    var file = input.files[0];
                                    var reader = new FileReader();

                                    reader.onloadend = function() {
                                        preview.src = reader.result;
                                    };

                                    if (file) {
                                        reader.readAsDataURL(file);
                                    } else {
                                        preview.src = "";
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div
                    class="isotope-item @if ($orderDetail->status == 'Chờ duyệt') 1 @else @if ($orderDetail->status == 'Đã giao hàng') 2 @else 3 @endif @endif">
                    <fieldset>
                        <legend><b>{{ \Illuminate\Support\Str::limit($orderDetail->name_product, 60, ' ...') }}</b>
                            <p>{{ $orderDetail->status }}</p>
                        </legend>
                        <div>
                            <img src="{{ $orderDetail->url_image }}" alt="">
                            <div>
                                <p style="width: 250px">Kiểu: {{ $orderDetail->name_product_detail }}</p>
                                <p>Size: {{ $orderDetail->size }}</p>
                                <p>Giá: {{ number_format($orderDetail->productPrice, 0, ',', ',') }}</p>
                                <p>Số lượng: {{ $orderDetail->quantity }}</p>
                            </div>
                        </div>
                        <div style="display: block;width:250px">
                            <p>Thành tiền: <span
                                    style="color: crimson;font-size: 20px">{{ number_format($orderDetail->price, 0, ',', ',') }}
                                    đ</span></p>
                            <p style="margin-top: 10px">( {{ $orderDetail->payment_methods }} )</p>
                        </div>
                        <div style="width:220px">
                            @if ($orderDetail->status == 'Đang giao hàng')
                                <div>
                                    <form method="POST" action="{{ route('confirm.received', $orderDetail->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="flex-c-m stext-103 cl0 bg10 bor10 hov-btn1 p-lr-15 trans-04">
                                            Xác nhận nhận hàng
                                        </button>
                                    </form>
                                </div>
                            @else
                                @if ($orderDetail->status == 'Đã nhận hàng')
                                    <div>
                                        <a href="{{ route('buyer.productDetail', ['id' => $orderDetail->idProduct]) }}"
                                            class="flex-c-m stext-103 cl0 bg10 bor10 hov-btn1 p-lr-15 trans-04">
                                            Mua lại
                                        </a>
                                    </div>
                                    @php
                                        $countFeedback = \App\Models\Feedback::where('id_order_detail', $orderDetail->id)->count();
                                    @endphp
                                    @if ($countFeedback == 0)
                                        <div class="p-l-20">
                                            <button type="button"
                                                class="flex-c-m stext-103 cl14 bg11 bor10 hov-btn1 p-lr-15 trans-04"
                                                data-toggle="modal" data-target="#feedback"
                                                data-order-id="{{ $orderDetail->id }}">
                                                Đánh giá
                                            </button>
                                        </div>
                                    @else
                                    <div class="p-l-20">
                                        Đã đánh giá
                                    </div>
                                    @endif
                                @else
                                    <div>
                                        <label>
                                            {{ $orderDetail->status }}
                                        </label>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </fieldset>
                </div>
            @endforeach
        </div>
    </div>
@endsection