
document.addEventListener('DOMContentLoaded', function () {
    // Validar límite asegurado
    const inputLimite = document.getElementById('limite_asegurado');
    inputLimite.addEventListener('input', function () {
        if (parseInt(this.value) < 100000000) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });

    // Validación del formulario antes de enviar
    document.querySelector('form').addEventListener('submit', function (e) {
        const limite = parseInt(inputLimite.value);
        if (limite < 100000000) {
            e.preventDefault();
            alert('El límite asegurado debe ser mínimo de 100 millones (100,000,000).');
            inputLimite.focus();
        }

        // Validación para dirección con nomenclatura tipo "Cra 10 #12-34"
        const direccion = document.querySelector('input[name="direccion"]');
        const direccionRegex = /^(Calle|Cra|Carrera|Av|Avenida|Diagonal|Transversal)\s\d+\s?#?\d+-\d+/;
        if (!direccionRegex.test(direccion.value)) {
            e.preventDefault();
            alert('La dirección debe tener una nomenclatura válida, por ejemplo: Cra 12 #34-56');
            direccion.focus();
        }
    });
});
