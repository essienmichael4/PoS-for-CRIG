let sales = document.querySelector(".sales");

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

let order = document.querySelector(".order");

let xhr2 = new XMLHttpRequest();
xhr2.open("GET", "../includes/todaysOrders.php", true);
xhr2.onload = () =>{
    if(xhr2.readyState == XMLHttpRequest.DONE){
        if(xhr2.status == 200){
            let data = xhr2.response;
            order.innerHTML = data;
        }
    }
}
xhr2.send()
