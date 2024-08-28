var ModalCRUD = {
    create_element: '#new-entity',
    edit_element:   '.edit-entity',
    show_element:   '.show-entity',
    delete_element: '.delete-entity',
    delete_form: '#form-delete',
    params: '',
    kendo_content: '',
    
    create: function (options) {

        if (!options.element)
        {
            options.element = ModalCRUD.create_element
        }
        
        if (!options.kendo_content)
        {
            options.kendo_content = ModalCRUD.kendo_content
        }
        
        var element = $(document);
        var element_event = options.element;
        
        if (options.isLoadFromAjax == false) {
            element = $(options.element);
            element_event = null;
        }
        
        element.on('click', element_event, function(e){
            e.preventDefault(); 
            var current_button = $(this)
            $(current_button).attr("disabled", true);
            $(current_button).addClass('not-active');
            
            var url  = isFunction(options.url) ? options.url(current_button) : options.url;

            $.get(url, options.params).done(function (form_content) {
                var title_prefix = options.title_prefix ? options.title_prefix.toUpperCase() : 'NUEVO';
                var form_title  = title_prefix + ' ' + options.title.toUpperCase();

             
                if (options.params) {
                    if (isFunction(options.params.name)) {
                        var name = options.params.name(current_button);
                        form_title = form_title + ' - ' + name;
                    }
                }

                var form_submit = 'GUARDAR'
                var form_selector   = options.form_element ? options.form_element : '#form-create'

                var confirm_message = ( !options.confirm_message ) ? '¿Está seguro de crear este registro de ' + options.title.toLowerCase() + '?' : options.confirm_message;
                var confirm_title   = ( !options.confirm_title ) ? 'CREACIÓN DE ' + options.title.toUpperCase() : options.confirm_title.toUpperCase();
                var success_message = ( !options.success_message ) ? 'El registro se creó correctamente.' : options.success_message;
                
                ModalForm( form_title, form_submit, form_content, form_selector, options, confirm_message, confirm_title, success_message, current_button)

            })
            .fail(function(){
               $(current_button).removeAttr("disabled"); 
            });
             
        });

    },
    edit: function (options, init, afterSuccess) {
        if (!options.element)
        {
            options.element = ModalCRUD.edit_element
        }

        if (options.title_customize === undefined)
        {
            options.title_customize = {title: 'edición', title_confirm : 'editar', title_confirmed : 'editó'};
        }
        
        var element = $(document);
        var element_event = options.element;
        
        if (options.isLoadFromAjax == false) {
            element = $(options.element);
            element_event = null;
        }
        
        element.on('click', element_event, function(e){
            
            e.preventDefault();
            var current_button = $(this)
            $(current_button).attr("disabled", true);
            $(current_button).addClass('not-active');

            var parent = $(this).parent();
            if (parent.data('id') === undefined) {
                parent = $(this);
            }
            
            var id = $(parent).data('id')
            var entity_name = String($(parent).data('name'));
            
            if (options.params) {
                if (options.params.id) {
                    id = options.params.id;
                }
                
                if (options.params.name) {
                    entity_name = options.params.name(current_button);
                }
            }
            
            entity_name = entity_name ? entity_name.toUpperCase() : '' ;

            var url  = isFunction(options.url) ? options.url(current_button) : options.url.replace(':ROW_ID', id);            

            $.get(url, options.params).done(function (form_content) {

                if (options.full_form_title)
                {
                    var form_title      = options.full_form_title
                    var confirm_message = options.full_confirm_message
                    var confirm_title   = options.full_confirm_title

                    var success_message = options.full_success_message
                }
                else
                {                                                          
                    var form_title      = options.title_customize.title.toUpperCase() +' DE ' + options.title.toUpperCase() + ' "' + entity_name + '"'
                    var confirm_message = '¿Está seguro de '+options.title_customize.title_confirm +' el registro de ' + options.title + '?'
                    var confirm_title   = options.title_customize.title +' DE ' + options.title

                    var success_message = 'El registro se '+ options.title_customize.title_confirmed +' correctamente.'
                }

                var form_selector   = options.form_element ? options.form_element : '#form-update'
                var form_submit     = 'GUARDAR'

                ModalForm( form_title, form_submit, form_content, form_selector, options, confirm_message, confirm_title, success_message, current_button, afterSuccess)
               
            }).error(function(jqXHR){

                AlertMessage.hideSpining('.confirm-dialog')
                $('.confirm-dialog').modal('hide')
                $(current_button).removeAttr("disabled");
                $(current_button).removeClass('not-active');

                if (jqXHR.status == 404)
                {
                    AlertMessage.printError('.side-body', 'El registro no existe o ha sido eliminado.')
                }

            });;

        });

    },
    show: function (options) {

        if (!options.element)
        {
            options.element = ModalCRUD.show_element
        }
        
        if (!options.kendo_content)
        {
            options.kendo_content = ModalCRUD.kendo_content
        }
        
        var element = $(document);
        var element_event = options.element;
        
        if (options.isLoadFromAjax == false) {
            element = $(options.element);
            element_event = null;
        }

        element.on('click', element_event, function(e){
            e.preventDefault();
            var current_button = $(this)
            
            $(current_button).addClass('not-active')
            $(current_button).attr('disabled', true)

            var parent = $(this).parent();
            if (parent.data('id') === undefined) {
                parent = $(this);
            }
            
            var id = $(parent).data('id')
            var entity_name = String($(parent).data('name'))
            
            if (options.params) {
                id = options.params.id;
                
                if (isFunction(options.params.name)) {
                    entity_name = options.params.name(current_button);
                }
            }

            var url = '';
            if (isFunction(options.url)) {
                url =  options.url(current_button);
            } else {
                url = options.url.replace(':ROW_ID', id)
            }

            $.get(url, options.params).done(function (data) {
                $(current_button).removeClass('not-active')
                $(current_button).removeAttr('disabled')
                bootbox.dialog({
                    size: options.mode,
                    className: 'modal-primary',
                    closeButton: false,
                    message: data,
                    title: "DETALLE " + options.title.toUpperCase() +': '+ entity_name,
                    buttons: {
                        default: {
                            label: "CERRAR",
                            className: "btn-default",
                            callback: function() {
                            }
                        },
                    },
                    onEscape: function () {
                        if(! $('.loader-container').is('*')){
                            $('.bootbox.modal').modal('hide');
                        }else{
                            return false;
                        }                         
                    }
                }).init(function(e){
                    $("input").keydown(function (e){
                        // Capturamos qué telca ha sido
                        var keyCode= e.which;
                        // Si la tecla es el Intro/Enter
                        if (keyCode == 13){
                          // Evitamos que se ejecute eventos
                          event.preventDefault();
                          // Devolvemos falso
                          return false;
                        }
                    });

                    $(current_button).removeClass('not-active');
                    $(current_button).removeAttr('disabled');
                    
                    if (options.initialized) {
                       options.initialized($(current_button));
                    }
                });
            }).error(function(jqXHR){

                AlertMessage.hideSpining('.confirm-dialog')
                $('.confirm-dialog').modal('hide')

                if (jqXHR.status == 404)
                {
                    AlertMessage.printError('.side-body', 'El registro no existe o ha sido eliminado.')
                }

            });

        });
    },
    delete: function (options, init, afterSuccess) {

        if (!options.element)
        {
            options.element = ModalCRUD.delete_element
        }
        
        if (!options.delete_form)
        {
            options.delete_form = ModalCRUD.delete_form
        }

        if (options.title_customize === undefined)
        {
            options.title_customize = {title: 'eliminación', title_confirm : 'eliminar', title_confirmed : 'eliminó'};
        }
        
        
        if (options.title === undefined || options.title == '')
        {
            options.title = '-';
        } 
        
        if(options.hideModal === undefined)
        {
            options.hideModal = true
        }      

        $(document).on('click', options.element, function(e){
            e.preventDefault(); 
            var current_button = $(this)
            var parent = $(this).parent()

            var id = $(parent).data('id')
            var entity_name = String($(parent).data('name'))

            if (id === undefined) {
               id = $(this).data('id') 
               entity_name = String($(this).data('name')) 
            }
            
            if (options.params) {
                if (options.params.id) {
                    id = options.params.id;
                }
                
                if (options.params.name) {
                    entity_name = options.params.name(current_button);
                } 
            }
            
            $(current_button).attr("disabled", true);
            $(current_button).addClass('not-active');
      
            bootbox.dialog({
                    className: 'modal-danger',
                    closeButton: false,
                    //message: '¿Está seguro de '+options.title_customize.title_confirm.toLowerCase()+' el registro de '+ options.title.toLowerCase() + ' "' + entity_name + '"?',
                    message: '¿Está seguro de '+options.title_customize.title_confirm.toLowerCase()+' el registro de <b>' + entity_name + '<b> ?',
                    title: options.title_customize.title.toUpperCase()+" DE " + options.title.toUpperCase(),
                    buttons: {
                        default: {
                            label: "NO",
                            className: "btn-default",
                            callback: function() {
                                // Example
                            }
                        },
                        main: {
                            label: "SÍ",
                            className: "btn-primary",
                            callback: function() {
                                var form = $(options.delete_form);
                                console.log( options, form );
                                var url  = form.attr('action').replace(':ROW_ID', id);
                                var data = form.serialize();

                                 $.ajax({
                                    url: url,
                                    type: "post",
                                    data: data,
                                    dataType: 'json',
                                    success: function(data)
                                    {
                                        if(options.hideModal){
                                            $('.bootbox').modal('hide');
                                        } 

                                        if (options.afterSuccess) {
                                            var without_modal_success = data == 0 ? true : undefined;
                                            options.afterSuccess(data);
                                        } else if (afterSuccess) {
                                            afterSuccess();
                                        } else {
                                            refreshKendo(options.kendo_content)
                                        }
                                        
                                        if(without_modal_success === undefined){
                                            var success_message = bootbox.dialog({
                                                className: 'modal-success',
                                                backdrop: true,
                                                message: 'El registro se '+options.title_customize.title_confirmed.toLowerCase()+' correctamente.',
                                                title: "ÉXITO",
                                            })

                                            if (options.hideModal) {
                                                hideModal(success_message, 3)
                                            }
                                        }
                                    },
                                    error: function(jqXHR)
                                    {
                                        AlertMessage.hideSpining('.confirm-dialog')
                                        $('.confirm-dialog').modal('hide')

                                        if (jqXHR.status == 404)
                                        {
                                            AlertMessage.printError('.side-body', 'El registro no existe o ha sido eliminado.')
                                        }

                                        if (jqXHR.status == 422)
                                        {
                                            var message = jqXHR.responseJSON ? jqXHR.responseJSON : ''
                                            
//                                            $('.bootbox').modal('hide');
//                                            bootbox.dialog({
//                                                className: 'modal-error',
//                                                backdrop: true,
//                                                message: message,
//                                                title: "ERROR",
//                                            })
                                            AlertMessage.printError('.side-body', message)
                                        }

                                        if (jqXHR.status == 500)
                                        {
                                            AlertMessage.printError('.side-body', 'Error interno del servidor')
                                        }
                                    }
                                });
                            }
                        }
                    },
                    onEscape: function () {
                        if(! $('.loader-container').is('*')){
                            $('.bootbox.modal').modal('hide');
                        }else{
                            return false;
                        }                        
                    }
                }).init(function(e){
                    $("input").keydown(function (e){
                        // Capturamos qué telca ha sido
                        var keyCode= e.which;
                        // Si la tecla es el Intro/Enter
                        if (keyCode == 13){
                          // Evitamos que se ejecute eventos
                          event.preventDefault();
                          // Devolvemos falso
                          return false;
                        }
                    });
                    $(current_button).removeAttr("disabled");
                    $(current_button).removeClass('not-active');
                    
                    if (options.initialized) {
                       options.initialized($(this));
                    }
                });
            
        });
    },
    deleteV2: function (options, init, afterSuccess) {
        if (!options.element)
        {
            options.element = ModalCRUD.delete_element
        }

        if (!options.delete_form)
        {
            options.delete_form = ModalCRUD.delete_form
        }

        if (options.title_customize === undefined)
        {
            options.title_customize = {title: 'eliminación', title_confirm : 'eliminar', title_confirmed : 'eliminó'};
        }


        if (options.title === undefined || options.title == '')
        {
            options.title = '-';
        }

        if(options.hideModal === undefined)
        {
            options.hideModal = true
        }

        $(options.element).on('click',function(e){
            e.preventDefault();
            var current_button = $(this)
            var parent = $(this).parent()

            var id = $(parent).data('id')
            var entity_name = String($(parent).data('name'))

            if (id === undefined) {
                id = $(this).data('id')
                entity_name = String($(this).data('name'))
            }
            if (options.params) {
                if (options.params.id) {
                    id = options.params.id;
                }

                if (options.params.name) {
                    entity_name = options.params.name(current_button);
                }
            }

            $(current_button).attr("disabled", true);
            $(current_button).addClass('not-active');

            bootbox.dialog({
                className: 'modal-danger',
                closeButton: false,
                message: '¿Está seguro de '+options.title_customize.title_confirm.toLowerCase()+' el registro de <b>' + entity_name + '<b> ?',
                title: options.title_customize.title.toUpperCase()+" DE " + options.title.toUpperCase(),
                buttons: {
                    default: {
                        label: "NO",
                        className: "btn-default",
                        callback: function() {
                            // Example
                        }
                    },
                    main: {
                        label: "SÍ",
                        className: "btn-primary",
                        callback: function() {
                            var form = $(options.delete_form);
                            console.log( options, form );
                            var url  = form.attr('action').replace(':ROW_ID', id);
                            var data = form.serialize();

                            $.ajax({
                                url: url,
                                type: "post",
                                data: data,
                                dataType: 'json',
                                success: function(data)
                                {
                                    if(options.hideModal){
                                        $('.bootbox').modal('hide');
                                    }

                                    if (options.afterSuccess) {
                                        var without_modal_success = data == 0 ? true : undefined;
                                        options.afterSuccess(data);
                                    } else if (afterSuccess) {
                                        afterSuccess();
                                    } else {
                                        refreshKendo(options.kendo_content)
                                    }

                                    if(without_modal_success === undefined){
                                        var success_message = bootbox.dialog({
                                            className: 'modal-success',
                                            backdrop: true,
                                            message: 'El registro se '+options.title_customize.title_confirmed.toLowerCase()+' correctamente.',
                                            title: "ÉXITO",
                                        })

                                        if (options.hideModal) {
                                            hideModal(success_message, 3)
                                        }
                                    }
                                },
                                error: function(jqXHR)
                                {
                                    AlertMessage.hideSpining('.confirm-dialog')
                                    $('.confirm-dialog').modal('hide')

                                    if (jqXHR.status == 404)
                                    {
                                        AlertMessage.printError('.side-body', 'El registro no existe o ha sido eliminado.')
                                    }

                                    if (jqXHR.status == 422)
                                    {
                                        var message = jqXHR.responseJSON ? jqXHR.responseJSON : ''

                                        AlertMessage.printError('.side-body', message)
                                    }

                                    if (jqXHR.status == 500)
                                    {
                                        AlertMessage.printError('.side-body', 'Error interno del servidor')
                                    }
                                }
                            });
                        }
                    }
                },
                onEscape: function () {
                    if(! $('.loader-container').is('*')){
                        $('.bootbox.modal').modal('hide');
                    }else{
                        return false;
                    }
                }
            }).init(function(e){
                $("input").keydown(function (e){
                    // Capturamos qué telca ha sido
                    var keyCode= e.which;
                    // Si la tecla es el Intro/Enter
                    if (keyCode == 13){
                        // Evitamos que se ejecute eventos
                        event.preventDefault();
                        // Devolvemos falso
                        return false;
                    }
                });
                $(current_button).removeAttr("disabled");
                $(current_button).removeClass('not-active');

                if (options.initialized) {
                    options.initialized($(this));
                }
            });

        });
    }
};

var AlertMessage = {
    SUCCESS: 1,
    ERROR: 0,
    spinId: '32er32',
    print: function ($elm, msg) {
        var out = '';
        if (typeof msg === "object") {
            var a = [];
            for (var i in msg) {
                a.push(msg[i]);
            }
            out = a.join("<br/>");
        } else {
            out = msg;
        }

        var tpl = AlertMessage.defaultTpl();
        var msg = tpl.replace("##msg##", "<br/>" + out);
        AlertMessage.removeCurrentAlerts()
        $($elm).prepend(msg);
    },
    printError: function ($elm, msg) {
        var out = '';
        if (typeof msg === "object") { 
            var a = [];
            for (var i in msg) {
                a.push("<span>"+msg[i][0]+"</span>");
            }
            out = a.join("<br/>");
        } else {
            out = msg;
        }

        var tpl = AlertMessage.errorTpl();
        var msg = tpl.replace("##msg##", "<br/>" + out);
        AlertMessage.removeCurrentAlerts()
        $($elm).prepend(msg);
    },
    printSuccess: function ($elm, msg) {
        var tpl = AlertMessage.successTpl();
        msg = tpl.replace("##msg##", msg);
        AlertMessage.removeCurrentAlerts()
        $($elm).prepend(msg);
    },
    printInfo: function ($elm, msg) {
        var tpl = AlertMessage.infoTpl();
        msg = tpl.replace("##msg##", msg);
        AlertMessage.removeCurrentAlerts()
        $($elm).prepend(msg);
    },
    errorTpl: function () {
//        return "<div class='alert fresh-color alert-danger alert-dismissible' role='alert'>" +
//                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
//                        "<strong>Ha ocurrido un error!</strong> ##msg##" +
//                "</div>"
        
        return  "<div class='alert alert-sm alert-border-left alert-danger alert-dismissable'>"+
                    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+
                    "<i class='fa fa-warning pr10'></i>"+
                    "<strong>Error!</strong>"+
                    "<a href='#' class='alert-link'> ##msg##</a>"+
                "</div>"
    },
    successTpl: function () {
//        return "<div class='alert fresh-color alert-success alert-dismissible' role='alert'>" +
//                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
//                        "<strong>Éxito!</strong> ##msg##" +
//                "</div>"
          return "<div class='alert alert alert-border-bottom alert-system bg-gradient alert-dismissable'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" +
                    "<i class='fa fa-check pr10'></i>"+
                    "<strong>Éxito!</strong>"+
                    "<a href='#' class='alert-link'> ##msg## </a>" +
                 "</div>"
    },
    infoTpl: function () {
        return "<div class='alert fresh-color alert-info alert-dismissible' role='alert'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
                        "<strong><span class='fa fa-info-circle fa-5' ><span></strong> ##msg##" +
                "</div>"
    },
    defaultTpl: function () {
        return "<div class='alert fresh-color alert-default  alert-dismissible' role='alert'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
                        " ##msg##" +
                "</div>"
    },
//    spin: function () {
//        return "<div id='32er32' class='loader-container text-center color-white'>" +
//                    "<div><i class='fa fa-spinner fa-pulse fa-3x'></i></div>" +
//                    "<div>Cargando</div>" +
//                "</div>"
//    },
     spin: function () {
        return "<div id='32er32'>" +
                    "<div class='loader-container'>"+
                        "<div class='loader-icon'>"+
                            "<div class='loader-container-icon text-center'>"+
                                "<i class='fa fa-spinner fa-pulse fa-3x'></i></div>" +
                            "</div>"+
                            //"<div>Cargando</div>" +
                    "</div>"+
                "</div>";
    },
    showSpining: function (idElement) {
        
        if ($('.bootbox').length) {
            idElement = '.modal-content:last';
        }
        
        $(idElement).append(AlertMessage.spin());
        $(idElement).addClass('loader');
    },
    hideSpining: function (idElement) {
        $(idElement).find("#" + AlertMessage.spinId).remove();
    },
    removeCurrentAlerts: function(){
        $('body .alert').remove()
    },
};

function hideModal(element, seconds)
{
    setTimeout(function() { $(element).modal('hide'); }, seconds * 1000);
}

function showMessage(e)
{
    var grid = e.sender;
    if (grid.dataSource.total() == 0)
    {
        var colCount = grid.columns.length;
        $(e.sender.wrapper)
            .find('tbody')
            .append('<tr><td colspan="' + (colCount) + '" class="text-muted">No hay registros en la base de datos.</td></tr>');
    }
}
                                               
function ModalForm( form_title, form_submit, form_content, form_selector, options, confirm_message, confirm_title, success_message, current_button, afterSuccess)
{

    $(current_button).removeAttr("disabled");
    $(current_button).removeClass("not-active");
    var form_dialog = bootbox.dialog({
        
        size: options.mode,
        className: 'modal-primary modal-form',
        closeButton: false,
        message: form_content,
        title: form_title,
        buttons: {
            default: {
                label: "CERRAR",
                className: "btn-default",
                callback: function() {
                    // Example
                }
            },
            main: {
                label: form_submit,
                className: "btn-primary",
                callback: function() {

                    ignoreFields(options.ignore)

                    AlertMessage.removeCurrentAlerts();

                    var form = $(form_selector);

                    $(form).validate(options.rules);

                    var url = form.attr('action');

                    if ( form.valid() )
                    {
                        var confirm_dialog = bootbox.dialog({
                            className: 'modal-primary confirm-dialog',
                            closeButton: false,
                            backdrop: true,
                            message: confirm_message,
                            title: confirm_title,
                            buttons: {
                                default: {
                                    label: "NO",
                                    className: "btn-default nos",
                                    callback: function(e) {

                                    }
                                },
                                main: {
                                    label: "SÍ",
                                    className: "btn-primary",
                                    callback: function() {

                                        AlertMessage.showSpining('.confirm-dialog')

                                        //var fields = $( form ).serialize();
                                        
                                        var fields = new FormData(form[0]);
                                        $.ajax({
                                            url: url,
                                            type: "post",
                                            data: fields,
                                            dataType: 'json',
                                            contentType: false,
                                            processData: false,
                                            success: function(data)
                                            {
                                                $('.bootbox').modal('hide');
                                                
                                                if (options.afterSuccess) {
                                                    options.afterSuccess(data);
                                                } else if(afterSuccess) {   
                                                    afterSuccess(data);
                                                } else { 
                                                    refreshKendo(options.kendo_content);
                                                }
                                                   
                                                var success_dialog = bootbox.dialog({
                                                    className: 'modal-success',
                                                    backdrop: true,
                                                    message: success_message,
                                                    title: "ÉXITO",
                                                })
                                                
                                                hideModal(success_dialog, 3)
                                            },
                                            error: function(jqXHR)
                                            {
                                                AlertMessage.hideSpining('.confirm-dialog');
                                                $('.confirm-dialog').modal('hide');
                                                

//                                                if (jqXHR.status == 422)
//                                                {
//                                                    var message = jqXHR.responseJSON ? jqXHR.responseJSON : ''
//                                                    AlertMessage.printError($('.modal-body', form_dialog), message)
//                                                }
//                                                else
//                                                {
//                                                    if (jqXHR.status == 404)
//                                                    {
//                                                        var message = jqXHR.responseJSON ? jqXHR.responseJSON : ''
//                                                        AlertMessage.printError($('.modal-body', form_dialog), message)
//                                                    }
//
//                                                    if (jqXHR.status == 500)
//                                                    {
//                                                        var message = 'Error interno de servidor'
//                                                        AlertMessage.printError($('.modal-body', form_dialog), message)
//                                                    }
//                                                }
                                            }
                                        });

                                        return false;
                                    }
                                }
                            }
                        }).init(function () {

                            form_dialog.addClass('push-back');

                        }).on('hidden.bs.modal', function (e) {

                            form_dialog.removeClass('push-back');

                            var modal = e.target

                            if ( $(modal).hasClass('confirm-dialog') )
                            {
                                var $body = $('body')
                                $body.addClass('modal-open')
                            }

                        }); 

                        return false;
                    }
                    
                    return false;
                }
            }
        },
        onEscape: function () {
            if(! $('.loader-container').is('*')){
                $('.bootbox.modal').modal('hide');
            }else{
                return false;
            } 
        }
    }).init(function(e){

        $("input").keydown(function (e){
            // Capturamos qué telca ha sido
            var keyCode= e.which;
            // Si la tecla es el Intro/Enter
            if (keyCode == 13){
              // Evitamos que se ejecute eventos
              event.preventDefault();
              // Devolvemos falso
              return false;
            }
          });

        $(current_button).removeClass('not-active');
        $(current_button).removeAttr('disabled');
            
        if (options.initialized) {
            options.initialized(current_button);
        }
        
    }).on('hidden.bs.modal', function (e) {

        var modal = e.target

        if ( $(modal).hasClass('modal-form') )
        {
            $(current_button).removeClass('not-active');
            $(current_button).removeAttr('disabled');
        }

    });        
}

function isFunction(functionToCheck)
{
    var getType = {};
    return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
}


function ignoreFields(fields)
{
    $(fields).addClass('ignore') 
}

