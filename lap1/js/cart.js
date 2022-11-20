/* File: template.html
    @IT student: 
    Nguyen Van Vu, vub1906615@student.ctu.edu.vn 
    Tran Thi Kim Ngan, nganb1910109@student.ctu.edu.vn
    Bui Chi Hai, haib1906314@student.ctu.edu.vn
    @Created: 18/12/2021*/

    /*
        mã nguồn được tham khảo từ bài tập shoppingcart.html của thầy Vũ Duy Linh
    */ 

function isExistedInCart(item, arrCart){
    let myIndex = -1;
    arrCart.forEach((itemCard, index) => {
        if(item.id == itemCard.id) myIndex = index;
        });
    return myIndex;
}

function loadShopingCart(){//thêm
    
    // adding product items to localstorage
    let updatedCart = []; // chứa các mặt hàng hiện có của giỏ hàng
    const selectedItems = (evt) => {
        
        const linkClicked = evt.target;

       
        alert("Đã thêm sản phẩm " +linkClicked.parentElement.parentElement.previousElementSibling.children[0].textContent+" vào giỏ hàng");
        if(typeof Storage !== undefined){
            let newItem = {
                id: linkClicked.parentElement.parentElement.previousElementSibling.children[1].textContent,
                name: linkClicked.parentElement.parentElement.previousElementSibling.children[0].textContent,
                urlimg: linkClicked.parentElement.parentElement.parentElement.previousElementSibling.attributes[0].textContent,
                type: linkClicked.parentElement.parentElement.previousElementSibling.children[2].children[0].textContent,
                price: linkClicked.parentElement.previousElementSibling.textContent,
                quantity: 1
            };
            /* Kiểm tra xem giỏ hàng, cartItems, đã có tồn tại trong localStorage chưa,
            chưa thi tạo mới nó. */
            if(JSON.parse(localStorage.getItem('cartItems')) === null){
                updatedCart.push(newItem);
                localStorage.setItem('cartItems',JSON.stringify(updatedCart));
                window.location.reload();
            }else{//localStorage đã tồn tại
                // convert text into a JavaScript object
                
                const updatedCart = JSON.parse(localStorage.getItem('cartItems'));
                //Array.isArray(updatedCart) -> true
                /*Trhl: Nếu newItem.id đã tồn tại trong giỏ thì cập nhật số lượng của nó */
                if ((index = isExistedInCart(newItem, updatedCart))>=0) {
                    updatedCart[index].quantity++;
                } else{ /*Trh2: Nếu newItem chưa có mặt trong giỏ hàng => thêm mới vào giỏ*/
                    updatedCart.push(newItem);
                }
            localStorage.setItem('cartItems', JSON.stringify(updatedCart));
            window.location.reload();
            } 
        }else{
                alert('Local storage is not working on your browser');  
            }   
    }

    const attachingEvent = evt => evt.addEventListener('click', selectedItems);
    const add2CartLinks = document.getElementsByClassName('add__item');
    let arrCartLinks=Array.from(add2CartLinks); //Array.isArray(arrCartLinks) -> true
    arrCartLinks.forEach(attachingEvent);

    /* --- Array.prototype.forEach.call(add2CartLinks, attachingEvent); ---*/

    const shoppingCard = document.querySelector('.shopping-card');
    shoppingCard.addEventListener("click", function() {
        location.href = "giohang.html";
    });
    // adding product items to shopping cart
    if(localStorage.cartItems != undefined) {
        const numberOrderedItems = document.querySelector('.shopping-card .no-ordered-items');
        let numberOfItems = 0;
        let custommerCart = JSON.parse(localStorage.getItem('cartItems'));
        custommerCart.forEach(item => {
            numberOfItems += 1; //đem số sản phẩm trong giỏ
        });
            numberOrderedItems.innerHTML = numberOfItems;
        }
}

function showCart(){ //load
    if(localStorage.cartItems == undefined) {
        alert("Giỏ hàng của bạn trống. hay chọn sản phẩm ở trang chủ !.");
        location.href = "trangchu.html";
    }else{
        let custommerCart = JSON.parse(localStorage.getItem('cartItems'));
        const tblHead = document.getElementsByTagName('thead')[0];
        const tblBody = document.getElementsByTagName('tbody')[0];
        const tblHFoot = document.getElementsByTagName('tfoot')[0];
        let headColumns = bodyRows = footColumns = '';
        headColumns += '<tr><th>STT</th><th>ID</th><th>Ảnh</th><th>Tên sản phẩm</th><th>Loại</th> <th>Số lượng</th><th>giá</th><th>chỉnh sửa</th></tr>';
        tblHead.innerHTML = headColumns;

        vat = total = amountPaid = 0;
        no = 0; /* ordinalNumber = 0; */
        if(custommerCart[0] == null){
        bodyRows += '<tr><td >Giỏ hàng trống !</td></tr>'
        }else{
            custommerCart.forEach(item => {
                total += Number(item.quantity) * Number(item.price.replace(/[^0-9]/g,""));
                bodyRows += '<tr><td>'+ ++no +'</td><td>' + item.id+ '</td><td> <img src="'+item.urlimg+'" width="100px alt="' + item.name+ '"> </td><td>' + item.name+ '</td><td>' +item.type + '</td><td>' +
                '<input type="number" class="changevalue" max="1000" min="0" value="'+ Number(item.quantity) + '" >/Kg</td><td>' + formatCurrency(
                item.price.replace(/[^0-9]/g, "")) + '</td><td><a href="#"onclick=deleteCart(this);>Xóa</a></td></tr> ';
        });
    }
    
   tblBody.innerHTML = bodyRows;
   footColumns += '<tr><td colspan="4">Tổng giá trị:</td> <td>' + formatCurrency(total)+'</td></tr>';
   footColumns += '<tr><td colspan="4">VAT (5%):</td> <td>' + formatCurrency(Math.floor(total*0.05))+'</td></tr>';
   footColumns += '<tr><td colspan="4">Tống giá trị thanh toán:</td> <td>' + formatCurrency(Math.floor(1.1*total))+'</td></tr>';
    tblHFoot.innerHTML = footColumns;

    }
}

function deleteCart(evt){ //xóa
    let updatedCart = [];
    let custommerCart = JSON.parse(localStorage.getItem('cartItems'));
    custommerCart.forEach(item => {
        if(item.id != evt.parentElement.parentElement.children[1].textContent){
            updatedCart.push(item);
        }
    });
    localStorage.setItem('cartItems', JSON.stringify(updatedCart));
    window.location.reload();
};


    /*--Currency & Percentage format-*/
const formatPercentage = (value, locale = "en-US") => {
    return new Intl. NumberFormat(locale, {style: 'percent',minimumFractionDigits: 0, maximumFractionDigits: 1}).format(value);
};
const formatCurrency = (amount, locale = "vi-VN") => {
    return new Intl. NumberFormat(locale, {style: 'currency',currency: 'VND',minimumFractionDigits: 0,maximumFractionDigits: 2}).format(amount);
};


///---------------------------
function updateValue(){//cập nhật số lượng
    
    let updatedCart = []; // chứa các sp đang có 
    const updateQuantity = (evt) => {
        
        const change = evt.target;
        let newItem = {
            id: change.parentElement.parentElement.children[1].textContent,
            name : change.parentElement.parentElement.children[3].textContent ,
            quantity: Number(change.value),
        };

        if(newItem.quantity>0){
            const updatedCart = JSON.parse(localStorage.getItem('cartItems'));//lấy giỏ hàng
            // Nếu sp đã tồn tại trong giỏ thì cập nhật số lượng 
            if ((index = isExistedInCart(newItem, updatedCart))>=0) {
                updatedCart[index].quantity = newItem.quantity;
            } 
            localStorage.setItem('cartItems', JSON.stringify(updatedCart));
        } else if (newItem.quantity==0 ) { //nếu số lượng = 0 thì hỏi người dùng có muốn xóa sp hay không
            if(confirm('bạn có muốn xóa sản phẩm  '+newItem.name+' ra khỏi giỏ hàng ?')){
                deleteCart(change);
            }
        }
        window.location.reload();
         
    }

    const attachingEvent = evt => evt.addEventListener('change', updateQuantity);
    const add2CartLinks = document.getElementsByClassName('changevalue');
    let arrCartLinks=Array.from(add2CartLinks);
    arrCartLinks.forEach(attachingEvent);

    
}


//đặt hàng
document.getElementsByClassName('order')[0].addEventListener('click', e => {
    if((JSON.parse(localStorage.getItem('cartItems'))[0])!=null){ //kiểm tra có sp trong giỏ hàng không
        alert('đặt hàng thành công !');
    }else{
        alert('đặt hàng không công !');
    }
    
});

