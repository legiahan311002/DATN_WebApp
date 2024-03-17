// add image
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image-input").on('change', function() {
        readURL(this);
    });
});

// add detail
// $(document).ready(function () {
//     // Xử lý sự kiện click nút "Xóa"
//     $("#detail-container").on("click", ".js-remove-row", function() {
//         var row = $(this).closest('.row');
//         row.remove();
//     });

//     // $("#add-new-detail").on("click", function() {
//     //     // if (isFormValid()) {
//     //         addNewRow();
//     //     // } else {
//     //     //     alert("Vui lòng điền đầy đủ thông tin");
//     //     // }
//     // });
//     $("#add-new-detail").on("click", function() {
//         if ($("#detail-container .detail-row").length > 0) {
//             // Nếu có hàng đầu tiên, thêm một hàng mới bình thường
//             addNewRow();
//         } else {
//             // Nếu không có hàng đầu tiên, tạo một hàng mới từ đầu
//             createFirstRow();
//         }
//     });

//     // function isFormValid() {
//     //     // Kiểm tra xem tất cả các ô input có giá trị không
//     //     var isValid = true;
//     //     $("#detail-container .row:first input").each(function() {
//     //         if ($(this).val() === '') {
//     //             isValid = false;
//     //             return false; // Thoát khỏi vòng lặp nếu có ô input không có giá trị
//     //         }
//     //     });
//     //     return isValid;
//     // }
//     function createFirstRow() {
//         // Tạo HTML cho một hàng mới với các trường chi tiết
//         var newDetailRow = `
//             <div class="row detail-row">
//                 <div class="col-sm-2">
//                     <div class="form-group">
//                         <label>Size</label>
//                         <input type="number" class="form-control" name="details[0][size]" placeholder="Nhập size">
//                     </div>
//                 </div>
//                 <div class="col-sm-2">
//                     <div class="form-group">
//                         <label>Màu sắc</label>
//                         <input type="text" class="form-control" name="details[0][color]" placeholder="Nhập màu sắc">
//                     </div>
//                 </div>
//                 <div class="col-sm-2">
//                     <div class="form-group">
//                         <label>Số lượng</label>
//                         <input type="number" class="form-control" name="details[0][inventory_number]" placeholder="Nhập số lượng">
//                     </div>
//                 </div>
//                 <div class="col-sm-3">
//                     <label>Hình ảnh</label>
//                     <input type="file" name="details[0][image_detail_upload]" accept="image/*" class="image-input-detail form-control">
//                     <input type="hidden" name="details[0][avt_detail_hidden]" value="">
//                     <img src="" class="show-image-detail" alt="" width="80px">
//                 </div>
//                 <div class="col-sm-1">
//                     <div class="form-group">
//                         <button type="button" class="btn btn-danger js-remove-row mt-4">Xóa</button>
//                     </div>
//                 </div>
//             </div>
//         `;
        

//         // Thêm hàng mới vào container
//         $('#detail-container').append(newDetailRow);

//         // Cập nhật sự kiện change cho input file
//         $('.image-input-detail:last').off('change').on('change', handleImageChange);

//         // Tăng chỉ mục của chi tiết sản phẩm trong tên ô input
//         newRow.find('input').each(function() {
//             var name = $(this).attr('name');
//             var matches = name.match(/\[(\d+)\]/);
//             if (matches) {
//                 var newIndex = parseInt(matches[1]) + 1;
//                 name = name.replace(/\[(\d+)\]/, '[' + newIndex + ']');
//                 $(this).attr('name', name);
//             }
//         });
//     }

//     function addNewRow() {
//         // Sao chép hàng đầu tiên
//         var lastRowIndex = $("#detail-container .detail-row").length;
//         var newRow = $("#detail-container .detail-row:first").clone();

//         // Tăng chỉ mục của chi tiết sản phẩm trong tên ô input
//         newRow.find('input').each(function() {
//             var name = $(this).attr('name');
//             var matches = name.match(/\[(\d+)\]/);
//             if (matches) {
//                 var newIndex = parseInt(matches[1]) + 1;
//                 name = name.replace(/\[(\d+)\]/, '[' + newIndex + ']');
//                 $(this).attr('name', name);
//             }
//         });
        
//         // Xóa giá trị của các ô input trong hàng mới
//         newRow.find('input').val('');

//         // Đặt ảnh về trạng thái rỗng trong hàng mới
//         newRow.find('.show-image-detail').attr('src', '');

//         // Thêm nút xóa và sự kiện xóa vào hàng mới
//         newRow.find('.col-sm-1').html('<div class="col-sm-1"><div class="form-group"><button type="button" class="btn btn-danger js-remove-row mt-4">Xóa</button></div></div>');

//         // Thêm hàng mới vào cuối #detail-container
//         $("#detail-container").append(newRow);

//         // Cập nhật sự kiện change cho input file
//         $('.image-input-detail:last').off('change').on('change', handleImageChange);
//     }

//     // Sự kiện thay đổi của input file
//     function handleImageChange() {
//         var showImage = $(this).closest('.row').find('.show-image-detail');
//         readURL(this, showImage);
//     }

//     // Hiển thị hình ảnh đã chọn
//     function readURL(input, showImage) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 showImage.attr('src', e.target.result);
//             }

//             reader.readAsDataURL(input.files[0]);
//         }
//     }

//     // Cập nhật sự kiện change cho input file khi trang được tải
//     $('.image-input-detail').on('change', handleImageChange);
// });


$(document).ready(function() {
    var detailIndex = 1;

    $('#add-new-detail').on('click', function() {
        // Tăng chỉ mục để đảm bảo tính duy nhất cho mỗi chi tiết
        var currentDetailIndex = detailIndex++;

        // Tạo một div mới chứa thông tin chi tiết sản phẩm
        var newDetailDiv = $('<div class="row detail-row" id="detail-row-' + currentDetailIndex + '"></div>');

        // Nội dung chi tiết sản phẩm
        newDetailDiv.html(`
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Size <span class="text-danger"> (*)</span></label>
                    <input type="number" class="form-control" name="details[${currentDetailIndex}][size]" placeholder="Nhập size">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Màu sắc <span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" name="details[${currentDetailIndex}][color]" placeholder="Nhập màu sắc">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Số lượng <span class="text-danger"> (*)</span></label>
                    <input type="number" class="form-control" name="details[${currentDetailIndex}][inventory_number]" placeholder="Nhập số lượng">
                </div>
            </div>
            <div class="col-sm-3">
                <label>Hình ảnh</label>
                <input type="file" name="details[${currentDetailIndex}][image_detail_upload]" accept="image/*" class="image-input-detail form-control" data-image-id="detail-image-${currentDetailIndex}">
                <input type="hidden" name="details[${currentDetailIndex}][avt_detail_hidden]" id="avt-detail-hidden-${currentDetailIndex}" value="">
                <img src="" class="show-image-detail" alt="" width="80px">
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <button type="button" class="btn btn-danger js-remove-row mt-4">x</button>
                </div>
            </div>
        `);

        // Thêm div mới vào detail-container
        $('#detail-container').append(newDetailDiv);

        // Cập nhật sự kiện change cho input file
        $('.image-input-detail:last').off('change').on('change', handleImageChange);

        // Cập nhật sự kiện xóa cho nút xóa
        newDetailDiv.find('.js-remove-row').on('click', function() {
            newDetailDiv.remove();
        });
    });

    // Sự kiện thay đổi của input file
    function handleImageChange() {
        var showImage = $(this).closest('.row').find('.show-image-detail');
        readURL(this, showImage);
    }

    // Hiển thị hình ảnh đã chọn
    function readURL(input, showImage) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                showImage.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Cập nhật sự kiện change cho input file khi trang được tải
    $('.image-input-detail').on('change', handleImageChange);
});

