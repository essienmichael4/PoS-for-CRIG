let sales = document.querySelector(".sales");



setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/todaysSales.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                sales.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 500)


let order = document.querySelector(".order");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/todaysOrders.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                order.innerHTML = data;
            }
        }
    }
    xhr.send()
}, 500)
