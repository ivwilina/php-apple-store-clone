function selectItemList() {
  var item_type_selector = document.querySelector("#selector");
  var selected_item = item_type_selector.value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table-list").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", "/baitaplon-final/user-interface/layout-files/php-files/admin-product.php?selecteditem=" + selected_item, true);

  xmlhttp.send();
}


function testUpdate() {
  
  var ItemName = document.getElementById('update-itemname').innerHTML;
  var ItemId = document.getElementById('update-itemid').innerHTML;
  var ItemType = document.getElementById('update-itemtype').innerHTML;

  var stringTest="";

  //specification
  var infoname=[];
  var infodetail=[];
  var spec_infoname = document.getElementsByName('spec-infoname');
  var spec_infodetail = document.getElementsByName('spec-infodetail');
  spec_infoname.forEach((line) => {
    infoname.push(line.value);
  });
  spec_infodetail.forEach((line) => {
    infodetail.push(line.value);
  });
  for (let i = 0; i < infoname.length; i++) {
    if(i==0) {
      stringTest = stringTest + infoname[i] + "$" + infodetail[i];
    }
    else
    {
      stringTest = stringTest + "^" + infoname[i] + "$" + infodetail[i];
    }
  }

  stringTest += '|';

  //available choice
  var choicesize=[];
  var choiceprice=[];
  var spec_choicesize = document.getElementsByName('spec-choicesize');
  var spec_choiceprice = document.getElementsByName('spec-choiceprice');
  spec_choicesize.forEach((line) =>{
    choicesize.push(line.value);
  })
  spec_choiceprice.forEach((line) =>{
    choiceprice.push(line.value);
  })
  for (let i = 0; i < choicesize.length; i++) {
    if(i==0) {
      stringTest = stringTest + choicesize[i] + "$" + choiceprice[i];
    }
    else
    {
      stringTest = stringTest + "^" + choicesize[i] + "$" + choiceprice[i];
    }
  }

  stringTest += '|';
  
  //available color
  var colorcolor=[];
  var colorhex=[];
  var spec_colorcolor = document.getElementsByName('spec-colorcolor');
  var spec_colorhex = document.getElementsByName('spec-colorhex');
  spec_colorcolor.forEach((line) =>{
    colorcolor.push(line.value);
  })
  spec_colorhex.forEach((line) =>{
    colorhex.push(line.value);
  })
  for (let i = 0; i < colorcolor.length; i++) {
    if(i==0) {
      stringTest = stringTest + colorcolor[i] + "$" + colorhex[i];
    }
    else
    {
      stringTest = stringTest + "^" + colorcolor[i] + "$" + colorhex[i];
    }
  }

  stringTest += '|';

  //image source
  var sourcecolor=[];
  var sourcepath=[];
  var spec_sourcecolor = document.getElementsByName('spec-sourcecolor');
  var spec_sourcepath = document.getElementsByName('spec-sourcepath');
  spec_sourcecolor.forEach((line) =>{
    sourcecolor.push(line.value);
  })
  spec_sourcepath.forEach((line) =>{
    sourcepath.push(line.value);
  })
  for (let i = 0; i < sourcecolor.length; i++) {
    if(i==0) {
      stringTest = stringTest + sourcecolor[i] + "$" + sourcepath[i];
    }
    else
    {
      stringTest = stringTest + "^" + sourcecolor[i] + "$" + sourcepath[i];
    }
  }
  
  console.log(stringTest);

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert('Cập nhật sản phẩm thành công')
      document.getElementById('infomation-list').innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET","/baitaplon-final/user-interface/layout-files/php-files/product-update.php?updateItemname=" + ItemName + "&updateItemType=" + ItemType + "&updateItemid=" + ItemId + "&info=" + stringTest);

  xmlhttp.send();
}


function testAdd() {
  
  var ItemNameBox = document.getElementById('add-itemname');
  var ItemIdBox = document.getElementById('add-itemid');
  var ItemTypeBox = document.getElementById('add-itemtype');

  var ItemName = ItemNameBox.value;
  var ItemId = ItemIdBox.value;
  var ItemType = ItemTypeBox.value;

  var stringTest="";

  //specification
  var infoname=[];
  var infodetail=[];
  var spec_infoname = document.getElementsByName('a-spec-infoname');
  var spec_infodetail = document.getElementsByName('a-spec-infodetail');
  spec_infoname.forEach((line) => {
    infoname.push(line.value);
  });
  spec_infodetail.forEach((line) => {
    infodetail.push(line.value);
  });
  for (let i = 0; i < infoname.length; i++) {
    if(i==0) {
      stringTest = stringTest + infoname[i] + "$" + infodetail[i];
    }
    else
    {
      stringTest = stringTest + "^" + infoname[i] + "$" + infodetail[i];
    }
  }

  stringTest += '|';

  //available choice
  var choicesize=[];
  var choiceprice=[];
  var spec_choicesize = document.getElementsByName('a-spec-choicesize');
  var spec_choiceprice = document.getElementsByName('a-spec-choiceprice');
  spec_choicesize.forEach((line) =>{
    choicesize.push(line.value);
  })
  spec_choiceprice.forEach((line) =>{
    choiceprice.push(line.value);
  })
  for (let i = 0; i < choicesize.length; i++) {
    if(i==0) {
      stringTest = stringTest + choicesize[i] + "$" + choiceprice[i];
    }
    else
    {
      stringTest = stringTest + "^" + choicesize[i] + "$" + choiceprice[i];
    }
  }

  stringTest += '|';
  
  //available color
  var colorcolor=[];
  var colorhex=[];
  var spec_colorcolor = document.getElementsByName('a-spec-colorcolor');
  var spec_colorhex = document.getElementsByName('a-spec-colorhex');
  spec_colorcolor.forEach((line) =>{
    colorcolor.push(line.value);
  })
  spec_colorhex.forEach((line) =>{
    colorhex.push(line.value);
  })
  for (let i = 0; i < colorcolor.length; i++) {
    if(i==0) {
      stringTest = stringTest + colorcolor[i] + "$" + colorhex[i];
    }
    else
    {
      stringTest = stringTest + "^" + colorcolor[i] + "$" + colorhex[i];
    }
  }

  stringTest += '|';

  //image source
  var sourcecolor=[];
  var sourcepath=[];
  var spec_sourcecolor = document.getElementsByName('a-spec-sourcecolor');
  var spec_sourcepath = document.getElementsByName('a-spec-sourcepath');
  spec_sourcecolor.forEach((line) =>{
    sourcecolor.push(line.value);
  })
  spec_sourcepath.forEach((line) =>{
    sourcepath.push(line.value);
  })
  for (let i = 0; i < sourcecolor.length; i++) {
    if(i==0) {
      stringTest = stringTest + sourcecolor[i] + "$" + sourcepath[i];
    }
    else
    {
      stringTest = stringTest + "^" + sourcecolor[i] + "$" + sourcepath[i];
    }
  }
  
  console.log(stringTest);

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert('Thêm sản phẩm thành công')
      document.getElementById('add-content').innerHTML = this.responseText;

    }
  };

  xmlhttp.open("GET","/baitaplon-final/user-interface/layout-files/php-files/product-add.php?addItemname=" + ItemName + "&addItemType=" + ItemType + "&addItemid=" + ItemId + "&info=" + stringTest);

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

  xmlhttp.open("GET", "/baitaplon-final/user-interface/layout-files/php-files/admin-product.php?selecteditemtoupdate=" + selected_item_toupdate, true);

  xmlhttp.send(); 
}

function addRows(addId) {
  var add = addId;
  var tableIndex = add.split("-");
  var tableId = 'table-' + tableIndex[1];
  var table = document.getElementById(tableId);
  var rowCount = table.rows.length;
  var cellCount = table.rows[0].cells.length;
  var row = table.insertRow(rowCount);

  switch(tableIndex[1]) {
    case '1':
      var col = [];
      col.push('<input title="none" type="text" name="spec-infoname" id="" value="">')
      col.push('<input title="none" type="text" name="spec-infodetail" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;

    case '2':
      var col = [];
      col.push('<input title="none" type="text" name="spec-choicesize" id="" value="">')
      col.push('<input title="none" type="text" name="spec-choiceprice" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;

    case '3':
      var col = [];
      col.push('<input title="none" type="text" name="spec-colorcolor" id="" value="">')
      col.push('<input title="none" type="text" name="spec-colorhex" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;
    case '4':
      var col = [];
      col.push('<input title="none" type="text" name="spec-sourcecolor" id="" value="">')
      col.push('<input title="none" type="text" name="spec-sourcepath" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;
  }
}

function delRow(rowId) {
  var del = rowId;
  var tableIndex = del.split("-");
  var tableId = "table-" + tableIndex[1];
  var table = document.getElementById(tableId);
	var rowCount = table.rows.length;
	if(rowCount > '3'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('Cần ít nhất 1 dòng dữ liệu');
	}
}


function addRows2(addId) {
  var add = addId;
  var tableIndex = add.split("-");
  var tableId = 'table-' + tableIndex[1];
  var table = document.getElementById(tableId);
  var rowCount = table.rows.length;
  var cellCount = table.rows[0].cells.length;
  var row = table.insertRow(rowCount);

  switch(tableIndex[1]) {
    case '1a':
      var col = [];
      col.push('<input title="none" type="text" name="a-spec-infoname" id="" value="">')
      col.push('<input title="none" type="text" name="a-spec-infodetail" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;

    case '2a':
      var col = [];
      col.push('<input title="none" type="text" name="a-spec-choicesize" id="" value="">')
      col.push('<input title="none" type="text" name="a-spec-choiceprice" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;

    case '3a':
      var col = [];
      col.push('<input title="none" type="text" name="a-spec-colorcolor" id="" value="">')
      col.push('<input title="none" type="text" name="a-spec-colorhex" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;
    case '4a':
      var col = [];
      col.push('<input title="none" type="text" name="a-spec-sourcecolor" id="" value="">')
      col.push('<input title="none" type="text" name="a-spec-sourcepath" id="" value="">')
      for(var i = 0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        cell.innerHTML=col[i];
      }
      break;
  }
}

function delRow2(rowId) {
  var del = rowId;
  var tableIndex = del.split("-");
  var tableId = "table-" + tableIndex[1];
  var table = document.getElementById(tableId);
	var rowCount = table.rows.length;
	if(rowCount > '3'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('Cần ít nhất 1 dòng dữ liệu');
	}
}