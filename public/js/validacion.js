var fechaPrestamoInput = document.getElementById("fecha-prestamo-input");
var fechaDevolucionInput = document.getElementById("fecha-devolucion-input");

// Obtener la fecha actual
var fechaActual = new Date();

// Formatear la fecha en el formato YYYY-MM-DD
var formatoFecha = fechaActual.toISOString().split("T")[0];

// Obtener el último día del mes actual
var ultimoDiaMes = new Date(fechaActual.getFullYear(), fechaActual.getMonth() + 1, 0);
var ultimoDiaMesFormato = ultimoDiaMes.toISOString().split("T")[0];

// Establecer el atributo "min" con la fecha actual para ambos campos
fechaPrestamoInput.min = formatoFecha;
fechaDevolucionInput.min = formatoFecha;

// Establecer el atributo "max" con el último día del mes actual para ambos campos
fechaPrestamoInput.max = ultimoDiaMesFormato;
fechaDevolucionInput.max = ultimoDiaMesFormato;


$(document).ready(function() {
    $("#formularioPrestamo").validate({
        rules: {
            nombreEstudiante: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            nombreLibro:{
                required: true,
                notEqualTo: ""
            },
            cantidadLibros: {
                required: true,
                min: 1,
            },
            fechaPrestamo: {
                required: true,
                date: true
            },
            fechaDevolucion: {
                required: true,
                date: true
            }, 
            estado:{
                required: true,
                notEqualTo: ""
            }
        },
        messages: {
            nombreEstudiante: {
                required: "*Por favor introduce el nombre del estudiante",
                minlength: "*El nombre debe contener al menos 3 caracteres",
                maxlength: "*El nombre contiene demasiados caracteres"
            },
            nombreLibro: {
                required: "*Por favor selecciona un libro",
                notEqualTo: "*Por favor selecciona una opción válida"
            },
            cantidadLibros: {
                required: "*Por favor escribe la cantidad",
                min: "*La cantidad debe ser mayor a 1"
            },
            fechaPrestamo: {
                required: "Por favor, ingresa la fecha de préstamo",
                date: "Por favor, ingresa una fecha válida"
            },
            fechaDevolucion: {
                required: "Por favor, ingresa la fecha de devolución",
                date: "Por favor, ingresa una fecha válida"
            },
            estado: {
                required: "*Por favor selecciona un estado",
                notEqualTo: "*Por favor selecciona una opción válida"
            }
        }
    });
});
  

