let week = document.querySelector(".week");

week.addEventListener("click", ()=>{
    setInterval(()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../includes/selectInventoryProducts.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    orders.innerHTML = data;
                }
            }
        }
        xhr.send()
    },500)

    setInterval(()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../includes/selectInventoryProducts.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    orders.innerHTML = data;
                }
            }
        }
        xhr.send()
    },500)

    setInterval(()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../includes/selectInventoryProducts.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    orders.innerHTML = data;
                }
            }
        }
        xhr.send()
    },500)
})