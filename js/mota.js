const btn_add = document.querySelector('.btn_add');
const quantity = document.querySelector('input[name="qty"]');
const product_id = document.querySelector('input[name="pid"]');
const name = document.querySelector('input[name="name"]');
const price = document.querySelector('input[name="price"]');
const image = document.querySelector('input[name="image"]');
btn_add.addEventListener('click', function () {
  $.ajax({
    type: 'post',
    url: 'addcart.php',
    data: {
      add_to_cart: 'add_to_cart', pid: product_id.value, name: name.value, price: price.value,
      image: image.value, qty: quantity.value
    },
  })
    .done(function (data) {
      // alert(data);
      if (data) {
        if (data == 'request') {
          document.getElementById("notificationmethod").style.display = "block";
        }
        else if (data == 'redirect') {
          window.location.href = '/DOANCS22/user/formL.php';
        }
        else {
          document.querySelector('.countsp').innerText = data;
          document.getElementById("addsucces").style.display = "block";
        }
      }
    })
    .fail(function (data) {
    });
})
function closeaddsucces() {
  document.getElementById("addsucces").style.display = "none";
}
function closemethod() {
  document.getElementById("notificationmethod").style.display = "none";
}
document.onclick = function (event) {
  const addsucces = document.getElementById('addsucces');
  if (!addsucces.contains(event.target)) {
    addsucces.style.display = 'none';
  }
}


const buy_now = document.querySelector('.buy-now');
buy_now.addEventListener('click', function () {
  $.ajax({
    type: 'post',
    url: 'handlepay.php',
    data: { idsp: $('#idsp').val() },
  })
    .done(function (data) {
      // alert(data)
      console.log(data == 'request');
      if (data) {
        if (data == 0) {
          document.getElementById("notificationmethod").style.display = "block";
        }
        else if (data == 1) {
          window.location.href = '/DOANCS22/user/formL.php';
        }
        else if (data == 2) {
          window.location.href = '/DOANCS22/user/thanhtoan.php?idsp=' + $('#idsp').val();
        }
      }
    })
    .fail(function (data) {

    })
})