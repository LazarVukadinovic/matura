// PROMENLJIVA -> INDEX SLAJDA
let slideIndex = 0;
showSlides();

// FUNKCIJA ZA PRIKAZIVANJE-PROMENU SLAJDOVA
function showSlides() {
  // PROMENLJIVE ZA KONTROLU PROMENE
  let i;
  let slides = document.getElementsByClassName("mojSlajder");
  let dots = document.getElementsByClassName("dot");

  // SAKRIVANJE ODREDJENIH SLAJDOVA
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;

  // PRIKAZIVANJE ODREDJENIH SLAJDOVA
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";

  // INTERVAL ZA PROMENU NA 3 SEKUNDE
  setTimeout(showSlides, 3000);
}