let btn = document.getElementById('btn').addEventListener('click',function(e){
    
    e.preventDefault()
    
    let id = document.getElementById('id').value;
    let idN = document.getElementById('idN').value;
    let ciudad = document.getElementById('ciudad').value;
    let habitantes = document.getElementById('habitantes').value;
    let departamento = document.getElementById('departamento').value; 
    let mensaje = document.getElementById('mensaje');

    console.log(id,idN,ciudad,departamento,habitantes)

    if (ciudad == '' || id ==''||idN == ''||habitantes==''||departamento==''){
        mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar campos</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                        
                    }
                    setTimeout(animacion, 3000);    }
    else {

        let form = new FormData();

        form.append("causa",idN);
        form.append("ciudad",ciudad);
        form.append("habitantes",habitantes);
        form.append("departamento",departamento);
        form.append('id',id);
        form.append('idN',idN);

        let https = new XMLHttpRequest()

        https.onloadend = function(){
            if (https.status=200){
            var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    location.href='../datos.php';
                }

                else if (respuesta=='mal'){
                    mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                        
                    }
                    setTimeout(animacion, 3000);
                    let causa = document.querySelector('#rh').value = '';
                }
            } 
            else {
                console.log('error conexion')
            }

        }

        https.open("POST","editadociudad.php",true);

        https.send(form);
    }
})