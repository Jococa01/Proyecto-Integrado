document.addEventListener("DOMContentLoaded", main);

function main() {
    console.log('DOMloaded');
    let formulario = document.getElementById("loginform");
    let password = document.getElementById("password");
    let namefield = document.getElementById("name");

    namefield.addEventListener('focusout',function(){
        if(namefield.value!=""){
            namefield.style.backgroundColor ='#ff9136';
        }
        else{
            namefield.style.backgroundColor ='#fff';
        }
    })

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
    if(pass==md5(password.value)){
        console.log("Pass correcta, se introdujo: "+md5(password.value)+" y la contraseña era: "+pass);
    }else{
        console.log("Pass incorrecta, se introdujo: "+md5(password.value)+" y la contraseña era: "+pass);
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