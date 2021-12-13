
let btn = document.querySelector('#btn').addEventListener('click',desercion);

function desercion(e){
    
    e.preventDefault()
    let id = document.querySelector('#id').value;
    let horario = document.querySelector('#horario').value;
    let ficha = document.querySelector('#ficha').value;
    let causa = document.querySelector('#causa').value;
    let mensaje = document.querySelector('#mensaje');
    
    if (id == '' || horario == '' || ficha == '' || causa == ''){
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
        
        let form = new FormData()

        form.append("id",id);
        form.append("horario",horario);
        form.append("ficha",ficha);
        form.append("causa",causa);

        const http = new XMLHttpRequest()

        http.onload = function () {
            if (http.status == 200 ){
                var respuesta = JSON.parse(this.response)
                if (respuesta == 'bien'){
                        mensaje.innerHTML="<div id='error' class='alert alert-success' role='alert'>desercion realizada correctamente</div>";
                        let animacion = function(){
                            let error = document.querySelector('#error');
                            mensaje.removeChild(error);
                        }
                        setTimeout(animacion, 3000);
                        location.href='../director.php';
                    
                }
                else if (respuesta == 'error'){
                    mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>eror</div>";
                    let animacion = function(){
                        let mensaje = document.querySelector('#mensaje');
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                }
            }
        }

        http.open("POST","proceso.php");

        http.send(form);
    }
}