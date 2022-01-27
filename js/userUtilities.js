let userBtn = document.querySelector(".addUserBtn");
let addUser = document.querySelector(".addUser");
let cancel = document.querySelector(".cancel");
let remove = document.querySelector(".remove");
let addusersumbit = document.querySelector(".addusersumbit");

userBtn.addEventListener("click", ()=>{
    userBtn.classList.toggle("active");

    if(userBtn.classList.contains('active')){
        addUser.style.display = "flex";
    }else{
        addUser.style.display = "none";
    }
})

cancel.addEventListener("click", ()=>{
    userBtn.classList.toggle("active");

    if(userBtn.classList.contains('active')){
        addUser.style.display = "flex";
    }else{
        addUser.style.display = "none";
    }
})

remove.addEventListener("click", ()=>{
    userBtn.classList.toggle("active");

    if(userBtn.classList.contains('active')){
        addUser.style.display = "flex";
    }else{
        addUser.style.display = "none";
    }
})

addusersumbit.addEventListener("click", ()=>{
    let err = document.querySelector(".err");
    let firstname = document.querySelector(".firstname").value;
    let lastname = document.querySelector(".lastname").value;
    let email = document.querySelector(".email").value;
    let username = document.querySelector(".username").value;
    let usertype = document.querySelector("#usertype").value;
    let password = document.querySelector(".password").value;
    let passwordRep = document.querySelector(".passwordRep").value;

    if(firstname == "" ||lastname == ""||email == ""||username == ""||
    password == ""||passwordRep == ""){
        err.textContent= "All Input Fields Are Required";
        err.style.visibility = "visible";
        return;
    }

    if(password !== passwordRep){
        err.textContent= "Passwords do not Match";
        err.style.visibility = "visible";
        return;
    }

    let params = "firstname="+firstname+"&lastname="+lastname+"&username="+username+"&email="+email+"&usertype="+usertype+"&password="+password;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/addNewUser.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                
            }
        }
    }
    xhr.send(params)
})

