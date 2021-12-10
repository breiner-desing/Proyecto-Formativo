let btn = document.querySelector('#btn').addEventListener('click', datos);

function datos(e){
    e.preventDefault();
    let id = document.getElementById('id').value;
    let tipoId = document.getElementById('tipoId').value;
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let numero = document.getElementById('numero').value;
    let edad = document.getElementById('edad').value;
    let ciudad = document.getElementById('ciudad').value;
    let Genero = document.getElementById('Genero').value;
    let rh = document.getElementById('rh').value;
    
    if ( id=='' || tipoId=='' || nombre=='' || apellido=='' || numero=='' || edad == '' || ciudad == '' || Genero == '' || rh == ''){
        let mensaje = document.querySelector('#mensaje');
        mensaje.innerHTML = "<div class='alert alert-danger' id='error' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let correcto = document.querySelector('#error');
            mensaje.removeChild(correcto);
        }
            setTimeout(animacion, 3000);
        return false;
    }
    else {
        

        let form = new FormData();

        form.append("id", id);
        form.append("tipoId", tipoId);
        form.append("nombre", nombre);
        form.append("apellido", apellido);
        form.append("numero", numero);
        form.append("edad", edad);
        form.append("ciudad", ciudad);
        form.append("Genero", Genero);
        form.append("rh", rh);

    
        const xhttp = new XMLHttpRequest();
    
        xhttp.onload = function () {
            console.log("¿La conexión con la BBDD fue correcta?: " + xhttp.status + ' ' + xhttp.readyState);
            if(xhttp.status == 200){
                var respuesta = JSON.parse(this.response);
                 console.log ("todo bien " + respuesta);
                 if (respuesta == 'bien'){
                    
                    let mensaje = document.querySelector('#mensaje');
        
                    mensaje.innerHTML = "<div class='alert alert-success' id='correcto' role='alert'>se ingreso correctamente</div>";
                    
                    let id = document.getElementById('id').value = '';
                    let tipoId = document.getElementById('tipoId').value = '';
                    let nombre = document.getElementById('nombre').value = '';
                    let apellido = document.getElementById('apellido').value = '';
                    let numero = document.getElementById('numero').value = '';
                    let edad = document.getElementById('edad').value = '';
                    let ciudad = document.getElementById('ciudad').value = '';
                    let Genero = document.getElementById('Genero').value = '';
                    let rh = document.getElementById('rh').value = '';

                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let correcto = document.querySelector('#correcto');
                        mensaje.removeChild(correcto);
                    }
                   
                    if (respuesta == 'bien'){
                        setTimeout(animacion, 3000);
                    }
                
                 } 
                 else if (respuesta == 'error'){
                    let mensaje = document.querySelector('#mensaje');
        
                    mensaje.innerHTML = "<div class='alert alert-danger' id='error' role='alert'>no se pudo ingresar</div>";

                    let id = document.getElementById('id').value = '';
                    let tipoId = document.getElementById('tipoId').value = '';
                    let nombre = document.getElementById('nombre').value = '';
                    let apellido = document.getElementById('apellido').value = '';
                    let numero = document.getElementById('numero').value = '';
                    let edad = document.getElementById('edad').value = '';
                    let ciudad = document.getElementById('ciudad').value = '';
                    let Genero = document.getElementById('Genero').value = '';
                    let rh = document.getElementById('rh').value = '';

                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let correcto = document.querySelector('#error');
                        mensaje.removeChild(correcto);
                    }
                   
                    if (respuesta == 'error'){
                        setTimeout(animacion, 3000);
                    }
                 }

                 else if (respuesta == 'uso'){

                    let mensaje = document.querySelector('#mensaje');
        
                    mensaje.innerHTML = "<div class='alert alert-warning' id='error' role='alert'>ya esta en uso la identificacion</div>";

                    let id = document.getElementById('id').value = '';

                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let correcto = document.querySelector('#error');
                        mensaje.removeChild(correcto);
                    }
                   
                    if (respuesta == 'uso'){
                        setTimeout(animacion, 3000);
                    }

                 }
            } 
            else {
                console.log("Hubo un error en la solicitud de la información");
            }
        }
    
        // lugar de extraccion de datos y envio
    
        xhttp.open("POST", "partials/registro.php", true);
    
        //datos a enviar
    
        xhttp.send(form);

    
    }
}


