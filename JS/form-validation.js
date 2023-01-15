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
  prom: /^([6-9](\.[0-9][0-9]?)?)$|^(10)$/
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



const forms = document.querySelectorAll('.needs-validation')

//Evitar que se reinicie el formulario
Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
      event.preventDefault()
      event.stopPropagation()
  }, false)
})

function checkBeforeSend(){
  for(let key in campos){
    if(campos[key]==false){

    }
  }

  return;
}

//Funcion para validar un campo mediante una expresion regular y modifica en los booleanos de 
const validarCampoExpReg = (regExp,input,campo,errorHTML,canBeBlank) =>{
  if(input.value!=""){
    if(regExp.test(input.value)){
      document.getElementById(`error-${campo}`).style.display = "none";
      campos[campo] = true;
    }
    else
    {
      document.getElementById(`error-${campo}`).style.display = "block";
      document.getElementById(`error-${campo}`).innerHTML = errorHTML;
      campos[campo] = false;
    }
  }
  else
  {
    if(!canBeBlank){
      document.getElementById(`error-${campo}`).style.display = "block";
      document.getElementById(`error-${campo}`).innerHTML = "<p>Campo obligatorio<\p>"
      campos[campo] = false;
    }
    else{
      document.getElementById(`error-${campo}`).style.display = "none";
      campos[campo] = true;
    }
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

//Función para validar un campo de otro si esta vacio o no (se utilizaran en aquellos campos que no se necesite una expresión, osea las de selección)
const validarCampoOtro = (input,campo,campoalt) => {
  if(input.value!=""){
    document.getElementById(`error-${campo}`).style.display = "none";
    campos[campoalt] = true;
  }else{
    document.getElementById(`error-${campo}`).style.display = "block";
    campos[campoalt] = false;
  }
}

//Funcion para validar todos los campos del formulario
function validarFormulario(i){
  switch(i.target.id){
    case "Nombre_pila":
      validarCampoExpReg(expRegulares.nombres,i.target,'Nombre_pila',"<p>No se permiten caracteres especiales ni números<\p>",false);
    break;
    case "A_paterno":
      validarCampoExpReg(expRegulares.nombres,i.target,'A_paterno',"<p>No se permiten caracteres especiales ni números<\p>",false);
    break;
    case "A_materno":
      validarCampoExpReg(expRegulares.nombres,i.target,'A_materno',"<p>No se permiten caracteres especiales ni números<\p>",false);
    break;
    case "fecha_nac":
      validarCampoLleno(i.target,'fecha_nac');
    break;
    case "Curp":
      validarCampoExpReg(expRegulares.curp,i.target,'Curp',"<p>CURP Invalida, debe contener 18 caracteres y seguir las estructura correcta<\p>",false);
    break;
    case "Boleta":
      validarCampoExpReg(expRegulares.boleta,i.target,'Boleta',"<p>Numero de boleta no valida<\p>",false);
    break;
    case "Alcaldia":
      validarCampoExpReg(expRegulares.nombres,i.target,'Alcaldia',"<p>No se permiten caracteres especiales ni números<\p>",false);
    break;
    case "Colonia":
      validarCampoLleno(i.target,'Colonia');
    break;
    case "CP":
      validarCampoExpReg(expRegulares.cPostal,i.target,'CP',"<p>El codigo postal debe estar conformado solamente por numeros de 5 digitos<\p>",false);
    break;
    case "calle":
      validarCampoLleno(i.target,'calle');
    break;
    case "num_e":
      validarCampoExpReg(expRegulares.numeroExt,i.target,'num_e',"<p>Solamente se permiten numeros<\p>",false);
    break;
    case "num_i":
      validarCampoExpReg(expRegulares.numeroInt,i.target,'num_i',"<p>Solamente se permiten numeros<\p>",true);
    break;
    case "telefono":
      validarCampoExpReg(expRegulares.tel,i.target,'telefono',"<p>Solamente se aceptan números provenientes del estado Mexicano (el cual cuenta con 10 digitos)<\p>",false);
    break;
    case "esc_p_otro":
      validarCampoOtro(i.target,'esc_p_otro','esc_p');
    break;
    case "correo":
      validarCampoExpReg(expRegulares.email,i.target,'correo',"<p>Correo invalido<\p>",false);
    break;
    case "promedio":
      validarCampoExpReg(expRegulares.prom,i.target,'promedio',"<p>El rango del promedio es de 6 a 10 con un máximo de dos decimales<\p>",false);
    break;
  }
}

function validarFecha(){

  const input = document.getElementById('fecha_nac');

  if(input.value==""){
    document.getElementById('error-fecha_nac').style.display = "block";
    campos['fecha_nac'] = false;
    
  }else{
    document.getElementById('error-fecha_nac').style.display = "none";
    campos['fecha_nac'] = true;
  }

}

//Ejecutar eventos de validacion mientras se escribe
inputs.forEach((input)=>{
  input.addEventListener('keyup',validarFormulario);
  input.addEventListener('blur',validarFormulario);
  input.addEventListener('onchange',validarFormulario);
})


//Reiniciar formulario
function resetFormData(){
  ocultarCampo();
  for(let key in campos){
    console.log(key);
    if(key=='num_i' || key == 'esc_p' || key == 'ent_p'){
      campos[key]=true;
      if(document.getElementById(`error-${key}`)!=null){
        document.getElementById(`error-${key}`).style.display = "none";
      }
      
    }
    else
    {
      campos[key]=false;
      if(document.getElementById(`error-${key}`)!=null){
        document.getElementById(`error-${key}`).style.display = "block";
        document.getElementById(`error-${key}`).innerHTML = "<p>Campo obligatorio<\p>"
      }

      
    }

  }

}


/*Funcion para mostrar campo de "otros" en la opcion de escuela de procedencia*/
function mostrarCampo(name){
  if(name=='otro'){
    document.getElementById('otrocampo').style.display="block";
    validarCampoOtro(document.getElementById('esc_p_otro'),'esc_p_otro','esc_p');
    document.getElementById('error-esc_p_otro').innerHTML = "<p>Campo obligatorio<\p>"
  }
  else{
    document.getElementById('otrocampo').style.display = "none";
    document.getElementById('error-esc_p_otro').style.display="none";
    campos.esc_p = true;
  }
   
}


/*Funcion para ocultar campo de "otros" en la opcion de escuela de procedencia*/
function ocultarCampo(){
  document.getElementById('otrocampo').style.display = 'none';
}
