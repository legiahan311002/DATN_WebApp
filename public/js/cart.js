// Tạo sự kiện số lượng và thành tiền
document.addEventListener('DOMContentLoaded', function () {
    setupQuantityButtons();
    setupDeleteButtons();

    function setupQuantityButtons() {
        var quantityButtons = document.querySelectorAll('.quantity-btn');

        quantityButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var cartId = this.getAttribute('data-cart-id');
                var increment = parseInt(this.getAttribute('data-increment'));
                updateQuantityAndTotal(cartId, increment);
            });
        });
    }

    function setupDeleteButtons() {
        var deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var cartId = this.getAttribute('data-cart-id');
                if (confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không?')) {
                    // Thực hiện yêu cầu Ajax để xóa sản phẩm
                    fetch('/remove-cart-item/' + cartId, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log(data); // Xem phản hồi từ server (nếu cần)
                            window.location.reload(); // Cập nhật trang sau khi xóa
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                }
            });
        });
    }

    function updateQuantityAndTotal(cartId, increment) {
        var quantityElement = document.getElementById('quantity-' + cartId);
        var totalElement = document.getElementById('total-price-' + cartId);
        var priceElement = document.getElementById('price-' + cartId);

        var currentQuantity = parseInt(quantityElement.innerText);
        var newQuantity = currentQuantity + increment;

        newQuantity = Math.max(newQuantity, 0);

        if (newQuantity === 0) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không?')) {
                deleteCartItem(cartId);
            } else {
                newQuantity = 1;
            }
        } 
        updateCartItem(cartId, newQuantity);
        quantityElement.innerText = newQuantity;

        var price = parseFloat(priceElement.innerText.replace(/,/g, ''));

        var newTotalPrice = price * newQuantity;
        totalElement.innerText = numberFormat(newTotalPrice);
    }

    function numberFormat(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
});

// Xóa sản phẩm
function deleteCartItem(cartId) {
    // Ajax request to delete the item on the server
    fetch('/remove-cart-item/' + cartId, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); 
            window.location.reload(); 
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

//cập nhật số lượng
function updateCartItem(cartId, newQuantity) {
    fetch('/update-cart-item/' + cartId, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: newQuantity })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

//tạo sự kiện cho checkbox giỏ hàng
document.addEventListener('DOMContentLoaded', function () {
    var selectAllCheckbox = document.querySelector('.cart-checkbox[data-cart-id="All"]');
    var checkboxes = document.querySelectorAll('.cart-checkbox');

    selectAllCheckbox.addEventListener('change', function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
        updateTotalAmount();
    });

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {

            if (!this.checked) {
                selectAllCheckbox.checked = false;
            }

            var allChecked = Array.from(checkboxes).every(function (cb) {
                return cb.checked;
            });

            selectAllCheckbox.checked = allChecked;

            updateTotalAmount();
        });
    });
});

function buySelected() {
    var selectedCartIds = [];

    
    var checkboxes = document.querySelectorAll('.cart-checkbox:checked');

    checkboxes.forEach(function (checkbox) {
        
        if (checkbox.getAttribute('data-cart-id') !== 'All') {
            selectedCartIds.push(checkbox.getAttribute('data-cart-id'));
        }
    });

    
    console.log('Selected Cart IDs:', selectedCartIds);
}

function updateTotalAmount() {
    var totalAmount = 0;

    
    var checkboxes = document.querySelectorAll('.cart-checkbox:checked');

    checkboxes.forEach(function (checkbox) {
        
        if (checkbox.getAttribute('data-cart-id') !== 'All') {
            var cartId = checkbox.getAttribute('data-cart-id');
            var price = parseFloat(document.getElementById('price-' + cartId).innerText.replace(/,/g, ''));
            var quantity = parseInt(document.getElementById('quantity-' + cartId).innerText);
            totalAmount += price * quantity;
        }
    });

    
    document.getElementById('Tong-tien').innerText = numberFormat(totalAmount);
}

function numberFormat(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}