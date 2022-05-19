document.addEventListener('DOMContentLoaded',function(){

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
        }
    });
    xhttp.open("POST", "/portal/Assets/php/load.php", true);
    xhttp.send();

});