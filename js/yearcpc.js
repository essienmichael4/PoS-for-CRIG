let yearcpc = document.querySelector(".yearcpc");

yearcpc.addEventListener("click", ()=>{
    let ordersList = document.querySelector(".ordersList");
    let order = document.querySelector(".order");
    let sale = document.querySelector(".sales");
    let item = document.querySelector(".item");
    let orderstitle = document.querySelector(".orderstitle");
    let salestitle = document.querySelector(".salestitle");
    let itemstitle = document.querySelector(".itemstitle");

        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../includes/cpc/year/yearTableCPC.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    orderstitle.textContent = "Year's Orders";
                    ordersList.innerHTML = data;
                }
            }
        }
        xhr.send()

    
        let salexhr = new XMLHttpRequest();
        salexhr.open("GET", "../includes/cpc/year/yearSalesCPC.php",true)
        salexhr.onload = ()=>{
            if(salexhr.readyState == XMLHttpRequest.DONE){
                if(salexhr.status == 200){
                    let data = salexhr.response;
                    salestitle.textContent = "Year's Sales";
                    sale.innerHTML = data;
                }
            }
        }
        salexhr.send()
    

        let orderxhr = new XMLHttpRequest();
        orderxhr.open("GET", "../includes/cpc/year/yearOrdersCPC.php",true)
        orderxhr.onload = ()=>{
            if(orderxhr.readyState == XMLHttpRequest.DONE){
                if(orderxhr.status == 200){
                    let data = orderxhr.response;
                    order.innerHTML = data;
                }
            }
        }
        orderxhr.send();


        let itemxhr = new XMLHttpRequest();
        itemxhr.open("GET", "../includes/cpc/year/yearItemsCPC.php",true)
        itemxhr.onload = ()=>{
            if(itemxhr.readyState == XMLHttpRequest.DONE){
                if(itemxhr.status == 200){
                    let data = itemxhr.response;
                    item.innerHTML = data;
                }
            }
        }
        itemxhr.send()
})