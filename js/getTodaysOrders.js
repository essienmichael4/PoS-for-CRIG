let ordersList = document.querySelector(".ordersList");

    let xhr3 = new XMLHttpRequest();
    xhr3.open("GET", "../includes/getOrders.php", true);
    xhr3.onload = () =>{
        if(xhr3.readyState == XMLHttpRequest.DONE){
            if(xhr3.status == 200){
                let data = xhr3.response;

                ordersList.innerHTML += data;
            }
        }
    }
    xhr3.send()

    let itemLeft = document.querySelector(".itemLeft");

    let xhr4 = new XMLHttpRequest();
    xhr4.open("GET", "../includes/itemsLeft.php", true);
    xhr4.onload = () =>{
        if(xhr4.readyState == XMLHttpRequest.DONE){
            if(xhr4.status == 200){
                let data = xhr4.response;

                itemLeft.innerHTML += data;
            }
        }
    }
    xhr4.send()