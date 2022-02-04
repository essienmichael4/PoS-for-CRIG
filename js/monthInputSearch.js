let monthSearch = document.querySelector(".monthSearch");

monthSearch.addEventListener("click", ()=>{
    let firstmonth = document.querySelector(".firstmonth").value;
    let secondmonth = document.querySelector(".secondmonth").value;
    let category = document.querySelector("#category").value;

    if(firstmonth == "" && secondmonth == ""){
        alert("Atleast, one month must be selected");
        return;
    }

    let ordersList = document.querySelector(".ordersList");
    let order = document.querySelector(".order");
    let sale = document.querySelector(".sales");
    let item = document.querySelector(".item");
    let orderstitle = document.querySelector(".orderstitle");
    let salestitle = document.querySelector(".salestitle");
    let itemstitle = document.querySelector(".itemstitle");
    
    let params = "firstday="+firstmonth+"&secondday="+secondmonth+"&category="+category;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../includes/inputSearches/monthInputTable.php",true)
        xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    orderstitle.textContent = "Month's Orders";
                    ordersList.innerHTML = data;
                }
            }
        }
        xhr.send(params)

        let salexhr = new XMLHttpRequest();
        salexhr.open("POST", "../includes/inputSearches/monthInputSales.php",true)
        salexhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        salexhr.onload = ()=>{
            if(salexhr.readyState == XMLHttpRequest.DONE){
                if(salexhr.status == 200){
                    let data = salexhr.response;
                    salestitle.textContent = "Month's Sales";
                    sale.innerHTML = data;
                }
            }
        }
        salexhr.send(params)
    
        let orderxhr = new XMLHttpRequest();
        orderxhr.open("POST", "../includes/inputSearches/monthInputOrders.php",true)
        orderxhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        orderxhr.onload = ()=>{
            if(orderxhr.readyState == XMLHttpRequest.DONE){
                if(orderxhr.status == 200){
                    let data = orderxhr.response;
                    order.innerHTML = data;
                }
            }
        }
        orderxhr.send(params)
    
        let itemxhr = new XMLHttpRequest();
        itemxhr.open("POST", "../includes/inputSearches/monthInputItems.php",true)
        itemxhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        itemxhr.onload = ()=>{
            if(itemxhr.readyState == XMLHttpRequest.DONE){
                if(itemxhr.status == 200){
                    let data = itemxhr.response;
                    item.innerHTML = data;
                }
            }
        }
        itemxhr.send(params)
})