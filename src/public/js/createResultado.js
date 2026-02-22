comenzar();

function comenzar() {
    mostrarOpcionesBicicleta();
    mostrarOpcionesSesion();
    let btnCreateResultado = document.getElementById("btnCreateResultado");
    btnCreateResultado.addEventListener("click", function (e) {
        e.preventDefault();
        validarCrear();
    });
}

function mostrarOpcionesBicicleta() {
    let select = document.getElementById("select-bicicleta");
    let url = "/api/bicicleta";
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    select.innerHTML = "";

    fetch(url, {
        method: "GET",
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": token,
        },
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            select.innerHTML = "";

            let defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.text = "Seleccione una bicicleta...";
            select.appendChild(defaultOption);

            if (data.success && data.bicicletas && data.bicicletas.length > 0) {
                data.bicicletas.forEach((bicicleta) => {
                    let option = document.createElement("option");
                    option.value = bicicleta.id;
                    option.text = bicicleta.nombre;
                    select.appendChild(option);
                });
            } else {
                let errorOption = document.createElement("option");
                errorOption.text = "No se encontraron bicicletas";
                select.appendChild(errorOption);
            }
        })
        .catch((error) => {
            console.log(error);
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

function validarCrear() {
    let ciclistaId = document.getElementById("ciclistaId").value;
    let selectBicicleta = document.getElementById("select-bicicleta");
    let bicicletaId = selectBicicleta.value;

    let selectSesion = document.getElementById("select-sesion");
    let sesion = selectSesion.value;

    let fecha = document.getElementById("fecha").value;
    let duracion = document.getElementById("duracion").value;
    let kilometros = document.getElementById("kilometros").value;
    let recorrido = document.getElementById("recorrido").value;
    let pulsoMedio = document.getElementById("pulsoMedio").value;
    let pulsoMaximo = document.getElementById("pulsoMaximo").value;
    let potenciaMedia = document.getElementById("potenciaMedia").value;
    let potenciaNormalizada = document.getElementById(
        "potenciaNormalizada",
    ).value;
    let velocidadMedia = document.getElementById("velocidadMedia").value;
    let puntosEstres = document.getElementById("puntosEstres").value;
    let factorIntensidad = document.getElementById("factorIntensidad").value;
    let ascensoMetros = document.getElementById("ascensoMetros").value;
    let comentario = document.getElementById("comentario").value;

    if (!validarBicicleta(bicicletaId)) return;
    if (!validarSesion(sesion)) return;
    if (!validarFecha(fecha)) return;
    if (!validarDuracion(duracion)) return;
    if (!validarKilometros(kilometros)) return;
    if (!validarRecorrido(recorrido)) return;
    if (!validarPulsoMedio(pulsoMedio)) return;
    if (!validarPulsoMaximo(pulsoMaximo)) return;
    if (!validarPotenciaMedia(potenciaMedia)) return;
    if (!validarPotenciaNormalizada(potenciaNormalizada)) return;
    if (!validarVelocidadMedia(velocidadMedia)) return;
    if (!validarPuntosEstres(puntosEstres)) return;
    if (!validarFactorIntensidad(factorIntensidad)) return;
    if (!validarAscensoMetros(ascensoMetros)) return;
    if (!validarComentario(comentario)) return;

    let data = {
        id_ciclista: ciclistaId,
        id_bicicleta: bicicletaId,
        id_sesion: sesion,
        fecha: fecha,
        duracion: duracion.length === 5 ? duracion + ":00" : duracion,
        kilometros: kilometros,
        recorrido: recorrido,
        pulso_medio: pulsoMedio,
        pulso_max: pulsoMaximo,
        potencia_media: potenciaMedia,
        potencia_normalizada: potenciaNormalizada,
        velocidad_media: velocidadMedia,
        puntos_estres_tss: puntosEstres,
        factor_intensidad_if: factorIntensidad,
        ascenso_metros: ascensoMetros,
        comentario: comentario,
    };

    let url = "/resultado/crear";

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
                    "El resultado de entrenamiento ha sido creado correctamente.",
                    false,
                );
            } else {
                mostrarMensaje(
                    "Error al crear el resultado de entrenamiento",
                    true,
                );
            }
        })
        .catch((error) => {
            console.error(error);
            mostrarMensaje("Error de conexión con el servidor", true);
        });
}

function validarBicicleta(bicicletaId) {
    if (!bicicletaId || bicicletaId === "" || isNaN(bicicletaId)) {
        mostrarMensaje("Error: Debes seleccionar una bicicleta válida.", true);
        document.getElementById("select-bicicleta").focus();
        return false;
    }
    return true;
}

function validarSesion(sesionId) {
    if (!sesionId || sesionId === "" || isNaN(sesionId)) {
        mostrarMensaje("Error: Debes seleccionar una sesión válida.", true);
        document.getElementById("select-sesion").focus();
        return false;
    }
    return true;
}

function validarFecha(fecha) {
    if (!fecha) {
        mostrarMensaje("Debes ingresar una fecha.", true);
        return false;
    }
    return true;
}

function validarDuracion(duracion) {
    if (!duracion) {
        mostrarMensaje("Debes ingresar la duración.", true);
        return false;
    }
    return true;
}

function validarKilometros(kilometros) {
    if (!kilometros || isNaN(kilometros) || kilometros <= 0) {
        mostrarMensaje(
            "Debes ingresar los kilómetros recorridos (mayor a 0).",
            true,
        );
        return false;
    }
    return true;
}

function validarRecorrido(recorrido) {
    if (!recorrido) {
        mostrarMensaje("Debes ingresar el recorrido.", true);
        return false;
    }
    return true;
}

function validarPulsoMedio(pulsoMedio) {
    if (!pulsoMedio || isNaN(pulsoMedio) || pulsoMedio <= 0) {
        mostrarMensaje("Debes ingresar el pulso medio (mayor a 0).", true);
        return false;
    }
    return true;
}

function validarPulsoMaximo(pulsoMaximo) {
    if (!pulsoMaximo || isNaN(pulsoMaximo) || pulsoMaximo <= 0) {
        mostrarMensaje("Debes ingresar el pulso máximo (mayor a 0).", true);
        return false;
    }
    return true;
}

function validarPotenciaMedia(potenciaMedia) {
    if (!potenciaMedia || isNaN(potenciaMedia) || potenciaMedia <= 0) {
        mostrarMensaje("Debes ingresar la potencia media (mayor a 0).", true);
        return false;
    }
    return true;
}

function validarPotenciaNormalizada(potenciaNormalizada) {
    if (
        !potenciaNormalizada ||
        isNaN(potenciaNormalizada) ||
        potenciaNormalizada <= 0
    ) {
        mostrarMensaje(
            "Debes ingresar la potencia normalizada (mayor a 0).",
            true,
        );
        return false;
    }
    return true;
}

function validarVelocidadMedia(velocidadMedia) {
    if (!velocidadMedia || isNaN(velocidadMedia) || velocidadMedia <= 0) {
        mostrarMensaje("Debes ingresar la velocidad media (mayor a 0).", true);
        return false;
    }
    return true;
}

function validarPuntosEstres(puntosEstres) {
    if (!puntosEstres || isNaN(puntosEstres) || puntosEstres < 0) {
        mostrarMensaje("Debes ingresar los puntos de estrés (0 o más).", true);
        return false;
    }
    return true;
}

function validarFactorIntensidad(factorIntensidad) {
    if (!factorIntensidad || isNaN(factorIntensidad) || factorIntensidad <= 0) {
        mostrarMensaje(
            "Debes ingresar el factor de intensidad (mayor a 0).",
            true,
        );
        return false;
    }
    return true;
}

function validarAscensoMetros(ascensoMetros) {
    if (!ascensoMetros || isNaN(ascensoMetros) || ascensoMetros < 0) {
        mostrarMensaje("Debes ingresar el ascenso en metros (0 o más).", true);
        return false;
    }
    return true;
}

function validarComentario(comentario) {
    if (comentario.length > 255) {
        mostrarMensaje("El comentario no puede superar 255 caracteres.", true);
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
