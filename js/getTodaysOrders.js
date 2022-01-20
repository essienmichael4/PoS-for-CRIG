let ordersList = document.querySelector(".productsList");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/getOrders.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                ordersList.innerHTML += data;
            }
        }
    }
    xhr.send()