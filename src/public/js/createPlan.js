comenzar();

function comenzar() {
    let btnCreatePlan = document.getElementById("btnCreatePlan");
    btnCreatePlan.addEventListener("click", function (e) {
        e.preventDefault();
        validarCrear();
    });
}

function validarCrear() {
    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;
    let objetivo = document.getElementById("objetivo").value;
    let fechaInicio = document.getElementById("fechaInicio").value;
    let fechaFin = document.getElementById("fechaFin").value;
    let activo = document.getElementById("activo").checked;

    if (!validarNombre(nombre)) return;
    if (!validarDescripcion(descripcion)) return;
    if (!validarObjetivo(objetivo)) return;
    if (!validarFechas(fechaInicio, fechaFin)) return;

    let data = {
        nombre: nombre,
        descripcion: descripcion,
        objetivo: objetivo,
        fecha_inicio: fechaInicio,
        fecha_fin: fechaFin,
        activo: activo,
    };

    let url = "/plan/crear";

    fetch(url, {
        method: "POST",
        headers: {
            "Content-type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
        body: JSON.stringify(data),
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                mostrarMensaje(
                    "El plan de entrenamiento ha sido creado correctamente.",
                    false,
                );
            } else {
                mostrarMensaje(
                    "Error al crear el plan de entrenamiento",
                    false,
                );
            }
        })
        .catch(() => {
            mostrarMensaje("Error de conexión con el servidor.", true);
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

function validarObjetivo(objetivo) {
    if (!objetivo || objetivo.trim() === "") {
        mostrarMensaje("Error: El objetivo es obligatorio.", true);
        return false;
    }
    return true;
}

function validarFechas(inicio, fin) {
    if (!inicio) {
        mostrarMensaje("Error: La fecha de inicio es obligatoria.", true);
        return false;
    }
    if (!fin) {
        mostrarMensaje("Error: La fecha de fin es obligatoria.", true);
        return false;
    }

    const dInicio = new Date(inicio);
    const dFin = new Date(fin);

    if (dInicio > dFin) {
        mostrarMensaje(
            "Error: La fecha de inicio no puede ser posterior a la fecha de fin.",
            true,
        );
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
