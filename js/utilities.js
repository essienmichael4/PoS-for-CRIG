let menu = document.querySelector(".menuicon");
let menubar = document.querySelector(".menu");
let mainContainer = document.querySelector(".mainArea");
let sales = document.querySelector(".numberSales");
let products = document.querySelector(".products");
let buyP = document.querySelector("h1 span");


menu.addEventListener("click", ()=>{
    menubar.classList.toggle("active");
    buyP.classList.toggle("active");
    mainContainer.classList.toggle("active");
    products.classList.toggle("active");
    sales.classList.toggle("active");
})

let activeLink = document.querySelectorAll(".linkItem");

activeLink.forEach(link =>{
    link.addEventListener("click", ()=>{
        let links = document.querySelector("a.active")

        if(links && links !== link){
            links.classList.toggle("active");
            link.classList.toggle("active");
        }
    })
})