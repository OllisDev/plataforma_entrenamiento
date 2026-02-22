// funcion anonima -> encapsular script para que Javascript no detecte duplicacion de variables
(() => {
    let offset = 0;
    const limit = 10;
    let cargando = false;
    let hayMasDatos = true;

    comenzar();

    function comenzar() {
        offset = 0;
        cargando = false;
        hayMasDatos = true;
        scroll();
        listarSesionesBloque();

        // actualizar tabla cada minuto sin que el usuario tenga que recargar la pagina
        setInterval(() => {
            offset = 0;
            hayMasDatos = true;
            cargando = false;
            listarSesionesBloque();
        }, 60000);
    }

    function scroll() {
        let divTable = document.getElementById("table-sesionBloque");
        if (divTable) {
            divTable.addEventListener("scroll", function () {
                if (
                    divTable.scrollTop + divTable.clientHeight >=
                    divTable.scrollHeight - 10
                ) {
                    listarSesionesBloque();
                }
            });
        }
    }

    function listarSesionesBloque() {
        if (cargando || !hayMasDatos) return;

        cargando = true;

        let url = `/sesionBloque/listar?offset=${offset}&limit=${limit}`;
        fetch(url, {
            method: "GET",
            headers: {
                "Content-type": "application/json",
                Accept: "application/json",
            },
        })
            .then((res) => res.json())
            .then((data) => {
                if (!data["sesion-plan"] || data["sesion-plan"].length === 0) {
                    hayMasDatos = false;
                    return;
                }

                if (offset === 0) {
                    crearTabla();
                }
                agregarFilas(data["sesion-plan"]);

                if (data["sesion-plan"].length < limit) {
                    hayMasDatos = false;
                }
                offset += limit;
            })
            .catch((error) => {
                console.log(error);
                alert("Error al conectar con el servidor");
            })
            .finally(() => {
                cargando = false;
            });
    }

    function crearTabla() {
        let divTable = document.getElementById("table-sesionBloque");

        // verificar si el elemento no existe y si no existe se sale para que el programa detecte que ya no estamos interactuando con la tabla
        if (!divTable) {
            return;
        }

        divTable.innerHTML = "";

        let table = document.createElement("table");
        table.setAttribute("class", "table-style");

        let thead = document.createElement("thead");
        let trHead = document.createElement("tr");

        ["Orden", "Repeticiones", "Acciones"].forEach((col) => {
            let th = document.createElement("th");
            th.textContent = col;
            trHead.appendChild(th);
        });
        thead.appendChild(trHead);
        table.appendChild(thead);

        let tbody = document.createElement("tbody");
        tbody.id = "tbody";

        table.appendChild(tbody);
        divTable.appendChild(table);
    }

    function agregarFilas(sesionesBloque) {
        let tbody = document.getElementById("tbody");
        if (!tbody) {
            return;
        }

        sesionesBloque.forEach((sb) => {
            let tr = document.createElement("tr");

            let datos = [sb.orden, sb.repeticiones];

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
                if (typeof eliminarSesionBloque === "function") {
                    eliminarSesionBloque(sb.id, this);
                } else {
                    console.error("Función eliminarSesionBloque no definida");
                }
            };

            formEliminar.appendChild(btnEliminar);
            tdAcciones.appendChild(formEliminar);

            tr.appendChild(tdAcciones);
            tbody.appendChild(tr);
        });
    }
})();
