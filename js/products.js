let cartProducts = [];
let totalPrice = document.querySelector(".total");
let cartBody = document.querySelector(".cartBody");
let makeOrder = document.querySelector(".makeOrder");
let sumofCartItems = 0;

const productsList = document.querySelectorAll(".product");

const totalSumPrice = ()=>{
    let pricesum = 0;
    cartProducts.forEach(product =>{
        pricesum += product.price;
        
    })
    sumofCartItems = pricesum.toFixed(2);
    return pricesum.toFixed(2);
}

function updateProducts(){

    if(cartProducts.length > 0){
        let result = cartProducts.map(product=>{
            return`
                <li>
                <i class="fas fa-times closes"></i>
                <div class="cpimage">
                <img src="../assets/${product.image}" alt="">
                </div>

                <div class="cpdetails">
                    <h3>${product.name}</h3>
                    <p>Gh¢ ${product.basePrice.toFixed(2)}</p>
                </div>

                <div class="cptotal">
                    <div class="cpstock">
                        <div class="remove">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <div class="subed" ><i class="fas fa-minus sub" data-id="${product.id}"></i></div>

                        <div class="nstock">${product.count}</div>

                        <div class="added"><i class="fas fa-plus add" data-id="${product.id}"></i></div>
                    </div>
                    <div class="itemPrice">
                        <h4>Gh¢ ${product.price.toFixed(2)}</h4>
                    </div>
                    
                </div>
                
            </li>
            `;
        })
        cartBody.innerHTML = result.join('');
        totalPrice.textContent = `Total: Gh¢ `+totalSumPrice();
    }else{
        cartBody.innerHTML = "";
        totalPrice.textContent = "No products in cart.";
    }
}

function updateCart(product){
    for(let i = 0; i < cartProducts.length; i++){
        if(cartProducts[i].id == product.id){
            cartProducts[i].count += 1;
            if(cartProducts[i].count > cartProducts[i].stock){
                cartProducts[i].count = cartProducts[i].stock;
            }
            cartProducts[i].price = cartProducts[i].basePrice * cartProducts[i].count;
            totalPrice.textContent = `Total: Gh¢ `+totalSumPrice()
            return;
        }
    }

    cartProducts.push(product);
}

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
            price: productPrice,
            basePrice: productPrice,
            count: 1,
            stock: +productStock
            ,image: productImage
        }

        updateCart(productsToCart);
        updateProducts();
    })
})

cartBody.addEventListener("click",(e)=>{
    const add = e.target.classList.contains("add");
    const sub = e.target.classList.contains("sub");
    const remove = e.target.classList.contains("remove");
    const closes = e.target.classList.contains("closes");

    if(add || sub || closes){
        for(let i=0; i < cartProducts.length; i++){
            if(cartProducts[i].id == e.target.dataset.id){
                if(add){
                    cartProducts[i].count += 1;
                    if(cartProducts[i].count > cartProducts[i].stock){
                        cartProducts[i].count = cartProducts[i].stock;
                    }
                }else if(sub){
                    cartProducts[i].count -= 1;
                }
                cartProducts[i].price = cartProducts[i].basePrice * cartProducts[i].count;
            }

            if(cartProducts[i].count <= 0){
                cartProducts.splice(i, 1);
            }else if(closes){
                cartProducts.splice(i, 1);
            }
            updateProducts();
        }
    }
})

makeOrder.addEventListener("click", ()=>{
    let user = document.querySelector(".user").value;
    let productsincart = JSON.stringify(cartProducts);
    let params = "user="+user+"&totalPrice="+sumofCartItems+"&cart="+productsincart;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/buyProduct.php");
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
            }
        }
    }
    xhr.send(params)

    alert("Order made successfully")

    cartProducts = [];
    updateProducts();
})