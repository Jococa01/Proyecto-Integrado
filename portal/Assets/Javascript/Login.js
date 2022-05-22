
// Script realizado por Joan

document.addEventListener("DOMContentLoaded", main);

function main() {
    let formulario = document.getElementById("loginform");
    let password = document.getElementById("password");
    // let namefield = document.getElementById("name");
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
                // console.log(data);
                Checkaccount(data);
            }
        });
        xhttp.open("POST", "/portal/Assets/php/login.php", true);
        xhttp.send(formFilter);
}

function CheckPassword(data){
    let password = document.getElementById("password");
    var label = document.getElementById("passmessage");
    if(data['contrasenya']==md5(password.value)){
        // console.log("Pass correcta, se introdujo: "+md5(password.value)+" y la contraseña era: "+data['contrasenya']);
        label.innerHTML="";
        StartSession(data);
        window.location.href="./index.html";
    }else{
        // console.log("Pass incorrecta, se introdujo: "+md5(password.value)+" y la contraseña era: "+data['contrasenya']);
        label.innerHTML="La contraseña no es correcta";
    }
}

function Checkaccount(data){
    var label = document.getElementById("mailmessage");
    if(data != null){
        label.innerHTML="";
        CheckPassword(data);
    }
    else{
        // console.log("El correo no está registrado");
        label.innerHTML="El correo no está registrado";
    }
}

function StartSession(passeddata){
    const xhttp = new XMLHttpRequest();
    let user = passeddata['email'];
    let level = passeddata['tipo'];
    console.log(level);
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
        }
    });
    xhttp.open("POST", "/portal/Assets/php/session.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user="+user+"&level="+level);
}