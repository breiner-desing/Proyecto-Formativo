let boton = document.querySelectorAll(".eliminar");
for (var i = 0; i < boton.length; i++){
    boton[i].addEventListener('click', alert);
}


function alert(e){
    if (confirm('segura de eliminar?')){
        return true;
    }
    else{
        e.preventDefault();
    }
}



//agregar datos

let btn = document.querySelector('#btn').addEventListener('click',rh);
let btn2 = document.querySelector('#btn2').addEventListener('click',causa);
let btn3 = document.querySelector('#btn3').addEventListener('click', id );
let btn4 = document.querySelector('#btn4').addEventListener('click', programa);
let btn5 = document.querySelector('#btn5').addEventListener('click', depto );
let btn6 = document.querySelector('#btn6').addEventListener('click', ciudad);
let btn7 = document.querySelector('#btn7').addEventListener('click', ficha);


// rh

function rh(e){
    e.preventDefault()
    console.log('click')
    let rh = document.querySelector('#rh').value;
    console.log(rh);
    let mensaje = document.querySelector('#mensaje');
    if (rh == ''){
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
        form.append("rh",rh);
        
        const https = new XMLHttpRequest()

        https.onloadend = function () {
            if(https.status == 200){
                var respuesta = JSON.parse(this.response);
                console.log(respuesta);
                if (respuesta == 'bien'){
                    mensaje.innerHTML="<div id='error' class='alert alert-success' role='alert'>agregado</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje2.removeChild(error);
                        
                    }
                    setTimeout(animacion, 3000);
                    let causa = document.querySelector('#rh').value = '';
                    location.href= 'datos.php';
                }
                else if (respuesta == 'error'){
                    mensaje.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let causa = document.querySelector('#rh').value = '';
                }
            }
        }

        https.open("POST","partials/rh.php", true);

        https.send(form);
    }
}


//causa de desercion

function causa(e){
    e.preventDefault()
    let causa = document.querySelector('#causa').value;
    let mensaje2 = document.querySelector('#mensaje2');
    if (causa == ''){
        mensaje2.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let mensaje = document.querySelector('#mensaje2');
            let error = document.querySelector('#error');
            mensaje.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }
    else {
         
        let form = new FormData();
        form.append("causa",causa);

        const https = new XMLHttpRequest()

        https.onload = function (){
            if(https.status == 200){
                var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    mensaje2.innerHTML="<div id='error' class='alert alert-success' role='alert'>agregado</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje2.removeChild(error);
                        location.href= 'datos.php'
                    }
                    setTimeout(animacion, 3000);
                    let causa = document.querySelector('#causa').value = '';
                }
                else if (respuesta == 'error'){
                    mensaje2.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje2.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let causa = document.querySelector('#causa').value = '';
                }

            }
        }

        https.open("POST", "partials/causa.php", true);

        https.send(form);
    }
}

// tipos de identificacion

function id(e){
    e.preventDefault()
    let id = document.querySelector('#id').value;
    let id2 = document.querySelector('#id2').value;
    let mensaje3 = document.querySelector('#mensaje3');
    if (id =='' || id2 == '' ){
        mensaje3.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let error = document.querySelector('#error');
            mensaje3.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }

    else{

        let form = new FormData();
        
        form.append("id",id);
        form.append("descripcion", id2);

        const htpps = new XMLHttpRequest()

        htpps.onload = function () {
            if (htpps.status == 200){
                var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    mensaje3.innerHTML="<div id='error' class='alert alert-success' role='alert'>agregado</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje3.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let id = document.querySelector('#id').value = '';
                    let id2 = document.querySelector('#id2').value = '';
                    location.href='datos.php';
                }

                else if (respuesta == 'error'){
                    mensaje3.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje3.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let causa = document.querySelector('#causa').value = '';
                }
            }
        }

        htpps.open("POST","partials/id.php", true);

        htpps.send(form);
    }
}


//programa 

function programa(e){
    e.preventDefault()
    
    let descripcion = document.querySelector('#descripcion').value;
    let estado = document.querySelector('#estado').value;
    let mensaje4 = document.querySelector('#mensaje4');
    if (descripcion == '' || estado == ''){
        mensaje4.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let error = document.querySelector('#error');
            mensaje4.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }

    else {

        let form = new FormData();

        form.append("descripcion",descripcion)
        form.append("estado",estado);

        const https = new XMLHttpRequest()

        https.onload = function (){
            if (https.status == 200){
                var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    mensaje4.innerHTML="<div id='error' class='alert alert-success' role='alert'>agregado</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje4.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let id = document.querySelector('#descripcion').value = '';
                    let id2 = document.querySelector('#estado').value = '';
                    location.href='datos.php' 
                }

                else if (respuesta == 'error'){
                    mensaje4.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje4.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let causa = document.querySelector('#causa').value = '';
                }
            }
        }

        https.open("POST","partials/programa.php", true)

        https.send(form);
    }
}


//departamento 


function depto(e){
    e.preventDefault()
    let codigo = document.querySelector('#codigo').value;
    let departamento = document.querySelector('#departamento').value;
    let mensaje5 = document.querySelector('#mensaje5');
    if (codigo == '' || departamento == ''){
        mensaje5.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let error = document.querySelector('#error');
            mensaje5.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }

    else {

        let form = new FormData();

        form.append("codigo",codigo);
        form.append("depto",departamento);

        const http = new XMLHttpRequest()

        http.onload = function (){
            if (http.status == 200){
                var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    mensaje5.innerHTML="<div id='error' class='alert alert-success' role='alert'>agregado</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje5.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let codigo = document.querySelector('#codigo').value = '';
                    let departamento = document.querySelector('#departamento').value = '';
                    location.href = 'datos.php';
                }
                else if (respuesta == 'error'){
                        mensaje5.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                        let animacion = function(){
                            let error = document.querySelector('#error');
                            mensaje5.removeChild(error);
                        }
                        setTimeout(animacion, 3000);
                        let codigo = document.querySelector('#codigo').value = '';
                        let departamento = document.querySelector('#departamento').value = '';
                }

                else if (respuesta == 'uso'){
                    mensaje5.innerHTML="<div id='error' class='alert alert-warning' role='alert'>esta en uso</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje5.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let codigo = document.querySelector('#codigo').value = '';
                    let departamento = document.querySelector('#departamento').value = '';
                }
            }
        }

        http.open("POST", "partials/depto.php",true);

        http.send(form);
    }
}


//ciudad 

function ciudad(e){
    e.preventDefault()
    
    let codigo = document.querySelector('#postal').value;
    let ciudad = document.querySelector('#ciudad').value;
    let dep = document.querySelector('#dep').value;
    let mensaje6 = document.querySelector('#mensaje6');

    if (codigo == '' || ciudad == '' || dep == ''){
        mensaje6.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let error = document.querySelector('#error');
            mensaje6.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }

    else {

        let form = new FormData()
        form.append("codigo",codigo);
        form.append("ciudad",ciudad);
        form.append("dep",dep);

        const http = new XMLHttpRequest()

        http.onload = function (){
            if (http.status == 200){
                var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    mensaje6.innerHTML="<div id='error' class='alert alert-success' role='alert'>agregado</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje6.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let codigo = document.querySelector('#postal').value = '';
                    let ciudad = document.querySelector('#ciudad').value = '';
                    let dep = document.querySelector('#dep').value = '';
                    location.href = 'datos.php';
                }
                else if (respuesta == 'error'){
                        mensaje5.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                        let animacion = function(){
                            let error = document.querySelector('#error');
                            mensaje5.removeChild(error);
                        }
                        setTimeout(animacion, 3000);
                        let codigo = document.querySelector('#postal').value = '';
                        let ciudad = document.querySelector('#ciudad').value = '';
                        let dep = document.querySelector('#dep').value = '';
                }

                else if (respuesta == 'uso'){
                    mensaje6.innerHTML="<div id='error' class='alert alert-warning' role='alert'>esta en uso</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje6.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let codigo = document.querySelector('#postal').value = '';
                    let ciudad = document.querySelector('#ciudad').value = '';
                    let dep = document.querySelector('#dep').value = '';
                }
            
            }
        }

        http.open("POST","partials/ciudad.php", true);

        http.send(form);
    }
}



//ficha

function ficha(e){
    e.preventDefault()
    let ficha = document.querySelector('#ficha').value;
    let programa = document.querySelector('#programa').value;
    let centro = document.querySelector('#centro').value;
    let inicio = document.querySelector('#inicio').value;
    let final = document.querySelector('#final').value;

    let mensaje7 = document.querySelector('#mensaje7');

    if (ficha == '' || programa == '' || centro == '' ||inicio == '' || final == ''){
        mensaje7.innerHTML="<div id='error' class='alert alert-danger' role='alert'>completar todos los campos</div>";
        let animacion = function(){
            let mensaje = document.querySelector('#mensaje2');
            let error = document.querySelector('#error');
            mensaje7.removeChild(error);
        }
        setTimeout(animacion, 3000);
        return false;
    }
    else {
         
        let form = new FormData();

        form.append("ficha",ficha);
        form.append("programa",programa);
        form.append("centro",centro);
        form.append("inicio",inicio);
        form.append("final",final);

        const https = new XMLHttpRequest()

        https.onload = function (){
            if(https.status == 200){
                var respuesta = JSON.parse(this.response);
                if (respuesta == 'bien'){
                    mensaje7.innerHTML="<div id='error' class='alert alert-success' role='alert'>agregado</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje7.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    
                    location.href = 'datos.php';
                }
                else if (respuesta == 'error'){
                    mensaje7.innerHTML="<div id='error' class='alert alert-danger' role='alert'>error</div>";
                    let animacion = function(){
                        let error = document.querySelector('#error');
                        mensaje7.removeChild(error);
                    }
                    setTimeout(animacion, 3000);
                    let ficha = document.querySelector('#ficha').value = '';
                    let programa = document.querySelector('#programa').value = '';
                    let centro = document.querySelector('#centro').value = '';
                    let inicio = document.querySelector('#inicio').value = '';
                    let final = document.querySelector('#final').value = '';
                }

            }
        }

        https.open("POST", "partials/ficha.php", true);

        https.send(form);
    }
}
