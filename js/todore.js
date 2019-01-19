
$(document).ready(function(){
	
	//falta comentarlo voy a llorar jajaj lo hice :D
	
$(".tab a").on("click", function(e){
	e.preventDefault();
	
	$(this).parent().addClass('active');
	$(this).parent().siblings().removeClass('active');
	
	target = $(this).attr("href");
	$(".contenido-tab > div").toggle();
	
	$(target).fadeIn(600);
	
	 
});
	
});



(function(){
		

var formulario = document.formulario_registro,
    elementos = formulario.elements;
                      
    var focusinput = function(){
    this.parentElement.children[0].className = "label active";
     this.parentElement.children[1].className = this.parentElement.children[1].className.replace(" error", "");
   
};
    
    var blurinput = function(){
    if(this.value<= 0){
        this.parentElement.children[0].className="label";
       this.parentElement.children[1].className = this.parentElement.children[1].className + " error";
        
    }
    };
    
    
    for(var i=0; i< elementos.length; i++){
        
        if(elementos[i].type == "text" || elementos[i].type == "email"|| elementos[i].type == "password"|| elementos[i].type == "number"){
            elementos[i].addEventListener("focus", focusinput);
            elementos[i].addEventListener("blur", blurinput);
           
        }
        
    }
    
    
    var validarinputs = function(){
        for(var i = 0; i < elementos.length; i++){
            
            if(elementos[i].type == "text" || elementos[i].type == "email"|| elementos[i].type == "password"|| elementos[i].type == "number"){
                if(elementos[i].value == 0){
                    console.log('el campo' + elementos[i].name + 'esta incompleto');
                   
                    elementos[i].className = elementos[i].className + ' error';
                    return false;
                }else{
                elementos[i].className=elementos[i].className.replace(" error", ""); 
                }
                
                
            }
            
        }
        
   if(elementos.pass.value !== elementos.pass2.value){
        elementos.pass.value = "";
        elementos.pass2.value = "";
        elementos.pass.className = elementos.pass.className + " error";
        elementos.pass2.className = elementos.pass2.className + " error";
        
    }else{
        elementos.pass.className = elementos.pass.className.replace(" error", "");
        elementos.pass2.className = elementos.pass2.className.replace(" error", "");
    }
    return true;
    
        
    };
    
    
var registrarse = function(e){
    if(!validarinputs()){
        console.log('falto validar los Input');
       e.preventDefault();
    } else{
        console.log('Registrado correctamente');
     // e.preventDefault();
        
    } };
    
    function validarinputs(){
    var nombre, apellidos, cedula, email, direccion, pass, tlf;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    email = document.getElementById("email").value;
    cedula = document.getElementById("cedula").value;
    direccion = document.getElementById("direccion").value; 
    tlf = document.getElementById("tlf").value;
   pass = document.getElementById("pass").value;
    
    if(nombre ==""){
        alert("Complete su datos");
        return false;
    }
    
}
    
    
   formulario.addEventListener("submit", registrarse);
    
    //declaro mi variable en este caso formulario1 llamo a todo el documento con document. ingreso el padre de formulario de name ="..." creo otra variables para sus elementos elementos2 llamo a mi formulario 1 que tiene almacenado a mi padre y mando a llamar a traves del metodos elements a todo sus elementos;
    
var formulario1 = document.formulario_registro2,
    elementos1 = formulario1.elements;
    
    
    //procedo a crear el efecto del focus para declararle su active esto es mediante una funcion para simplemente llamarlo a la hora de utilizarlos declaro mi variable var Nombrevariablefocus = funticon(){donde se declara por el parametro this. para los elementos .parentElement que estan dentro osea sus hijo .children en la poscion que fue establecida en el html el label en mi caso 0 .children[0] se le agrega la clase active al label traves del metodo className= "label active";

    
    var focusinput1 = function(){
        this.parentElement.children[0].className="label active";
        // para ponerle la clase error al focus y se quite cuando este aya llenado el input se llama a la clase padre este a traves del this. llamamos al padre .parentElement y de esos elementos solicitamos al hijo en la posicion en que se cuentre en este caso 1 .children[1] y decimos que su className va a hacer igual a lo establecido pero necesitamos replazarlos para eso llamamos al metodos .replace() y le agregamos su clase error creada en el css .replace(" error", "");
        
        this.parentElement.children[1].className = this.parentElement.children[1].className.replace(" error", "");
    }
    
 
    // se crea la funcion blur para remover la clase active del label que tiene el focus declaramos una variable y esta va ejecutar una funcion con un ciclo si este this.value valor es menor o igual a 0  <=0 remueve la clase label dices este this. llamas a su padre y todos sus elementos parentElement accedes a tus hijo .children en la posicion [0] y la clase label .className es igual a su su clase
    
    var blurinput1 = function(){
         if(this.value<= 0){
        this.parentElement.children[0].className="label";
             // la clase error sera dada igual que la active llamando a su padre a su hijo en el elemento en que se encuentre children[] y a su clase className la igualamos y  decimos lo mismo this. el elemento padre su hijo en que posicion se encuentra className la concatenamos con un + y le pasamos la clase error que creamos en el css ojo 
             this.parentElement.children[1].className=this.parentElement.children[1].className + " error";
    }
    }
    
    
    // creamos un ciclo for para recorrer todos los elementos llamando a variable que le pasamos todos los parametos del padre en este caso elementos1 y le agregamos el metodo length elementos1.length
    
    for(var i = 0; i <elementos1.length; i++){
        
        // decimos si los elementos en la posicion i que nos recorre el ciclo if()... son del tipo que nos interes en este caso elementos1[i] son del tipo numerico elementos1[i].type=".." o de otro tipo || elementos1[i].type=".."  y asi sucesivamente
        
        if(elementos1[i].type=="text" || elementos1[i].type=="password"){
            // entonces generamos el eventos del focus y el blur
            
            elementos1[i].addEventListener("focus", focusinput1);
            elementos1[i].addEventListener("blur", blurinput1);
        }
        
        
    }
    
    
    //procedemos a validar los inputs esto es a traves de un ciclo for que se encarge de recorrerlo y no lo hagamos 1 por 1 crearemos nuestra funcion que nos servirar para el boton de en este caso iniciar sesion 
    
    var validar = function (){
        // nuestro for obviamente sera de nuestros elementos1 a todos .length 
        for(var i =0; i < elementos1.length; i++){
            
            // para el momento de enviar o algo necesitamos validarlos por eso decimos si if() los elementos de nuestros siclo elementos1[i] son del tipo type == a los que tenemos en el input entonces  
            
            if(elementos1[i].type=="text" || elementos1[i].type=="password"){
                
                // procedemos a decir si su valor en if() los elementos1[i] es 0 value==0 entonces le agregamos la clase error
                if(elementos1[i].value == 0){
                    console.log('Datos incorrectos');
                    
                    // la clase error la agregamos recorriendo el ciclo con nuestro elementos1[i] llamamos a nuestra clase className y la igualamos a ella misma mas su concatenacion + ' error' 
                    elementos1[i].className= elementos1[i].className + ' error';
                    
                    // y retornamo false para que se vuelva a ejecutar la funcion de ser falso obviamente 
                    return false;
                } 
                
                // si no else tenemos que remover la clase error y como lo hacemos llamando a su elementos1[i] y a la clase className la igualamos a ella misma pero esta ves remplazamos el error con el metodo replace(" error", "");
                else{
                    elementos1[i].className= elementos1[i].className.replace(" error", "");
                    
                }
            }
            
        }
        
        // procedemos a validar si los datos son los correctos para eso utilizamos un ciclo que diga si if() lo hare en php 
        if(elementos1.cedula.value==0 || elementos1.clave.value == 0){
            
            elementos1.cedula="";
            elementos1.clave="";
            
            elementos1.cedula.className= elementos1.cedula.className + ' error';
            elementos1.clave.className= elementos1.clave.className  + ' error';
            
        } else{
            
            elementos1.cedula.className= elementos.cedula.className.replace(" error","");
        
         elementos1.clave.className= elementos.clave.className.replace(" error","");
        }
        
        
   return true;
        
    }
    
    var iniciarsesion = function(){
        if(!validar()){
            console.log('falto validar los inputs')
            e.preventDefault();
        } else{
            
            console.log('Bienvenido');
            e.preventDefault();
        }
        
    }
    
    formulario1.addEventListener("submit",iniciarsesion);
    
    
    
  // validar formulario mediante javascript
	function validarformulario(){
		var nombre,apellido,correo,cedula,direccion,clave,telefono,expresion;
		nombre = document.getElementById("nombre").value;
		apellido = document.getElementById("apellido").value;
		correo = document.getElementById("email").value;
		cedula=document.getElementById("cedula").value;
		direccion=document.getElementById("direccion").value;
		clave=document.getElementById("clave").value;
		telefono=document.getElementById("tlf").value;
		
		expresion = /\W+@\W+\.+[a-z]/;
		
		if(nombre == "" || apellido == "" || correo == "" || cedula== "" || direccion == "" || clave == "" || telefono== "" ){
			alert("Todos los campo son obligatorios");
			return false;
		}
		
		else if(nombre.length>30){
			alert("el nombre es muy largo");
			return false;
		}
		
		else if(apellido.length>30){
			alert("el apellido es muy largo");
			return false;
		}
		else if(correo.length>30){
			alert("el correo es muy largo");
			return false;
		}
		
		else if(!expresion.test(correo)){
			alert("el correo no es valido");
			return false;
		}
		
		else if(cedula.length>10){
			alert("cedula incorrecta");
			return false;
		}
		else if(direccion.length>50){
			alert("Direccion corta");
			return false;
		}
		
		else if(telefono.length>12){
			alert("Numero invalido");
			return false;
		}
		
		else if(clave.length>20){
			alert("clave muy larga");
			return false;
		}
		
		
		
	}	
	validarformulario();
	
        
}());