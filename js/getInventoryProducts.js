let productList = document.querySelector(".productsList");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/selectInventoryProducts.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                productList.innerHTML += data;
                let addProduct = document.querySelector(".add-new-product");
                addProduct.addEventListener("click", ()=>{
                    let inventory = document.querySelector(".inventory");
                    let newProduct = document.querySelector(".add-inventory");
                    let inventoryItems = document.querySelector(".inventory-items");
                    let productsList = document.querySelector(".productsList");
            
                    inventory.classList.toggle("active");
                    newProduct.style.display = "block";
                    productsList.style.gridTemplateColumns = "1fr 1fr 1fr";
                    inventoryItems.style.width = 70+"%";
                })
            }
        }
    }
    xhr.send()


    // let addProduct = document.querySelector(".add-new-product");

    // addProduct.addEventListener("click", ()=>{
    //     let inventory = document.querySelector(".inventory");
    //     let newProduct = document.querySelector(".add-inventory");
    //     let inventoryItems = document.querySelector(".inventory-items");
    //     let productsList = document.querySelector(".productsList");

    //     inventory.classList.toggle("active");
    //     newProduct.style.display = "block";
    //     productsList.style.gridTemplateColumns = "1fr 1fr 1fr";
    //     inventoryItems.style.width = 70+"%";
    // })
