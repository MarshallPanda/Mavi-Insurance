
  function abrirModal(imagenSrc) {
    document.getElementById("imagenModal").style.display = "flex";
    document.getElementById("imagenAmpliada").src = imagenSrc;
  }

  function cerrarModal() {
    document.getElementById("imagenModal").style.display = "none";
  }

