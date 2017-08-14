
document.getElementById("registro").onclick = function() {myFunction()};

function myFunction() {
var form=$('#formulario_registro').serialize();
    alert(form);
    $.ajax({
        method:'POST',
        url:'controller/registroControler.php',
        data:form,
        beforeSend:function (){
            $('#load').show();
        },
       success:function(res){
             $('#load').hide();
            
             console.log(res);
            if(res=='error_1'){
                swal('Error','Campos obligatorios','warning');
            } else if(res=='error_2'){
                swal('Error','Las claves deben ser iguales','error');
           }else if(res=='error_3'){
                swal('Error','El correo que ingresaste ya existe','error');
           }else if(res=='error_4'){
             swal('Error','Ingresa un correo válido','warning');
       }else{
           window.location.href=res;
       }
       }
    });
}
