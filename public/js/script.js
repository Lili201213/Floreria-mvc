document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("modalFormulario");

    const abrirFormulario = document.getElementById("abrirFormulario");

    const cerrarFormulario = document.getElementById("cerrarFormulario");

    const cancelarFormulario = document.getElementById("cancelarFormulario");


    // Abrir formulario
    abrirFormulario.addEventListener("click", function () {

        modal.classList.add("activo");

        modal.setAttribute("aria-hidden", "false");

        document.body.style.overflow = "hidden";

    });


    // Función para cerrar
    function cerrarModal() {

        modal.classList.remove("activo");

        modal.setAttribute("aria-hidden", "true");

        document.body.style.overflow = "";

    }


    // Cerrar con X
    cerrarFormulario.addEventListener("click", function () {

        cerrarModal();

    });


    // Cerrar con Cancelar
    cancelarFormulario.addEventListener("click", function () {

        cerrarModal();

    });


    // Cerrar haciendo clic fuera del formulario
    modal.addEventListener("click", function (evento) {

        if (evento.target === modal) {

            cerrarModal();

        }

    });


    // Cerrar presionando ESC
    document.addEventListener("keydown", function (evento) {

        if (
            evento.key === "Escape" &&
            modal.classList.contains("activo")
        ) {

            cerrarModal();

        }

    });

});