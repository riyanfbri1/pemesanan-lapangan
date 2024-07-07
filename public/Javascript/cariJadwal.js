var date = document.getElementById('date');
var lapangan = document.getElementById('lapangan');
var btnCari = document.getElementById('btnCari');
var jadwal = document.getElementById('table-jadwal');

btnCari.addEventListener('click', function(){
    
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            jadwal.innerHTML = ajax.responseText;
        }
    }

    ajax.open('GET', '/cari-jadwal/' + date.value + '/' + lapangan.value , true);
    ajax.send();
})