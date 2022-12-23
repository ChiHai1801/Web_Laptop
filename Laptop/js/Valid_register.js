

const from1 = document.getElementsByClassName('register')[0];

const fullname = document.getElementById('name');

const username = document.getElementById('username');
const pwd = document.getElementById('pwd');
const pwd2 = document.getElementById('pwd2');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const address = document.getElementById('address');
const container = document.getElementById('.container');


function checkFullname() {
    
    if (fullname.value === '') {
        errorMessage(fullname, "Bắt buộc nhập thông tin.");
    } else {
        successMessage(fullname);
    }
}

function checkUsername() {
    if (username.value === '') {
        errorMessage(username, "Bắt buộc nhập thông tin.");
    } else {
        successMessage(username);
    }
}

function checkPwd() {
    if (pwd.value === '') {
        errorMessage(pwd,"Bắt buộc nhập mật khẩu.");
    } else if(passwd(pwd.value)) {
        successMessage(pwd);
        }else{
            errorMessage(pwd,"Tối thiểu sáu ký tự, ít nhất một chữ cái và một số");
        }
}
function passwd(inputtxt) { //kiểm tra độ mạnh 
    var pw = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/ ;
    return pw.test(String(inputtxt));
}
function checkPwd2() {
    if (pwd2.value === '') {
        errorMessage(pwd2,"Bắt buộc nhập mật khẩu.");
    } else if(pwd2.value===pwd.value) {
        successMessage(pwd2);
        }else{
            errorMessage(pwd2,"Mật khẩu không khớp !");
        }
}


function phonenumber(inputtxt) { // kiểm tra số đt
    var phoneno = /((09|05|07|08|05)+([0-9]{8})\b)/g;
    return phoneno.test(String(inputtxt));
}

function checkPhone() {
    if (phone.value === '') {
        errorMessage(phone, "Bắt buộc nhập số điện thoại.");
    } else if (!phonenumber(phone.value)) {
        errorMessage(phone, "Số điện thoại không hợp lệ.");
    } else {
        successMessage(phone);
    }
}



function checkEmail() {
    if (email.value === '') {
        errorMessage(email, "Bắt buộc nhập email.");
    } else if (!validateEmail(email.value)) {
        errorMessage(email, "Email không hợp lệ, vui lòng nhập lại");
    } else {
        successMessage(email);
    }

}
function validateEmail(email) {
    /*https://www.w3resource.com/*/
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return mailformat.test(String(email).toLowerCase());
}
function checkAddress() {
    if (address.value === '') {
        errorMessage(address, "Bắt buộc nhập địa chỉ");
    } else {
        successMessage(address);
    }
}

fullname.addEventListener('blur', checkFullname, true);
username.addEventListener('blur', checkUsername, true);
pwd.addEventListener('blur', checkPwd, true);
pwd2.addEventListener('blur', checkPwd2, true);
phone.addEventListener('blur', checkPhone, true);
email.addEventListener('blur', checkEmail, true);
address.addEventListener('blur', checkAddress, true);

from1.addEventListener('submit', (evt) => {
    evt.preventDefault();

    const formRows = document.querySelectorAll('.form-row');
    // Array.isArray(formRows) --> False
    let arrformRows = Array.from(formRows); //Array.isArray (formRows)--> true
    arrformRows.pop();
    let isValid = true;

    arrformRows.forEach(item => {
        console.log(item.classList.contains('success'));
        if (!item.classList.contains('success')) isValid = false;
    });
    // check if all input values are valid
    if (isValid) {
        alert('Đăng ký thành công !');
    } else {
        alert('Đăng ký không thành công !');
    }
});

function errorMessage(pElement, message) {
    const formRow = pElement.parentElement;

    if (formRow.classList.contains('success')) {
        formRow.classList.remove('success');
        formRow.classList.add('error');
    } else {
        formRow.classList.add('error');
    }
    formRow.querySelector('.message').textContent = message;
}

function successMessage(pElement) {
    const formRow = pElement.parentElement;
    if (formRow.classList.contains('error')) {
        formRow.classList.remove('error');
        formRow.classList.add('success');
    } else {
        formRow.classList.add('success');
    }
}