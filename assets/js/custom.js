var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

function loginfunction(){
  
  var user1 = Base64.encode(document.getElementById("usuario").value.toLowerCase());
  var pass1 = Base64.encode(document.getElementById("contra").value.toLowerCase());

    var type = document.getElementById("tipo").value;
    var user = document.getElementById("usuario").value;
    var pass = document.getElementById("contra").value;
    // var user1 = CryptoJS.AES.encrypt(document.getElementById("usuario").value.toString(), "sicretki").toString();
    // var pass1 = CryptoJS.AES.encrypt(document.getElementById("contra").value.toString(), "sicretki").toString();
    if(user == '' || pass == '' || type == ''){
      if(user == '' && pass == '' && type == ''){
        Swal({
          type: 'error',
          title: 'Oops...',
          text: 'No ha ingresado ningún dato'
        })
      }else if(user == '' && pass == '' && type != ''){
        Swal({
          type: 'error',
          title: 'Oops...',
          text: 'Falta usuario y contraseña'
        })
      }else if(user == '' && pass != '' && type == ''){
        Swal({
          type: 'error',
          title: 'Oops...',
          text: 'Falta tipo y usuario'
        })
      }else if(user != '' && pass == '' && type == ''){
        Swal({
          type: 'error',
          title: 'Oops...',
          text: 'Falta tipo y contraseña'
        })
      }else if(user != '' && pass != '' && type == ''){
        Swal({
          type: 'error',
          title: 'Oops...',
          text: 'Falta tipo'
        })
      }else if(user == '' && pass != '' && type != ''){
        Swal({
          type: 'error',
          title: 'Oops...',
          text: 'Falta usuario'
        })
      }else if(user != '' && pass == '' && type != ''){
        Swal({
          type: 'error',
          title: 'Oops...',
          text: 'Falta contraseña'
        })
      }
    }else{
      if(type == 'Maestro'){
        var logeo = {
          user: user1,
          pass: pass1,
          type:2
        };
      }else if(type == 'Alumno'){
        var logeo = {
          user: user1,
          pass: pass1,
          type:1
        };      
      }
      var request = new XMLHttpRequest();
      request.open('GET', 'assets/php/login.php?afdsaw=' +JSON.stringify(logeo));
      request.setRequestHeader("Content-type", "application/json");
      request.onload = function () {
        if(request.status === 200){
          if(request.responseText == '1'){
            sessionStorage.setItem("Usuario",user);
            sessionStorage.setItem("Tipo",logeo.type);
            window.open('./dashboard',"_self");
          }else{
            Swal({
              type: 'error',
              title: 'Error',
              text: 'Los datos que ingreso son erroneos'
            })
          }
        }else{
          console.log('Error');
        }
      }
      request.send();
      console.log(request);
    }
}

function bienvenido(){
  $.ajax({
    url: '../assets/php/bienvenido.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario")), type:sessionStorage.getItem("Tipo")},
    dataType: 'json',
    success: function(output_string){
            $('#Bienvenido').html('');
            $('#Bienvenido').append(output_string);
     } 
    });
    if(sessionStorage.getItem("Tipo") == 1){
      $('#texttipo').html('');
      $('#texttipo').append("| Alumnos");
    }else{
      $('#texttipo').html('');
      $('#texttipo').append("| Maestros");
    }
}

function logout(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open('GET','../assets/php/destroy_session.php', true);
  xmlhttp.onreadystatechange=function(){
     if (xmlhttp.readyState == 4){
        if(xmlhttp.status == 200){
          Swal({
            type: 'success',
            title: 'Adios',
            text: 'Gracias por visitar Evolution School tenga buen día'
          })
           window.open('../',"_self");
       }
     }
  };
  xmlhttp.send(null);
}

function cambio2(data){
  var select = document.getElementById("Curso2");
  var a = document.createElement("option");
  var b = document.createElement("option");
  var c = document.createElement("option");
  var d = document.createElement("option");
  switch(data.value){
    case '0':
      for (i = 0; i < select.options.length; i++) {
        select.options[i] = null;
      } 
      a.text = "Kids1";
      a.value = "Kids1";
      b.text = "Kids2";
      b.value = "Kids2";
      c.text = "Kids3";
      c.value = "Kids3";
      d.text = "Teens";
      d.value = "Teens";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      select.options[5] = null;
      select.options[0] = null;
      break;
    case '1':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "1";
      a.value = "1";
      b.text = "2";
      b.value = "2";
      c.text = "3";
      c.value = "3";
      d.text = "4";
      d.value = "4";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      select.options[5] = null;
      select.options[0] = null;
      break;
    case '2':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "5";
      a.value = "5";
      b.text = "6";
      b.value = "6";
      c.text = "7";
      c.value = "7";
      d.text = "8";
      d.value = "8";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      select.options[5] = null;
      select.options[0] = null;
      break;
    case '3':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "9";
      a.value = "9";
      b.text = "10";
      b.value = "10";
      c.text = "11";
      c.value = "11";
      d.text = "12";
      d.value = "12";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      select.options[5] = null;
      select.options[0] = null;
      break;
    case '4':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "13";
      a.value = "13";
      b.text = "14";
      b.value = "14";
      c.text = "15";
      c.value = "15";
      d.text = "16";
      d.value = "16";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      select.options[5] = null;
      select.options[0] = null;
      break;
    default:
      alert('Error ese valor no existe');
  }
}

function cambio(data){
  var select = document.getElementById("Curso");
  var a = document.createElement("option");
  var b = document.createElement("option");
  var c = document.createElement("option");
  var d = document.createElement("option");
  switch(data.value){
    case '1':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "1";
      a.value = "1";
      b.text = "2";
      b.value = "2";
      c.text = "3";
      c.value = "3";
      d.text = "4";
      d.value = "4";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      if(select.length == 6){
        select.options[5] = null;
        select.options[0] = null;
      }
      break;
    case '2':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "5";
      a.value = "5";
      b.text = "6";
      b.value = "6";
      c.text = "7";
      c.value = "7";
      d.text = "8";
      d.value = "8";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      if(select.length == 6){
        select.options[5] = null;
        select.options[0] = null;
      }
      break;
    case '3':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "9";
      a.value = "9";
      b.text = "10";
      b.value = "10";
      c.text = "11";
      c.value = "11";
      d.text = "12";
      d.value = "12";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      if(select.length == 6){
        select.options[5] = null;
        select.options[0] = null;
      }
      break;
    case '4':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "13";
      a.value = "13";
      b.text = "14";
      b.value = "14";
      c.text = "15";
      c.value = "15";
      d.text = "16";
      d.value = "16";
      select.options.add(a, 1);
      select.options.add(b, 2);
      select.options.add(c, 3);
      select.options.add(d, 4);
      if(select.length == 6){
        select.options[5] = null;
        select.options[0] = null;
      }
      break;
    case 'Phonics1':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "Phonics1";
      a.value = "Phonics1";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'Phonics2':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "Phonics2";
      a.value = "Phonics2";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'kids1':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "kids1";
      a.value = "kids1";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'kids2':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "kids2";
      a.value = "kids2";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'kids3':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "kids3";
      a.value = "kids3";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'kids4':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "kids4";
      a.value = "kids4";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'kids5':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "kids5";
      a.value = "kids5";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'kids6':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "kids6";
      a.value = "kids6";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'Teens':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "Teens";
      a.value = "Teens";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'Technical English':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "Technical English";
      a.value = "Technical English";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    case 'Teacher\'s Course':
      for (i = 0; i <= select.options.length; i++) {
        select.options[i] = null;
      }
      a.text = "Teacher\'s Course";
      a.value = "Teacher\'s Course";
      select.options.add(a, 1);
      if(select.length == 3){
        select.options[2] = null;
        select.options[0] = null;
      }
      break;
    default:
      alert('Error ese valor no existe');
  }
}

function altaAlumno(){
  var Nombre = document.getElementById("Nombre").value;
  var Apellido_Paterno = document.getElementById("Apellido_Paterno").value;
  var Apellido_Materno = document.getElementById("Apellido_Materno").value;
  var Telefono = document.getElementById("Telefono").value;
  var Nivel = document.getElementById("Nivel").value;
  var Curso = document.getElementById("Curso").value;
  var Hora = document.getElementById("Hora").value;
  var Domicilio = document.getElementById("Domicilio").value;
  var Telefono_tutor = document.getElementById("Telefono_tutor").value;
  var Parentesco_tutor = document.getElementById("Parentesco_tutor").value;
  var Entero = document.getElementById("Entero").value;
  var sabatino = document.getElementById("sabatino").value;
  var error = false;
  if(Nombre == ""){
    Swal({
      type: 'error',
      title: 'Oops...',
      text: 'El nombre de usuario no puede ir vacío'
    })
    error = true;
  }
  if(Apellido_Paterno == ""){
    Swal({
      type: 'error',
      title: 'Oops...',
      text: 'El Apellido Paterno no puede ir vacío'
    })
    error = true;
  }
  if(Apellido_Materno == ""){
    Swal({
      type: 'error',
      title: 'Oops...',
      text: 'El Apellido Materno de usuario no puede ir vacío'
    })
    error = true;
  }
  if(error == false){
    var datos = {
      Nombre: Nombre,
      Apellido_Paterno: Apellido_Paterno,
      Apellido_Materno: Apellido_Materno,
      Telefono: Telefono,
      Nivel: Nivel,
      Curso: Curso,
      Hora: Hora,
      Domicilio: Domicilio,
      Telefono_tutor: Telefono_tutor,
      Parentesco_tutor: Parentesco_tutor,
      Entero: Entero,
      sabatino: sabatino
    };
    var request = new XMLHttpRequest();
    request.open("POST", "../assets/php/altaalumno.php");
    request.setRequestHeader("Content-type", "application/json");
    request.onload = function () {
      if(request.status === 200){
        if(request.responseText == '1'){
          Swal({
            type: 'success',
            title: 'Felicidades',
            text: 'El Alumno ha sido registrado correctamente'
          })
        }else{
          Swal({
            type: 'error',
            title: 'Error',
            text: 'Los datos que ingreso son erroneos'
          })
        }
      }else{
        console.log('Error');
      }
    }
    request.send(JSON.stringify(datos));
    console.log(request);
  }
}

function selectalumno(){
  var select = document.getElementById("Curso").value;
  $.ajax({
    url: '../assets/php/selectalumno.php',
    type:'POST',
    data: {id:select},
    dataType: 'json',
    success: function(output_string){
            $('#zona').html('')
            $('#zona').append(output_string);
     } 
    }); 
}

function selectalumno2(){
  var select = document.getElementById("Curso").value;
  $.ajax({
    url: '../assets/php/selectalumno2.php',
    type:'POST',
    data: {id:select},
    dataType: 'json',
    success: function(output_string){
            $('#zona').html('')
            $('#zona').append(output_string);
     } 
    }); 
}

function buscaralumno(){
  var select = document.getElementById("alumno").value;
  $.ajax({
    url: '../assets/php/infoalumno.php',
    type:'POST',
    data: {id:select},
    dataType: 'json',
    success: function(output_string){
            $('#informacion').html('')
            $('#informacion').append(output_string);
     } 
    }); 
}

function Actualizarinfo(){
  var dato1 = document.getElementById("Nivel2").value;
  var dato2 = document.getElementById("Curso2").value;
  var Id = document.getElementById("idalm").value;
  if(dato2 == " "){
    Swal({
      type: 'error',
      title: 'Error',
      text: 'No se pudo actualizar la información'
    })
  }else{
    var datos = {
      Id: Id,
      dato1: dato1,
      dato2: dato2
    };
    var request = new XMLHttpRequest();
    request.open('GET', '../assets/php/actualizarinfo.php?afdsaw=' +JSON.stringify(datos));
    request.setRequestHeader("Content-type", "application/json");
    request.onload = function () {
      if(request.status === 200){
        if(request.responseText == '1'){
          Swal({
            type: 'success',
            title: 'Felicidades',
            text: 'La información ha sido actualizada correctamente'
          })
        }else{
          Swal({
            type: 'error',
            title: 'Error',
            text: 'No se pudo actualizar la información'
          })
        }
      }else{
        console.log('Error');
      }
    }
    request.send();
  }
}

function seleccionado(data){
  document.getElementById("Nivel2").selectedIndex = data;
}

function cuota(){
  $.ajax({
    url: '../assets/php/cuota.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#cuota').html('')
            $('#cuota').append(output_string);
     } 
    });
}

function recibo(cuota,fecha,nombre,apellido){
  var doc = new jsPDF('landscape');
  var BBVA = 'data:image/jpeg;base64,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AAAABgAAAAAAAThCSU0D+AAAAAAAcAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAA4QklNBAAAAAAAAAIAADhCSU0EAgAAAAAAAgAAOEJJTQQwAAAAAAABAQA4QklNBC0AAAAAAAYAAQAAAAM4QklNBAgAAAAAABAAAAABAAACQAAAAkAAAAAAOEJJTQQeAAAAAAAEAAAAADhCSU0EGgAAAAADYQAAAAYAAAAAAAAAAAAAAGUAAADwAAAAFgBCAEIAVgBBAF8AQgBhAG4AYwBvAG0AZQByAF8AbABvAGcAbwAuAHMAdgBnAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAAAADwAAAAZQAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAABAAAAABAAAAAAAAbnVsbAAAAAIAAAAGYm91bmRzT2JqYwAAAAEAAAAAAABSY3QxAAAABAAAAABUb3AgbG9uZwAAAAAAAAAATGVmdGxvbmcAAAAAAAAAAEJ0b21sb25nAAAAZQAAAABSZ2h0bG9uZwAAAPAAAAAGc2xpY2VzVmxMcwAAAAFPYmpjAAAAAQAAAAAABXNsaWNlAAAAEgAAAAdzbGljZUlEbG9uZwAAAAAAAAAHZ3JvdXBJRGxvbmcAAAAAAAAABm9yaWdpbmVudW0AAAAMRVNsaWNlT3JpZ2luAAAADWF1dG9HZW5lcmF0ZWQAAAAAVHlwZWVudW0AAAAKRVNsaWNlVHlwZQAAAABJbWcgAAAABmJvdW5kc09iamMAAAABAAAAAAAAUmN0MQAAAAQAAAAAVG9wIGxvbmcAAAAAAAAAAExlZnRsb25nAAAAAAAAAABCdG9tbG9uZwAAAGUAAAAAUmdodGxvbmcAAADwAAAAA3VybFRFWFQAAAABAAAAAAAAbnVsbFRFWFQAAAABAAAAAAAATXNnZVRFWFQAAAABAAAAAAAGYWx0VGFnVEVYVAAAAAEAAAAAAA5jZWxsVGV4dElzSFRNTGJvb2wBAAAACGNlbGxUZXh0VEVYVAAAAAEAAAAAAAlob3J6QWxpZ25lbnVtAAAAD0VTbGljZUhvcnpBbGlnbgAAAAdkZWZhdWx0AAAACXZlcnRBbGlnbmVudW0AAAAPRVNsaWNlVmVydEFsaWduAAAAB2RlZmF1bHQAAAALYmdDb2xvclR5cGVlbnVtAAAAEUVTbGljZUJHQ29sb3JUeXBlAAAAAE5vbmUAAAAJdG9wT3V0c2V0bG9uZwAAAAAAAAAKbGVmdE91dHNldGxvbmcAAAAAAAAADGJvdHRvbU91dHNldGxvbmcAAAAAAAAAC3JpZ2h0T3V0c2V0bG9uZwAAAAAAOEJJTQQoAAAAAAAMAAAAAj/wAAAAAAAAOEJJTQQRAAAAAAABAQA4QklNBBQAAAAAAAQAAAADOEJJTQQMAAAAABMKAAAAAQAAAKAAAABDAAAB4AAAfaAAABLuABgAAf/Y/+0ADEFkb2JlX0NNAAL/7gAOQWRvYmUAZIAAAAAB/9sAhAAMCAgICQgMCQkMEQsKCxEVDwwMDxUYExMVExMYEQwMDAwMDBEMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMAQ0LCw0ODRAODhAUDg4OFBQODg4OFBEMDAwMDBERDAwMDAwMEQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCABDAKADASIAAhEBAxEB/90ABAAK/8QBPwAAAQUBAQEBAQEAAAAAAAAAAwABAgQFBgcICQoLAQABBQEBAQEBAQAAAAAAAAABAAIDBAUGBwgJCgsQAAEEAQMCBAIFBwYIBQMMMwEAAhEDBCESMQVBUWETInGBMgYUkaGxQiMkFVLBYjM0coLRQwclklPw4fFjczUWorKDJkSTVGRFwqN0NhfSVeJl8rOEw9N14/NGJ5SkhbSVxNTk9KW1xdXl9VZmdoaWprbG1ub2N0dXZ3eHl6e3x9fn9xEAAgIBAgQEAwQFBgcHBgU1AQACEQMhMRIEQVFhcSITBTKBkRShsUIjwVLR8DMkYuFygpJDUxVjczTxJQYWorKDByY1wtJEk1SjF2RFVTZ0ZeLys4TD03Xj80aUpIW0lcTU5PSltcXV5fVWZnaGlqa2xtbm9ic3R1dnd4eXp7fH/9oADAMBAAIRAxEAPwDGqZlZ3XxgDKsp+05bqRZuc7buscN2zezd/nLZ+sP1b639Vaqeo4/VbLmOeKjYwuqexzgXM9jrb2WVv2f+YLK6R/4scT/04/8Ao1y6r/GfidXe3HzCWWdHxy0OoBcCLXnZ6mRt27q3t/QVvrfvp9R/+kWrOZGXHCwIyHqBHzOfCIOPJLXiidCOjtftLK6l/i/u6hkj08i7Auc8t9skMsb6rP3fV2+q3+uvPvqv0nL+sPUH4Iz7MUspN3qe6ydrq69mz1af9L+8u6q+sGD1z6ldTdi1jGfi4dtVuICP0cVO9P09u3dQ5n8y/Z/1C5j/ABXf+KO7/wAJv/8APlChxXDHnIHBKJ0H7rJkqWTCL4gRqf3mv1Nv1g+pHV6hTnOyGvaLWau2WtB2WU5GM91u135vsf8An/orPURPr/j5XTfrK+3HutqZmMbk1lj3N22D9Fbsh30t9bbv+uqx9bX9T6T9b6OsdVpqzqN27Bqa5zWCuk+yrX3NyaXWNyPdvpsts/63TqfXt2H136q4nX8GXsx7AZOhbXafs99b2fvsyG07/wDi0+MzxYZEA8YMJTG0pH5YrZR9OWIJBgeKMT0D1P1b6oer9Dw89xm22sC6NP0rD6V+n/GseuO+vFt/Vvrb07oGPY9rGhrbfTJBBuO+8u2f6LEp9VWP8VfUWuxc3pbyA6l4yK/EtsGyz/tuyr/wZVfqPu639cOpdfeN1dYcai7kG4+ljf5mFQ+tQxh7WTNLpjB4fPJ8jKZ+5jxj986/4HzNz/GZn3EdO6Lhk/aMm31C2slrjB+z41em3+eut/8AAVgfUbrWX0/6yV4mVdZ6OWXY1tdjiQ23/Au2u3fpPWZ9n/66tSgjr/8AjNfYfdj9LmP/AEG/Rt/9n73Wf2Fz/wBdcF/S/rRl+iSz1Xtzcdw5DrD6hcP6uWy1TYox4BgI1lDjP96TFkMhL3gdIz4f8EPsqSqdK6hV1PpuN1Cr6GTW2yOYJHvr/wCtv9itrOIIJB6N4GxYUkkkgpSSSSSlJJJJKUkkkkp//9DK6SQ364YrnEADqMkkwAPVcu3/AMYfX+mDoVvTKr2X5eW6sCutwcWNY9l77bds+n/N7Gbvpol3+LDoF1tlr78ubXOe4eoyJcS93+B801X+K76t1vBNmU9oMlhsaAfj6VVb/wDNer082CU4TJl6OgHUNSOLLGM4gD1ne+7yv1Qxsk9I+smYJGKMCyknWHW7X2afm7qa/p/8eif4s7aqvrBc+17a2/ZHjc4hon1KP3l6Q7o2B+yLOjUV/ZsKyp1G2mGkNeC17mlwd+k9271H/nrmz/ir+rpEG/LPxsr/APSCX3nHMZRK48e1Di0V7E4nGY+rg3cX/GV13p+fbiYGFa3IOM51l1tZDmAuGxlTbG+1z/pOt/c/RrX+onSXZX1LyMXKaW09SfcayRP6N7W0tta3+ux9lf8Anq1if4tPqzj3NssF2U1vFV7waz/WZUynf/Uf7F1TWta0NaA1rRAA0AA7BR5M0Bijix36TxcRXwxSOSWSdaiuEPhvTOoZXRsjMGwi+3HvwbGztLHv/Rmz/rFta776nBnQPqNd1a1oDrBblhp0JAHpYtc/8K2qv0/+NVzqX+LroPUc7IzbbMmqzKcX2Mqe0N3EQ9zQ+p7vf9P6X01q9T+r2F1Ho9fRrH204dYraBS4BxbTHpVuc9lns9jE/NzGPIIjUcRicnlHotxYZwMutA+3/hPm/wBVvq/9bMzEs6j0bLZii15qte61zHvcz3Od7abtzN7/AN9R+tP1f+s+Fj1dQ65ksy2hwoY9tjrHt3brADvpp/R+1epdI6XjdI6dT07E3GigENLzLiXOdY9z3AN9znvcm6z0jF6z063p2WXCm3aS6sgPBY5tjXMc5r/zmIffD7t0OC+3r4Enlh7dWeKu/p4nlv8AFd1MXdLyOmPPvw7PUrBP+Dul/t/q3tu3f112y5/oX1K6X0HOOdhXZDrHVmpzbXtcwtcWv+i2pjva5n7y6BQZ5QlklKG0tfr1ZcMZRgIy3GikkklEyKSSSSUpJJJJSkkkklP/0fVUl5t9VPqj0frrepZGeLfUpzramenYWDb7bPot/lPVjr/1dd9T8P8Abv1fzL6jjvYL8W5/qVWNcRXDme3d7ne7d/1r0bFYOCHHwDIePYXH03/e4mIZJcPFw+nz6PoKSBRl1W4deY4iuqyttpLyAGtc3f73H91Zln1z+qldnpO6pj7+NHhw/wA5m5qhEJG6iTXYWycQ6kO0khY+Tj5VLMjGtZfTYJZbW4OaRx7Xt9qrVdc6PbiWZrM2k4tTzVZeXtDGvH0q3PdDWv8AchwnseyrHdvJLJxfrX9W8zJbi43UaLL3kNYwOguceGs3fTd/VWskYyjuCPNQIOxtSSxrfrl9VqrfSf1TH38aPDh/ns3MWpjZONl0tyMW1l9L/oWVuDmmNPa9ktRMJDUxI8woSB2IKVJZef8AWj6vdOuNGb1Cim5sB1ZcC4T++xu5zP7St4PUcDqNPr4GRXk1A7S+pwcAf3XbfouSMJAWQQO9aK4hdWGykqzuo4Lc5vTnXsGa6v1m0Ew81g7fUDf3dyoP+uH1Xru9B3VMbfxpYC352N/Rt/zkhCR2iT12UZAbkOwkqed1fpfTqm3Z2XVjV2fQdY8N3f8AF/v8/mqHTOu9H6tu/Z2XVklgl7WO9wH7zmH37UOGVcVGu9aKsXVi2+kg5eZiYVDsjMuZj0t5sscGtk8Dc5UML61fVzPvGPidRotucdraw8AuP7rN23f/AGEhGRFgEgdaUSBoSHVSVbP6jgdNoGRn3sxqS4MFlh2t3O+i3cVXzfrD0PAyBi5mdTTkEgek543y76G5n0m7935yQjI7AnyCiQNyH//SufVbK+tdDOpN6HhY+VQc642vvs2OD/b7Gt3s9np+mm+smR9ZsltLfrbivw+hNsDr/wBnhtu50xX67zbZZWzc7/1HZd6S2P8AF3ZWzF6vvc1s9Rt5IH5ta0Prl1zpGH0HOoyL633ZFD6qscOa57nPaWMf6c7vTrd732fmK6ZkZ6GMHUDiA9fm1hEe3Zmdrq/T5Opfi9K6v0oUWsryem5NbXNbww1+2ypzdu3Zt9j2LFGb/i5xmDCD+mBmgLIqe0/13w9r3f13Lner0ZuB/i+6LhZpsoouyGNz4kPbRY67IbW9v8lhZ+jd/hK/TXZ19I+quJ09tjcXCrwAwH1nNrNZbHtsffZPqbv9K9/vURiIDWUiDKQjwf1f0mTiMukQQATxf1nB/wAXjqas3r+FhvDunUZQdiBrt7Q1/qt3V2S7e11dNX5yz/qP9WemdXqy83qTXZTMfNuZTiPcfQa79G9+R6I/nLrP5v3+z01d/wAXVmJb1P6w24IaMOy+t2MGN2N9MnI9PZXDfTZt+ixWf8Wn/JXUP/Tjd/1NSkyyMTmIJB/V/wB75WPGARjvX5/za/8AjG6N0rF+rZysXEpxr6La/StpY2twBdt27qw32o31xycvqF3SPq1j2Gr9rHfm2M0d6LAHWMb/AF/0r/8ArXp/zb3o3+M3/wASd3/G1f8AVKr9bfU6ZndB+swY5+Ngn0cwtEltdoDG2R/bub/xvo1/4RDEbjjvWV5OG/3+GPB/zl09DKtBUbrt1ehxvqx9XcbHGNV03G9ICCH1teT/AMY+0Pss/wCuOWR9ZHYn1P8Aqtk/sSluJZkWBtWyTFtuj7veXe9tNf6L/ra6THzcPKxxlY19d2O4SLWODmQOfePaua+uTMf6yfVjKHRr6823CsbbsocLJdX/ADlfsJ9/ovfZW3/CqLEZHJETJMeIcfFt/hL5gCJ4QOKtKbvQPqd0fpWBXXZjVZOY5s5WTa0WPfY7W2H2A7a930Gf+jPesX6w4GP9VOr9P+sHSmDFxsm9uJ1HGr0rex/ubYylvtY5rWWfR/wnpf8AD+r0/QOu4PXOnVZmLY1znNBuqBBdW/8APrsb9Jvu+h/pP5xc59ccmrrvU+m/VjAcL7RkNyc59ZDhTVVLHeoR7Wv22P8Azv8AQ/8AcipPxmZykTJrX3L24VsxHguNXpwovrH02jqv+MDBwMl9jce3APqtqcWF7WvyHOoe9vu9G36Nq2er/Vn6vU/V/Mqp6fj1tqx7HVubW0PDmMc5lnrR6vqbm/T3qjn/AP5Tum/+m9//AFWQuh65/wAidQ/8K3f+e3oSnIeyASBwxP8AzlCIIyEjrL8nlvqJ9W+kZnRMTrGfT9uzLGOrack+qyuup76KaMemya662Nr9qfKwsTp/+MjpAwKm4rcrGu9dlQDGvhl7vcxkN+lXX/22tP8Axd/+I7p/wu/8/XKl1j/8pPQf/C9//nvJTuKRy5gSaAyivLiRQEMZrW4OdmZ3Req/XLLP1gyqmdM6PtqxMS921ll5/n7XVH23bHtsY/8A9B/5atfWGz/F91Tpd2PXk4NWS2tzsW2osrc2xoJqG9gH6Pd9KtBx6eldL+u/U8TrdNLsfqu3JwcjKY0s3am2pj7Q5jNz7bG/9aq/0tS6nI6X9WMWk35OJg0UjmyyupjR/be0NRlKMTCuPSMeDhPp/lxfMiIJEr4bs8V7vFdc6pkdT/xZ4eZku35AuZXa46lzqn2Vb3fyntZveuu6N9UejdLY2z0W5edu9S3PyALLn2zudd6lm70vd/o1gfX1/TLfqQy3pPonCfkVuqOOGis6v37RX7d3qbvU/wCEXdJuWZ9scNwEp5PT/i+ldCI4zepEY6v/08HqX2D7dfP2CfVsn1ftm76bv3fatT6p/Yf2nj+n+xfV9Vsev9r3xLf6N9o/VPtH+g3fpPVXmiS0sn82f57bp/L5Wlj+cfJv1/l8z9K/Wjb+wczf9k27Bu+37vs8bmz6vpfpd3+g9P8ASfaPSXkGP+z/ALU2f2bt3nb9o+2/Zufbx+l/7c/66uJSUPK/JP8AnP8Aqf8AL52XP80Pl3/S/l8r779S/R/bHXvT+zbvUo3/AGP1fTnbb/p/0f8A7D/o1P8Axeej+zM/0vTj7fdPp+pE7avpfafdv/qexfP6Sjntk+bbH83939JdDeG36e3n+i/Qf+MX0v8Amxb6uzb6tX876m36X/db9KtnMj9i3R6EfZnR9qn7P9D/ALVbvd9m/wBN/wAGvmNJMP8ANw3+aX/c/Kv/AE5eQe1yv2d9ps2/s3bIn0Ptvofyp3/pP83/AK2vVvqT6f7Db6X2D0/Udt/Zu/0ohn899p/T/av9L6vv/m186JKfmv5uH85/h7f4X9ZhwfPL5d/0f+5/qvpH1q+x/trI3/sr1d7932P7Vvifb9q9L9W9b/T+j/hfU9Rdb/i1+z/Zcj7P+zdsMn7D63r7td32z7d+l2f6LZ+h3+t6a8KSSy/7nj/Of4Xy/wCF/wBwrH/PS+X6fsfoDN9H/wAcbp8+n6v2F8T6nqRN/wBHb+rbP6/vW71nb+x87dG37NbO6YjY76Xp/pP8xfMSSglvj3+Uf9L9FlG09tz+T9FfUL0/+aeB6ezZ+lj09+3+et+j9o/Tf56qdV9L/wAcHos+n6v2e7bPqb42ZH0Nn6t/26vAEk7/ACuXfbJ/e6/Mj9CHnB+gv8YHo/slnr/s/wBPf7v2j6vh/wBo/sf6z6/73p/4JeZYX7P+0V7v2Zzp9q+2+jPb+b/7/wCxcUkpuW/mpfzn+Bt/gf1mPN/OR+X6/wDdPu3119L/AJk43q/ZNu6j+Z9T7LMH+jfZf0no/wCiXZjhfKySrz/m47/NPf8AwWaPzS8o7P8A/9k4QklNBCEAAAAAAF0AAAABAQAAAA8AQQBkAG8AYgBlACAAUABoAG8AdABvAHMAaABvAHAAAAAXAEEAZABvAGIAZQAgAFAAaABvAHQAbwBzAGgAbwBwACAAQwBDACAAMgAwADEANQAAAAEAOEJJTQQGAAAAAAAHAAgAAAABAQD/4RBzaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzA2NyA3OS4xNTc3NDcsIDIwMTUvMDMvMzAtMjM6NDA6NDIgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDE4LTA1LTA2VDIzOjIyOjQ4LTA1OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxOC0wNS0wNlQyMzo0NzoxNi0wNTowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxOC0wNS0wNlQyMzo0NzoxNi0wNTowMCIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjIxZjFiYmE0LWQyZmItYTg0YS1hNDg0LTVkNmQ3MDZlM2RiOSIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmIwMzg5MTgzLTUxYjEtMTFlOC05MDJlLWMxOGNkZjNkMGNhNyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjlkY2VjMzcxLTcyODktNWE0Yi05YzRjLTEyOGIyNzY5MDM4MSI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6OWRjZWMzNzEtNzI4OS01YTRiLTljNGMtMTI4YjI3NjkwMzgxIiBzdEV2dDp3aGVuPSIyMDE4LTA1LTA2VDIzOjIyOjQ4LTA1OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjg4OGQ1ZGRmLWQ4YjYtMzI0Ni04ZGNhLTNkYzM4NmY1MWM2MyIgc3RFdnQ6d2hlbj0iMjAxOC0wNS0wNlQyMzo0NzoxNi0wNTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJjb252ZXJ0ZWQiIHN0RXZ0OnBhcmFtZXRlcnM9ImZyb20gaW1hZ2UvcG5nIHRvIGltYWdlL2pwZWciLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImRlcml2ZWQiIHN0RXZ0OnBhcmFtZXRlcnM9ImNvbnZlcnRlZCBmcm9tIGltYWdlL3BuZyB0byBpbWFnZS9qcGVnIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDoyMWYxYmJhNC1kMmZiLWE4NGEtYTQ4NC01ZDZkNzA2ZTNkYjkiIHN0RXZ0OndoZW49IjIwMTgtMDUtMDZUMjM6NDc6MTYtMDU6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE1IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6ODg4ZDVkZGYtZDhiNi0zMjQ2LThkY2EtM2RjMzg2ZjUxYzYzIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjlkY2VjMzcxLTcyODktNWE0Yi05YzRjLTEyOGIyNzY5MDM4MSIgc3RSZWY6b3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjlkY2VjMzcxLTcyODktNWE0Yi05YzRjLTEyOGIyNzY5MDM4MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+/+4ADkFkb2JlAGRAAAAAAf/bAIQAAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQICAgICAgICAgICAwMDAwMDAwMDAwEBAQEBAQEBAQEBAgIBAgIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMD/8AAEQgAZQDwAwERAAIRAQMRAf/dAAQAHv/EAaIAAAAGAgMBAAAAAAAAAAAAAAcIBgUECQMKAgEACwEAAAYDAQEBAAAAAAAAAAAABgUEAwcCCAEJAAoLEAACAQMEAQMDAgMDAwIGCXUBAgMEEQUSBiEHEyIACDEUQTIjFQlRQhZhJDMXUnGBGGKRJUOhsfAmNHIKGcHRNSfhUzaC8ZKiRFRzRUY3R2MoVVZXGrLC0uLyZIN0k4Rlo7PD0+MpOGbzdSo5OkhJSlhZWmdoaWp2d3h5eoWGh4iJipSVlpeYmZqkpaanqKmqtLW2t7i5usTFxsfIycrU1dbX2Nna5OXm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uve/de697917r3v3Xuv/1d/j37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//Wts7E/wCFPfUfXvYG+dgVnxP7Jr6vY+8dzbPqq6Lsba0EVbUbZzddhZquOE4GYwx1MlEXCa30hraj9feUe3fdg3fcdvsNwTmy2VJ4UkA8FzQOoaldYrStOsbb/wC8dtdhfXti/K9wzQyvGT4qCpRitfh86dJOL/hVV0sZFE/xH7RjiJ9TxdjbTmkA/JWN8HArG3+1D2sP3VN6p283WpP/ADRkH/Px6Sj7zG0V7uVrmn/NVP8AoEdWf/B7+dj8LfnJuig602xmdzdTdw5RdOG637aocZiKndlTGkslRS7J3Jh8rmdubgrIYota0bz0mSmQloqV1jkKRfzx7J868jWsm53UMV3s6fFNAWYRjyMqMqug/pAMgOC4JFZI5N94eUOc7mPbraaS13ZvhinAUuc1EbqzIx/okq58lNDS3n3EHUqde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9cz/wDIcxuNyn83X510+Tx9DkoE2J8gpUhr6SnrIklX5L9dIJUSojkVJAjsNQANiR9D7zX9+ZJIvaHkRopGVvHtMgkf8QpvTrED2Tjjl90+dFkjVl8C64gH/iXF69blOQ682BlqSWgymxtn5KhnVkno8htnC1lJMjjSyS09RRSQyKymxBBBHvDSPcdwicSRX0yuOBDsCPzB6y0ewsZVKS2UTIfIopH7COtN7/hRd8Kejvi/N8d/lD8bNm4no3d+59/57bu6qXrNRs7FTbixNHS7y2fvXb+Hwf2NLtjcuJrKKs8tXj1pzI7U7kCWMO2ZP3c+dt85oXmLlbmW8e+s4rdXQzfqNoYmOSJ2apdGBWivWncOBoMTffzk/ZuWzsHMnL1otldyTsriH9NdagSRyKq0COpDVZaV7TxFett/4w9i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';
  var logo = 'data:image/jpeg;base64,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AAACOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhCSU0EAAAAAAAAAgAAOEJJTQQCAAAAAAACAAA4QklNBDAAAAAAAAEBADhCSU0ELQAAAAAABgABAAAAAzhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4AAAAAAAQAAAAAOEJJTQQaAAAAAAM9AAAABgAAAAAAAAAAAAAAQwAAAMgAAAAEAGwAbwBnAG8AAAABAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAMgAAABDAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAEAAAAAAABudWxsAAAAAgAAAAZib3VuZHNPYmpjAAAAAQAAAAAAAFJjdDEAAAAEAAAAAFRvcCBsb25nAAAAAAAAAABMZWZ0bG9uZwAAAAAAAAAAQnRvbWxvbmcAAABDAAAAAFJnaHRsb25nAAAAyAAAAAZzbGljZXNWbExzAAAAAU9iamMAAAABAAAAAAAFc2xpY2UAAAASAAAAB3NsaWNlSURsb25nAAAAAAAAAAdncm91cElEbG9uZwAAAAAAAAAGb3JpZ2luZW51bQAAAAxFU2xpY2VPcmlnaW4AAAANYXV0b0dlbmVyYXRlZAAAAABUeXBlZW51bQAAAApFU2xpY2VUeXBlAAAAAEltZyAAAAAGYm91bmRzT2JqYwAAAAEAAAAAAABSY3QxAAAABAAAAABUb3AgbG9uZwAAAAAAAAAATGVmdGxvbmcAAAAAAAAAAEJ0b21sb25nAAAAQwAAAABSZ2h0bG9uZwAAAMgAAAADdXJsVEVYVAAAAAEAAAAAAABudWxsVEVYVAAAAAEAAAAAAABNc2dlVEVYVAAAAAEAAAAAAAZhbHRUYWdURVhUAAAAAQAAAAAADmNlbGxUZXh0SXNIVE1MYm9v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ADEANQAAAAEAOEJJTQQGAAAAAAAHAAgAAAABAQD/4Q4uaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzA2NyA3OS4xNTc3NDcsIDIwMTUvMDMvMzAtMjM6NDA6NDIgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE1IChXaW5kb3dzKSIgeG1wOkNyZWF0ZURhdGU9IjIwMTgtMDUtMDdUMTc6NDQ6MzQtMDU6MDAiIHhtcDpNb2RpZnlEYXRlPSIyMDE4LTA1LTA3VDE3OjQ3OjIyLTA1OjAwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDE4LTA1LTA3VDE3OjQ3OjIyLTA1OjAwIiBkYzpmb3JtYXQ9ImltYWdlL2pwZWciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M2ViMGU1MDMtYWExNC1lZTQ3LTk1YzYtNThmN2YyYjU5NDU2IiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6OTM5YzNmNTItNTI0OC0xMWU4LThiOTYtZmQyMmRjZmFjYTM2IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ODAzMGVjN2ItYThmYy01MDQ4LWIyY2YtNzA2Yjg1OTY5YWQ4Ij4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo4MDMwZWM3Yi1hOGZjLTUwNDgtYjJjZi03MDZiODU5NjlhZDgiIHN0RXZ0OndoZW49IjIwMTgtMDUtMDdUMTc6NDQ6MzQtMDU6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE1IChXaW5kb3dzKSIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY29udmVydGVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJmcm9tIGltYWdlL3BuZyB0byBpbWFnZS9qcGVnIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDozZWIwZTUwMy1hYTE0LWVlNDctOTVjNi01OGY3ZjJiNTk0NTYiIHN0RXZ0OndoZW49IjIwMTgtMDUtMDdUMTc6NDc6MjItMDU6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE1IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg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';

  doc.setFontSize(20);
  doc.rect(20, 20, 250, 170, 3, 3, 'FD');
  doc.setFontType('bold');
  doc.text(35,35,'Alumno: ');
  doc.setFontType('normal');
  doc.text(65,35,nombre +' ' +apellido);
  doc.setFontType('bold');
  doc.text(35,45,'Cuota: ');
  doc.setFontType('normal');
  doc.text(59,45,'$'+cuota);
  doc.setFontType('bold');
  doc.text(35,55,'Fecha de pago: ');
  doc.setFontType('normal');
  doc.text(89,55,fecha);
  doc.setFontType('bold');
  doc.addImage(logo, 'JPEG',215,23,50,20);
  doc.text(35,65,'Sucursales: ');
  doc.addImage(BBVA, 'JPEG',35,75,25,10);
  doc.setFontSize(15);
  doc.setFontType('normal');
  doc.text(63,85,'XXXX-XXXX-XXXX-XXXX');
  doc.save('recibo ' +nombre +' ' +fecha +'.pdf');
}

function alumnos_asignados(){
  $.ajax({
    url: '../assets/php/alumnoasignado.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#alumnos').html('')
            $('#alumnos').append(output_string);
     } 
    });  
}

function VerCalifica(){
  var select = document.getElementById("alumnos").value;
  $.ajax({
    url: '../assets/php/calificaciones.php',
    type:'POST',
    data: {id:select},
    dataType: 'json',
    success: function(output_string){
            $('#information').html('')
            $('#information').append(output_string);
     } 
    });
}

function agregarCalif(){
  var idal = document.getElementById("almno").value;
  var cur = document.getElementById("cur").value;
  var cal = document.getElementById("cal").value;
  if(cal == ''){
    Swal({
      type: 'error',
      title: 'Error',
      text: 'No ingreso ninguna calificación'
    })
  }else if(cal > 10 || cal < 0){
    Swal({
      type: 'error',
      title: 'Error',
      text: 'Su calificación no es correcta'
    })
  }else{
  $.ajax({
    url: '../assets/php/agregarcal.php',
    type:'POST',
    data: {idal:idal, cal:cal, cur:cur},
    dataType: 'json',
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'La calificación se agrego correctamente'
      })
    });
  setTimeout(VerCalifica(), 2000);
  }
}

function falta(data){
  if(document.getElementById("faltas").value > 3 && data == 1){
    Swal({
      type: 'error',
      title: 'Cuidado!',
      text: 'El alumno no puede tener más faltas favor de contactar a un administrador'
    })
  }else if(document.getElementById("faltas").value < 1 && data == 2){
    Swal({
      type: 'error',
      title: 'Cuidado!',
      text: 'El alumno no puede tener menos de 0 faltas'
    })
  }else{
  var id = document.getElementById("idalm").value;
  $.ajax({
    url: '../assets/php/faltas.php',
    type:'POST',
    data: {value:data, id:id},
    dataType: 'json',
    success: function(output_string){
            $('#faltas').val('');
            $('#faltas').val(output_string);
     } 
    });
  buscaralumno(); 
  }
}

function getinfoalumno(){
  $.ajax({
    url: '../assets/php/getinfoalumno.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#informalumno').html('')
            $('#informalumno').append(output_string);
     } 
    });
}

function cambiocom(){
  var coment = {
    Id: document.getElementById("idalm").value,
    Nombre: document.getElementById("Nombre").value,
    comentario: document.getElementById("comentario").value
  };
  var request = new XMLHttpRequest();
  request.open('GET', '../assets/php/correo.php?afdsaw=' +JSON.stringify(coment));
  request.setRequestHeader("Content-type", "application/json");
  request.onload = function () {
    if(request.status === 200){
      if(request.responseText == '1'){
        Swal({
          type: 'success',
          title: 'Felicidades',
          text: 'El correo se envío correctamente'
        })
      }else{
        Swal({
          type: 'error',
          title: 'Error',
          text: 'No se pudo envíar el correo'
        })
      }
    }else{
      console.log('Error');
    }
  }
  request.send();
  console.log(request);
}

function newtask(){
  $.ajax({
    url: '../assets/php/newtask.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#tar').html('')
            $('#tar').append(output_string);
     } 
    });
}

function reviewtask(){
  $.ajax({
    url: '../assets/php/reviewtask.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#tar').html('')
            $('#tar').append(output_string);
     } 
    });
}

function subirtarea(){
  console.log(document.getElementById("alumno").value);
  if(document.getElementById("info").value == ""){
    Swal({
      type: 'error',
      title: 'Error',
      text: 'No hay información sobre la tarea!'
    })
  }else{
    $.ajax({
      url: '../assets/php/nuevatarea.php',
      type:'POST',
      data: {id:document.getElementById("alumno").value, informacion:document.getElementById("info").value, curso:document.getElementById("Curso").value, idmaestro:document.getElementById("mast").value},
      dataType: 'json',
      success: 
        Swal({
          type: 'success',
          title: 'Bien',
          text: 'La tarea se subió correctamente'
        })
      });
  }
}

function loadtareas(){
  $.ajax({
    url: '../assets/php/gettareas.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#tareas').html('')
            $('#tareas').append(output_string);
     } 
    });
}

function evaluartarea(data,data2){
  var a = document.getElementById(data2).value;
  if(a == ''){
    Swal({
      type: 'error',
      title: 'Error',
      text: 'No se agrego Calificación'
    })
  }else if(parseInt(a) < 0 || parseInt(a) > 10){
    Swal({
      type: 'error',
      title: 'Error',
      text: 'El valor no es válido'
    })
  }else{
    $.ajax({
      url: '../assets/php/eval.php',
      type:'POST',
      data: {id:data, cal:a},
      dataType: 'json',
      success: function(output_string){
       } 
      });
      setTimeout(reviewtask(), 2000); 
  }
}

function tareas(){
  $.ajax({
    url: '../assets/php/getareas.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#tareas').html('')
            $('#tareas').append(output_string);
     } 
    });
}

function subirtareaalumno(data1, data2){
  var x = document.getElementById(data2);
  if(x == null){
    Swal({
      type: 'error',
      title: 'Error',
      text: 'No ha seleccionado ningún archivo'
    })
  }else{
    var file = x.files[0];
  }
    $.ajax({
      url: '../assets/php/subirtarea.php',
      type:'POST',
      data: {id:data1, file: file},
      dataType: 'json',
      success: function(output_string){
              $('#tareas').html('')
              $('#tareas').append(output_string);
       } 
      });
}

function altamtroadm(){
  var Nombre = document.getElementById("Nombre").value;
  var Apellido_Paterno = document.getElementById("Apellido_Paterno").value;
  var Apellido_Materno = document.getElementById("Apellido_Materno").value;
  var Telefono = document.getElementById("Telefono").value;
  var Cargo = document.getElementById("Cargo").value;
  var Correo = document.getElementById("Correo").value;
  var Fecha = document.getElementById("Fecha").value;
  $.ajax({
    url: '../assets/php/altamtroadm.php',
    type:'POST',
    data: {
      Nombre:Nombre,
      Apellido_Paterno: Apellido_Paterno,
      Apellido_Materno: Apellido_Materno,
      Telefono: Telefono,
      Cargo: Cargo,
      Correo: Correo,
      Fecha: Fecha
    },
    dataType: 'json',
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'El maestro ha sido dado de alta correctamente'
      })
  });
}

function altaalmnoadm(){
  var Nombre = document.getElementById("Nombre").value;
  var Apellido_Paterno = document.getElementById("Apellido_Paterno").value;
  var Apellido_Materno = document.getElementById("Apellido_Materno").value;
  var exp = document.getElementById("exp").value;
  var Telefono = document.getElementById("Telefono").value;
  var pago = document.getElementById("pago").value;
  var Nivel = document.getElementById("Nivel").value;
  var Curso = document.getElementById("Curso").value;
  var Hora = document.getElementById("Hora").value;
  var Domicilio = document.getElementById("Domicilio").value;
  var Telefono_tutor = document.getElementById("Telefono_tutor").value;
  var Parentesco_tutor = document.getElementById("Parentesco_tutor").value;
  var Entero = document.getElementById("Entero").value;
  var observa = document.getElementById("observa").value;
  var sabatino = document.getElementById("sabatino").value;
  $.ajax({
    url: '../assets/php/altaalmnoadm.php',
    type:'POST',
    data: {
      Nombre: Nombre,
      Apellido_Paterno: Apellido_Paterno,
      Apellido_Materno: Apellido_Materno,
      exp: exp,
      Telefono: Telefono,
      pago: pago,
      Nivel: Nivel,
      Curso: Curso,
      Hora: Hora,
      Domicilio: Domicilio,
      Telefono_tutor: Telefono_tutor,
      Parentesco_tutor: Parentesco_tutor,
      Entero: Entero,
      observa: observa,
      sabatino: sabatino
    },
    dataType: 'json',
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'El maestro ha sido dado de alta correctamente'
      })
  });
}

function opcionesAdmin(){
  var tipo = document.getElementById("tipo").value;
  console.log(tipo);
  if(tipo == 1){ $.ajax({
    url: '../assets/php/getmaestros.php',
    type:'POST',
    dataType: 'json',
    success: function(output_string){
            $('#adminis').html('')
            $('#adminis').append(output_string);
     } 
    });
  }else if(tipo == 2){ $.ajax({
    url: '../assets/php/getalumnos.php',
    type:'POST',
    dataType: 'json',
    success: function(output_string){
            $('#adminis').html('')
            $('#adminis').append(output_string);
     } 
    });
  }
}

function asignarcuentaalumno(){
  $.ajax({
    url: '../assets/php/asignarcuentaalumno.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("alumno").value},
    success: function(output_string){
            $('#data').html('')
            $('#data').append(output_string);
     } 
    });
}

function cambiarinfoalumno(){
  $.ajax({
    url: '../assets/php/cambiarinfoalumno.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("alumno").value},
    success: function(output_string){
            $('#data').html('')
            $('#data').append(output_string);
     } 
    });
}

function asignarcuentamaestro(){
  $.ajax({
    url: '../assets/php/asignarcuentamaestro.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("maestro").value},
    success: function(output_string){
            $('#data').html('')
            $('#data').append(output_string);
     } 
    });
}

function cambiarinfomaestro(){
  $.ajax({
    url: '../assets/php/cambiarinfomaestro.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("maestro").value},
    success: function(output_string){
            $('#data').html('')
            $('#data').append(output_string);
     } 
    });
}

function verfinanzas(){
  $.ajax({
    url: '../assets/php/verfinanzas.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("alumno").value},
    success: function(output_string){
            $('#data').html('')
            $('#data').append(output_string);
     } 
    });
}

function AltaCuentaAlumno(){
  $.ajax({
    url: '../assets/php/AltaCuentaAlumno.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("idal").value, user:Base64.encode(document.getElementById("user").value.toLowerCase()), pass:Base64.encode(document.getElementById("pass").value.toLowerCase())},
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'Has dado de alta la cuenta de forma correcta'
      })
    });  
  setTimeout(asignarcuentaalumno(), 4000);
}

function AltaCuentaMaestro(){
  $.ajax({
    url: '../assets/php/AltaCuentaMaestro.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("idal").value, user:Base64.encode(document.getElementById("user").value.toLowerCase()), pass:Base64.encode(document.getElementById("pass").value.toLowerCase())},
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'Has dado de alta la cuenta de forma correcta'
      })
    });  
  setTimeout(asignarcuentamaestro(), 4000);
}

function nuevacuota(){
  $.ajax({
    url: '../assets/php/nuevacuota.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("idal").value, cuota:document.getElementById("nuevacuota").value, fecha:document.getElementById("nuevafecha").value},
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'Has puesto una nueva cuota'
      })
    });  
  setTimeout(verfinanzas(), 4000);
}

function actualadminalm(){
  var idall = document.getElementById("idall").value;
  var Nombre = document.getElementById("Nombre").value;
  var Apellido_Paterno = document.getElementById("Apellido_Paterno").value;
  var Apellido_Materno = document.getElementById("Apellido_Materno").value;
  var Telefono = document.getElementById("Telefono").value;
  var pago = document.getElementById("pago").value;
  var Nivel = document.getElementById("Nivel").value;
  var Curso = document.getElementById("Curso").value;
  var Hora = document.getElementById("Hora").value;
  var Domicilio = document.getElementById("Domicilio").value;
  var Telefono_tutor = document.getElementById("Telefono_tutor").value;
  var Parentesco_tutor = document.getElementById("Parentesco_tutor").value;
  var Entero = document.getElementById("Entero").value;
  var observa = document.getElementById("observa").value;
  var sabatino = document.getElementById("sabatino").value;
  var estado = document.getElementById("estado").value;
  
  $.ajax({
    url: '../assets/php/actualadminalm.php',
    type:'POST',
    data: {
      idall: idall,
      Nombre: Nombre,
      Apellido_Paterno: Apellido_Paterno,
      Apellido_Materno: Apellido_Materno,
      Telefono: Telefono,
      pago: pago,
      Nivel: Nivel,
      Curso: Curso,
      Hora: Hora,
      Domicilio: Domicilio,
      Telefono_tutor: Telefono_tutor,
      Parentesco_tutor: Parentesco_tutor,
      Entero: Entero,
      observa: observa,
      sabatino: sabatino,
      estado: estado
    },
    dataType: 'json',
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'La información se ha actualizado'
      })
  });
}

function actualadminmtr(){
  var idall = document.getElementById("idall").value;
  var Nombre = document.getElementById("Nombre").value;
  var Apellido_Paterno = document.getElementById("Apellido_Paterno").value;
  var Apellido_Materno = document.getElementById("Apellido_Materno").value;
  var Telefono = document.getElementById("Telefono").value;
  var estado = document.getElementById("estado").value;
  var cargo = document.getElementById("cargo").value;
  var email = document.getElementById("email").value;
  var fechacum = document.getElementById("fechacum").value;
  
  $.ajax({
    url: '../assets/php/actualadminmtr.php',
    type:'POST',
    data: {
      idall: idall,
      Nombre: Nombre,
      Apellido_Paterno: Apellido_Paterno,
      Apellido_Materno: Apellido_Materno,
      Telefono: Telefono,
      estado: estado,
      cargo: cargo,
      email: email,
      fechacum: fechacum
    },
    dataType: 'json',
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'La información se ha actualizado'
      })
  });
}

function pagarcuota(){

  $.ajax({
    url: '../assets/php/pagarcuota.php',
    type:'POST',
    dataType: 'json',
    data: {id:document.getElementById("idal").value, cuota:document.getElementById("cota").value},
    success: 
      Swal({
        type: 'success',
        title: 'Bien',
        text: 'El alumno ha pagado su cuota'
      })
    });  
  setTimeout(verfinanzas(), 4000);
}

function alinal(){
  $.ajax({
    url: '../assets/php/alinal.php',
    type:'POST',
    data: {id:Base64.encode(sessionStorage.getItem("Usuario"))},
    dataType: 'json',
    success: function(output_string){
            $('#inforalum').html('')
            $('#inforalum').append(output_string);
     } 
    });
}

function generarcita(){
  var IdAlumno = document.getElementById("idal").value;
  var fecha = new Date(document.getElementById("fechh").value);
  var today = new Date();
  console.log(fecha);
  if(fecha == "" || fecha.getTime() < today.getTime()){
    Swal({
        type: 'error',
        title: 'Error',
        text: 'Por favor eliga una fecha válida'
      })
  }else{
    var fecha2 = document.getElementById("fechh").value;
    $.ajax({
      url: '../assets/php/crearcita.php',
      type:'POST',
      data: {id:IdAlumno, fecha: fecha2},
      dataType: 'json',
      success:
      Swal({
          type: 'success',
          title: 'Bien',
          text: 'Su cita ha sido generada'
        })
      });
      setTimeout(cuota(), 4000);
  }
}

function generarhistorial(){
  var IdAlumno = document.getElementById("idal").value;
  $.ajax({
    url: '../assets/php/historialal.php',
    type:'POST',
    dataType: 'json',
    data: {id:IdAlumno},
    success: function(output_string){
      pdfMake.createPdf(JSON.parse(output_string)).download();
    } 
    });
}

function cortediario(){
  var startdate = document.getElementById("rango").value.substr(0,10);
  var enddate = document.getElementById("rango").value.substr(13,10);
  $.ajax({
    url: '../assets/php/corte.php',
    type:'POST',
    dataType: 'json',
    data: {startdate:startdate, enddate:enddate},
    success: function(output_string){
      pdfMake.createPdf(JSON.parse(output_string)).download("Corte - "+startdate+" a "+enddate);
    } 
    });
}

function reportealumnoia(){
  $.ajax({
    url: '../assets/php/reportealumnoia.php',
    type:'POST',
    dataType: 'json',
    success: function(output_string){
      pdfMake.createPdf(JSON.parse(output_string)).download("Reporte Alumnos - " +Date.now().toString());
    } 
    });
}

function reporteimpagos(){
  $.ajax({
    url: '../assets/php/reporteimpagos.php',
    type:'POST',
    dataType: 'json',
    success: function(output_string){
      pdfMake.createPdf(JSON.parse(output_string)).download("Reporte Impagos - " +Date.now().toString());
    } 
    });
}

function cambiarcolor(){
  var select = document.getElementById("estado");
  if(select.value == 1){
    select.className = "form-control btn-success";
  }else{
    select.className = "form-control btn-danger";
  }
}