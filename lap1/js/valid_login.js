/*File: template.html
    @IT student: 
    Tran Thi Kim Ngan, nganb1910109@student.ctu.edu.vn
    @Created: 17/12/2021 */

    /*
        mã nguồn được tham khảo từ bài tập validation.html của thầy Vũ Duy Linh
    */ 

const form2 = document.getElementsByClassName('login')[0];
const account = document.getElementById('acc');
const pws = document.getElementById('pws');

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

function checkAcc() {

    if (account.value === '') {
        errorMessage(account, "Không được bỏ trống.");
    } else {
        successMessage(account);
    }
}


function checkPws() {
    if (pws.value === '') {
        errorMessage(pws, "Không được bỏ trống.");

    } else {
        successMessage(pws);
    }
}
account.addEventListener('blur', checkAcc, true);
pws.addEventListener('blur', checkPws, true);

form2.addEventListener('submit', (evt) => {
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
        alert("Tài khoản " + account.value + " đã đăng nhập!");
    } else {
        alert('Đăng nhập không thành công !');
    }
});