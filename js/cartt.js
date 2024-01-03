const totalMoney = document.querySelector('.total-money');
        const quantityInput = document.querySelectorAll('.qty-input');
        const decreaseBtns = document.querySelectorAll('.decrease-btn');
        const increaseBtns = document.querySelectorAll('.increase-btn');
        // const cartProduct = document.querySelectorAll('.cart-product');
        const quantities = document.querySelectorAll('.qty-input');
        const cartGia = document.querySelectorAll('.cart-gia');
        const totals = document.querySelectorAll('.cart-tt-price');
        // const qtyProduct = document.querySelectorAll('.qty-product');
        decreaseBtns.forEach(function (button, index) {
            button.addEventListener('click', function () {
                let cartItem = button.closest('.cart-sl');
                let productId = cartItem.getAttribute('data-product-id');
                let inputField = button.parentElement.querySelector('.qty-input');
                let currentValue = parseInt(inputField.value);
                if (currentValue > 1) {
                    $.ajax({
                        type: 'post',
                        url: 'removecart.php',
                        data: { idsp: productId },
                    })
                        .done(function (data) {
                            inputField.value = data;
                            const price = parseFloat(cartGia[index].textContent);
                            const quantity = parseInt(quantities[index].value);
                            totals[index].textContent = price * quantity;
                            newTotalMoney = totalMoney.textContent - price;
                            totalMoney.textContent = newTotalMoney;
                        })
                        .fail(function (data) {
                        });
                }
            });
        });
        let reachedMaxProduct = [];
        increaseBtns.forEach(function (button, index) {
            button.addEventListener('click', function () {
                let cartItem = button.closest('.cart-sl');
                let productId = cartItem.getAttribute('data-product-id');
                let inputField = button.parentElement.querySelector('.qty-input');
                $.ajax({
                    type: 'post',
                    url: 'addcart.php',
                    data: { idsp: productId },
                })
                    .done(function (data) {
                        // alert(data);    
                        // var arr = data.split(","); 
                        // console.log(arr.length)
                        // console.log(arr)
                        if (data == 0) {
                            document.getElementById("notificationmethod").style.display = "block";
                        }
                        else {
                            inputField.value = data;
                            const price = parseFloat(cartGia[index].textContent);
                            const quantity = parseInt(quantities[index].value);
                            totals[index].textContent = price * quantity;
                            if (reachedMaxProduct[index] !== price * quantity) {
                                let newTotalMoney = parseFloat(totalMoney.textContent) + price;
                                totalMoney.textContent = newTotalMoney;
                            }
                            reachedMaxProduct[index] = price * quantity;
                        }

                    })
                    .fail(function (data) {
                    });
            });
        });
        quantityInput.forEach(function (input, index) {
            input.addEventListener('change', function (e) {
                let quantity = e.target.value;
                let cartItem = input.closest('.cart-sl');
                let productId = cartItem.getAttribute('data-product-id');
                let qty_input_hidden=document.querySelectorAll('.qty-input-hidden')
                if (e.target.value === '' || e.target.value === '0') {
                  e.target.value =qty_input_hidden[index].value  // Gán lại giá trị ban đầu
                }
                else {
                    $.ajax({
                        type: 'post',
                        url: 'updatequantity.php',
                        data: { idsp: productId, newquantity: quantity },
                    })
                        .done(function (data) {
                            if (data) {
                                let price = parseFloat(cartGia[index].textContent);
                                // let quantity = data;
                                totals[index].textContent = price * data;
                                let overallTotal = 0;
                                totals.forEach((total) => {
                                    overallTotal += parseFloat(total.textContent);
                                });
                                totalMoney.textContent = overallTotal;
                                e.target.value = data;
                            }
                        })
                        .fail(function (data) {
                        });
                }
            })
        })

        let productIdToDelete = null;
        function showConfirmation(productId) {
            productIdToDelete = productId;
            document.getElementById("confirmationModal").style.display = "block";
        }
        function closeConfirmation() {
            document.getElementById("confirmationModal").style.display = "none";
        }

        // Function to handle the delete confirmation
        function confirmDelete() {
            // alert(productIdToDelete)
            $.ajax({
                type: 'post',
                url: 'deletecart.php',
                data: { idsp: productIdToDelete },
            })
                .done(function (data) {
                    if (data == 0) {
                        // document.querySelector('.total-btn').innerText=data;
                        document.querySelector('.countsp').innerText = data;
                        document.getElementById('main_cart').innerHTML = `
          <div class="container px-0" style="border-bottom: 13px solid #efefef;">
            <div class=" cart-title py-2 mb-3">
              <h4>GIỎ HÀNG</h4>
            </div>
            <div class="cart-empty py-4 rounded">
              <img src="../image1/cart1.png">
              <p class="Cart-Empty-Notification">Giỏ hàng trống</p>
              <p style="font-size: 16px;">Bạn tham khảo thêm các sản phẩm được Food gợi ý bên dưới nhé!</p>
            </div>
          </div>
          `;
                    }
                    else {
                        console.log(document.getElementById('price-product-' + productIdToDelete).textContent)
                        document.querySelector('.total-btn').innerText = data;
                        document.querySelector('.countsp').innerText = data;
                        document.getElementById('product_' + productIdToDelete).style.display = "none";
                        let price_product = document.getElementById('price-product-' + productIdToDelete).textContent;
                        let newPrice = parseInt(totalMoney.textContent) - parseInt(price_product);
                        console.log(newPrice);
                        totalMoney.textContent = newPrice;
                    }
                })
            // window.location.href = 'deletecart.php?idsp=' + productIdToDelete;

            // Perform the delete action or redirect to deletecart.php here
            // alert("Xóa sản phẩm thành công!");
            closeConfirmation();
        }
        function closemethod() {
            document.getElementById("notificationmethod").style.display = "none";
        }