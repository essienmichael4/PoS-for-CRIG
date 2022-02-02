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
