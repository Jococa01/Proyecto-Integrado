document.addEventListener("DOMContentLoaded", main);

function main() {
    let formulario = document.getElementById("loginform");
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();
        loadData(this);
    });
    // loadData(formulario);
}
function loadData(form) {
    let formFilter = new FormData(form);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            let errormsg = document.getElementById("Errormsg");
            console.log(data);
            if(data==null){
                // alert("Registrate con esta cuenta de correo");
                errormsg.hidden=false;
            }
            else{
                errormsg.hidden=true
            }
        }
    });
    xhttp.open("POST", "/portal/Assets/php/login.php", true);
    xhttp.send(formFilter);
}
