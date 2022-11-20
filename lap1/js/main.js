
/*File: lien.css
    @IT student: Nguyen Van Vu, vub1906615@student.ctu.edu.vn @Created: 13/12/2021*/
    
// ---------------nút thanh nav--------------


document.getElementsByClassName("nav__small__icon")[0].addEventListener("click", navof);

function navof(){ // ẩn hiện thanh nav khi  người dùng click vào khi đang ở màn hình độ phân giải nhỏ 
  var el = document.getElementsByClassName("nav__link");

  if(el[0].classList.contains("nav__on")){
    el[0].classList.remove("nav__on");
    
  }else{
    el[0].classList.add("nav__on");
  }
}
//--------------nút back to top--------
/*tham khảo tại https://netweb.vn/tao-nut-scroll-back-top-cho-website.html */

document.getElementById("myBtn").addEventListener("click", topFunction);

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


