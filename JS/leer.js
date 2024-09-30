$(document).ready(function() {
    $('#form-productos').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: 'Productos/leer_producto.php',
            data: $(this).serialize(),
            success: function(response){

           }
       });
     });
});