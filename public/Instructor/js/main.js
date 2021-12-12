let btn = document.querySelector('#btn').addEventListener('click',desertar);

function desertar(e){
    
    e.preventDefault();

    let id = document.querySelector('#id').value;
    let fic_num = document.querySelector('#fic_num').value;
    let causa = document.querySelector('#causa').value;
    let mensaje = document.querySelector('#mensaje');

    if (id == '' || fic_num == '' || causa == ''){
        mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let mensaje = document.querySelector('#mensaje');
            let error = document.querySelector('#error');
            mensaje.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }
    else {

        let form = new FormData();

        form.append("apr_id", id);
        form.append("fic_numero", fic_num);
        form.append("cad_codigo", causa);
        

        // let https = new XMLHttpRequest();
        let htps = new XMLHttpRequest()
    
        htps.onload = function(){
            console.log(htps.status)
            if(htps.status == 200){
                var respuesta = JSON.parse(this.response);
                console.log(respuesta);
                if (respuesta == 'desertado'){
                        mensaje.innerHTML="<div id='error' class='alert alert-warning' role='alert'>ya esta desertado o en proceso</div>";
                        let animacion = function(){
                            let mensaje = document.querySelector('#mensaje');
                            let error = document.querySelector('#error');
                            mensaje.removeChild(error);
                        }
                        setTimeout(animacion, 3000);
                        let id = document.querySelector('#id').value='';
                        return false;
                }
                else if (respuesta == 'no existe'){
                    mensaje.innerHTML="<div id='error' class='alert alert-warning' role='alert'>no existe</div>";
                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let id = document.querySelector('#id').value='';
                    return false;
                }
                else if(respuesta = 'bien'){
                    mensaje.innerHTML="<div id='error' class='alert alert-success' role='alert'>ingresado correctamente</div>";
                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                    }
                    let id = document.querySelector('#id').value='';
                    let fic_num = document.querySelector('#fic_num').value='';
                    let causa = document.querySelector('#causa').value='';
                    setTimeout(animacion, 3000);
                    location.href='instructor.php';
                    return false;
                }
                else if (respuesta == 'error'){
                    mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                    }
                    let id = document.querySelector('#id').value='';
                    let fic_num = document.querySelector('#fic_num').value='';
                    let causa = document.querySelector('#causa').value='';
                    setTimeout(animacion, 3000);
                    return false;
                }
                
            
            }
        }

    
            htps.open("POST","registrar-desercion.php",true)
            htps.send(form);
        }
    
}