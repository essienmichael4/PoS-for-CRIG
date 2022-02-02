let fulldate = document.querySelector(".fulldate");
let fullmonth = document.querySelector(".fullmonth");
// let fullyear = document.querySelector(".fullyear");
let toDay = document.querySelector(".toDay");
let toMonth = document.querySelector(".toMonth");
// let toYear = document.querySelector(".toYear");

toDay.addEventListener("click", ()=>{
    
    if(fullmonth.classList.contains("active")){
        fullmonth.classList.toggle("active")
        toMonth.classList.toggle("active");
    }
    
    // if(fullyear.classList.contains("active")){
    //     fullyear.classList.toggle("active")
    //     toYear.classList.toggle("active");
    // }
    if(fulldate.classList.contains("active")){
        if(toDay.classList.contains("active")){
            return;
        }else{
            toDay.classList.toggle("active");
            return;
        }
    }
    fulldate.classList.toggle("active");
    toDay.classList.toggle("active");
})

toMonth.addEventListener("click", ()=>{
    // if(fullyear.classList.contains("active")){
    //     fullyear.classList.toggle("active")
    //     toYear.classList.toggle("active");
    // }
    if(fulldate.classList.contains("active")){
        fulldate.classList.toggle("active")
        toDay.classList.toggle("active");
    }
    if(fullmonth.classList.contains("active")){
        if(toMonth.classList.contains("active")){
            return;
        }else{
            toMonth.classList.toggle("active");
            return;
        }
    }
    fullmonth.classList.toggle("active")
    toMonth.classList.toggle("active");
})

// toYear.addEventListener("click", ()=>{
//     if(fullmonth.classList.contains("active")){
//         fullmonth.classList.toggle("active")
//         toMonth.classList.toggle("active");
//     }
//     if(fulldate.classList.contains("active")){
//         fulldate.classList.toggle("active")
//         toDay.classList.toggle("active");
//     }
//     if(fullyear.classList.contains("active")){
//         if(toYear.classList.contains("active")){
//             return;
//         }else{
//             toYear.classList.toggle("active");
//             return;
//         }
//     }
//     fullyear.classList.toggle("active")
//     toYear.classList.toggle("active");
    
// })