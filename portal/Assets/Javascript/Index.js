document.addEventListener("DOMContentLoaded", main);

function main() {
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            if(data !=null){
               
            }
        }
        });
    xhttp.open("POST", "/portal/Assets/php/index.php", true);
    xhttp.send();
}