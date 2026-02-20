comenzar();

function comenzar() {
    let botonesEliminar = document.querySelectorAll(".btnEliminar");
    botonesEliminar.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();

            if (confirm("¿Quieres eliminar este plan de entrenamiento?")) {
                eliminarPlan();
            }
        });
    });
}

function eliminarPlan() {
    let planId = document.getElementById("form").dataset.planId;
    console.log(planId);

    let url = `/plan/${planId}/eliminar`;

    fetch(url, {
        method: "DELETE",
        headers: {
            "Content-type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            if (data.success) {
                alert("Plan eliminado correctamente.");
            } else {
                alert("Error al eliminar el plan de entrenamiento.");
            }
        })
        .catch((error) => {
            console.log(error);
            alert("Error de conexión con el servidor");
        });
}
