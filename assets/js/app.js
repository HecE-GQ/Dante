/*
  ================================================
  DGTIC - UNAM
  app.js

  Punto de entrada único de JavaScript.
  Centraliza toda la lógica del sitio:
  - Sticky nav
  - Modal de requisitos
  - Nav móvil hamburger
  - Animaciones de carga

  Depende de: jquery.min.js
  ================================================
*/

(function ($) {

  /* ------------------------------------------
     1. ANIMACIÓN DE CARGA
     Quita la clase is-preload del body para
     activar las animaciones CSS al cargar.
     ------------------------------------------ */

  $(window).on('load', function () {
    setTimeout(function () {
      $('body').removeClass('is-preload');
    }, 100);
  });


  /* ------------------------------------------
     2. STICKY NAV
     El navbar se fija al top cuando el usuario
     hace scroll más allá del header.
     ------------------------------------------ */

  var $nav        = $('#nav');
  var $pageWrap   = $('#page-wrapper');

  function initStickyNav() {
    var headerHeight = $('.header-main').outerHeight()
                     + $('.header-franja-top').outerHeight();

    $(window).on('scroll.sticky', function () {
      if ($(window).scrollTop() >= headerHeight) {
        $nav.addClass('sticky');
        $pageWrap.addClass('nav-sticky');
      } else {
        $nav.removeClass('sticky');
        $pageWrap.removeClass('nav-sticky');
      }
    });
  }

  if ($nav.length) {
    initStickyNav();
  }


  /* ------------------------------------------
     3. NAV MÓVIL — HAMBURGER
     Muestra/oculta el menú en pantallas
     pequeñas al hacer click en el toggle.
     ------------------------------------------ */

  $('.nav-toggle').on('click', function () {
    $('#nav > div > ul').toggleClass('open');
  });

  // Cerrar menú móvil al hacer click fuera
  $(document).on('click', function (e) {
    if (!$(e.target).closest('#nav').length) {
      $('#nav > div > ul').removeClass('open');
    }
  });


  /* ------------------------------------------
     4. MODAL DE REQUISITOS
     Se abre automáticamente al cargar páginas
     de curso. Se cierra con el botón o con
     click fuera del modal.
     ------------------------------------------ */

  function abrirModal() {
    var $modal = $('#modal-requisitos');
    if ($modal.length) {
      $modal.addClass('activo');
      // Accesibilidad: foco al modal
      $modal.attr('aria-hidden', 'false');
      $('.btn-cerrar').focus();
    }
  }

  function cerrarModal() {
    var $modal = $('#modal-requisitos');
    $modal.removeClass('activo');
    $modal.attr('aria-hidden', 'true');
  }

  // Exponer cerrarModal globalmente para el onclick del HTML
  window.cerrarModal = cerrarModal;

 //Exponer abriModal globalmente para el click del boton
 window.abrirModal = abrirModal;

  // Cerrar al hacer click en el overlay (fuera del modal-box)
  $('#modal-requisitos').on('click', function (e) {
    if ($(e.target).is('#modal-requisitos')) {
      cerrarModal();
    }
  });

  // Cerrar con tecla Escape
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape') {
      cerrarModal();
    }
  });


  /* ------------------------------------------
     5. NAV — ESTADO CURRENT DINÁMICO
     Evita que el link quede "seleccionado"
     de forma persistente al navegar.
     ------------------------------------------ */

  var currentPage = window.location.pathname.split('/').pop();

  $('#nav > div > ul > li > a').each(function () {
    var linkPage = $(this).attr('href').split('/').pop();
    if (linkPage === currentPage) {
      $(this).parent().addClass('current');
    } else {
      $(this).parent().removeClass('current');
    }
  });

})(jQuery); 