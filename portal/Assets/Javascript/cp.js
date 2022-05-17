document.addEventListener("DOMContentLoaded",main);

function main() {
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            // console.log(data[2]);
            document.getElementById('usernum').innerHTML=data[0]['users'];
            document.getElementById('entrynum').innerHTML=data[1]['entradas'];

            for(let i=0; i < data[2].length;i++){
                document.getElementById('usertable').innerHTML+='<tr><td width="64px"><img src="./portal/Assets/imgs/avatar.png"></td><td><div style="vertical-align: middle;"><h3>'+data[2][i][0]+'</h3><h5>'+data[2][i][1]+'</h5></div></td><td class="level-right"><a class="button is-small is-primary"href="#">Action</a></td></tr>'
            }
            document.getElementById('burger').addEventListener('click',function(){
                let burgerIcon = document.getElementById('burger');
                let dropMenu = document.getElementById('navMenu');
                burgerIcon.classList.toggle('is-active');
                dropMenu.classList.toggle('is-active');
            });
        }
        });
    xhttp.open("POST", "/portal/Assets/php/sisadmin.php", false);
    xhttp.send();
}