import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle';

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $('#contactForm').submit(function(e) {
            e.preventDefault();

            // Validar campos del formulario
            var name = $('#contactName').val();
            var email = $('#contactEmail').val();
            var message = $('#contactMessage').val();

            if (name === '' || email === '' || message === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Por favor completa todos los campos!',
                });
                return;
            }
             var url = $(this).data('url');
            // Si los campos están completos, enviar datos con AJAX
            $.ajax({
                url: url, // Ruta hacia tu controlador en Laravel
                type: 'POST',
                data: {
                    name: name,
                    email: email,
                    message: message
                },
                success: function(response) {
                    // Mostrar SweetAlert de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito!',
                        text: 'Mensaje enviado correctamente!',
                    });

                    // Limpiar formulario después de enviar
                    $('#contactName').val('');
                    $('#contactEmail').val('');
                    $('#contactMessage').val('');
                },
                error: function(xhr, status, error) {
                    // Mostrar SweetAlert de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Hubo un error al enviar el mensaje. Por favor, intenta nuevamente más tarde.',
                    });
                }
            });
        });
});

    $(document).ready(function() {
        $('.view-more').on('click', function() {
            // Obtener los datos del producto del botón
            var name = $(this).data('name');
            var description = $(this).data('description');
            var price = $(this).data('price');
            var image = $(this).data('image');

            // Llenar los detalles del producto en la ventana modal
            $('#modalProductName').text('Nombre: ' + name);
            $('#modalProductDescription').text('Descripción: ' + description);
            $('#modalProductPrice').text('Precio: ' + price);
            $('#modalProductImage').attr('src', image);

            // Mostrar la ventana modal
            $('#productModal').modal('show');
        });
    });

    $(document).ready(function() {
    $('.view-discount').on('click', function() {
        // Obtener los datos del producto del botón
        var name2 = $(this).data('name');
        var description2 = $(this).data('description');
        var price2 = $(this).data('price');
        var image2 = $(this).data('image');
        var discount = $(this).data('discount');
        var date_start = $(this).data('start');
        var date_end = $(this).data('end');

        // Llenar los detalles del producto en la ventana modal
        $('#modalProductName').text('Nombre: ' + name2);
        $('#modalProductDescription').text('Descripción: ' + description2);
        $('#modalProductPrice').text('Precio: ' + price2);
        $('#modalProductDiscount').text('Descuento: ' + discount + '%');
        $('#modalProductStart').text('Fecha de Inicio: ' + date_start);
        $('#modalProductEnd').text('Fecha de Termino: ' + date_end);
        $('#modalProductImage').attr('src', image2);

        // Mostrar la ventana modal
        $('#discountModal').modal('show');
    });
});

