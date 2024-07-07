var keyword = document.getElementById('keyword');
var body = document.getElementById('bodyTable');

keyword.addEventListener('keyup', function(){
    
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        if( ajax.readyState == 4 && ajax.status == 200 ){
            body.innerHTML = ajax.responseText;
        }
    }

    ajax.open('GET', '/cari/daftar-user/'+keyword.value , true);
    ajax.send();
})