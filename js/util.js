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


let closeProduct = document.querySelector(".closeProduct");

closeProduct.addEventListener("click", ()=>{
    // let inventory = document.querySelector(".inventory");
    let newProduct = document.querySelector(".add-inventory");
    let inventoryItems = document.querySelector(".inventory-items");
    let productsList = document.querySelector(".productsList");

    // inventory.classList.toggle("active");
    newProduct.style.display = "none";
    productsList.style.gridTemplateColumns = "1fr 1fr 1fr 1fr";
    inventoryItems.style.width = 100+"%";


})