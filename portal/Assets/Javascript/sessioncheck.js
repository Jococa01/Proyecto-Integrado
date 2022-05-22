
// Script realizado por Joan

document.addEventListener('DOMContentLoaded',main);

function main(){

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {

            let data  = JSON.parse(this.responseText);

            if(data!=null){

                document.getElementById('endbuttons').innerHTML='<div class="navbar-item has-dropdown is-hoverable"><a class="navbar-link">'+data['user']+'</a><div class="navbar-dropdown"><a class="navbar-item" id="close">Cerrar Sesión</a></div></div>';

                if(data['level']=="administrador"){
                    document.getElementById('endbuttons').innerHTML='<div class="navbar-item has-dropdown is-hoverable"><a class="navbar-link">'+data['user']+'</a><div class="navbar-dropdown"><a href="/sisadmin.html" class="navbar-item">Panel de control</a><a class="navbar-item" id="close">Cerrar Sesión</a></div></div>';
                }else if(data['level']!="administrador"){
                    redirect("index");
                }

                document.getElementById('close').addEventListener('click',CloseSession);

                console.log(getpagename());

            }else{
                console.log('no has iniciado sesión');
                redirect("login");
            }

            // Busca el elemento burger de la barra de navegación para el responsive de la página web
            document.getElementById('burger').addEventListener('click',function(){
                let burgerIcon = document.getElementById('burger');
                let dropMenu = document.getElementById('navMenu');
                burgerIcon.classList.toggle('is-active');
                dropMenu.classList.toggle('is-active');
            });
        }
    });
    xhttp.open("POST","/portal/Assets/php/sessioncheck.php",true);
    xhttp.send();
}

function CloseSession(){

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            // document.getElementById('endbuttons').innerHTML=data;
            window.location.href="./index.html";
        }
        });
    xhttp.open("GET", "/portal/Assets/php/sessioncheck.php?close='true'", true);
    xhttp.send();

}

function redirect(path){

    let ForbiddenPages = ["sisadmin","login"];
    let curpage = getpagename();

    for(let n=0;n<ForbiddenPages.length;n++){

        if (curpage == ForbiddenPages[n]){
            window.location.href="./"+path+".html";
            break;
        }

    }

}

function getpagename(){

    let curpage = window.location.pathname;
    let pagename = curpage.split("/").pop();
    pagename = pagename.split(".html").shift();
    return pagename;

}