comenzar();

function comenzar() {
    cargarTiposDeBloque();
    let btnCreateBloque = document.getElementById("btnCreateBloque");
    btnCreateBloque.addEventListener("click", function (e) {
        e.preventDefault();
        validarCrear();
    });
}

function cargarTiposDeBloque() {
    let tipos = ["rodaje", "intervalos", "fuerza", "recuperación", "test"];

    let selectTipos = document.getElementById("select-tipo");

    selectTipos.innerHTML = "";

    tipos.forEach((tipo) => {
        let option = document.createElement("option");
        option.value = tipo;
        option.text = tipo.charAt(0).toUpperCase() + tipo.slice(1); // mostrar opciones en con la primera letra en mayusculas
        selectTipos.appendChild(option);
    });
}

function validarCrear() {
    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;

    let selectTipo = document.getElementById("select-tipo");
    let tipo = selectTipo.value;

    let duracionEstimada = document.getElementById("duracionEstimada").value;
    let potenciaMinima = document.getElementById("potenciaMinima").value;
    let potenciaMaxima = document.getElementById("potenciaMaxima").value;
    let pulsoPctMax = document.getElementById("pulsoPctMax").value;
    let pulsoReservaPct = document.getElementById("pulsoReservaPct").value;
    let comentario = document.getElementById("comentario").value;

    if (!validarNombre(nombre)) return;
    if (!validarDescripcion(descripcion)) return;
    if (!validarDuracion(duracionEstimada)) return;

    let pMin = parseFloat(potenciaMinima);
    let pMax = parseFloat(potenciaMaxima);

    if (!validarPotencia(potenciaMinima, "Mínima")) return;
    if (!validarPotencia(potenciaMaxima, "Máxima")) return;

    if (pMin > pMax) {
        mostrarMensaje(
            "Error: La potencia mínima no puede ser mayor que la máxima.",
            true,
        );
        document.getElementById("potenciaMinima").focus();
        return;
    }

    if (!validarPorcentaje(pulsoPctMax, "Pulso Máximo")) return;
    if (!validarPorcentaje(pulsoReservaPct, "Pulso Reserva")) return;

    if (!validarComentario(comentario)) return;

    let data = {
        nombre: nombre,
        descripcion: descripcion,
        tipo: tipo,
        duracion_estimada: duracionEstimada.substring(0, 5),
        potencia_pct_min: Number(potenciaMinima).toFixed(2),
        potencia_pct_max: Number(potenciaMaxima).toFixed(2),
        pulso_pct_max: Number(pulsoPctMax).toFixed(2),
        pulso_reserva_pct: Number(pulsoReservaPct).toFixed(2),
        comentario: comentario,
    };

    let url = "/bloque/crear";

    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    fetch(url, {
        method: "POST",
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": token,
        },
        body: JSON.stringify(data),
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                mostrarMensaje(
                    "El bloque de entrenamiento ha sido creado correctamente.",
                    false,
                );
            } else {
                mostrarMensaje(
                    "Error al crear el bloque de entrenamiento",
                    true,
                );
            }
        })
        .catch((error) => {
            console.error(error);
            mostrarMensaje("Error de conexión con el servidor", true);
        });
}

function validarNombre(nombre) {
    if (!nombre || nombre.trim() === "") {
        mostrarMensaje("Error: El nombre es obligatorio.", true);
        return false;
    }
    return true;
}

function validarDescripcion(descripcion) {
    if (!descripcion || descripcion.trim() === "") {
        mostrarMensaje("Error: La descripción es obligatoria.", true);
        return false;
    }
    return true;
}

function validarDuracion(duracion) {
    if (!duracion) {
        mostrarMensaje("Error: La duración estimada es obligatoria.", true);
        document.getElementById("duracionEstimada").focus();
        return false;
    }
    return true;
}

function validarPotencia(valor, nombreCampo) {
    if (valor === "" || isNaN(valor)) {
        mostrarMensaje(
            `Error: La Potencia ${nombreCampo} es obligatoria y debe ser un número.`,
            true,
        );
        return false;
    }
    if (parseFloat(valor) < 0) {
        mostrarMensaje(
            `Error: La Potencia ${nombreCampo} no puede ser negativa.`,
            true,
        );
        return false;
    }
    return true;
}

function validarPorcentaje(valor, nombreCampo) {
    if (valor === "" || isNaN(valor)) {
        mostrarMensaje(
            `Error: El % ${nombreCampo} es obligatorio y debe ser un número.`,
            true,
        );
        return false;
    }
    let num = parseFloat(valor);
    if (num < 0 || num > 100) {
        mostrarMensaje(
            `Error: El % ${nombreCampo} debe estar entre 0 y 100.`,
            true,
        );
        return false;
    }
    return true;
}

function validarComentario(comentario) {
    if (!comentario || comentario.trim() === "") {
        mostrarMensaje("Error: El comentario es obligatorio.", true);
        document.getElementById("comentario").focus();
        return false;
    }
    return true;
}

function mostrarMensaje(mensaje, error = false) {
    let divMensaje = document.getElementById("mensaje-container");
    divMensaje.textContent = mensaje;
    divMensaje.style.display = "block";

    if (error) {
        divMensaje.classList.add("error");
    } else {
        divMensaje.classList.remove("error");
    }
}
