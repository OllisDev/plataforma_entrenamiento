comenzar();

function comenzar() {
    mostrarOpciones();
    let btnCreateSesion = document.getElementById("btnCreateSesion");
    btnCreateSesion.addEventListener("click", function (e) {
        e.preventDefault();
        validarCrear();
    });
}

function mostrarOpciones() {
    let select = document.getElementById("select-plan");
    let url = "/plan/listar";

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
            defaultOption.text = "Seleccione un plan...";
            select.appendChild(defaultOption);

            if (data.success && data.plan && data.plan.length > 0) {
                data.plan.forEach((plan) => {
                    let option = document.createElement("option");
                    option.value = plan.id;
                    option.text = plan.nombre;
                    select.appendChild(option);
                });
            } else {
                let errorOption = document.createElement("option");
                errorOption.text = "No se encontraron planes";
                select.appendChild(errorOption);
            }
        })
        .catch((error) => {
            console.log(error);
        });
}

function validarCrear() {
    let select = document.getElementById("select-plan");
    let planId = select.value;

    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;
    let completada = document.getElementById("completada").checked;

    if (!validarPlan(planId)) return;
    if (!validarNombre(nombre)) return;
    if (!validarDescripcion(descripcion)) return;

    let data = {
        id_plan: planId,
        nombre: nombre,
        descripcion: descripcion,
        completada: completada,
    };

    let url = "/sesion/crear";

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
                    "La sesión de entrenamiento ha sido creado correctamente.",
                    false,
                );
            } else {
                mostrarMensaje(
                    "Error al crear la sesión de entrenamiento",
                    true,
                );
            }
        })
        .catch((error) => {
            console.error(error);
            mostrarMensaje("Error de conexión con el servidor", true);
        });
}

function validarPlan(planId) {
    if (!planId || planId === "" || isNaN(planId)) {
        mostrarMensaje(
            "Error: Debes seleccionar un Plan de entrenamiento válido.",
            true,
        );
        document.getElementById("select-plan").focus();
        return false;
    }
    return true;
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
