let productList = document.querySelector(".productsList");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/selectInventoryProducts.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                productList.innerHTML += data;
            }
        }
    }
    xhr.send()
