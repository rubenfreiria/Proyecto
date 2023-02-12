const menuDerecha = document.getElementById("menuDerecha"),
  elementosA = menuDerecha.getElementsByTagName("a");

for (var i = elementosA.length - 1; i >= 0; i--) {
  menuDerecha.removeChild(elementosA[i]);
}
