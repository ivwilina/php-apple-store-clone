let x = document.querySelectorAll(".price");
for (let i = 0, len = x.length; i < len; i++) {
  let num = Number(x[i].innerHTML).toLocaleString("en");
  x[i].innerHTML = num;
}

function formatDate (input) {
    var datePart = input.match(/\d+/g),
    year = datePart[0].substring(2),
    month = datePart[1], day = datePart[2];
  
    return year+'/'+month+'/'+day;
}
  
function filter(name) {
    var filterVariable ;
    var usrname = name;
    console.log(usrname);
    if(filterVariable=document.getElementById('filter').value){
        var formatted = formatDate(filterVariable)
    }
    else{
        var formatted = 'all';
    }
    console.log(formatted)
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('after-filter').innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "/baitaplon-final/user-interface/layout-files/php-files/user-bill-res.php?filter="+formatted+"&name="+usrname, true);
    xmlhttp.send();
}