document.addEventListener("DOMContentLoaded", main);

function main() {
    let formulario = document.getElementById("loginform");
    let password = document.getElementById("password");

    password.addEventListener('focusout',function(){
        if(password.value == ""){
            // console.log("no hay pass");
            password.placeholder="Contraseña obligatoria ⚠";
            password.classList.add('erroneo');
        }else{
            // console.log("hay pass");
            password.placeholder="Su contraseña";
            password.classList.remove('erroneo')
        }
    });

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
            Checkaccount(data);
        }
    });
    xhttp.open("POST", "/portal/Assets/php/login.php", true);
    xhttp.send(formFilter);
}

function CheckPassword(pass){
    let password = document.getElementById("password");
    if(pass==password.value){
        console.log("Pass correcta");
    }else{
        console.log("Pass incorrecta");
    }
}

function Checkaccount(data){
    if(data != null){
        CheckPassword(data['contrasenya']);
    }
    else{
        console.log("El correo no está registrado");
    }
}