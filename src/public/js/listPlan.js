comenzar();

function comenzar() {
    listarPlanes();
}

function listarPlanes() {
    let url = "/plan/listar";
    fetch(url, {
        method: "GET",
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            crearTabla(data.plan);
            setTimeout(listarPlanes, 60000); // refresca la tabla cada 60 segundos sin que el usuario tenga que recargar la pagina
        })
        .catch((error) => {
            console.log(error);
            alert("Error al conectar con el servidor");
        });
}

function crearTabla(planes) {
    let divTable = document.getElementById("table-plan");

    // verificar si el elemento no existe y si no existe se sale para que el programa detecte que ya no estamos interactuando con la tabla
    if (!divTable) {
        return;
    }

    divTable.innerHTML = "";

    let table = document.createElement("table");
    table.setAttribute("class", "table-style");

    let thead = document.createElement("thead");
    let trHead = document.createElement("tr");

    [
        "Nombre",
        "Descripción",
        "Inicio",
        "Fin",
        "Objetivo",
        "Activo",
        "Acciones",
    ].forEach((col) => {
        let th = document.createElement("th");
        th.textContent = col;
        trHead.appendChild(th);
    });
    thead.appendChild(trHead);
    table.appendChild(thead);

    let tbody = document.createElement("tbody");

    planes.forEach((plan) => {
        let tr = document.createElement("tr");

        let datos = [
            plan.nombre,
            plan.descripcion,
            plan.fecha_inicio,
            plan.fecha_fin,
            plan.objetivo,
            plan.activo ? "Si" : "No",
        ];

        datos.forEach((texto) => {
            let td = document.createElement("td");
            td.textContent = texto;
            tr.appendChild(td);
        });

        let tdAcciones = document.createElement("td");

        let btnEditar = document.createElement("a");
        btnEditar.href = `/plan/${plan.id}/editar`;
        btnEditar.className = "btn btn-warning btn-sm";
        btnEditar.textContent = "Editar";
        tdAcciones.appendChild(btnEditar);

        tdAcciones.appendChild(document.createElement("br"));

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
            if (typeof eliminarPlan === "function") {
                eliminarPlan(plan.id, this);
            } else {
                console.error("Función eliminarPlan no definida");
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
