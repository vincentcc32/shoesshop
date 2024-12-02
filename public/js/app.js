function goLogin() {
    alert('Please login to buy');
    window.location.href = "index.php?ctrl=user&view=login";
}


// ajax js
function getSize(size) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "index.php?ctrl=product&view=addcart&size=" + size, true);
    xmlhttp.send();

}

function getDetailProductByID(id) {
    return new Promise((resolve) => {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const tmp = JSON.parse(this.responseText);
                    resolve(tmp);
                }
            }
        };

        xmlhttp.open("GET", "index.php?ctrl=product&view=orders&invoice=" + id, true);
        xmlhttp.send();
    });
}

function getProductHistoryByID(id) {
    return new Promise((resolve) => {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const tmp = JSON.parse(this.responseText);
                    resolve(tmp);
                }
            }
        };

        xmlhttp.open("GET", "admin.php?ctrl=product&view=orderhistory&invoice=" + id, true);
        xmlhttp.send();
    });
}

function getSizeBuy(size) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "index.php?ctrl=product&view=buy&size=" + size, true);
    xmlhttp.send();

}

function filter(sort) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "index.php?ctrl=product&view=shoes&sort=" + sort, true);
    xmlhttp.send();

}

function cartDown(action, id) {

    var xmlhttp = new XMLHttpRequest();

    const cartQuantity = document.querySelector('.cart-quantity');
    if (this.readyState == 4 && this.status == 200) {
        cartQuantity.innerText = this.responseText;
    }

    xmlhttp.open("GET", "index.php?ctrl=product&view=cart&action=" + action + "&id=" + id, true);
    xmlhttp.send();

}

function comment(commet, productid) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(".commment__list").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "index.php?ctrl=product&view=comment&content=" + commet + "&sp=" + productid, true);
    xmlhttp.send();

}

function sendCode(code) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                window.location.href = "index.php?ctrl=user&view=profileuser";
            } else {
                let script = document.createElement('script');
                script.text = "alert(\"Wrong code!\");"
                document.body.appendChild(script);

            }


        }
    }
    xmlhttp.open("GET", "index.php?ctrl=user&view=useractive&code=" + code, true);
    xmlhttp.send();

}

function againSendCode() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "index.php?ctrl=user&view=useractive&action=again", true);
    xmlhttp.send();

}

function repass(code) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var formElement = document.querySelector(".code-form");
            var messElement = document.querySelector(".mess");
            if (this.responseText === 'Check code in email') {
                messElement.removeAttribute('hidden');
                messElement.innerHTML = this.responseText;
            } else {
                formElement.innerHTML = this.responseText;

            }
        }
    }
    xmlhttp.open("GET", "index.php?ctrl=user&view=codeforgotpassword&code=" + code, true);
    xmlhttp.send();
}

function userActive(sdt) {
    return new Promise((resolve) => {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    resolve(this.responseText);
                }
            }
        };

        xmlhttp.open("GET", "index.php?ctrl=user&view=useractive&sdt=" + sdt, true);
        xmlhttp.send();
    });
}

const sizeBtn = document.querySelectorAll(".btn-size");

sizeBtn.forEach((item) => {
    item.onclick = (() => {
        const data = item.getAttribute('data-size');
        getSize(data);
        getSizeBuy(data);
    });
})

function getProduct(productID) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "index.php?ctrl=product&view=favourite&index=" + productID, true);
    xmlhttp.send();

}

const productFavourite = document.querySelectorAll(".btn-favourite");

productFavourite.forEach((item) => {
    item.onclick = (() => {
        const data = item.getAttribute('data-productid');
        getProduct(data);
    });
})


const deleteUserBtn = document.querySelectorAll('.delete-user');


deleteUserBtn.forEach((item) => {
    item.onclick = ((e) => {
        const isDel = confirm("Are you sure delete user?");
        if (isDel) {
            window.location.href = "admin.php?ctrl=user&view=deleteuser&id=" + e.target.getAttribute('data-userid');
        }
    })
})

const deleteAdminBtn = document.querySelectorAll('.delete-admin');


deleteAdminBtn.forEach((item) => {
    item.onclick = ((e) => {
        const isDel = confirm("Are you sure delete Admin?");

        if (isDel) {

            window.location.href = "admin.php?ctrl=user&view=deleteadmin&id=" + e.target.getAttribute('data-userid');
        }
    })
})

const deleteProductBtn = document.querySelectorAll('.delete-product');


deleteProductBtn.forEach((item) => {
    item.onclick = ((e) => {
        const isDel = confirm("Are you sure delete product?");
        if (isDel) {
            window.location.href = "admin.php?ctrl=product&view=deleteproduct&id=" + e.target.getAttribute('data-productid');
        }
    })
})

const deleteCateBtn = document.querySelectorAll('.delete-category');


deleteCateBtn.forEach((item) => {
    item.onclick = ((e) => {
        const isDel = confirm("Are you sure delete category?");
        if (isDel) {
            window.location.href = "admin.php?ctrl=product&view=deletecategory&id=" + e.target.getAttribute('data-categoryid');
        }
    })
})

const deleteMadeinBtn = document.querySelectorAll('.delete-madein');

deleteMadeinBtn.forEach((item) => {
    item.onclick = ((e) => {
        const isDel = confirm("Are you sure delete madein?");
        if (isDel) {
            window.location.href = "admin.php?ctrl=product&view=deletemadein&id=" + e.target.getAttribute('data-madeinid');
        }
    })
})

// js

const url = (window.location.href.split('?'));

const view = url[1].split('&');

if (view[0] === 'ctrl=page' && view[1] === 'view=dashboard') {

    const btnUserYear = document.querySelector('.btn-user-year');
    const selectUserElement = document.querySelector('select[name="yearuser"]');

    const btnOrderYear = document.querySelector('.btn-order-year');
    const selectOrderElement = document.querySelector('select[name="yearorder"]');

    const btnmoneyYear = document.querySelector('.btn-money-year');
    const selectmoneyElement = document.querySelector('select[name="yearmoney"]');

    btnUserYear.onclick = () => {
        if (selectUserElement.value === '') {
            alert('Vui lòng chọn');
        } else {
            window.location.href = 'admin.php?ctrl=page&view=dashboard&useryear=' + selectUserElement.value;
        }
    }

    btnOrderYear.onclick = () => {
        if (selectOrderElement.value === '') {
            alert('Vui lòng chọn');
        } else {
            window.location.href = 'admin.php?ctrl=page&view=dashboard&orderyear=' + selectOrderElement.value;
        }
    }

    btnmoneyYear.onclick = () => {
        if (selectmoneyElement.value === '') {
            alert('Vui lòng chọn');
        } else {
            window.location.href = 'admin.php?ctrl=page&view=dashboard&moneyyear=' + selectmoneyElement.value;
        }
    }

}

if (view[0] === 'ctrl=user' && view[1] === 'view=profileadmin') {

    const changePasswordAdminBtn = document.querySelector('.change-password-admin');
    const inputPasswordAdmin = document.querySelector('.input-password-admin');

    inputPasswordAdmin.onchange = () => {
        const strLength = inputPasswordAdmin.value.length;
        if (strLength === 0) {
            changePasswordAdminBtn.style.display = 'none';
            document.querySelector('input[name = "newpassword"]').value = "";
            document.querySelector('input[name = "confnewpassword"]').value = "";

        }
        else {
            changePasswordAdminBtn.style.display = 'block';
        }


    };
}

if (view[0] === 'ctrl=user' && view[1] === 'view=profileuser') {

    const changePasswordUserBtn = document.querySelector('.change-password-user');
    const inputPasswordUser = document.querySelector('.input-password-user');
    const activeBtn = document.querySelector('.active-btn');
    activeBtn.onclick = () => {
        window.location.href = "index.php?ctrl=user&view=useractive";
    }

    inputPasswordUser.onchange = () => {

        const strLength = inputPasswordUser.value.length;
        if (strLength === 0) {
            changePasswordUserBtn.style.display = 'none';
            document.querySelector('input[name = "newpassword"]').value = "";
            document.querySelector('input[name = "confnewpassword"]').value = "";

        }
        else {
            changePasswordUserBtn.style.display = 'block';
        }


    };
}

if (view[0] === 'ctrl=user' && view[1] === 'view=useractive') {

    const sdtInput = document.querySelector('input[name="sdt"]');
    const sendCodeBtn = document.querySelector('.send-code-sdt');
    let activeBtn;
    sendCodeBtn.onclick = async () => {
        if (sdtInput.value.length === 10) {
            const form = await userActive(sdtInput.value);
            const formElement = document.querySelector(".profile-info");
            formElement.innerHTML = form;
            activeBtn = document.querySelector('.active-sdt');
            againCode = document.querySelector('.again-code');

            if (activeBtn) {
                activeBtn.addEventListener('click', () => {
                    const inputOtpElement = document.querySelector('.input-otp');

                    if (inputOtpElement.value.length === 4) {
                        sendCode(inputOtpElement.value);
                    } else {
                        alert("Please enter code!");
                    }
                });
            }
            if (againCode) {
                againCode.onclick = () => {
                    againSendCode();
                    alert("The code will be sent to your phone number!");
                }
            }

        } else {
            alert("Please enter phone number!");
        }
    }



}

if (view[0] === 'ctrl=product' && view[1] === 'view=shoes') {

    const btnShoesFilter = document.querySelector('.btn-shoes-filter');

    btnShoesFilter.onclick = () => {
        const sort = document.querySelector('.form-select.form-select-lg').value;

        if (sort === 'gradually-increase') {
            window.location.href = "index.php?ctrl=product&view=shoes&sort=" + sort;
        } else if (sort === 'gradually-decreasing') {
            window.location.href = "index.php?ctrl=product&view=shoes&sort=" + sort;
        }
        else {
            window.location.href = "index.php?ctrl=product&view=shoes";
        }

    }
}

if (view[0] === 'ctrl=product' && view[1] === 'view=fashion') {

    const btnFashionFilter = document.querySelector('.btn-fashion-filter');

    btnFashionFilter.onclick = () => {
        const sort = document.querySelector('.form-select.form-select-lg').value;

        if (sort === 'gradually-increase') {
            window.location.href = "index.php?ctrl=product&view=fashion&sort=" + sort;
        } else if (sort === 'gradually-decreasing') {
            window.location.href = "index.php?ctrl=product&view=fashion&sort=" + sort;
        }
        else {
            window.location.href = "index.php?ctrl=product&view=fashion";
        }

    }
}

if (view[0] === 'ctrl=product' && view[1] === 'view=sales') {

    const btnFashionFilter = document.querySelector('.btn-sale-filter');

    btnFashionFilter.onclick = () => {
        const sort = document.querySelector('.form-select.form-select-lg').value;

        if (sort === 'gradually-increase') {
            window.location.href = "index.php?ctrl=product&view=sales&sort=" + sort;
        } else if (sort === 'gradually-decreasing') {
            window.location.href = "index.php?ctrl=product&view=sales&sort=" + sort;
        }
        else {
            window.location.href = "index.php?ctrl=product&view=sales";
        }

    }
}


if (view[0] === 'ctrl=product' && view[1] === 'view=categoryshoes') {

    const btnCateShoesFilter = document.querySelector('.btn-cate-shoes');

    btnCateShoesFilter.onclick = () => {
        const make = document.querySelector('input[name="shoesmake"]');
        const sort = document.querySelector('.form-select.form-select-lg').value;

        if (sort === 'gradually-increase') {
            window.location.href = `index.php?ctrl=product&view=categoryshoes&make=${make.value}&sort=` + sort;
        } else if (sort === 'gradually-decreasing') {
            window.location.href = `index.php?ctrl=product&view=categoryshoes&make=${make.value}&sort=` + sort;
        }
        else {
            window.location.href = `index.php?ctrl=product&view=categoryshoes&make=${make.value}`;
        }

    }
}

if (view[0] === 'ctrl=product' && view[1] === 'view=categoryfashion') {

    const btnCatefashionFilter = document.querySelector('.btn-cate-fashion');

    btnCatefashionFilter.onclick = () => {
        const make = document.querySelector('input[name="fashionmake"]');
        const sort = document.querySelector('.form-select.form-select-lg').value;

        if (sort === 'gradually-increase') {
            window.location.href = `index.php?ctrl=product&view=categoryfashion&make=${make.value}&sort=` + sort;
        } else if (sort === 'gradually-decreasing') {
            window.location.href = `index.php?ctrl=product&view=categoryfashion&make=${make.value}&sort=` + sort;
        }
        else {
            window.location.href = `index.php?ctrl=product&view=categoryfashion&make=${make.value}`;
        }

    }
}

if (view[0] === 'ctrl=product' && view[1] === 'view=cart') {

    const btnCartDown = document.querySelectorAll('.btn-cart-down');
    const btnCartUp = document.querySelectorAll('.btn-cart-up');
    const total = document.querySelector('.total-money');

    for (let i = 0; i < btnCartDown.length; i++) {
        btnCartDown[i].onclick = () => {
            let sum = 0
            const cartQuantity = document.querySelectorAll('.cart-quantity');
            const cartSumMoney = document.querySelectorAll('.cart-sum-money');
            btnCartUp[i].style.setProperty('opacity', 1, 'important');
            if (cartQuantity[i].innerText === '1') {
                btnCartDown[i].style.setProperty('opacity', .5, 'important');

            }
            else {
                btnCartDown[i].style.setProperty('opacity', 1, 'important');
                const quantity = cartQuantity[i].innerText
                const result = cartQuantity[i].innerText = quantity - 1;
                const id = parseInt(cartQuantity[i].getAttribute('data-id'));
                const money = cartSumMoney[i].getAttribute('data-price');
                cartDown(result, id);
                cartSumMoney[i].innerText = ((money * (parseInt(quantity) - 1)) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                cartSumMoney.forEach(element => {
                    sum += parseInt(element.innerText.replace(/,/g, '').replace('đ', '').trim());
                });
                sum = (sum + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                total.innerText = "Total: " + sum
            }
        }
    }

    for (let i = 0; i < btnCartUp.length; i++) {
        btnCartUp[i].onclick = () => {
            let sum = 0;
            const cartQuantity = document.querySelectorAll('.cart-quantity');
            const cartSumMoney = document.querySelectorAll('.cart-sum-money');
            const max = document.querySelectorAll('input[name="cartinstock"]');

            btnCartDown[i].style.setProperty('opacity', 1, 'important');
            if (parseInt(cartQuantity[i].innerText) === parseInt(max[i].value)) {
                btnCartUp[i].style.setProperty('opacity', .5, 'important');
            }
            else {
                btnCartUp[i].style.setProperty('opacity', 1, 'important');
                const quantity = cartQuantity[i].innerText
                const result = cartQuantity[i].innerText = (parseInt(quantity) + 1) + "";
                const id = parseInt(cartQuantity[i].getAttribute('data-id'));
                const money = parseFloat(cartSumMoney[i].getAttribute('data-price'));
                cartDown(result, id)
                cartSumMoney[i].innerText = ((money * (parseInt(quantity) + 1)) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                cartSumMoney.forEach(element => {
                    sum += parseInt(element.innerText.replace(/,/g, '').replace('đ', '').trim());
                });
                sum = (sum + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                total.innerText = "Total: " + sum
            }
        }
    }

}


if (view[0] === 'ctrl=product' && view[1] === 'view=search') {

    const btnSearchFilter = document.querySelector('.btn-search-filter');
    const key = document.querySelector('input[name="key"]');
    btnSearchFilter.onclick = () => {
        const sort = document.querySelector('.form-select.form-select-lg').value;

        if (sort === 'gradually-increase') {
            window.location.href = `index.php?ctrl=product&view=search&key=${key.value}&sort=` + sort;
        } else if (sort === 'gradually-decreasing') {
            window.location.href = `index.php?ctrl=product&view=search&key=${key.value}&sort=` + sort;
        }
        else {
            window.location.href = `index.php?ctrl=product&view=search&key=${key.value}`;
        }

    }
}

if (view[0] === 'ctrl=product' && view[1] === 'view=detail') {

    const btnCmt = document.querySelector('.commnet-btn');
    const content = document.querySelector('.comment__input');
    const productID = document.querySelector('input[name="productid"]');
    if (btnCmt) {
        btnCmt.onclick = () => {
            if (content.value.length > 0) {
                comment(content.value, productID.value);
                content.value = "";
            }

        }
    }
    const buyBtn = document.querySelector('.buy-btn');

    buyBtn.onclick = () => {
        if (!btnCmt) {
            const conf = confirm("Login to buy")
            if (conf) {
                window.location.href = "index.php?ctrl=user&view=login";
            }
        }
        else {
            window.location.href = "index.php?ctrl=product&view=buy&product=" + productID.value;
        }
    }
}

if (view[0] === 'ctrl=user' && view[1] === 'view=codeforgotpassword') {

    const btnSend = document.querySelector('.code-forgot-password');
    const inputCode = document.querySelector('#code-email');


    btnSend.onclick = () => {
        if (inputCode.value.length === 6) {
            repass(inputCode.value);
        }
        else {
            alert('Enter code email!');
        }

    }
}


if (view[0] === 'ctrl=product' && view[1] === 'view=admindetail') {

    const btnDeleteCmt = document.querySelectorAll('.delete-cmt');

    btnDeleteCmt.forEach((item) => {
        item.onclick = () => {
            const isDelete = confirm("Are you sure?");
            if (isDelete) {
                const id = item.getAttribute('data-cmtid');
                const sp = item.getAttribute('data-sp');

                window.location.href = "admin.php?ctrl=product&view=deletecmt&id=" + id + "&sp=" + sp;
            }
        }
    });

}

if (view[0] === 'ctrl=product' && view[1] === 'view=orders') {

    const btnDetailOrder = document.querySelectorAll('.btn-detail-order');

    btnDetailOrder.forEach(item => {
        item.onclick = async () => {
            const tmp = await getDetailProductByID(parseInt(item.getAttribute('data-orderid')));

            document.querySelector('.invoice-customer-info-name').textContent = 'Name: ' + tmp[0].UserName;
            document.querySelector('.invoice-customer-info-address').textContent = 'Address: ' + tmp[0].UserAddress;
            document.querySelector('.invoice-customer-info-email').textContent = 'Email: ' + tmp[0].UserEmail;

            document.querySelector('.invoice-date-date').textContent = 'Date: ' + tmp[0].UserTime;
            document.querySelector('.invoice-date-invoice').textContent = 'Invoice #: ' + tmp[0].UserIDOder;
            let html = "";
            for (let i = 0; i < tmp.length; i++) {

                html += `
                    <tr>
                        <td class="invoice-table-name" style="min-width: 250px;>${tmp[i].ProductName}</td>
                        <td class="invoice-table-size">${tmp[i].UserSize}</td>
                        <td class="invoice-table-instock">${tmp[i].UserInstock}</td>
                        <td class="invoice-table-price">${(tmp[i].UserSalePrice + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</td>
                        <td class="model-sum">${((tmp[i].UserInstock * tmp[i].UserSalePrice) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</td>
                    </tr>
                `;

            }
            document.querySelector('.invoice-body').innerHTML = html;

            document.querySelector('.invoice-total-pay').textContent = 'Pay: ' + (tmp[0].UserPay ? "Paid" : "Not yet paid");
            document.querySelector('.invoice-total-shipping').textContent = 'Shipping: ' + (tmp[0].UserShipping + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ';
            document.querySelector('.invoice-total-total').textContent = 'Total: ' + (tmp[0].UserMoney + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ';

        }
    })

}


if (view[0] === 'ctrl=product' && view[1] === 'view=orderhistory') {

    const btnDetailOrder = document.querySelectorAll('.btn-detail-order');

    btnDetailOrder.forEach(item => {
        item.onclick = async () => {
            const tmp = await getProductHistoryByID(parseInt(item.getAttribute('data-orderid')));

            document.querySelector('.invoice-customer-info-name').textContent = 'Name: ' + tmp[0].UserName;
            document.querySelector('.invoice-customer-info-address').textContent = 'Address: ' + tmp[0].UserAddress;
            document.querySelector('.invoice-customer-info-email').textContent = 'Email: ' + tmp[0].UserEmail;

            document.querySelector('.invoice-date-date').textContent = 'Date: ' + tmp[0].UserTime;
            document.querySelector('.invoice-date-invoice').textContent = 'Invoice #: ' + tmp[0].UserIDOder;
            let html = "";
            for (let i = 0; i < tmp.length; i++) {

                html += `
                    <tr>
                        <td class="invoice-table-name" style="min-width: 250px;">${tmp[i].ProductName}</td>
                        <td class="invoice-table-size">${tmp[i].UserSize}</td>
                        <td class="invoice-table-instock">${tmp[i].UserInstock}</td>
                        <td class="invoice-table-price">${(tmp[i].UserSalePrice + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</td>
                        <td class="model-sum">${((tmp[i].UserInstock * tmp[i].UserSalePrice) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</td>
                    </tr>
                `;

            }
            document.querySelector('.invoice-body').innerHTML = html;

            document.querySelector('.invoice-total-pay').textContent = 'Pay: ' + (tmp[0].UserPay ? "Paid" : "Not yet paid");
            document.querySelector('.invoice-total-shipping').textContent = 'Shipping: ' + (tmp[0].UserShipping + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ';
            document.querySelector('.invoice-total-total').textContent = 'Total: ' + (tmp[0].UserMoney + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ';

        }
    })

}


if (view[0] === 'ctrl=product' && view[1] === 'view=buy') {

    const total = document.querySelectorAll('.total-product');
    const quantity = document.querySelectorAll('.quantity-btn');
    const price = document.querySelectorAll('.price-btn');
    const sumPrice = document.querySelector('.sum-price-btn');
    const shipping = document.querySelector('.shipping-btn');
    const sumTotalPrice = document.querySelector('.sum-total-price');
    const inputSumTotalPrice = document.querySelector('input[name="sumtotalbuy"]');

    let sum = 0;
    for (let i = 0; i < price.length; i++) {
        let money = parseInt(price[i].innerText.replace(/,/g, '').replace('đ', '').replace('x', '').trim()) * parseInt(quantity[i].value);
        sum += money;
        total[i].innerHTML = (money + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";

        quantity[i].onchange = () => {
            const sl = quantity[i].value;
            quantity[i].value = sl;

            sum = 0;
            money = parseInt(price[i].innerText.replace(/,/g, '').replace('đ', '').replace('x', '').trim()) * parseInt(quantity[i].value);

            total[i].innerHTML = (money + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
            for (let j = 0; j < total.length; j++) {
                sum += parseInt(total[j].innerText.replace(/,/g, ''));

            }
            sumPrice.innerHTML = (sum + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
            inputSumTotalPrice.value = (sum + parseInt(shipping.innerHTML.replace(/,/g, '')));

            sumTotalPrice.innerHTML = (sum + parseInt(shipping.innerHTML.replace(/,/g, '').replace('đ', '')) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
        }

    }
    sumPrice.innerHTML = (sum + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
    inputSumTotalPrice.value = (sum + parseInt(shipping.innerHTML.replace(/,/g, '')));
    sumTotalPrice.innerHTML = (sum + parseInt(shipping.innerHTML.replace(/,/g, '').replace('đ', '')) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";


    fetch('https://esgoo.net/api-tinhthanh/1/0.htm')
        .then((responseCity) => {
            return responseCity.json();
        })
        .then((data) => {

            const formCity = document.querySelector('.form-city');
            const formDistrict = document.querySelector('.form-district');
            const formCommune = document.querySelector('.form-commune');

            const city = data.data.map(item => {
                return `<option value="${item.name}" data-tp="${item.id}" >${item.name}</option>`;

            });

            city.forEach(item => {
                formCity.insertAdjacentHTML('beforeend', item);

            })

            formCity.onchange = () => {
                if (formCity.options[formCity.selectedIndex].value !== "") {
                    fetch(` https://esgoo.net/api-tinhthanh/2/${formCity.options[formCity.selectedIndex].getAttribute('data-tp')}.htm`)
                        .then((responseDistrict) => {
                            return responseDistrict.json();
                        }).then((data) => {

                            const district = data.data.map(item => {
                                return `<option value="${item.name}" data-tp="${item.id}">${item.name}</option>`;

                            });

                            formDistrict.innerHTML = district.join("");
                            formDistrict.onchange = () => {
                                if (formDistrict.options[formDistrict.selectedIndex].value !== "") {
                                    fetch(`https://esgoo.net/api-tinhthanh/3/${formDistrict.options[formDistrict.selectedIndex].getAttribute('data-tp')}.htm`)
                                        .then((responveCommune) => {
                                            return responveCommune.json();
                                        }).then((data) => {
                                            const commune = data.data.map(item => {
                                                return `<option value="${item.name}">${item.name}</option>`;

                                            });
                                            formCommune.innerHTML = commune.join("");
                                        })
                                }
                                else {
                                    formCommune.innerHTML = `<option value="" selected>Select Country</option>`;
                                }
                            }
                        });

                } else {
                    formDistrict.innerHTML = `<option value="" selected>Select Country</option>`;
                }

            }
        })



}

