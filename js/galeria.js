$(document).ready(function(){
 // agregamos la clase activa al primer enlace
    $('.category-list .category-item[category="all"]').addClass('ct_item-active');
	
//decimos que a todo los category item al darle click le vamos agregar una funcion
	
$('.category-item').click(function(){
	//creamos variable para los filtro y llamar cada producto por su categoria
	var catproduct = $(this).attr('category');
	console.log(catproduct);
	
		// le agregaremos la clase active
		
$('.category-item').removeClass('ct_item-active');
	
	$(this).addClass('ct_item-active'); 
	// OCULTANDO PRODUCTOS 
	//agregando animacion
	$('.products-item').css('transform','scale(0)');
	// se crea una funcon para ocultar productos
	function hideproduct(){
	$('.products-item').hide();
	}
	// que los productos se desapareceria con un tiempo de 400ms esto le da tiempo 
	setTimeout(hideproduct,400);
	
	//MOSTRAndo PRODUCTOS ========
	
	function showproduct(){
	// utilizamos la variable que creamos arriba para llamar por filtro y a su vez para llamar por la categoria del producto
	$('.products-item[category="'+catproduct+'"]').show();
		
			$('.products-item[category="'+catproduct+'"]').css('transform','scale(1)');
		
	
	}
	setTimeout(showproduct,400);

	});
	// MOSTRANDO TODO LOS PRODUCTOS
	$('.category-item[category="all"]').click(function(){
		function showall(){
				$('.products-item').show();
			$('.products-item').css('transform', 'scale(1)');
		}setTimeout(showall,400);
	
		
	});
    
});


/*    */
	