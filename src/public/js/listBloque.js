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
        listarBloques();

        // actualizar tabla cada minuto sin que el usuario tenga que recargar la pagina
        setInterval(() => {
            offset = 0;
            hayMasDatos = true;
            cargando = false;
            listarBloques();
        }, 60000);
    }

    function scroll() {
        let divTable = document.getElementById("table-bloque");
        if (divTable) {
            divTable.addEventListener("scroll", function () {
                console.log("scroll event fired");
                if (
                    divTable.scrollTop + divTable.clientHeight >=
                    divTable.scrollHeight - 10
                ) {
                    listarBloques();
                }
            });
        }
    }

    function listarBloques() {
        if (cargando || !hayMasDatos) return;

        cargando = true;

        let url = `/bloque/listar?offset=${offset}&limit=${limit}`;

        fetch(url, {
            method: "GET",
            headers: {
                "Content-type": "application/json",
                Accept: "application/json",
            },
        })
            .then((res) => res.json())
            .then((data) => {
                if (!data.bloques || data.bloques.length === 0) {
                    hayMasDatos = false;
                    return;
                }

                if (offset === 0) {
                    crearTabla();
                }
                agregarFilas(data.bloques);

                if (data.bloques.length < limit) {
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
        let divTable = document.getElementById("table-bloque");

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
            "Tipo",
            "Duración",
            "Potencia Min %",
            "Potencia Max %",
            "Pulso %",
            "Comentario",
            "Acciones",
        ].forEach((col) => {
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

    function agregarFilas(bloques) {
        let tbody = document.getElementById("tbody");
        if (!tbody) {
            return;
        }

        bloques.forEach((bloque) => {
            let tr = document.createElement("tr");

            let datos = [
                bloque.nombre,
                bloque.descripcion,
                bloque.tipo,
                bloque.duracion_estimada,
                bloque.potencia_pct_min,
                bloque.potencia_pct_max,
                bloque.pulso_pct_max,
                bloque.comentario,
            ];

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
                if (typeof eliminarBloque === "function") {
                    eliminarBloque(bloque.id, this);
                } else {
                    console.error("Función eliminarBloque no definida");
                }
            };

            formEliminar.appendChild(btnEliminar);
            tdAcciones.appendChild(formEliminar);

            tr.appendChild(tdAcciones);
            tbody.appendChild(tr);
        });
    }
})();
