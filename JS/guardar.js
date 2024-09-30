$(document).ready(function() {
    $('#form-productos').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'Productos/guardar_producto.php',
            data: $(this).serialize(),
            success: function(response)
            {
               document.getElementById('form-productos').reset();
           }
       });
     });
});