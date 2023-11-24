'use strict'
/* Tomar la fecha del sistema para el footer */

const fecha = new Date().getFullYear();
let year = document.getElementById("year");
year.textContent = fecha;

/*  Desplegar y ocultar navbar slideDown*/
function toggleNavbarSlideDown() {
  const slideDown = document.querySelector(".navbar");
  slideDown.classList.toggle('slideDown');
}


/* Cambiar color del header cuando se hace scroll */
/* window.addEventListener("scroll", function() {
  const header = document.querySelector("header");
  if (window.scrollY === 0) {
    header.style.backgroundColor = "black";
  } else {
    header.style.backgroundColor = "grey";
  }
});
 */


