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
        listarResultados();

        // actualizar tabla cada minuto sin que el usuario tenga que recargar la pagina
        setInterval(() => {
            offset = 0;
            hayMasDatos = true;
            cargando = false;
            listarResultados();
        }, 60000);
    }

    function scroll() {
        let divTable = document.getElementById("table-resultado");
        if (divTable) {
            divTable.addEventListener("scroll", function () {
                if (
                    divTable.scrollTop + divTable.clientHeight >=
                    divTable.scrollHeight - 10
                ) {
                    listarResultados();
                }
            });
        }
    }

    function listarResultados() {
        let ciclistaId = document.getElementById("ciclistaId")?.value;
        if (cargando || !hayMasDatos) return;

        cargando = true;

        let token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        let url = `/resultado/ciclista/${ciclistaId}?offset=${offset}&limit=${limit}`;
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
                if (!data.resultados || data.resultados.length === 0) {
                    hayMasDatos = false;
                    return;
                }

                if (offset === 0) {
                    crearTabla();
                }
                agregarFilas(data.resultados);

                if (data.resultados.length < limit) {
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
        let divTable = document.getElementById("table-resultado");
        if (!divTable) {
            return;
        }
        divTable.innerHTML = "";

        let table = document.createElement("table");
        table.setAttribute("class", "table-style");

        let thead = document.createElement("thead");
        let trHead = document.createElement("tr");

        [
            "Fecha",
            "Duracion",
            "Kilometros",
            "Recorrido",
            "Pulso medio",
            "Pulso máximo",
            "Potencia media",
            "Potencia normalizada",
            "Velocidad media",
            "Puntos estres",
            "Intensidad",
            "Ascenso",
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

    function agregarFilas(resultados) {
        let tbody = document.getElementById("tbody");
        if (!tbody) {
            return;
        }

        resultados.forEach((resultado) => {
            let tr = document.createElement("tr");

            let datos = [
                resultado.fecha,
                resultado.duracion,
                resultado.kilometros,
                resultado.recorrido,
                resultado.pulso_medio,
                resultado.pulso_max,
                resultado.potencia_media,
                resultado.potencia_normalizada,
                resultado.velocidad_media,
                resultado.puntos_estres_tss,
                resultado.factor_intensidad_if,
                resultado.ascenso_metros,
                resultado.comentario,
            ];

            datos.forEach((texto) => {
                let td = document.createElement("td");
                td.textContent = texto;
                tr.appendChild(td);
            });

            let tdAcciones = document.createElement("td");

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
                if (typeof eliminarResultado === "function") {
                    eliminarResultado(resultado.id, this);
                } else {
                    console.error("Función eliminarResultado no definida");
                }
            };

            formEliminar.appendChild(btnEliminar);
            tdAcciones.appendChild(formEliminar);

            tr.appendChild(tdAcciones);
            tbody.appendChild(tr);
        });
    }
})();
