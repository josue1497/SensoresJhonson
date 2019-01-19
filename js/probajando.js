
        $(document).ready(function() {

            
            
            
              $('.eliminarbt').click(function(e){
       var ideliminar = $(this).attr("id");
      $.ajax({
          method: "post",
          url: "carrito.php",
          data:{ideliminar:ideliminar},
          success:function(data){
              $('.tr'+ideliminar).html(data);
          }
      });
      
           
                    $(this).closest('tr').remove().val('');       
            location.reload();
            
        });
             
        });

  