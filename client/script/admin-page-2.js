function selectItemList() {
  var item_type_selector = document.querySelector("#selector");
  var selected_item = item_type_selector.value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table-list").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", "/baitaplon-final/user-interface/layout-files/php-files/admin-account.php?selecteditem=" + selected_item, true);

  xmlhttp.send();
}


function testUpdate() {
  
  var updateusname = document.getElementById('update-username').innerHTML;
  var updatepass = document.getElementById('update-pass').innerHTML;
  var updatetype = document.getElementById('update-accounttype').innerHTML;
  var updatename = document.getElementById('update-name').value;
  var updatetel = document.getElementById('update-tel').value;
  var updatemail = document.getElementById('update-email').value;
  var updateaddress = document.getElementById('update-address').value;


  var updateString = updateusname + '^' + updatepass + '^' + updatetype + '^' + updatename + '^' + updatetel + '^' + updatemail + '^' + updateaddress;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert('Cập nhật thông tin tài khoản thành công')
      document.getElementById('infomation-list').innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET","/baitaplon-final/user-interface/layout-files/php-files/account-update.php?updateString=" + updateString);

  xmlhttp.send();
}


function testAdd() {
  var addusname = document.getElementById('add-username').value;
  var addpass = document.getElementById('add-pass').value;
  var addtype = document.getElementById('add-accounttype').value;
  var addname = document.getElementById('add-name').value;
  var addtel = document.getElementById('add-tel').value;
  var addmail = document.getElementById('add-email').value;
  var addaddress = document.getElementById('add-address').value;


  var addString = addusname + '^' + addpass + '^' + addtype + '^' + addname + '^' + addtel + '^' + addmail + '^' + addaddress;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert('Thêm tài khoản thành công')
      document.getElementById('add-content').innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET","/baitaplon-final/user-interface/layout-files/php-files/account-add.php?addString=" + addString);

  xmlhttp.send();
}

function deleteItem(ItemName, ItemType){
  var itemToDelete = ItemName;
  var itemType = ItemType;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table-list").innerHTML = this.responseText;
      alert('Xoá thành công');
    }
  };

  xmlhttp.open("GET", "/baitaplon-final/user-interface/layout-files/php-files/product-delete.php?itemtodelete=" + itemToDelete + "&itemtype=" + itemType, true);

  xmlhttp.send(); 
}

function selectItemToUpdate(itemName) {
  var selected_item_toupdate = itemName;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("infomation-list").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", "/baitaplon-final/user-interface/layout-files/php-files/admin-account.php?selecteditemtoupdate=" + selected_item_toupdate, true);

  xmlhttp.send(); 
}

