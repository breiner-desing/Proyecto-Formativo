let btn = document.getElementById('btn').addEventListener('click',function(e){
    
    e.preventDefault()

    console.log('click')
    
    let id = document.getElementById('id').value;
    let causa = document.getElementById('causa').value;
    let estado = document.getElementById('estado').value; 
    let mensaje = document.getElementById('mensaje');

    if (causa == '' || id ==''||estado == ''){
        mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar campos</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                        
                    }
                    setTimeout(animacion, 3000);
                    console.log(id,causa,estado);
    }
    else {

        let form = new FormData();

        form.append("causa",causa);
        form.append("estado",estado)
        form.append('id',id);

        let https = new XMLHttpRequest()

        https.onloadend = function(){
            if (https.status=200){
            var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    location.href='../datos.php';
                }

                else if (respuesta=='mal'){
                    mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>agregado</div>";
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

        https.open("POST","editadocausa.php",true);

        https.send(form);
    }
})