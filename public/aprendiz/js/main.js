let button = document.getElementById("button").addEventListener('click', campoVacio);

function campoVacio(e){
    e.preventDefault();
    console.log("click");

    let apr_id = document.getElementById("apr_id").value;
    let fic_num = document.getElementById("fic_num").value;
    let cau_des = document.getElementById("cau_des").value;


    if(apr_id == "" || fic_num == "" || cau_des == ""){
        console.log("datos vacios");
        let msg = document.getElementById("msg");
        msg.innerHTML = '<div class="alert alert-danger" alert-dismissible" role="alert">Complete todos los campos</div>';
    } else{
        let formulario = new FormData();
        formulario.append("apr_id", apr_id);
        formulario.append("fic_num", fic_num);
        formulario.append("cau_des", cau_des);

        const enviar = new XMLHttpRequest()

        enviar.onload = function(){
            console.log(enviar.status)
            if(enviar.status == 200){
                var respuesta = JSON.parse(this.response);
                console.log(respuesta);
                if(respuesta == "Bien"){
                    let msg = document.getElementById("msg");
                    msg.innerHTML = '<div class="alert alert-success" alert-dismissible"     role="alert">Petición enviada con exito</div>';
                } else if(respuesta == "Mal"){
                    let msg = document.getElementById("msg");
                    msg.innerHTML = '<div class="alert alert-danger" alert-dismissible" role="alert">No se pudo realizar la petición</div>';
                }
            }
        }

        enviar.open("POST", "php/almacenar_peticion.php", true);

        enviar.send(formulario);
    }
}
