function cambiarEstiloArchivo() {
    const inputFile = document.getElementById("foto"),
      label = inputFile.previousElementSibling;

    if (inputFile.files.length > 0) {
      label.innerHTML = `Archivo cargado:</br> ${inputFile.files[0].name}`;
    } else {
      label.innerHTML = "Seleccionar archivo";
    }
  }