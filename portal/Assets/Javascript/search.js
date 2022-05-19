document.addEventListener('DOMContentLoaded',main);

function main() {
    let searchbar =  document.getElementById('busqueda');
    searchbar.addEventListener("input",function(){
        let searchlist = document.getElementById('searchlist');
        searchlist.innerHTML="";
        if(searchbar.value.length>1){
            loadData(searchbar.value);
        }else{
            searchlist.innerHTML="";
        }
    });
}

function loadData(searchval) {
    let searchlist = document.getElementById('searchlist');
        const xhttp = new XMLHttpRequest();
        xhttp.addEventListener("readystatechange", function () {
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                // console.log(data);
                if(data.length<1){
                    searchlist.innerHTML+="<li>No hay resultados</li>";
                }else{
                    for(let i=0;i<data.length;i++){
                        searchlist.innerHTML+="<li>"+"<a href='"+data[i][3]+".html'>"+data[i][3]+"</a></li>";
                    }
                }
            }
        });
        xhttp.open("POST", "/portal/Assets/php/search.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("search="+searchval);
}
