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
