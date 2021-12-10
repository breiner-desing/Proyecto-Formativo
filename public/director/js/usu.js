let btn2 = document.querySelector('#btn2').addEventListener('click', usuario);


function usuario(e){
    e.preventDefault();

    let rol = document.getElementById('rol').value;
    let id = document.getElementById('id2').value;
    let nombre = document.getElementById('nombre2').value;
    let apellido = document.getElementById('apellido2').value;
    let usuario = document.querySelector('#usuario').value;
    let mensaje = document.querySelector('#mensaje2');


    if (id==''||nombre==''||apellido==''||usuario==''||rol==''){
        mensaje.innerHTML = "<div class='alert alert-danger' id='error' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let correcto = document.querySelector('#error');
            mensaje.removeChild(correcto);
        }
            setTimeout(animacion, 3000);
        return false;
    }

    else {

        let form = new FormData()

        form.append("id",id);
        form.append("nombre", nombre);
        form.append("apellido",apellido);
        form.append("usuario",usuario);
        form.append("rol",rol);

        const http = new XMLHttpRequest()

        http.onload= function (){
            if(http.status == 200){
                var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){

                    mensaje.innerHTML = "<div class='alert alert-success' id='error' role='alert'>agregado</div>";
                    let rol = document.getElementById('rol').value = '';
                    let id = document.getElementById('id2').value = '';
                    let nombre = document.getElementById('nombre2').value = '';
                    let apellido = document.getElementById('apellido2').value = '';
                    let usuario = document.querySelector('#usuario').value = '';
                    let animacion = function(){
                        let correcto = document.querySelector('#error');
                        mensaje.removeChild(correcto);
                    }
                        setTimeout(animacion, 3000);
                } 

                else if (respuesta == 'error'){
                    mensaje.innerHTML = "<div class='alert alert-danger' id='error' role='alert'>error</div>";
                    let rol = document.getElementById('rol').value = '';
                    let id = document.getElementById('id2').value = '';
                    let nombre = document.getElementById('nombre2').value = '';
                    let apellido = document.getElementById('apellido2').value = '';
                    let usuario = document.querySelector('#usuario').value = '';
                    let animacion = function(){
                        let correcto = document.querySelector('#error');
                        mensaje.removeChild(correcto);
                    }
                        setTimeout(animacion, 3000);
                }

                else if (respuesta == 'uso'){
                    mensaje.innerHTML = "<div class='alert alert-warning' id='error' role='alert'>ya esta en uso</div>";
                    let rol = document.getElementById('rol').value = '';
                    let id = document.getElementById('id2').value = '';
                    let nombre = document.getElementById('nombre2').value = '';
                    let apellido = document.getElementById('apellido2').value = '';
                    let usuario = document.querySelector('#usuario').value = '';
                    let animacion = function(){
                        let correcto = document.querySelector('#error');
                        mensaje.removeChild(correcto);
                    }
                        setTimeout(animacion, 3000);
                }
            }
        }

        http.open("POST","partials/usuario.php",true)

        http.send(form)
    }
}