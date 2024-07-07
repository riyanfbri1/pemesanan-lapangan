//Untuk menu list Pesanan Dashboard Admin
const menu = document.querySelector('#pesanan-list');
const icon = document.querySelector('#icon-list-pesanan');

function listMenu(){
    menu.classList.toggle('hidden');
    icon.classList.toggle('rotate-icon');
}