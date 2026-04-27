$(function () {

    load();

    // PAGINACIÓN AJAX
    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();console.log("$(this).attr('href')",$(this).attr('href'));
        load($(this).attr('href'));
    });

    let timer;

    $(document).on('keyup change', '#search, #cargo_id, #estado', function () {
        clearTimeout(timer);

        timer = setTimeout(function () {
            load();
        }, 400);
    });


    /*$('#cargo_id').select2({
        width: '100%'
    });
    $('#proyecto_id').select2({
        width: '100%'
    });*/


    /*$('#cargo_id').select2({
        dropdownParent: $('#modal-form') // IMPORTANTE si está en modal
    });
    $('#proyecto_id').select2({
        dropdownParent: $('#modal-form') // IMPORTANTE si está en modal
    });*/

    // ABRIR MODAL CREATE
    $("#btn-create").click(function (e) {
        e.preventDefault();
                
        let url = $(this).attr("href");

        $("#modal-form .modal-content").html("<div class='p-4 text-center'>Cargando...</div>");

        $("#modal-form .modal-content").load(url, function (response, status, xhr) {

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
            //cargarTipoPago();

            initValidation();
        });
    });

    // EDITAR
    $(document).on("click", ".btn-edit", function (e) {
        e.preventDefault();

        let url = $(this).attr("href");

        $("#modal-form .modal-content").load(url, function (response, status, xhr) {

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

    // JQUERY CON AJAX SIN AXIOS PARA GUARDAR NUEVO O ACTUALIZAR
    /*$(document).on("submit", "#form-create-trabajador", function (e) {
        e.preventDefault();

        let data = form.serialize();
        let form = $(this);

        if (!form.valid()) return;

        $.ajax({
            url: form.attr("action"),
            type: form.attr("method"),//es lo mismo   type: 'POST',
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
                    text: 'Trabajador guardado correctamente',
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
    });*/

    /*AXIOS PARA GUARDAR NUEVO O ACTUALIZAR*/
    //const form = $("#form-create-trabajador");//HTML fijo
    //form.submit(function(e){//HTML fijo
    $(document).on("submit", "#form-create-trabajador", function (e) {//AJAX / modal / dinámico
        e.preventDefault();
        let tipoPago = $('#cmb_tipo_pago').val();
        if (!tipoPago) {
            e.preventDefault();
            alert('Seleccione un tipo de pago');
            return;
        }

        //let url = form.attr("action");
        //let data = form.serialize();
        let form = $(this);
        if (!form.valid()){
             return;
        }
        console.log('form[0]', form[0]);
        let formData = new FormData(form[0]);
        console.log('form.attr("action")', form.attr("action"));
        
        /*$.ajax({
            url: url,
            type: form.attr("method"),//es lo mismo   type: 'POST',
            data: data,*/
        axios.post(form.attr("action"), formData)
            .then(response => {
                console.log('formData', formData); 
                const modalEl = document.getElementById('modal-form');console.log('modalEl', modalEl);
                const modal = bootstrap.Modal.getInstance(modalEl);console.log('modal', modal);

                if (!modal) {
                    modal = new bootstrap.Modal(modalEl);
                }

                //if (modal) modal.hide();
                modal.hide();

                load();

                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Guardado correctamente',
                    timer: 1500,
                    showConfirmButton: false
                });
            })
            .catch(error => {

                if (error.response && error.response.status === 422) {
                    showFieldErrors(error.response.data.errors);
                    return;
                }   

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error inesperado'
                });
            });
    });


    // ELIMINAR PRO
    /*$(document).on("click", ".btn-delete", function () {

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
    });*/

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

                axios.post(url, {
                    _method: 'DELETE'
                })
                .then(() => {

                    load();

                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado',
                        timer: 1200,
                        showConfirmButton: false
                    });
                });
            }
        });
    });

});

var load = function(url = null){

    url = url ? url : url_load;

    let data = {
        search: $('#search').val(),
        cargo_id: $('#cargo_id').val(),
        estado: $('#estado').val()
    };
    /*jquery sin axios*/
    $.get(url, data, function(response){
        $('#table-content').html(response);
    });
    /*jquery con axios*/
    /*axios.get(url, { params: data })
        .then(response => {
            $('#table-content').html(response.data);
        });*/
}

// VALIDACIÓN
function initValidation(){

    $("#form-create-trabajador").validate({

        rules: {
            nombre: { required: true, minlength: 5 },
            cargo_id: { required: true, number: true },
            proyecto_id: { required: true, number: true },
            tipo_pago_id: { required: true, number: true },
            tipo_cambio_id: { required: true, number: true }            
        },
        messages: {
                    nombre: "Nombre obligatorio (mínimo 5 caracteres)",
                    cargo_id: "Debe seleccionar el cargo",
                    proyecto_id: "Debe seleccionar el proyecto",
                    tipo_pago_id: "Debe seleccionar el tipo de pago",
                    tipo_cambio_id: "Debe seleccionar el tipo de cambio"
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

