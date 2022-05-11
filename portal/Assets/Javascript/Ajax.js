document.addEventListener("DOMContentLoaded", main);

function main() {
    let formulario = document.getElementById("loginform");
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();
        loadData(this);
    });
    loadData(formulario);
}
function loadData(form) {
    let formFilter = new FormData(form);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
        }
    });
    xhttp.open("POST", "login.php", true);
    xhttp.send(formFilter);
}
