let changeUserInfo = document.querySelector(".changeUserInfo");
let changePassword = document.querySelector(".changePassword");
let changePassword1 = document.querySelector(".changePassword1");
let err = document.querySelector(".err");

changeUserInfo.addEventListener("click", ()=>{
    let firstnameInput = document.querySelector(".firstname");
    let lastnameInput = document.querySelector(".lastname");
    let emailInput = document.querySelector(".email");
    let usernameInput = document.querySelector(".username");
    let userstype = document.querySelector(".usertype").textContent;
    let userid = document.querySelector(".uid").value;
    let usertypeInput = document.querySelector("#usertype");

    let firstname = firstnameInput.value;
    let lastname = lastnameInput.value;
    let email = emailInput.value;
    let username = usernameInput.value;
    let usertype = usertypeInput.value;

    if(usertype == "None"){
        usertype = userstype;
    }else if(usertype == userstype){
        usertype = userstype;
    }

    let params = "firstname="+firstname+"&lastname="+lastname+"&username="+username+"&email="+email+"&usertype="+usertype+"&id="+userid;


    // alert(userid)
    // console.log(params)
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/editUser.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                if(xhr.response == "Updated"){
                    err.classList.toggle("active");
                    err.textContent =  "User Update Successful";
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

changePassword.addEventListener("click", ()=>{
    let oldPasswordInput = document.querySelector(".oldPassword");
    let newPasswordInput = document.querySelector(".newPassword");
    let newPasswordRepInput = document.querySelector(".newPasswordRep");
    let userid = document.querySelector(".uid").value;

    let oldPassword = oldPasswordInput.value;
    let newPassword = newPasswordInput.value;
    let newPasswordRep = newPasswordRepInput.value;

    if(oldPassword == "" ||newPassword == ""||newPasswordRep == ""){
        oldPasswordInput.value = "";
        newPasswordInput.value = "";
        newPasswordRepInput.value = "";
        if(err.classList.contains("active")){
            err.classList.toggle("active");
        }
        err.textContent= "All Input Fields Are Required";
        err.style.visibility = "visible";
        return;
    }

    if(newPassword !== newPasswordRep){
        newPasswordInput.value = "";
        newPasswordRepInput.value = "";
        if(err.classList.contains("active")){
            err.classList.toggle("active");
        }
        err.textContent= "Passwords do not Match";
        err.style.visibility = "visible";
        return;
    }

    if(oldPassword == newPassword){
        oldPasswordInput.value = "";
        newPasswordInput.value = "";
        newPasswordRepInput.value = "";
        if(err.classList.contains("active")){
            err.classList.toggle("active");
        }
        err.textContent= "Old And New Passwords Must Not Match";
        err.style.visibility = "visible";
        return;
    }

    let params = "oldPassword="+oldPassword+"&newPassword="+newPassword+"&id="+userid;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/changePassword.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                if(xhr.response == "Updated"){
                    oldPasswordInput.value = "";
                    newPasswordInput.value = "";
                    newPasswordRepInput.value = "";

                    err.classList.toggle("active");
                    err.textContent =  "Password Change Successful";
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

changePassword1.addEventListener("click", ()=>{
    let newPasswordInput = document.querySelector(".newPassword");
    let newPasswordRepInput = document.querySelector(".newPasswordRep");
    let userid = document.querySelector(".uid").value;

    let newPassword = newPasswordInput.value;
    let newPasswordRep = newPasswordRepInput.value;

    if(newPassword == ""||newPasswordRep == ""){
        newPasswordInput.value = "";
        newPasswordRepInput.value = "";
        if(err.classList.contains("active")){
            err.classList.toggle("active");
        }
        err.textContent= "All Input Fields Are Required";
        err.style.visibility = "visible";
        return;
    }

    if(newPassword !== newPasswordRep){
        newPasswordInput.value = "";
        newPasswordRepInput.value = "";
        if(err.classList.contains("active")){
            err.classList.toggle("active");
        }
        err.textContent= "Passwords do not Match";
        err.style.visibility = "visible";
        return;
    }

    let params = "&newPassword="+newPassword+"&id="+userid;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/changePasswordofDiffUser.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                if(xhr.response == "Updated"){
                    newPasswordInput.value = "";
                    newPasswordRepInput.value = "";

                    err.classList.toggle("active");
                    err.textContent =  "Password Change Successful";
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