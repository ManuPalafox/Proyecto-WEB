/*Funcion para mostrar campo de "otros" en la opcion de escuela de procedencia*/
function mostrarCampo(name){
  if(name=='otro')document.getElementById('otrocampo').style.display="block";
  else document.getElementById('otrocampo').style.display = "none";
}

/*Funcion para ocultar campo de "otros" en la opcion de escuela de procedencia*/
function ocultarCampo(){
  document.getElementById('otrocampo').style.display = 'none';
}

// // Example starter JavaScript for disabling form submissions if there are invalid fields
// (() => {
//   'use strict'

//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   const forms = document.querySelectorAll('.needs-validation')

//   // Loop over them and prevent submission
//   Array.from(forms).forEach(form => {
//     form.addEventListener('submit', event => {
//       if (!form.checkValidity()) {
//         event.preventDefault()
//         event.stopPropagation()
//       }

//       form.classList.add('was-validated')
//     }, false)
//   })
// })()
