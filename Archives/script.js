// Referencias al DOM
const form = document.getElementById("formulario");
const mensaje = document.getElementById("mensaje");
const lista = document.getElementById("lista");

// Evento de envío del formulario
form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const datos = new FormData(form);

    try {
        const res = await fetch("upload.php", {
            method: "POST",
            body: datos
        });

        if (!res.ok) throw new Error("Error en servidor");

        const json = await res.json();

        // Seguridad XSS
        mensaje.textContent = json.mensaje;

        cargarArchivos();

    } catch (error) {
        mensaje.textContent = "Error al subir archivo";
    }
});


// Cargar archivos
async function cargarArchivos() {

    try {
        const res = await fetch("upload.php");

        if (!res.ok) throw new Error("Error al cargar");

        const archivos = await res.json();

        // Limpiar lista
        lista.innerHTML = "";

        archivos.forEach(archivo => {

            const li = document.createElement("li");

            const titulo = document.createElement("strong");
            titulo.textContent = archivo.nombre;

            const contenido = document.createElement("pre");
            contenido.textContent = archivo.contenido;

            li.appendChild(titulo);
            li.appendChild(document.createElement("br"));
            li.appendChild(contenido);

            lista.appendChild(li);
        });

    } catch (error) {
        mensaje.textContent = "Error al cargar archivos";
    }
}

// Carga inicial
cargarArchivos();