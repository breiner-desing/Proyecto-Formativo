let btn = document.getElementById('btn').addEventListener('click', function(e){
    
    e.preventDefault()
    
    let id = document.getElementById('id').value;
    let password = document.getElementById('contrasenia').value;
    let confirmar = document.getElementById('confirmar').value;
    let mensaje = document.getElementById('mensaje');
    let nueva = document.getElementById('nueva').value;

    if (password==''||confirmar==''||id == '' || nueva == ''){
        mensaje.innerHTML = "<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let mensaje = document.querySelector('#mensaje');
            let error = document.querySelector('#error');
            mensaje.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }
    else if (password !== confirmar){
        mensaje.innerHTML = "<div id='error' class='alert alert-danger' role='alert'>los compos no son iguales</div>";
        let animacion = function(){
            let mensaje = document.querySelector('#mensaje');
            let error = document.querySelector('#error');
            mensaje.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }
    else if (password==confirmar){
        
        let form = new FormData()
        
        form.append('contrasenia',password);
        form.append('id',id);
        form.append("nueva",nueva);

        let https = new XMLHttpRequest()

        https.onload = function () {
            if ( https.status == 200 ){
                console.log('conexion exitosa')
                var respuesta = JSON.parse(this.response);
                console.log(respuesta)
                if (respuesta=='bien'){
                    mensaje.innerHTML = "<div id='error' class='alert alert-success' role='alert'>se cambio correctamente</div>";
                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    location.href='aprendiz.php';
                    return false;
                }
                else {
                    mensaje.innerHTML = "<div id='error' class='alert alert-danger' role='alert'>" + respuesta + "</div>";
                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    return false;
                }
            }
        }

        https.open("POST", "php/nueva.php", true);

        https.send(form);
    }
    
})