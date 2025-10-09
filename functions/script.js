var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "flex") {
      panel.style.display = "none";
    } else {
      panel.style.display = "flex";
    }
  });
}
let menuBtn = document.querySelector('.menu-btn');
let menu = document.querySelector('.menu-vert');

menuBtn.addEventListener('click', function(){
	menuBtn.classList.toggle('active-button');
	menu.classList.toggle('active-menu');
})

