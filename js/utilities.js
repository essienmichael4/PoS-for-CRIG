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

function handleReturned(id){
    let oid = id;
    let user = document.querySelector(".user").value;

    let params = "oid="+oid+"&user="+user;

    let returnxhr = new XMLHttpRequest();
    returnxhr.open("POST", "../includes/returned.inc.php");
    returnxhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    returnxhr.onload = () =>{
        if(returnxhr.readyState == XMLHttpRequest.DONE){
            if(returnxhr.status == 200){
                location.href = "mainbody.php?pgname=dashboard";
            }
        }
    }
    returnxhr.send(params)
}

function handleSold(id){
    let oid = id;
    let user = document.querySelector(".user").value;

    let params = "oid="+oid+"&user="+user;

    let returnxhr = new XMLHttpRequest();
    returnxhr.open("POST", "../includes/sold.inc.php");
    returnxhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    returnxhr.onload = () =>{
        if(returnxhr.readyState == XMLHttpRequest.DONE){
            if(returnxhr.status == 200){
                location.href = "mainbody.php?pgname=dashboard";
            }
        }
    }
    returnxhr.send(params)

    
}
