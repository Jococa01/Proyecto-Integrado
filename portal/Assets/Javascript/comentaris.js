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
        loadData(formulario);
    });
    loadData(formulario);
}


function loadData(formulario) {
    let formFilter = new FormData(formulario);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            /* console.log(data); */
            drawList(data);
        }
    });
    xhttp.open("POST", "/portal/Assets/php/hola.php", true);
    xhttp.send(formFilter);
}


function drawList(data){
    let rows = document.getElementById("rows");
    rows.innerHTML = "";
    for (let index = 0; index < data.length; index++) {
        let row = document.createElement("tr");
        let id = data[index][""];
        for (field in data[index]) {
            let col = document.createElement("td");
            switch (field) {
                case "id":
                    col.innerHTML = id;
                    break;
                case "company":
                    col.innerHTML = data[index][field];
                    break;
                default:
                    let fieldName = field;
                    let checkSlider = document.createElement("label");
                    checkSlider.className = "switch";
                    let inputCheckSlider = document.createElement("input");
                    inputCheckSlider.type = "checkbox";
                    inputCheckSlider.checked = data[index][field];
                    inputCheckSlider.addEventListener("click", function () {
                        updateAction(id, fieldName, this.checked);
                    });
                    checkSlider.appendChild(inputCheckSlider);
                    let spanCheckSlider = document.createElement("span");
                    spanCheckSlider.className = "slider round";
                    checkSlider.appendChild(spanCheckSlider);
                    col.appendChild(checkSlider);
            }
            row.appendChild(col);
        }
        companyRows.appendChild(row);
    }
}




