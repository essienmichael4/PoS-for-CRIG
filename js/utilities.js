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

let fulldate = document.querySelector(".fulldate");
let fullmonth = document.querySelector(".fullmonth");
let fullyear = document.querySelector(".fullyear");
let toDay = document.querySelector(".toDay");
let toMonth = document.querySelector(".toMonth");
let toYear = document.querySelector(".toYear");



toDay.addEventListener("click", ()=>{
    if(fullmonth.classList.contains("active")){
        fullmonth.classList.toggle("active")
    }
    if(fullyear.classList.contains("active")){
        fullyear.classList.toggle("active")
    }
    if(fulldate.classList.contains("active")){
        return;
    }
    fulldate.classList.toggle("active")
})

toMonth.addEventListener("click", ()=>{
    if(fullyear.classList.contains("active")){
        fullyear.classList.toggle("active")
    }
    if(fulldate.classList.contains("active")){
        fulldate.classList.toggle("active")
    }
    if(fullmonth.classList.contains("active")){
        return;
    }
    fullmonth.classList.toggle("active")
})

toYear.addEventListener("click", ()=>{
    if(fullmonth.classList.contains("active")){
        fullmonth.classList.toggle("active")
    }
    if(fulldate.classList.contains("active")){
        fulldate.classList.toggle("active")
    }
    if(fullyear.classList.contains("active")){
        return; 
    }
    fullyear.classList.toggle("active")
    
})
