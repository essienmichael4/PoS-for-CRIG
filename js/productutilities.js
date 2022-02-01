let products = document.querySelector(".products");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/selectProducts.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                products.innerHTML = data;
            }
        }

        const productsList = document.querySelectorAll(".product");

        productsList.forEach(product => {
            product.addEventListener("click", (e)=>{
                const productId = product.querySelector(".productId").value;
                const productName = product.querySelector(".productName").textContent;
                const productPrice = product.querySelector(".priceValue").textContent;
                const productStock = product.querySelector(".productStock").textContent;
                const productImage = product.querySelector(".productImage").value;
                
                let productsToCart = {
                    id: productId,
                    name: productName,
                    price: +productPrice,
                    basePrice: +productPrice,
                    count: 1,
                    stock: +productStock
                    ,image: productImage
                }
        
                updateCart(productsToCart);
                updateProducts();
            })
        })
    }
    xhr.send()
},5000)