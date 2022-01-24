let week = document.querySelector(".week");

week.addEventListener("click", ()=>{
    let ordersList = document.querySelector(".ordersList");
    let order = document.querySelector(".ordersList");
    let sale = document.querySelector(".ordersList");
    setInterval(()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../includes/monthTableSearch.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    ordersList.innerHTML = data;
                }
            }
        }
        xhr.send()
    },500)

    setInterval(()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../includes/monthSalesSearch.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    sale.innerHTML = data;
                }
            }
        }
        xhr.send()
    },500)

    setInterval(()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../includes/monthOrdersSearch.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    order.innerHTML = data;
                }
            }
        }
        xhr.send()
    },500)
})