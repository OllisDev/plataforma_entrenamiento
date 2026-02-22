comenzar();

function comenzar() {
    cargarTiposDeBicicleta();
    let btnCreateBicicleta = document.getElementById("btnCreateBicicleta");
    btnCreateBicicleta.addEventListener("click", function (e) {
        e.preventDefault();
        validarCrear();
    });
}

function cargarTiposDeBicicleta() {
    let tipos = ["carretera", "mtb", "gravel", "rodillo"];

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

    let selectTipo = document.getElementById("select-tipo");
    let tipo = selectTipo.value;

    let comentario = document.getElementById("comentario").value;

    if (!validarNombre(nombre)) return;
    if (!validarComentario(comentario)) return;

    let data = {
        nombre: nombre,
        tipo: tipo,
        comentario: comentario,
    };

    let url = "/bicicleta/crear";

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
                    "La bicicleta ha sido creada correctamente.",
                    false,
                );
            } else {
                mostrarMensaje("Error al crear la bicicleta.", true);
            }
        })
        .catch((error) => {
            console.error(error);
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
