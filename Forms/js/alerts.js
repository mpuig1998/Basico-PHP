
  const params = new URLSearchParams(window.location.search);
  const estado = params.get("estado");

  const alerta = document.getElementById("alerta");

  if (estado === "ok") {
    alerta.innerHTML = `
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Mensaje enviado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>`;
  }

  if (estado === "error") {
    alerta.innerHTML = `
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Error al enviar el mensaje.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>`;
  }

  if (estado === "vacio") {
    alerta.innerHTML = `
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Rellena los campos obligatorios.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>`;
  }
