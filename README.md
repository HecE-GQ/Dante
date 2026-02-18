DGTIC — Dirección de Docencia en Tecnologías de Información y Comunicación
Sitio web institucional

Contexto del proyecto
Este sitio está basado en el template Arcana by HTML5 UP (https://html5up.net/arcana).
El flujo de trabajo es el siguiente:

Se descargó y descomprimió el template en la carpeta del proyecto.
Los archivos HTML del template sirven como referencia y punto de partida.
No se sobreescriben los HTML del template — se toman fragmentos y se adaptan a las páginas del sitio.
Los CSS y JS del template han sido progresivamente limpiados y modularizados.


Estado actual del proyecto
✅ Ya limpiado / modernizado

main.css — limpio, sin prefijos obsoletos (-ms-, -o-), usando variables CSS
variables.css — tokens de diseño centralizados
navbar.css — header y nav separados como componente
footer.css — footer separado como componente
modal.css — modal de requisitos separado como componente
app.js — lógica JS unificada en un solo archivo

⚠️ Pendiente de limpiar / evaluar
JavaScript legacy (del template original)
Estos archivos aún no se han eliminado porque pueden seguir siendo referenciados
en algunas páginas. Revisar antes de borrar:
ArchivoQué haceAcción recomendadajquery.min.jsLibrería base. Sin esto, app.js no funciona.Conservar siempremain.jsJS original del template. Inicializa dropotron, navPanel y titleBar legacy.Revisar si alguna página aún lo usa. Si no, eliminarutil.jsUtilidades del template: navList, panel, polyfills.Revisar dependencias. Si no se usa, eliminar

Nota: Todo lo que hacían main.js y util.js útil para este proyecto
ya fue migrado a app.js. En principio son seguros de eliminar, pero
se recomienda probar página por página antes de borrar.

Carpeta webfonts
La carpeta webfonts/ contiene las fuentes locales de Font Awesome.
fontawesome-all.min.css apunta a ella con rutas relativas del tipo src: url('../webfonts/...').
No borrar — si se elimina, todos los iconos del sitio dejan de funcionar.


Orden de carga de CSS en cada HTML
html<head>
  <!-- 1. Variables globales — SIEMPRE primero -->
  <link rel="stylesheet" href="assets/css/variables.css" />

  <!-- 2. Base estructural del template -->
  <link rel="stylesheet" href="assets/css/main.css" />

  <!-- 3. Componentes -->
  <link rel="stylesheet" href="assets/css/navbar.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />

  <!-- 4. Solo en páginas de curso individual -->
  <link rel="stylesheet" href="assets/css/modal.css" />
</head>
Scripts al final del body
html  <!-- Dependencia base -->
  <script src="assets/js/jquery.min.js"></script>

  <!-- Lógica del sitio -->
  <script src="assets/js/app.js"></script>

</body>

No incluir main.js ni util.js en páginas nuevas.
Solo existen para no romper páginas que aún los referencien.


Qué contiene app.js
app.js es el punto de entrada único de todo el JavaScript del sitio.
Reemplaza a main.js y util.js del template original.
Está organizado en secciones comentadas:
1. Animación de carga
Quita la clase is-preload del body al terminar de cargar la página,
lo que activa las animaciones CSS del template.
2. Sticky nav
Detecta el scroll del usuario. Cuando el scroll supera la altura del header
(franja + logo), agrega la clase .sticky al #nav para fijarlo en pantalla.
Cuando el usuario sube, lo devuelve a su posición normal.
3. Nav móvil — hamburger
Muestra y oculta el menú en pantallas pequeñas al hacer click en .nav-toggle.
También cierra el menú si el usuario hace click fuera del nav.
4. Modal de requisitos
Abre el modal automáticamente al cargar páginas de curso.
Permite cerrarlo con el botón, haciendo click fuera del modal,
o presionando la tecla Escape.
5. Estado current dinámico del nav
Compara la URL de cada link del menú con la página actual
y marca automáticamente el item correcto como .current,
evitando que un item quede seleccionado de forma incorrecta al navegar.

Por qué se separó en múltiples archivos CSS
El template original tiene un solo CSS enorme (main.css) que mezcla
estilos del grid, botones, tipografía, nav, footer y componentes propios.
Se separó en archivos por componente por tres razones:
1. Mantenibilidad
Si hay que cambiar el footer, solo se toca footer.css.
No hay riesgo de romper accidentalmente el grid o el nav.
2. Escalabilidad
Cuando se agregue una nueva sección o componente, se crea
su propio archivo CSS sin tocar los existentes.
3. Claridad para el equipo
Cualquier desarrollador que entre al proyecto puede identificar
de inmediato qué archivo controla qué parte del sitio,
sin tener que leer cientos de líneas de un solo archivo.
main.css conserva únicamente la estructura base del template
(reset, grid, tipografía, botones genéricos) que no debería
necesitar modificaciones frecuentes.

Variables de diseño disponibles
Todas definidas en variables.css. Si cambia la identidad gráfica,
solo se edita ese archivo y el cambio aplica en todo el sitio.
VariableValorUso--color-primary#004179Navbar--color-secondary#00589cFranja top header--color-primary-dark#003366Submenú / fondos oscuros--color-accent#f5c518Hover nav--color-text#1a3a6bTexto institucional--color-text-body#474747Texto general--color-text-muted#999999Placeholders / secundario--color-bg-white#ffffffFondos blancos--color-border#e0e0e0Bordes y separadores--color-link#37c0fbLinks del template--nav-height52pxCompensación sticky nav--z-nav9999Z-index navbar--z-modal99999Z-index modal--font-mainSource Sans ProTipografía principal--transition-fast0.2s ease-in-outTransiciones rápidas--radius-pill20pxBordes redondeados nav hover--container-max1200pxAncho máximo del contenido

Reglas de mantenimiento

Nunca escribir colores, tamaños o z-index hardcodeados en los CSS.
Siempre usar las variables de variables.css.
Cada componente nuevo tiene su propio archivo CSS.
Todo el JavaScript propio va en app.js, organizado por secciones comentadas.
No modificar jquery.min.js ni fontawesome-all.min.css.
No eliminar la carpeta webfonts/.
Al crear una página nueva, copiar la estructura HTML de una existente,
no de los HTML originales del template de Arcana.


Basado en Arcana by HTML5 UP — https://html5up.net/arcana — Licencia Creative Commons.
