var idx = 1;
function show(n) {
// prejdem dlzkou slideov
var slides = document.getElementsByClassName("slide");
//ak je n vacsie ako dlzka (som na konci, nastavim sa zas na prvy slide)
if (n > slides.length){
idx = 1;
}
//ak som za koncom, nastavim sa na posledny
if (n < 1) {
idx = slides.length;
}
// prechadzam slidemi, skryjem ich
for (var i = 0; i < slides.length; i++) {
slides[i].style.display = "none";
}
slides[idx-1].style.display = "block";
}
//metoda na dalsi slide, v zavislosti od toho, ci klikam vpravo alebo vlavo  do nej pojde pozitivne alebo negativne cislo
function nextSlide(n) {
show(idx += n);
}
//prvý slide
show(idx);
var prev = document.getElementById("prev");
prev.addEventListener("click", function(){
nextSlide(-1)
});
var next = document.getElementById("next");
next.addEventListener("click", function(){
nextSlide(1)
});