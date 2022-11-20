/*File: lien.css
    @IT student: Nguyen Van Vu, vub1906615@student.ctu.edu.vn @Created: 16/12/2021*/

    /*
        mã nguồn được tham khảo từ bài tập validation.html của thầy Vũ Duy Linh
    */ 

//validation feedback
const form1 = document.getElementsByClassName('feedback')[0];

const fullname = document.getElementById('name');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const feedback = document.getElementById('feedback__content');

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

function checkFullname() {
    
    
    if (fullname.value === '') {
        errorMessage(fullname, "không được bỏ trống.");
    } else {
        successMessage (fullname);
    }
}
function phonenumber(inputtxt)
{
    var phoneno = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    return phoneno.test(String(inputtxt));
}
function checkPhone() {
    if (phone.value === '') {
        errorMessage(phone, "không được bỏ trống.");
    } else if(!phonenumber(phone.value)) {
        errorMessage(phone, "số điện thoại không hợp lệ.");
    }else{
        successMessage (phone);
    }   
}
function checkFeedback() {
    if (feedback.value === '') {
        errorMessage(feedback, "không được bỏ trống.");
    } else {
        successMessage (feedback);
    }
}


function validateEmail(email) {
/*https://www.w3resource.com/*/
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return mailformat.test(String(email).toLowerCase());
}

function checkEmail() {
    if (email.value === '') {
        errorMessage(email, "không được bỏ trống.");
    } else if (!validateEmail(email.value)) {
        errorMessage (email, "địa chỉ email không hợp lệ");
    } else {
        successMessage (email);
    }
}

fullname.addEventListener('blur', checkFullname, true);
phone.addEventListener('blur', checkPhone, true);
email.addEventListener('blur', checkEmail, true);
feedback.addEventListener('blur',checkFeedback,true)

form1.addEventListener('submit', (evt) => {
//prevent default loading when form is submitted
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
        alert("Cảm ơn "+fullname.value+" đã góp ý !");
    } else {
        alert('góp ý không thành công !');
    }
});
