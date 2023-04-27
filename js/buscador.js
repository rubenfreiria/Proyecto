const buscador = () => {
  const inputBuscador = document.getElementById("buscador");
  inputBuscador.addEventListener("input", function () {
    const textoBuscado = inputBuscador.value.toLowerCase();
    const tablaAnimales = document.querySelector("table");
    const filasTabla = tablaAnimales.getElementsByTagName("tr");

    for (let i = 1; i < filasTabla.length; i++) {
      const nombreAnimal = filasTabla[i]
        .getElementsByTagName("td")[1]
        .textContent.toLowerCase();
      if (nombreAnimal.includes(textoBuscado)) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
  });
};

buscador();
