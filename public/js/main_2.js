//llamar boton

let btn = document.querySelector('#btn');

// ponerle evento

btn.addEventListener('click', campos);

function campos(e){
    //evitar qyue se refresque la pagina

    e.preventDefault()
    
    //capturar los datos

    let id = document.querySelector('#id').value ;
    let contrasenia = document.querySelector('#contrasenia').value ;
    let mensaje = "complete los campo";
    
    // verificar que los campos esten llenos 

    if (id === '' || contrasenia === ''){

        //verificar console.log('b');

        let error = document.querySelector('#mensaje');
        error.innerHTML = '<div class="alert alert-danger" alert-dismissible" role="alert"> ' + mensaje + ' </div>';
        return false;
    }
    else {
        let error = document.querySelector('#mensaje');
        error.innerHTML = '<div class="alert alert-success" role="alert"> correcto </div>';
    }

    if (id.length > 15){
        
        console.log('z');
        
        let error = document.querySelector('#mensaje');
        error.innerHTML = '<div class="alert alert-danger" alert-dismissible" role="alert"> exede el numero de campos </div>';
        return false;
    }

    envioo(id,contrasenia)
}

function envioo(id,contrasenia){
 
    // crear un objeto FormData

    let data = new FormData();

    //poner datos en la data

    data.append("id", id);
    data.append("contrasenia", contrasenia);

    //ajax

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        console.log("¿La conexión con la BBDD fue correcta?: " + xhttp.status + ' ' + xhttp.readyState);
        if(xhttp.status == 200){
            var respuesta = JSON.parse(this.response);
             console.log ("todo bien " + respuesta);
            if (respuesta === 'error'){
                let error = document.querySelector('#mensaje');
                error.innerHTML = '<div class="alert alert-danger" alert-dismissible" role="alert"> no se puede ingresar </div>';
                return false;
            }
            else if (respuesta === 'DIRECTOR'){
                location.href = "director/director.php" ;
            }
            else if (respuesta === 'APRENDIZ'){
                console.log('h');
                location.href = "aprendiz/aprendiz.php";
            }
            else if (respuesta == 'INSTRUCTOR'){
                location.href = "Instructor/instructor.php";
            }
        } 
        else {
            console.log("Hubo un error en la solicitud de la información");
        }
    }

    // lugar de extraccion de datos y envio

    xhttp.open("POST", "partials/validar.php", true);

    //datos a enviar

    xhttp.send(data);
}