let cancelbtn = document.querySelector(".cancelbtn");
let deleteAccount = document.querySelector(".deleteAccount");
let deleteUser = document.querySelector(".deleteUser");

deleteAccount.addEventListener("click", ()=>{
    deleteAccount.classList.toggle("active");

    if(deleteAccount.classList.contains("active")){
        deleteUser.style.display = "flex";
    }
})

cancelbtn.addEventListener("click", ()=>{
    deleteAccount.classList.toggle("active");

    if(!deleteAccount.classList.contains("active")){
        deleteUser.style.display = "none";
    }
})

let userid = document.querySelector(".userid");
let userdetails = document.querySelector(".userdetails");



userid.addEventListener("click", ()=>{
    userid.classList.toggle("active");

    if(userid.classList.contains("active")){
        userdetails.style.display = "flex";
    }else{
        userdetails.style.display = "none";
    }
    
})