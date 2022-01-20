let btnlogin = document.querySelector(".loginbtn");
let errortxt = document.querySelector(".error");
let form = document.getElementsByTagName(".login-form");

form.onsubmit = e=>{
    e.preventDefault();
}

btnlogin.addEventListener("click", (e)=>{

    let xhr =  new XMLHttpRequest();

    xhr.open("POST", "includes/login.php", true)

    xhr.onload = () => {
        alert("working");

        // if(xhr.readyState === XMLHttpRequest.DONE){
            
            if(xhr.status === 200){
                alert("done");
                let data = xhr.response();
                console.log(data);
                
                // location.href = "./src/products.php";
            }
    }

    let formData = new FormData(form);

    xhr.send(formData);
})