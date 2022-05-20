
// document.addEventListener("DOMContentLoaded", main);

// function main() {
//     const xhttp = new XMLHttpRequest();
//     xhttp.addEventListener("readystatechange", function () {
//         if (this.readyState == 4 && this.status == 200) {
//             let data = JSON.parse(this.responseText);
            
//             for(let i=0; i < data[0].length;i++){
//                 document.getElementById('rows').innerHTML+='<tr><td><div style="vertical-align: middle;"><h5>'+data[0][i][0]+'</h5></div></td><td><div style="vertical-align: middle;"><h5>'+data[0][i][1]+'</h5></div></td></tr>'
//             }
//         }
//         });
//     xhttp.open("POST", "/portal/Assets/php/com.php", false);
//     xhttp.send();
// }

