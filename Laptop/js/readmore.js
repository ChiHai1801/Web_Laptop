

function show_hide_v(){
    let updatedCart = []; 
    const show_hide = (evt) => {
        
        const click = evt.target;
        
        if (click.previousElementSibling.style.display != 'block') {
            //Hiện thành phần div id="full1"
            click.previousElementSibling.style.display = 'block';
            //Thay thế text của liên kết
            click.innerHTML = 'Rút gọn';
            //Gán class "close" cho liên kết
            click.className = 'close';

        }
        //Nguợc lại, nếu thành phần đang được hiện
        else {
            /* Ẩn thành phần div id = "full1"*/

            click.previousElementSibling.style.display = 'none';
            click.innerHTML = 'Xem đầy đủ';
            click.className = 'read-more-less';
        }     
    }

    const attachingEvent = evt => evt.addEventListener('click', show_hide);
    const addLinks = document.getElementsByClassName('read-more-less');
    let arrLinks=Array.from(addLinks);
    arrLinks.forEach(attachingEvent);  
}


