/* 
DGTIC - UNAM
  app.js

  Punto de entrada único de JavaScript.
  Centraliza toda la lógica del sitio:
  - Sticky nav
  - Modal de requisitos
  - Modal de creditos
  - Nav móvil hamburger
  - Animaciones de carga
  - Acordeon para la seccion de preguntas frecuentes 

  *Antes dependia de jquery, se hizo refactor para mejora de rendiomiento y menos consumo de recursos
 ------------------------------------------------------------------------------------------------ */

  /* 
  1.- ANIMACION DE CARGA 
  Quita pre-load del body para activar las animaciones de css
  */
 window.addEventListener('load', function(){
    setTimeout(function(){
        document.body.classList.remove('is-preload');
    }, 100);
 });


 /* 
 2.- Sticky NAV 
 El navbar se fija al top cuando el usuario haga scroll mas allá del header 
 */

 const nav = document.getElementById('nav');
 const pageWrapp = document.getElementById('page-wrapper');
 
 function initStickyNav(){
        const headerMain = document.querySelector('.header-main');
        const headerFranja = document.querySelector('.header-franja-top');

        if(!headerMain || !headerFranja) return;

        const headerHeight = headerMain.offsetHeight + headerFranja.offsetHeight;

        window.addEventListener('scroll', function(){
            if(window.scrollY >= headerHeight){
                nav.classList.add('sticky');
                pageWrapp.classList.add('nav-sticky');
            }else{
                nav.classList.remove('sticky');
                pageWrapp.classList.remove('nav-sticky');
            }
        });
 }

 if(nav){
    initStickyNav();
 }

 /*
 3.- NAV HAMBURGUESA 
 Muestra/oculta el menu en pantallas pequeñas al hacer click en el toggle  
 */
 const navToggle = document.querySelector('.nav-toggle');
 const navMenu = document.querySelector('#nav > div > ul');

 if(navToggle && navMenu){
    navToggle.addEventListener('click', function(){
        navMenu.classList.remove('open');
    });
 }

 //Cerrar menu al hacer click afuera 
 document.addEventListener('click', function(e){
    if(nav && !nav.contains(e.target)&& navMenu){
        navMenu.classList.remove('open');
    }
 });


 /* 
 4.- Modal de requisitos
 Se abre con boton flotante y se cierra con el boton o click fuera
 */

 function abrirModal(){
    const modal = document.getElementById('modal-requisitos');
    if(!modal) return;
    modal.classList.add('activo');
    modal.setAttribute('aria-hidden', 'false');
    const btnCerrar = modal.querySelector('.btn-cerrar');
    if(btnCerrar) btnCerrar.focus();
 }
function cerrarModal(){
    const modal = document.getElementById('modal-requisitos');
    if(!modal) return;
    modal.classList.remove('activo');
    modal.setAttribute('aria-hidden', 'true');
}

window.abrirModal = abrirModal;
window.cerrarModal = cerrarModal;

// Cerrar al dar click en el overlay 

const modalRequisitos = document.getElementById('modal-requisitos');
if(modalRequisitos){
    modalRequisitos.addEventListener('click', function(e){
        if(e.target === modalRequisitos) cerrarModal();
    });
}


/*
5.- Modal Creditos
Se abre con el boton 'contacto'
Se cierra con click en el boton o fuera
*/

function abrirModalCreditos(){
    const modal = document.getElementById('modal-creditos');
    if(!modal) return;
    modal.classList.add('activo');
    modal.setAttribute('aria-hidden', 'false');
    const btnCerrar = modal.querySelector('.btn-cerrar');
    if(btnCerrar) btnCerrar.focus(); 
}

function cerrarModalCreditos(){
    const modal = document.getElementById('modal-creditos');
    if(!modal) return;
    modal.classList.remove('activo');
    modal.setAttribute('aria-hidden', 'true');
}

window.abrirModalCreditos = abrirModalCreditos;
window.cerrarModalCreditos = cerrarModalCreditos;


// Cerrar al hacer click en el overlay 
const modalCreditos = document.getElementById('modal-creditos');
if(modalCreditos){
    modalCreditos.addEventListener('click', function(e){
        if(e.target === modalCreditos) cerrarModalCreditos();
    });
}


/* -----------------------
Tecla de escape para cerrar cualquier modal
---------------*/

document.addEventListener('keydown', function(e){
    if(e.key !== 'Escape') return;
    if(modalRequisitos && modalRequisitos.classList.contains('activo')) cerrarModal();
    if(modalCreditos && modalCreditos.classList.contains('activo')) cerrarModalCreditos();
});


/* FAQ Acordeon para la seccion preguntas frecuentes */
function initFaq(){
    const faqs = document.querySelectorAll('.faq');
    if(!faqs.length) return;

    faqs.forEach(function (faq){
        const toggle = faq.querySelector('.faq-toggle');
        const titulo = faq.querySelector('.faq-title');

        function handleClick() {
  const isActive = faq.classList.contains('active');
  const texto = faq.querySelector('.faq-text');
  const toggle = faq.querySelector('.faq-toggle');

  // Cerrar todos los demás
  faqs.forEach(function (otroFaq) {
    if (otroFaq === faq) return;
    otroFaq.classList.remove('active');
    const otroToggle = otroFaq.querySelector('.faq-toggle');
    if (otroToggle) otroToggle.textContent = '+';
  });

  // Alternar el actual
  if (isActive) {
    faq.classList.remove('active');
    if (toggle) toggle.textContent = '+';
  } else {
    faq.classList.add('active');
    if (toggle) toggle.textContent = '−';
  }
}


        if(toggle) toggle.addEventListener('click', handleClick);
        if(titulo) titulo.addEventListener('click', handleClick);
    });

    

}


initFaq();