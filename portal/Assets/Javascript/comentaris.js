/* 

TOT ESTE DOCUMENT ESTÀ INTENTAT FER PER  Sergio, Natàlia y Alex   ;)
hem posat tot el nostre ingeni i llagrimes en estos documents :(
    
PD: Aproba-mos perfavor <3
PD2: haz com dumbledore y dona-nos 5 punts <3 :)

*/

document.addEventListener("DOMContentLoaded", main);

function main() {
    let formulario = document.getElementById("formulario");
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();
        loadData(this);
    });
    
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            drawList(data);
        }
    });
}


function loadData(form) {
    let formFilter = new FormData(form);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            /* console.log(data); */
            // drawList(data);
        }
    });
    xhttp.open("POST", "/portal/Assets/php/hola.php", true);
    xhttp.send(formFilter);
}


function drawList(data){

    let rows = document.getElementById("rows");
    // rows.innerHTML = "";
    for (let index = 0; index < data.length; index++) {
        rows.innerHTML+="<tr><td>"+data["titulo"]+"</td></tr>";
    }
        
}




