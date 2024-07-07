//Menampilkan Harga Berdasakran jumlah Durasi Sewa
var inputDurasi = document.getElementById('durasi');
var harga = document.getElementById('harga');

inputDurasi.addEventListener('keyup', function(){
    harga.value = 130000 * inputDurasi.value;
});




