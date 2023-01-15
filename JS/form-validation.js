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

//Diccionaro de booleanos de campos que indica que un campo es valido (Declaraciones iniciales)
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

//Diccionario de datos de entrada registrados
const registros = {
  Nombre_pila:"",
  A_paterno:"",
  A_materno:"",
  fecha_nac:"",
  Genero:"",
  Curp:"",
  Boleta:"",
  Alcaldia:"",
  Colonia:"",
  CP:"",
  calle:"",
  num_e:"",
  num_i:"",
  telefono:"",
  correo:"",
  esc_p:"",
  ent_p:"",
  promedio:"",
}


//Checar antes de enviar y guardar los datos en el diccionario de registros
function checkBeforeSend(){

//Verificar que todos los campos sean validos
  for(let key in campos){
    if(campos[key]==false){
      //Si hay algun dato que no es valida envia un mensaje para avisarle al usuario y termina la ejecucón
      $('#incorrectPopUp').modal('toggle');
      return; 
    }
  }

   //Guardar los datos en el diccionario de registros cuando todos los datos sean validos
   let container = document.getElementById('formularioDatos');
   let inputs = container.getElementsByTagName('input');
 
   //Guardar los datos de inputs libre
   for(let i = 0;i < inputs.length;i++){
     if(inputs[i].id!='esc_p_otro'){
       registros[`${inputs[i].id}`] = inputs[i].value;
     }
   }
 
   //Guardar los datos de seleccion de genero
   let genero = document.getElementById("GeneroSelect");
 
   registros.Genero = genero.options[genero.selectedIndex].text;
 
   //Guardar los datos de seleccion de entidad
   let entidad = document.getElementById("ent_p");
   registros.ent_p = entidad.options[entidad.selectedIndex].text;
 
    //Guardar los datos de seleccion de escuela de procedencia
     let escproc = document.getElementById("esc_p");
     
     if(document.getElementById('otrocampo').style.display == "none"){
       registros.esc_p = escproc.options[escproc.selectedIndex].text;
     }
     else
     {
       registros.esc_p = document.getElementById('esc_p_otro').value;
     }
 
    //Cambiar texto del modal
    let modalContainer = document.getElementById('correctPopUp');
    let modalBody = modalContainer.getElementsByClassName('modal-body');

    let bodyData = 
    `<b>Nombre(s):</b> ${registros.Nombre_pila}<br>
    <b>Apellido Paterno:</b> ${registros.A_paterno}<br>
    <b>Apellido Materno:</b> ${registros.A_materno}<br>
    <b>Fecha de Nacimiento:</b> ${registros.fecha_nac}<br>
    <b>Genero:</b> ${registros.Genero}<br>
    <b>CURP:</b> ${registros.Curp}<br>
    <b>No. De boleta:</b> ${registros.Boleta}<br>
    <b>Alcaldia o Municipio:</b> ${registros.Alcaldia}<br>
    <b>Colonia:</b> ${registros.Colonia}<br>
    <b>Codigo Postal:</b> ${registros.CP}<br>
    <b>Calle:</b> ${registros.calle}<br>
    <b>No.Exterior:</b> ${registros.num_e}<br>
    <b>No.Interior:</b> ${registros.num_i}<br>
    <b>Teléfono:</b> ${registros.telefono}<br>
    <b>Correo electrónico:</b> ${registros.correo}<br>
    <b>Escuela de procedencia:</b> ${registros.esc_p}<br>
    <b>Entidad de procedencia:</b> ${registros.ent_p}<br>
    <b>Promedio:</b> ${registros.promedio}<br>
    `
      
    modalBody[0].innerHTML = `Hola ${registros.Nombre_pila} ${registros.A_paterno} ${registros.A_materno} verifica que los datos que ingresaste sean correctos:<br>`+bodyData;
      
      
    //Mostrar ventana de confirmacion
    $('#correctPopUp').modal('toggle');


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
      validarCampoLleno(i.target,'Alcaldia');
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
    if(key=='num_i' || key == 'esc_p' || key == 'ent_p' || key == 'Genero'){
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

//Función para enviar el diccionario de registros al servidor
function submitForm(){
  let form = document.getElementById("formularioDatos");
  form.submit();
}
