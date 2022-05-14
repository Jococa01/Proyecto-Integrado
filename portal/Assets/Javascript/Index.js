document.addEventListener("DOMContentLoaded", main);

function main() {
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            // console.log(data);
            if(data !=null){
                document.getElementById('endbuttons').innerHTML='<div class="navbar-item has-dropdown is-hoverable"><a class="navbar-link">'+data['user']+'</a><div class="navbar-dropdown"><a class="navbar-item" id="close">Cerrar Sesión</a></div></div>';

                document.getElementById('close').addEventListener('click',CloseSession);
            }
        }
        });
    xhttp.open("POST", "/portal/Assets/php/index.php", true);
    xhttp.send();
}

function CloseSession(){

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            document.getElementById('endbuttons').innerHTML=data;
        }
        });
    xhttp.open("GET", "/portal/Assets/php/index.php?close='true'", true);
    xhttp.send();

}