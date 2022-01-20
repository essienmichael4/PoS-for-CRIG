let cartProducts = [];
let totalPrice = document.querySelector(".total");
let cartBody = document.querySelector(".cartBody");

const productsList = document.querySelectorAll(".product");

const totalSumPrice = ()=>{
    let pricesum = 0;
    cartProducts.forEach(product =>{
        pricesum += product.price;
    })
    // alert(typeof(pricesum));
    return pricesum;
}

function updateProducts(){

    if(cartProducts.length > 0){
        let result = cartProducts.map(product=>{
            // alert(product.basePrice)
            return`
                <li>
                <i class="fas fa-times closes"></i>
                <div class="cpimage">
                <img src="${product.image}" alt="">
                </div>

                <div class="cpdetails">
                    <h3>${product.name}</h3>
                    <p>Gh¢ ${product.basePrice}</p>
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
                        <h4>Gh¢ ${product.price}</h4>
                    </div>
                    
                </div>
                
            </li>
            `;
        })
        cartBody.innerHTML = result.join('');
        totalPrice.textContent = totalSumPrice();
        // console.log(result);
    }else{
        cartBody.innerHTML = "";
        totalPrice.textContent = "No products in cart.";
    }
}

function updateCart(product){
    for(let i = 0; i < cartProducts.length; i++){
        if(cartProducts[i].id == product.id){
            // cartProducts[i].count += 1;
            // cartProducts[i].price = cartProducts[i].baseprice * cartProducts[i].count;

            // alert(cartProducts[i].price)
            // totalPrice.textContent = totalSumPrice()
            return;
        }
    }

    cartProducts.push(product);

    
    // console.log(cartProducts);
}

productsList.forEach(product => {
    product.addEventListener("click", (e)=>{
        const productId = product.querySelector(".productId").value;
        const productName = product.querySelector(".productName").textContent;
        const productPrice = product.querySelector(".priceValue").textContent;
        const productStock = product.querySelector(".productStock").textContent;
        const productImage = product.querySelector(".productImage").value;

        // alert(productPrice);
        
        let productsToCart = {
            id: productId,
            name: productName,
            price: +productPrice,
            basePrice: +productPrice,
            count: 1,
            stock: +productStock
            ,image: productImage
        }

        // alert(productsToCart.basePrice)

        updateCart(productsToCart);
        updateProducts();

        // alert(productStock)
    })
})

cartBody.addEventListener("click",(e)=>{
    const add = e.target.classList.contains("add");
    const sub = e.target.classList.contains("sub");
    const remove = e.target.classList.contains("remove");
    const closes = e.target.classList.contains("closes");
    

    // alert(e.target.classList);
    // alert(sub);

    if(add || sub || closes){
        for(let i=0; i < cartProducts.length; i++){
            if(cartProducts[i].id == e.target.dataset.id){
                if(add){
                    // alert(add);
                    cartProducts[i].count += 1;

                    // alert(cartProducts[i].count);
                }else if(sub){
                    cartProducts[i].count -= 1;
                    // if (cartProducts[i].count < 2){
                    //     // sub.styl.display = "none";
                    // }
                    // alert(sub);
                }
                cartProducts[i].price = cartProducts[i].basePrice * cartProducts[i].count;
                // alert(cartProducts[i].price)
            }

            if(cartProducts[i].count <= 0){
                cartProducts.splice(i, 1);
            }else if(closes){
                cartProducts.splice(i, 1);
                console.log(cartProducts);
            }
            updateProducts();
        }
        // updateProducts();
    }
    // alert(e.target.classList);
})