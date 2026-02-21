comenzar();

function comenzar() {
    mostrarOpcionesSesion();
    mostrarOpcionesBloque();

    let btnCreateSesionBloque = document.getElementById(
        "btnCreateSesionBloque",
    );
    btnCreateSesionBloque.addEventListener("click", function (e) {
        e.preventDefault();
        validarCrear();
    });
}

function mostrarOpcionesSesion() {
    let select = document.getElementById("select-sesion");
    let url = "/sesion/listar";

    select.innerHTML = "";

    fetch(url, {
        method: "GET",
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            select.innerHTML = "";

            let defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.text = "Seleccione una sesión...";
            select.appendChild(defaultOption);

            if (data.success && data.sesion && data.sesion.length > 0) {
                data.sesion.forEach((sesion) => {
                    let option = document.createElement("option");
                    option.value = sesion.id;
                    option.text = sesion.nombre;
                    select.appendChild(option);
                });
            } else {
                let errorOption = document.createElement("option");
                errorOption.text = "No se encontraron sesiones";
                select.appendChild(errorOption);
            }
        })
        .catch((error) => {
            console.log(error);
        });
}

function mostrarOpcionesBloque() {
    let select = document.getElementById("select-bloque");
    let url = "/bloque/listar";

    select.innerHTML = "";

    fetch(url, {
        method: "GET",
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            select.innerHTML = "";

            let defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.text = "Seleccione un bloque...";
            select.appendChild(defaultOption);

            if (data.success && data.bloques && data.bloques.length > 0) {
                data.bloques.forEach((bloque) => {
                    let option = document.createElement("option");
                    option.value = bloque.id;
                    option.text = bloque.nombre;
                    select.appendChild(option);
                });
            } else {
                let errorOption = document.createElement("option");
                errorOption.text = "No se encontraron bloques";
                select.appendChild(errorOption);
            }
        })
        .catch((error) => {
            console.log(error);
        });
}

function validarCrear() {
    let selectSesion = document.getElementById("select-sesion");
    let sesionId = selectSesion.value;

    let selectBloque = document.getElementById("select-bloque");
    let bloqueId = selectBloque.value;

    let orden = document.getElementById("orden").value.trim();
    let repeticiones = document.getElementById("repeticiones").value.trim();

    if (!validarSesion(sesionId)) return;
    if (!validarBloque(bloqueId)) return;

    if (!validarOrden(orden)) return;
    if (!validarRepeticiones(repeticiones)) return;

    let data = {
        id_sesion_entrenamiento: sesionId,
        id_bloque_entrenamiento: bloqueId,
        orden: orden,
        repeticiones: repeticiones,
    };

    let url = "/sesionBloque/crear";

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
                    "La sesión de bloque ha sido creada correctamente.",
                    false,
                );
            } else {
                mostrarMensaje("Error al crear la sesión de bloque", true);
            }
        })
        .catch((error) => {
            console.error(error);
            mostrarMensaje("Error de conexión con el servidor", true);
        });
}

function validarSesion(sesionId) {
    if (!sesionId || sesionId === "" || isNaN(sesionId)) {
        mostrarMensaje("Error: Debes seleccionar una Sesión válida.", true);
        document.getElementById("select-sesion").focus();
        return false;
    }
    return true;
}

function validarBloque(bloqueId) {
    if (!bloqueId || bloqueId === "" || isNaN(bloqueId)) {
        mostrarMensaje("Error: Debes seleccionar un Bloque válido.", true);
        document.getElementById("select-bloque").focus();
        return false;
    }
    return true;
}

function validarOrden(orden) {
    if (orden === "" || isNaN(orden)) {
        mostrarMensaje("El 'Orden' debe ser mayor a 0.", true);
        orden.focus();
        return false;
    }
    return true;
}

function validarRepeticiones(repeticiones) {
    if (repeticiones === "" || isNaN(repeticiones)) {
        mostrarMensaje(
            "El campo 'Repeticiones' es obligatorio y debe ser un número.",
            true,
        );
        repeticiones.focus();
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
