const deletedusers = document.querySelector(".deletedusers");
const content = document.querySelector(".content");
const deletedproducts = document.querySelector(".deletedproducts");
const editedproducts = document.querySelector(".editedproducts");

window.addEventListener("load",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/analyticseditedproducts.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                content.innerHTML = data;
            }
        }
    }
    xhr.send()
})

deletedusers.addEventListener("click",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/analyticsusers.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                content.innerHTML = data;
            }
        }
    }
    xhr.send()
})

deletedproducts.addEventListener("click",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/analyticsedit.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                content.innerHTML = data;
            }
        }
    }
    xhr.send()
})

editedproducts.addEventListener("click",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/analyticseditedproducts.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                content.innerHTML = data;
            }
        }
    }
    xhr.send()
})