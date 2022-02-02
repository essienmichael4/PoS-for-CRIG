let dateSearch = document.querySelector(".dateSearch");

dateSearch.addEventListener("click", ()=>{
    let firstdate = document.querySelector(".firstdate").value;
    let seconddate = document.querySelector(".seconddate").value;
    let category = document.querySelector("#category").value;

    if(firstdate =="" && seconddate ==""){
        alert("Atleast, one day must be selected");
        return;
    }

    let ordersList = document.querySelector(".ordersList");
    let order = document.querySelector(".order");
    let sale = document.querySelector(".sales");
    let item = document.querySelector(".item");
    
    let params = "firstday="+firstdate+"&secondday="+seconddate+"&category="+category;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../includes/inputSearches/dayInputTable.php",true)
        xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    ordersList.innerHTML = data;
                }
            }
        }
        xhr.send(params)

        let salexhr = new XMLHttpRequest();
        salexhr.open("POST", "../includes/inputSearches/dayInputSales.php",true)
        salexhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        salexhr.onload = ()=>{
            if(salexhr.readyState == XMLHttpRequest.DONE){
                if(salexhr.status == 200){
                    let data = salexhr.response;
                    sale.innerHTML = data;
                }
            }
        }
        salexhr.send(params)
    
        let orderxhr = new XMLHttpRequest();
        orderxhr.open("POST", "../includes/inputSearches/dayInputOrders.php",true)
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
        itemxhr.open("POST", "../includes/inputSearches/dayInputItems.php",true)
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