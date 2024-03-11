var accordion = document.getElementsByClassName('accordion');
//Prechádzame po akordeonov
for(a of accordion){
  a.addEventListener("click",function(){
    this.classList.toggle('active');
  })
}