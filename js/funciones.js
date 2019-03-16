function insertRecord() {
    var n = $('#nombre').val();
    if ($('#insertnombre').val() == '' || $('#insertapellido').val() == '' || $('#insertcorreo').val() == '' ||
        $('#insertcedula').val() == '' || $('#insertusuario').val() == '' || $('#insertpassword').val() == '' ||
        $('#insertrol option:selected').val() == '')


    {
        alert("Debes llenar todos los campos!!");
    }else {
        var datos = $('#insertForm').serialize();
        $.ajax({
            type:"POST",
            url:"registro.php",
            data: datos,
            success:function(r){
                $('#modalRecord').hide();
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-backdrop').remove();
                if(r==1){                    
                    alert('Registrado con Exito.');
                }else{
                    alert('Ha ocurrido un error.');
                }
            }
        });
        $('#mostrar').load("mostrarusuario.php");
        return false;
    }
}

function insertNewRecord() {
    var n = $('#nombre').val();
    if ($('#nombre').val() == '' || $('#apellido').val() == '' || $('#correo').val() == '' ||
        $('#cedula').val() == '' || $('#usuario').val() == '' || $('#password').val() == '' ||
        $('#rol option:selected').val() == '')


    {
        alert("Debes llenar todos los campos!!");
    }else {
        var datos = $('#insertForm').serialize();
        if(validaUsuario()){
        $.ajax({
            type:"POST",
            url:"registro.php",
            data: datos,
            success:function(r){
                if(r==1){                   
                    alert('Registrado con Exito.');
                    location.href="index.php";
                }else{
                    alert('Ha ocurrido un error.');
                }
            }
        });
        return false;
    }
}
}

function validaUsuario(){
    var validar='';
    var datos = $('#insertForm').serialize();
    $.ajax({
    type:"POST",
    url:"validarsupervisor.php",
    data: datos,
    success:function(r){
        validar=r;
        return false;
    }
    
});

if(validar!='valido'){
    alert('Usuario Supervisor no es Valido.');
    return false;
}
return true;
}

function editRecord(){
    var datos = $('#editForm').serialize();
    $.ajax({
        type:"POST",
        url:"actualizarusuario.php",
        data: datos,
        success:function(r){
            $('#modalRecord').hide();
            $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
            $('.modal-backdrop').remove();
            if(r==1){                    
                alert('Actualización Exitosa.');
            }else{
                alert('Ha ocurrido un error.' + r);
            }
        }
    });
    $('#mostrar').load("mostrarusuario.php");
    return false;
}

function getDataTr(element){
    id = element.parentNode.parentNode.childNodes[3].value;
    ci=element.parentNode.parentNode.childNodes[5].childNodes[0].data;
     nombre=element.parentNode.parentNode.childNodes[7].childNodes[0].data;
     apellido=element.parentNode.parentNode.childNodes[9].childNodes[0].data;
     correo=element.parentNode.parentNode.childNodes[11].childNodes[0].data;
     usuario=element.parentNode.parentNode.childNodes[13].childNodes[0].data;
     password=element.parentNode.parentNode.childNodes[15].childNodes[0].data;
     rol=element.parentNode.parentNode.childNodes[17].childNodes[0].data;

     $('#modalEdit').on('shown.bs.modal', function (e) {
         console.log(e);
        $('#editForm').find('#id').val(id.toString().trim());
        $('#editForm').find('#nombre').val(nombre.toString().trim());
        $('#editForm').find('#cedula').val(ci.toString().trim());
        $('#editForm').find('#apellido').val(apellido.toString().trim());
        $('#editForm').find('#correo').val(correo.toString().trim());
        $('#editForm').find('#usuario').val(usuario.toString().trim());
        $('#editForm').find('#password').val(password.toString().trim());
        $('#editForm').find('#rol').val(rol.toString().trim());
      });
}

function deleteRecord(element){
    recordId = element.parentNode.parentNode.childNodes[3].value;
    if(confirm('¿Desea Eliminar el registro seleccionado?')){
        $.ajax({
            type:"POST",
            url:"eliminarusuario.php",
            data: {id:recordId},
            success:function(r){
                if(r==1){                    
                    alert('Operación Exitosa');
                    $('#mostrar').load("mostrarusuario.php");
                }else{
                    alert('Ha ocurrido un error.' + r);
                }
            }
        });      
        console.log('borrado');
    }else{

    }
}
function enviarDatos(form){
    var datos = form.serialize();
        $.ajax({
            type:"POST",
            url:"generadordereportesactual.php",
            data: datos,
            success:function(r){
                if(r==1){                   
                    alert('Registrado con Exito.');
                }else{
                    alert('Ha ocurrido un error.');
                }
            }
        });
        return false;
  }

  function goToVerLecturas(element){
   nameR=element.parentNode.parentNode.childNodes[1].innerText;
   commentR=element.parentNode.parentNode.childNodes[7].innerText;
   dateR=element.parentNode.parentNode.childNodes[9].innerText;
   statR=element.parentNode.parentNode.childNodes[11].innerText;
   arrayTemperatura=element.parentNode.parentNode.childNodes[3].value.trim();
   arrayHumedad=element.parentNode.parentNode.childNodes[5].value.trim();
   id=element.parentNode.parentNode.id;

   window.location='ver_lecturas.php?nombre='+nameR+'&comentario='+commentR+'&fecha='+dateR+'&estatus='+statR+'&recordid='+id;
}

function goToModificarReportes(element){
    nameR=element.parentNode.parentNode.childNodes[1].innerText;
    commentR=element.parentNode.parentNode.childNodes[7].innerText;
    dateR=element.parentNode.parentNode.childNodes[9].innerText;
    statR=element.parentNode.parentNode.childNodes[11].innerText;
    arrayTemperatura=element.parentNode.parentNode.childNodes[3].value.trim();
    arrayHumedad=element.parentNode.parentNode.childNodes[5].value.trim();
    id=element.parentNode.parentNode.id;
 
    window.location='modificarreporte.php?nombre='+nameR+'&comentario='+commentR+'&fecha='+dateR+'&estatus='+statR+'&recordid='+id;
 }
 function deleteReport(element){
    recordId = element.parentNode.parentNode.id;
    if(confirm('¿Desea Eliminar el registro seleccionado?')){
        $.ajax({
            type:"POST",
            url:"eliminarreporte.php",
            data: {id:recordId},
            success:function(r){
                if(r==1){                    
                    alert('Operación Exitosa');
                    $('#mostrar').load("reportes_trabajadores.php");
                }else{
                    alert('Ha ocurrido un error.' + r);
                }
            }
        });      
        console.log('borrado');
    }else{

    }
}
