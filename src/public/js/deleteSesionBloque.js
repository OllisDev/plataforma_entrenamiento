function eliminarSesionBloque(sesionBloqueId, boton) {
    if (!confirm("¿Quieres eliminar esta sesión de bloque?")) return;

    let url = `/sesionBloque/${sesionBloqueId}/eliminar`;

    let csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    if (!csrfToken && boton) {
        let form = boton.closest("form");
        if (form) {
            let inputToken = form.querySelector('input[name="_token"]');
            if (inputToken) csrfToken = inputToken.value;
        }
    }

    if (!csrfToken) {
        console.error("Token CSRF no encontrado.");
        alert("Error de seguridad: No se pudo verificar la sesión.");
        return;
    }

    fetch(url, {
        method: "DELETE",
        headers: {
            "Content-type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            if (data.success) {
                alert("Sesion de bloque eliminado correctamente.");

                if (boton) {
                    let fila = boton.closest("tr");
                    if (fila) {
                        fila.remove();
                    }
                }
            } else {
                alert("Error al eliminar la sesión de bloque.");
            }
        })
        .catch((error) => {
            console.log(error);
            alert("Error de conexión con el servidor");
        });
}
