let x = document.querySelectorAll(".p-price");
for (let i = 0, len = x.length; i < len; i++) {
  let num = Number(x[i].innerHTML).toLocaleString("en");
  x[i].innerHTML = num;
}

var totalPriceContainer = document.getElementById("total-price");
var totalPrice = 0;
var price_array = [];
var quantity_array = [];
var product_price = document.getElementsByClassName("p-price");
for (let i = 0; i < product_price.length; i++) {
  price_array.push(Number(product_price[i].innerHTML.replace(/\D/g, "")));
}

var product_quantity = document.getElementsByName("quantity");
for (let i = 0; i < product_quantity.length; i++) {
  quantity_array.push(product_quantity[i].value);
}

for (let i = 0; i < price_array.length; i++) {
  totalPrice += price_array[0] * quantity_array[0];
}

totalPriceContainer.innerHTML = totalPrice.toLocaleString("en");

function calPrice() {
  var newtotalPrice = 0;
  var newprice_array = [];
  var newquantity_array = [];
  var newproduct_price = document.getElementsByClassName("p-price");
  for (let i = 0; i < newproduct_price.length; i++) {
    newprice_array.push(
      Number(newproduct_price[i].innerHTML.replace(/\D/g, ""))
    );
  }

  var newproduct_quantity = document.getElementsByName("quantity");
  for (let i = 0; i < newproduct_quantity.length; i++) {
    newquantity_array.push(newproduct_quantity[i].value);
  }

  for (let i = 0; i < newprice_array.length; i++) {
    newtotalPrice += newprice_array[i] * newquantity_array[i];
    console.log(newtotalPrice);
  }

  totalPriceContainer.innerHTML = newtotalPrice.toLocaleString("en");
}

function removeCart(itemid) {
    var removeItemId = itemid;
    window.location.href ="/baitaplon-final/user-interface/layout-files/php-files/removeCartItem.php?id=" + removeItemId;
}

function getTime() {
    var today = new Date();
    var date =
      today.getFullYear() + '/' +(today.getMonth() + 1) + '/' + today.getDate();
    var time =
      today.getHours() + ':' + today.getMinutes() + ':' +  today.getSeconds();
    timestamp = date +'-'+ time;
    return timestamp;
}

function checkout() {
    var sendArray = "";
    var inputItemID = document.getElementsByClassName('p-id');
    var inputItemName = document.getElementsByClassName('p-name');
    var inputItemChoice = document.getElementsByClassName('p-choice');
    var inputItemColor = document.getElementsByClassName('p-color');
    var inputItemPrice = document.getElementsByClassName('p-price');
    var inputItemQuantity = document.getElementsByName('quantity');
    var buyItemTotalPrice = Number(document.getElementById('total-price').innerHTML.replace(/\D/g, ""));
    var customerName = document.getElementById('userName').value;
    var customerTel = document.getElementById('userTel').value;
    var customerAddress = document.getElementById('userAddress').value;
    var billId = getTime();
    var buyItemID = [];
    for(let i=0 ; i<inputItemID.length ; i++)
    {
        buyItemID.push(inputItemID[i].innerHTML)
    }
    var buyItemName = [];
    for(let i=0 ; i<inputItemName.length ; i++)
    {
        buyItemName.push(inputItemName[i].innerHTML)
    }
    var buyItemChoice = [];
    for(let i=0 ; i<inputItemChoice.length ; i++)
    {
        buyItemChoice.push(inputItemChoice[i].innerHTML)
    }
    var buyItemColor = [];
    for(let i=0 ; i<inputItemColor.length ; i++)
    {
        buyItemColor.push(inputItemColor[i].innerHTML)
    }
    var buyItemPrice = [];
    for(let i=0 ; i<inputItemPrice.length ; i++)
    {
        buyItemPrice.push(inputItemPrice[i].innerHTML)
    }
    var buyItemQuantity = [];
    for(let i=0 ; i<buyItemName.length ; i++)
    {
        buyItemQuantity.push(inputItemQuantity[i].value)
    }

    sendArray = billId + '$' + customerName + '$' + customerTel + '$' + customerAddress + '$' + buyItemTotalPrice;

    for(let i=0 ; i<buyItemName.length ; i++)
    {
        sendArray += '$' + buyItemID[i] + '^' + buyItemName[i] + '^' + buyItemChoice[i] + '^' + buyItemColor[i]  + '^' + buyItemPrice[i] + '^' + buyItemQuantity[i];
    }
    console.log(sendArray)

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert('Đặt hàng thành công');
        window.location.href ="/baitaplon-final/user-interface/layout-files/user-cart.php";
      }
    };
    xmlhttp.open("GET", "/baitaplon-final/user-interface/layout-files/php-files/checkout.php?checkout="+sendArray, true);
    xmlhttp.send();
}