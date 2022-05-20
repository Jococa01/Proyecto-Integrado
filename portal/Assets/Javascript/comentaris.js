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
    draw();

}


function loadData(form) {
    let formFilter = new FormData(form);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            

        }
    });
    xhttp.open("POST", "/portal/Assets/php/hola.php", true);
    xhttp.send(formFilter);
}


// function drawList(data){

//     let rows = document.getElementById("rows");
//     // rows.innerHTML = "";
//     for (let index = 0; index < data.length; index++) {
//         rows.innerHTML+="<tr><td>"+data["titulo"]+"</td></tr>";
//     }

// }



function draw() {
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);

            for (let i = 0; i < data[0].length; i++) {
                document.getElementById('rows').innerHTML += 
                '<tr><td><div class="card"><div class="card-image"></div><div class="card-content"><div class="media"><div class="media-left"><figure class="image is-48x48"><img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image"></figure></div><div class="media-content"><p class="title is-4">'+ data[0][i][0] +'</p></div></div> <div class="content">'+ data[0][i][1] +'</div></div></div></td></tr>'
            }
        }
    });
    xhttp.open("POST", "/portal/Assets/php/com.php", true);
    xhttp.send();
}

