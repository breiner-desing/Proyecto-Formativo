
const btn = document.querySelector('#btn');

btn.addEventListener('click', update);

function update(e){
    e.preventDefault();
    let id = document.querySelector('#id').value;
    let form = new FormData();

    form.append('id', id);

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        console.log("¿La conexión con la BBDD fue correcta?: " + xhttp.status + ' ' + xhttp.readyState);
        if(xhttp.status == 200){
            var respuesta = JSON.parse(this.response);
             console.log ("todo bien " + respuesta);
            if (respuesta === 'error'){
                let error = document.querySelector('#mensaje');
                error.innerHTML = '<div class="alert alert-danger" alert-dismissible" role="alert"> ' + mensaje + ' </div>';
                return false;
            }
            else if (respuesta === 'actualizar'){
                location.href = "../solicitud.php" ;
            }
        } 
        else {
            console.log("Hubo un error en la solicitud de la información");
        }
    }

    // lugar de extraccion de datos y envio

    xhttp.open("POST", "../partials/aceptar.php", true);

    //datos a enviar

    xhttp.send(form);
}