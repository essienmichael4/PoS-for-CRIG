let userBtn = document.querySelector(".addUserBtn");
let addUser = document.querySelector(".addUser");
let cancel = document.querySelector(".cancel");
let remove = document.querySelector(".remove");
let addusersumbit = document.querySelector(".addusersumbit");
let err = document.querySelector(".err");

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
    if(err.style.visibility == "visible"){
        err.style.visibility == "hidden";
    }

    if(userBtn.classList.contains('active')){
        addUser.style.display = "flex";
    }else{
        addUser.style.display = "none";
    }
})

remove.addEventListener("click", ()=>{
    userBtn.classList.toggle("active");
    if(err.style.visibility == "visible"){
        err.style.visibility == "hidden";
    }

    if(userBtn.classList.contains('active')){
        addUser.style.display = "flex";
    }else{
        addUser.style.display = "none";
    }
})

addusersumbit.addEventListener("click", ()=>{
    
    let firstnameInput = document.querySelector(".firstname");
    let lastnameInput = document.querySelector(".lastname");
    let emailInput = document.querySelector(".email");
    let usernameInput = document.querySelector(".username");
    let usertypeInput = document.querySelector("#usertype");
    let passwordInput = document.querySelector(".password");
    let passwordRepInput = document.querySelector(".passwordRep");

    let firstname = firstnameInput.value;
    let lastname = lastnameInput.value;
    let email = emailInput.value;
    let username = usernameInput.value;
    let usertype = usertypeInput.value;
    let password = passwordInput.value;
    let passwordRep = passwordRepInput.value;

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
                if(xhr.response == "Successful"){
                    firstnameInput.value = "";
                    lastnameInput.value = "";
                    emailInput.value = "";
                    usernameInput.value = "";
                    usertypeInput.value = "";
                    passwordInput.value = "";
                    passwordRepInput.value = "";

                    err.classList.toggle("active");
                    err.textContent =  "User Added Successfully";
                    err.style.visibility = "visible";
                }else{
                    err.textContent =  xhr.response;
                    err.style.visibility = "visible";
                }
                
            }
        }
    }
    xhr.send(params)
})

