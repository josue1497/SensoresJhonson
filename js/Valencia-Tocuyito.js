$(document).ready(function(){
 
    var banner = {
        propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre: $('#banner'),
/*  accede al banner pero quederemos acceder a lo que esta dentro del banner para eso utilizamos children y llamamos a su clase se le pone un contandor length para que haga el recorrido de cuantos hay*/ 
        
        
parasabercuantoslidehay: $('#banner').children('.slide').length, posicion:1 
        /*posicion 1 por que nuestro banner comenzara en la posicion 1 */
                            
    }
    // creamos el objeto info
    var info = {
        
        // declaramos a nuestro padre osea todo lo que contiene nuestra div section article etc 
        padre:$('#info'),
        
        // cuantos numeros de slide hay en nuestro padre osea section div article  etc para eso llamamos a la clase informacion y a sus hijo 

sliderhay: $('#info').children('.slide').length,
        posicion:1 
        /*posicion 1 por que nuestro banner comenzara en la posicion 1 */                        }
    
    // definimos el alto de nuestro banner donde esta la informacion a traves de una funcion
    
    // crearemos una variable para calcular el alto de cada uno de los banner 
     
    var alturadeinformacion = function(){
        
          // el outerheight calcula el alto que tiene cada slider o imagen y lo guardamos en una variable llamamos a nuestro objeto que definimos al padre a su hijo y el outerheight que define su altura;
        
        var alturainfo = info.padre.children('.slide').outerHeight();
                   
        // ahora modificaremos su css entrando al div padre para modificar su altura ancho etc agregandole nuestra variable nueva de altura ancho etc
        
        info.padre.css({
            'height': alturainfo + 'px'
            
                 
            // esto es una funcion no se va a ejecutar hasta que la llamemos
        });
    }
      // llamamos a la funcion por que si no no se ejecuta recuerda de llevarla al metodo window para que se haga responsive
       alturadeinformacion(); 
  
   
      /* llamare a la variable banner que es donde almacene mi objeto despues al div padre y a su hijo para cambiarle al primero first osea su primer elemento su css y hacerlo aparecer que aparesca en pantalla modificando su largo ancho etc en pantalla */
     banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children('.slide').first().css({
       
       'left' : 0
    });
    
   
   
    //crearemos una funcion que se encarge de la altura automatica del banner
    
    var alturadelbannerautomatico = function(){
        // crearemos una variable para calcular el alto de cada uno de los banner 
         
        var altura = banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children('.slide').outerHeight();
        
        // el outerheight calcula el alto que tiene cada slider o imagen y lo guardamos en la variable altura para eso llamamos a nuestro objeto donde alojamos la propiedades del banner llamamos a sus a su hijo terminamos con ;
        
        // ahora modificaremos su css entrando al div padre para modificar su altura ancho etc
        
        banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.css({
            
            'height':altura + 'px'
            
            // esto es una funcion no se va a ejecutar hasta que la llamemos
        });
        
        
    }
    
    // para que una funcion se ejecute hay que llamarla
    alturadelbannerautomatico();
    
    //cuando la ventana cambie de tamaño ejecutamos la funcion de altura automatica llamando a nuestra funcion previamente resize= realizar
    
    $(window).resize(function(){
        alturadelbannerautomatico();
         // llamamos a nuestro funcion para que se active  esta altura tenemos que meterla en la ventana que realizara es responsive
    alturadeinformacion(); 
    });
    
    
    // banner
    
   //Boton anterior <<<
    
    // llame a mi boton banner y le puse el prevent dafaul para evitar #
    $('#banner-next').on('click',function(e){
       e.preventDefault ();
        
        //sinuestra posicion que dijimos que era 1 y nuestra variable banner es menor que los numeros de mi slide ("parasabercuantoslideshay") entonces accederemos a:
        
        if(banner.posicion < banner.parasabercuantoslidehay){
            // hacemos que todos nuestro slide se posiciones a la derecha y como tienen un overflow:hidden no se veran en la pagina para eso accedemos a nuestra variable banner luego al div padre que es banner.podrieda para acceder a nuestro banner que utilizamos para identificar nuestro banner una ves accedemos a los hijos de ese div a traves del .children y todos lo que no tenga la clase active osea que se esten presente en la imagen modificaremos su codigo css que lo moveremos a la derecha>>
            
            banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children().not('.active').css({
               'left': '100%'
                
            });
            
            
            
            //accederemos a la clase active y se la eliminaremos removeClass y se la pondremos al siguiente la clase active permite que al dar click se cambie la imagen OJO banner .active es la clase completa eliminaremos active en removeClass y se la agregamos a la proximam .next().addClass('active') la animamos con un left 0 por que nuestra imagen tiene un left en el css de 100%
                
       
                
        $('#banner .active').removeClass('active').next().addClass('active').animate({
            'left':'0'
            
        });
            
            //aqui accedemos al banner por el id  que tenga la clase activa y decimos que el anterior .prev() lo anime con un left que vaya al contrario   
            
            $('#banner .active').prev().animate({
                'left': '-100%'
            });
            
    //incremetamos la variable banner llamando a posicion para saber hasta donde llega nuestro slide y poder retormar la principal
            
            banner.posicion = banner.posicion + 1;
            
        } else{
            
            // hacemos que la la ultima imagen que tiene la clase active se desplaze hace la izqueirda quede ocultada y empieze la otra desde la derecha a traves de la animacion
            
            $('#banner .active').animate({
               'left': '-100%' 
            });
            
            // nos aseguramos que nuestra imagen comienze desde la derecha y entren desde la izquierda llamando a las propiedas del banner a los hijso que estan dentro de esas propiedades y lo que no tiene tienen la clase activa luego procedemos a modificarle el css con el left 100 y left -100
             banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children().not('.active').css({
               'left': '100%'
                
            });
            
            
            
            // llamamos a nuestro banner que tiene la clase active $('#banner .active') y le decimos que remueva la clase active
            
            
           $('#banner .active').removeClass('active');
           
           //una vez removida la clase accedemos a nuestro variable banner.propiedades para acceder a nuestro banner que es donde se esta almacenando nuestro active accedemos al hijo .childre de este div que es donde esta nuestras imagenes de clases .slide le decimos que al primero .first le agregemos la clase active osea que nuestro active se posicione en la primera animamos .animate para que nuestra imagen cambie de posicion en este caso de left 100 a 0
            banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children('.slide').first().addClass('active').animate({
                'left':'0'
            });
            // reiniciamos nuestra posicion para que se posicione nuevamente en 1 que  es donde empieza
            banner.posicion = 1;
            
        }      
        
    });
    
    // boton siguiente >>
    
    // llame a mi boton banner y le puse el prevent dafaul para evitar #
    $('#banner-prev').on('click',function(e){
        e.preventDefault();
        
       //si banner es mayor a la posicion 1 entonces tendremos que modificar todo el codigo 
        
       if(banner.posicion>1){
           
             //modificamos nuestro ccs llamando al div padre y sus hijo de la clase que no tenga active para que sus imagenes se posiciones a la derecha fuera del slider
        banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children().not('.active').css({
            'left': '-100%'
        });
        
        // accedemos a la slider activa de nuestro padre y queremos animarla osea que nuestra se posicionara a la derecha
        $('#banner .active').animate({
           'left':'100%' 
        });
           
           // accedemos a la clase active removemos .removeClass active al elemento anterior .prev agregemos la clase active addClass y la animamos con un left 0 para que quede posicionada la clase active activa la imagen y hace que se vea
           
           $('#banner .active').removeClass('active').prev().addClass('active').animate({
              'left': '0' 
           });
           // reajsutamos la posicion si le damos regresar su posicion se le restara uno al banner osea a la imagen anterior
           banner.posicion = banner.posicion -1;
     
       } else{
           //accedemos a la clase banner a traves de nuestros propiedades igualmente accedemos a sus hijo y a los que no tenga .not la clase active lo vamos a posicionar a la derecha modificando su css
           banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children().not('active').css({
              'left': '-100%' 
           });
           
           // animamos a la clase activa para que las imagenes que habiamos posicionado arriba a la derecha entren  si nos fijamos arriba tiene -100% y la animacion tiene que ser lo contrario para que se posicione 100%
           
           $('#banner .active').animate({
               'left': '100%'
           });
           
           // se elimina la clase activa para ponersela al ultimo mediante la otra linea de codigo
           $('#banner .active').removeClass('active');
       //accedemos al div padre banner a sus propiedades que establecimos  banner.propieda.... a los hijos .children al ultimos o el que paso last le agregamos la clase addClass y lo animamos desde donde este hacia la posicion 0 que es donde refleja la imagen que establecimos
           banner.propieda_para_acceda_a_nuestro_banner_del_html_y_nuestro_div_padre.children().last().addClass('active').animate({
              'left': '0' 
           });
           //reiniciamos la posicion con nuestro banner posicon y llamamos banner.parasercuantoslidehay por que es el numero de slide que nosotro tenemos tonces al tener tanta posiciones el la banner.posicion la va asumiendo
           banner.posicion = banner.parasabercuantoslidehay;
           
       }
        
      
        
    });
    
    //------------------------ informacion
    
     // llamo a mi objeto llamo a mi div artecle padre llamo a su hijo obtengo su clase "slide" y le modifico al primero osea llamo al primero first() su css para que aparesca en pantalla ya sea su alto ancho etc
    
    info.padre.children('.slide').first().css({
    'left': 0
    });
    
    //----------- Botton de siguiente con el infor >>>
    
    // llamo a mi boton de la flechita y ponerle el preven default para evitar el # on('click' function(e){ e.pre..... ;});
    
    $('#info-next').on('click',function(e){
       e.preventDefault (); 
     
          
      
        // con este condicional digo si mi posicion es menor a los sladier que tengo entonces procederemos a los siguiente para eso llamo a mi objeto info dentro de mi objeto el atributo posicion y de igual forma con el el sliderhay
        
        if(info.posicion < info.sliderhay){
            
            // 1) hacemos que todos nuestro slide se posiciones a la derecha y como tienen un overflow:hidden no se veran en la pagina para eso accedemos a nuestra objeto info luego al div padre que info.padre para acceder a nuestro banner que utilizamos para identificar nuestro banner una ves accedemos a los hijos de ese div a traves del .children y todos lo que no tenga la clase .not('.active')active osea que se esten presente en la imagen modificaremos su codigo css que lo moveremos a la derecha>>
            
           info.padre.children().not('.active').css({
               'left': '100%'
           });
               
            //2)accederemos a la clase active y se la eliminaremos removeClass y se la pondremos al siguiente la clase active permite que al dar click se cambie la imagen OJO banner .active es la clase completa eliminaremos active en removeClass y se la agregamos a la proximam .next().addClass('active') la animamos con un left 0 por que nuestra imagen tiene un left en el css de 100% en este caso lo llamamos del id pero creo que se puede llamar desde su objetos
       
            $('#info .active').removeClass('active').next().addClass('active').animate({
           'left': '0'
            
        });
      
            
         // 3)aqui accedemos al info que tenga la clase activa y decimos que el anterior .prev lo anime con un left que vaya al contrario  recordando llamar al padre de su id# y a los hijo de la clase .  
                $('#info .active').prev().animate({
               'left': '-100%'
                
            });
            
             //4)incremetamos la variable posicion en el objeto info llamando a posicion para saber hasta donde llega nuestro slider y poder retormar la principal para eso utilizamos un contador info.poscion ++ creo o lo igualamos a el mismo +1 ;
           
            info.posicion = info.posicion +1;
        
        }
        
        // si eso no se cumple entonces
        
        else{
             //5) hacemos que el tiene la clase 'active' se desplaze hace la izqueirda quede ocultada y empieze la otra desde la derecha a traves de la animacion llamando al id padre y su hijo por su clase
            
            $('#info .active').animate({
               
                'left': '-100%'
            });
              
              // 5) nos aseguramos que nuestrainfomacion comienze desde la derecha y entren desde la izquierda llamando a las propiedas del objeto info a los hijos que estan dentro de esas propiedades y lo que no not('.') tiene tienen la clase activa luego procedemos a modificarle el css con el left 100 y left -100
              
            
            info.padre.children().not('.active').css({
               
                'left': '100%'
            });
            
            
            //6) llamamos a nuestro info a traves del id que tiene la clase active $('#banner .active') y le decimos que remueva la clase active;
            
            
            $('#info .active').removeClass('active');
            
            //7)una vez removida la clase accedemos a nuestro objeto info a su clase princiapl que es donde se esta almacenando nuestro active accedemos al hijo .childre de este div que es donde esta nuestras informacion de clases .slide le decimos que al primero .first le agregemos la clase al agregar va sin punto active osea que nuestro active se posicione en la primera animamos .animate para que nuestra imagen cambie de posicion en este caso de left 100 a 0
             info.padre.children('.slide').first().addClass('active').animate({
               
                'left':'0'
            });
            
            
           // decimos que nuestra posicion en la infomacion cuando ya aya llegado al limete retome a 1
            
             info.posicion = 1;
        }
        
        // para que nuestra altura de la informacion se adapte automaticamente previamente esto ya lo hicimos arriba
        alturadeinformacion(); 
        
        
    });
    
    });