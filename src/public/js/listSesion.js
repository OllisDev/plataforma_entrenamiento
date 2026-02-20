comenzar();

function comenzar() {
    listarSesiones();
}

function listarSesiones() {
    let url = "/sesion/listar";
    fetch(url, {
        method: "GET",
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            crearTabla(data.sesion);
            setTimeout(listarSesiones, 60000); // refresca la tabla cada 60 segundos sin que el usuario tenga que recargar la pagina
        })
        .catch((error) => {
            console.log(error);
            alert("Error al conectar con el servidor");
        });
}

function crearTabla(sesiones) {
    let divTable = document.getElementById("table-sesion");

    // verificar si el elemento no existe y si no existe se sale para que el programa detecte que ya no estamos interactuando con la tabla
    if (!divTable) {
        return;
    }

    divTable.innerHTML = "";

    let table = document.createElement("table");
    table.setAttribute("class", "table-style");

    let thead = document.createElement("thead");
    let trHead = document.createElement("tr");

    ["Nombre", "Descripción", "Completada", "Acciones"].forEach((col) => {
        let th = document.createElement("th");
        th.textContent = col;
        trHead.appendChild(th);
    });
    thead.appendChild(trHead);
    table.appendChild(thead);

    let tbody = document.createElement("tbody");

    sesiones.forEach((sesion) => {
        let tr = document.createElement("tr");

        let datos = [sesion.nombre, sesion.descripcion, sesion.completada];

        datos.forEach((texto) => {
            let td = document.createElement("td");
            td.textContent = texto;
            tr.appendChild(td);
        });

        let tdAcciones = document.createElement("td");

        let formEliminar = document.createElement("form");
        formEliminar.setAttribute("id", "form");
        formEliminar.style.display = "inline";

        let csrfToken = document.querySelector(
            'meta[name="csrf-token"]',
        )?.content;
        if (csrfToken) {
            let inputCsrf = document.createElement("input");
            inputCsrf.type = "hidden";
            inputCsrf.name = "_token";
            inputCsrf.value = csrfToken;
            formEliminar.appendChild(inputCsrf);
        }

        let btnEliminar = document.createElement("input");
        btnEliminar.type = "button";
        btnEliminar.className = "btn btn-danger btn-sm btnEliminar";
        btnEliminar.value = "Eliminar";

        btnEliminar.onclick = function () {
            if (typeof eliminarSesion === "function") {
                eliminarSesion(sesion.id, this);
            } else {
                console.error("Función eliminarSesion no definida");
            }
        };

        formEliminar.appendChild(btnEliminar);
        tdAcciones.appendChild(formEliminar);

        tr.appendChild(tdAcciones);
        tbody.appendChild(tr);
    });

    table.appendChild(tbody);
    divTable.appendChild(table);
}
