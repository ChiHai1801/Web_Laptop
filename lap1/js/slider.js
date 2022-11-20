/*File: lien.css
    @IT student: Nguyen Van Vu, vub1906615@student.ctu.edu.vn @Created: 13/12/2021*/

// -----------phần slider -----------------
/* Slideshow tham khảo tại kênh youtube: Something Good Channel 
   link: https://www.youtube.com/watch?v=deRNzKhMOVM&t=419s  */

var slideIndex = 0;
showSlides();

// chuyển ảnh 
function plusSlides(n) {
  showSlides2(slideIndex += n);
}

function showSlides2(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  
  slides[slideIndex-1].style.display = "block";
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000);
}
//-----------------------------------