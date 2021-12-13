let btn = document.getElementById('btn').addEventListener('click',function(e){
    
    e.preventDefault()
    
    let id = document.getElementById('id').value;
    let idN = document.getElementById('idN').value;
    let departamento = document.getElementById('departamento').value;
    let mensaje = document.getElementById('mensaje');

    if (departamento == '' || id ==''||idN==''){
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
                }
            } 
            else {
                console.log('error conexion')
            }

        }

        https.open("POST","editadodep.php",true);

        https.send(form);
    }
})