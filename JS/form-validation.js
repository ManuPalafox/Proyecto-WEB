/*Conseguir arreglos de entradas*/
const inputs = document.querySelectorAll('.needs-validation');

//Definiciones de expresiones regulares
const expRegulares = {
  nombres: /^[a-zA-Z\u00C0-\u017F\s]+$/,
  curp: /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/,
  boleta: /(^(PE|PP|pe|pp)[0-9]{8}$)|(^[0-9]{10}$)/,
  cPostal: /^[0-9]{5}$/,
  numeroExt: /^[0-9]+$/,
  numeroInt: /^[0-9]*$/,
  tel: /^[0-9]{10}$/,
  email: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
  prom: /^([0-9](\.[0-9][0-9]?)?)$|^(10)$/
}

//Booleanos de campos que indica que un campo es valido (Declaraciones iniciales)
const campos = {
  Nombre_pila: false,
  A_paterno: false,
  A_materno: false,
  fecha_nac: false,
  Genero: true,
  Curp: false,
  Boleta:false,
  Alcaldia:false,
  Colonia:false,
  CP:false,
  calle:false,
  num_e:false,
  num_i:true,
  telefono:false,
  correo:false,
  esc_p: true,
  ent_p: true,
  promedio:false,
}


//Funcion para validar un campo mediante una expresion regular y modifica en los booleanos de 
const validarCampoExpReg = (regExp,input,campo) =>{
  if(regExp.test(input.value)){
    document.getElementById(`error-${campo}`).style.display = "none";
    campos[campo] = true;
  }
  else
  {
    document.getElementById(`error-${campo}`).style.display = "block";
    campos[campo] = false;
  }
}

//Función para validar un campo si esta vacio o no (se utilizaran en aquellos campos que no se necesite una expresión, osea las de selección)
const validarCampoLleno = (input,campo) => {
  if(input.value!=""){
    document.getElementById(`error-${campo}`).style.display = "none";
    campos[campo] = true;
  }else{
    document.getElementById(`error-${campo}`).style.display = "block";
    campos[campo] = false;
  }
}

//Funcion para validar todos los campos del formulario
const validarFormulario = (i) =>{
  switch(i.target.id){
    case "Nombre_pila":
      validarCampoExpReg(expRegulares.nombres,i.target,'Nombre_pila');
    break;
    case "A_paterno":
      validarCampoExpReg(expRegulares.nombres,i.target,'A_paterno');
    break;
    case "A_materno":
      validarCampoExpReg(expRegulares.nombres,i.target,'A_materno');
    break;
    case "fecha_nac":
      validarCampoLleno(i.target,'fecha_nac');
    break;
    case "Curp":
      validarCampoExpReg(expRegulares.curp,i.target,'Curp');
    break;
    case "Boleta":
      validarCampoExpReg(expRegulares.boleta,i.target,'Boleta');
    break;
    case "Alcaldia":
      validarCampoExpReg(expRegulares.nombres,i.target,'Alcaldia');
    break;
    case "Colonia":
      validarCampoLleno(i.target,'Colonia');
    break;
    case "CP":
      validarCampoExpReg(expRegulares.cPostal,i.target,'CP');
    break;
    case "calle":
      validarCampoLleno(i.target,'calle');
    break;
    case "num_e":
      validarCampoExpReg(expRegulares.numeroExt,i.target,'num_e');
    break;
    case "num_i":
      validarCampoExpReg(expRegulares.numeroInt,i.target,'num_i');
    break;
    case "telefono":
      validarCampoExpReg(expRegulares.tel,i.target,'telefono');
    break;
    case "esc_p_otro":
      validarCampoLleno(i.target,'esc_p_otro');
    break;
    case "correo":
      validarCampoExpReg(expRegulares.email,i.target,'correo');
    break;
    case "promedio":
      validarCampoExpReg(expRegulares.prom,i.target,'promedio');
    break;
  }
}


//Ejecutar eventos de validacion mientras se escribe
inputs.forEach((input)=>{
  input.addEventListener('keyup',validarFormulario);
  input.addEventListener('blur',validarFormulario);
})

/*Funcion para mostrar campo de "otros" en la opcion de escuela de procedencia*/
function mostrarCampo(name){
  if(name=='otro')document.getElementById('otrocampo').style.display="block";
  else document.getElementById('otrocampo').style.display = "none";
}

/*Funcion para ocultar campo de "otros" en la opcion de escuela de procedencia*/
function ocultarCampo(){
  document.getElementById('otrocampo').style.display = 'none';
}



Array.from(inputs).forEach(form => {
  form.addEventListener('submit',event =>{
    event.preventDefault();
    event.stopPropagation();

  })




})






















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
