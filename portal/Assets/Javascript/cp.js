
// Script realizado por Joan

document.addEventListener("DOMContentLoaded",main);

function main() {
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            // console.log(data);
            // console.log(data[2]);
            document.getElementById('usernum').innerHTML=data[0]['users'];
            document.getElementById('entrynum').innerHTML=data[1]['entradas'];

            for(let i=0; i < data[2].length;i++){
                document.getElementById('usertable').innerHTML+='<tr><td width="64px"><img src="./portal/Assets/imgs/avatar.png"></td><td style="max-width:0; overflow-x:scroll;"><div><h5>'+data[2][i][0]+'</h5><h6>'+data[2][i][1]+'</h6></div></td><td style="vertical-align: middle; max-width:0;"><a class="button is-info is-small"href="#" style="display:block; margin: auto;">Editar</a></td></tr>'
            }
            for(let n=0; n < data[3].length;n++){
                document.getElementById('entrytable').innerHTML+='<tr><td width="64px"><i class="fa fa-bell -o"></i></td><td><div style="vertical-align: middle;"><h5>'+data[3][n][3]+'</h5><h6>'+data[3][n][1]+'</h6></div></td><td style="vertical-align: middle;"><a class="button is-info is-small"href="#" style="display:block; margin: auto;">Editar</a></td></tr>'
            }
        }
        });
    xhttp.open("POST", "/portal/Assets/php/sisadmin.php", false);
    xhttp.send();
}