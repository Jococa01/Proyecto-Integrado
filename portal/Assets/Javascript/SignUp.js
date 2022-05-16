document.addEventListener("DOMContentLoaded", main);

function main() {
    let formulario = document.getElementById("signupid");
    let confirm = document.getElementById('confpass');
    let pass = document.getElementById('pass');
    confirm.addEventListener('focusout', function () {
        VerifyPass(pass.value, confirm.value);
    });

    formulario.addEventListener("submit", function (e) {
        e.preventDefault();
        loadData(this);
    });
}
function loadData(form) {
    let formFilter = new FormData(form);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if (data == null) {
                // console.log("Se ha creado el usuario");
                document.getElementById("mail").style.borderColor = "";
                window.location.href="./index.html";
            }
            else {
                // console.log("Ya hay un usuario con esa cuenta de correo");
                document.getElementById("mail").style.borderColor = "red";

                let p = document.createElement("p");
                p.innerHTML="Ya hay un usuario con esa cuenta de correo"
                p.style.color="red";
                // p.appendChild(document.getElementById("dos"));
                // p.after(document.getElementById("mail"));
            }
        }
    });
    xhttp.open("POST", "/portal/Assets/php/signup.php", true);
    xhttp.send(formFilter);
}

function VerifyPass(pass, confirmed) {
    if (pass == confirmed) {
        document.getElementById("boto").disabled = false;
    } else {
        document.getElementById("boto").disabled = true;
    }
}
