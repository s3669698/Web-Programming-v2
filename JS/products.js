var addtocartbutton = document.getElementsByClassName('addcart')
for (var i=0; i < addtocartbutton.length; i++) {
    var button = addtocartbutton[i]
    button.addEventListener('click', addtocartclicked)
}
function addtocartclicked(ev) {
    var button = ev.target
    var shopitem =button.parentElement.parentElement
    var title = shopitem.getElementsByClassName('productname')[0].innerText
    var price = shopitem.getElementsByClassName('productprice')[0].innerText
    var image = shopitem.getElementsByClassName('picture')[0].src
    console.log(title, price, image)
    addtocartclicked(title, price, image)
}

function additemtocart(title, price, image) {
    var cartrow = document.createElement('div')
    cartrow.innerText =title
    var cartitems =document.getElementsByClassName('cartitem')[0]
    cartitems.append(cartrow)
}


var addToCartButtons = document.getElementsByClassName('addcart')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addtocartclicked)
    }

    function addtocartclicked(event) {
        var button = event.target
        var shopItem = button.parentElement.parentElement
        var title = shopItem.getElementsByClassName('productname')[0].innerText
        var price = shopItem.getElementsByClassName('productprice')[0].innerText
        var image = shopItem.getElementsByClassName('picture')[0].src
        additemtocart(title, price, image)
        updatetotal()
    }
    function additemtocart(title, price, imageSrc) {
        var cartRow = document.createElement('div')
        cartRow.classList.add('cartrow')
        var cartItems = document.getElementsByClassName('info')[0]
        var cartItemNames = cartItems.getElementsByClassName('productname')
        for (var i = 0; i < cartItemNames.length; i++) {
            if (cartItemNames[i].innerText == title) {
                alert('This item is already added to the cart')
                return
            }
        }
        var cartRowContents = `
        <div class="cartitem cartcolumn">
        <img class="cartitemimage" src="media/shoes1.jpg" width="150" height="150">
        <span class="cartitemtitle">Shoes1</span>
        </div>
        <span class="cartprice cartcolumn">$1.67</span>
        <div class="cartquantity cartcolumn">
        <input class="quantityinput" type="number" value="1">
        <button class="removeitem" type="button">REMOVE</button>
        </div>`
        cartRow.innerHTML = cartRowContents
        cartItems.append(cartRow)
        cartRow.getElementsByClassName('remove')[0].addEventListener('click', removeitem)
        cartRow.getElementsByClassName('quantityinput')[0].addEventListener('change', quantitynumber)
    }



    var remove = document.getElementsByClassName('removeitem')
for (var i =0;i < remove.length; i++) {
    var button =remove[i]
    button.addEventListener('click', removecartitem)
}

var quantity = document.getElementsByClassName('quantityinput')
for (var i =0;i < quantity.length; i++) {
    var input = quantity[i]
    input.addEventListener('change', quantitynumber)
}

function quantitynumber(ev) {
    var input = ev.target
    if (isNaN(input.value) || input.value <=0) {
        input.value = 1
    }
    updatetotal()
}

function removecartitem(ev) {
    var buttonclicked = ev.target
    buttonclicked.parentElement.parentElement.remove()
    updatetotal()
}

function updatetotal() {
    var cartItem = document.getElementsByClassName('cartitems')[0]
    var cartRows = cartItem.getElementsByClassName('cartrow')
    var total = 0
    for (var i =0;i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cartprice')[0]
        var quantityElement = cartRow.getElementsByClassName('quantityinput')[0]
        var price = parseFloat(priceElement.innerText.replace('$',''))
        var quantity = quantityElement.value
        total =total + (price * quantity)
    }
    total = Math.round(total *100)/100
    document.getElementsByClassName('carttotalprice')[0].innerText = '$' + total
}

function coupon() {
    var  discount =document.getElementsByClassName('char')
    if (discount='COSC2430-HD') {
        alert('20% discount')
    eli

    }else
    alert('Invalid Coupon')
}

var slideIndex = 1;
showslide(slideIndex);

function slidepic(n) {
  showslide(slideIndex += n);
}

function showslide(n) {
  var i;
  var x = document.getElementsByClassName("slides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
