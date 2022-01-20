let products = document.querySelector(".products");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                products.innerHTML = data;
            }
        }
    }
    xhr.send()
},500)

