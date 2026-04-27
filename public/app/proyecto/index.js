$(function () {

    load();

    // PAGINACIÓN AJAX
    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();
        load($(this).attr('href'));
    });

    // ABRIR MODAL CREATE
    $("#btn-create").click(function (e) {
        e.preventDefault();

        let url = $(this).attr("href");

        $("#modal-form .modal-content").html("<div class='p-4 text-center'>Cargando...</div>");

        $("#modal-form .modal-content").load(url, function () {

           if (status === "error") {
                $("#modal-form .modal-content").html(`
                    <div class="p-4 text-danger">
                        Error al cargar formulario <br>
                        ${xhr.status} - ${xhr.statusText}
                    </div>
                `);
                return;
            }

            const modal = new bootstrap.Modal(document.getElementById('modal-form'));
            modal.show();

            initValidation();
        });
    });

    // EDITAR
    $(document).on("click", ".btn-edit", function (e) {
        e.preventDefault();

        let url = $(this).attr("href");

        $("#modal-form .modal-content").load(url, function () {
            const modal = new bootstrap.Modal(document.getElementById('modal-form'));
            modal.show();

            initValidation();
        });
    });

    // GUARDAR
    $(document).on("submit", "#form-create-proyecto", function (e) {
        e.preventDefault();

        let form = $(this);

        if (!form.valid()) return;

        $.ajax({
            url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),

            success: function (res) {

                // cerrar modal correctamente
                const modalEl = document.getElementById('modal-form');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();

                load();

                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Proyecto guardado correctamente',
                    timer: 1500,
                    showConfirmButton: false
                });
            },

            error: function (xhr) {

                let errors = xhr.responseJSON?.errors;
                let html = '';

                $.each(errors, function (key, value) {
                    html += `<div>${value[0]}</div>`;
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: html
                });
            }
        });
    });

    // ELIMINAR PRO
    $(document).on("click", ".btn-delete", function () {

        let id = $(this).data("id");
        let name = $(this).data("name");

        let url = $('#form-delete').attr('action').replace(':ROW_ID', id);

        Swal.fire({
            title: `¿Eliminar ${name}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        load();

                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            timer: 1200,
                            showConfirmButton: false
                        });
                    }
                });
            }
        });
    });

});

var load = function(url = null){
    var url = url ? url : url_load;
    console.log("url",url);
    $.get(url, function(data){
        console.log("paso",data);
        $('#table-content').html(data);
    });
}
// VALIDACIÓN
function initValidation(){

    $("#form-create-proyecto").validate({

        rules: {
            nombre: { required: true, minlength: 5 }
            
        },
        messages: {
                    nombre: "Nombre obligatorio (mínimo 5 caracteres)"
                },
        errorClass: "invalid-feedback",

        highlight: function (element) {
            $(element).addClass('is-invalid');
        },

        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },

        errorPlacement: function (error, element) {
            error.insertAfter(element);
        }
    });

}

