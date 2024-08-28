let id_arrow=null;
let column_arrow=null;
let order_arrow=null;
let order_type= null;
var data_operation = [
                      {"id": 'gte', "text": ">="},
                      {"id": 'lte', "text": "<="},
                      {"id": 'gt', "text": ">"},
                      {"id": 'lt', "text": "<"},
                      {"id": 'eq', "text": "="},
                      {"id": 'neq', "text": "!="},];

var data_text = [{"id": 'like', "text": "contiene"},
                 {"id": 'eq', "text": "igual a"},
                 {"id": 'startswith', "text": "empieza con"},
                 {"id": 'endswith', "text": "termina en"},
                 {"id": 'notlike', "text": "no contiene"},
                 {"id": 'neq', "text": "no es igual a"}];      

  
function form_list(element_group_filter)
{ 
    $(element_group_filter + " .content-operator").hide();
    //$(element_group_filter + ".content-operator select").select2('val', null);
    $(element_group_filter + " .content-value").show();
    $(element_group_filter + ' .section-text').hide();
    $(element_group_filter + " .section-text input[type=text]").val('');
    $(element_group_filter + ' .section-list').show();

}
function form_list_template(element_group_filter)
{ 
    $(element_group_filter + " .content-operator").hide();
    //$(element_group_filter + ".content-operator select").select2('val', null);
    $(element_group_filter + " .content-value-template").show();
    $(element_group_filter + ' .section-text-template').hide();
    $(element_group_filter + " .section-text-template input[type=text]").val('');
    $(element_group_filter + ' .section-list-template').show();

}
    
function form_text(element_group_filter)
{
    $(element_group_filter + " .content-operator").show();
    $(element_group_filter + " .content-value").show();
    $(element_group_filter + ' .section-text').show();
    $(element_group_filter + ' .section-list').hide();
}
    
function form_number(element_group_filter)
{
    $(element_group_filter + " .content-operator").show();
    $(element_group_filter + " .content-value").show();
    $(element_group_filter + ' .section-text').show();
    $(element_group_filter + ' .section-list').hide();
}
    
function form_date(element_group_filter)
{
    $(element_group_filter + " .content-operator").show();
    $(element_group_filter + " .content-value").show();
    $(element_group_filter + ' .section-text').show();
    $(element_group_filter + ' .section-list').hide();
}

function get_filters(element_group)
{
    
    var element_group = element_group|| "body";
    
    var array_filter = [];
    var array_field = [];
    var array_value = [];
    var array_operator = [];

    $(element_group + " input[name='filter[]']").each(function(ind, value){
        array_filter.push($(value).val());
    });

    $(element_group + " input[name='operator[]']").each(function(ind, value){
        array_operator.push($(value).val());
    });
    
    $(element_group + " input[name='value[]']").each(function(ind, value){
        array_value.push($(value).val());
    });
    
    $(element_group + " input[name='field[]']").each(function(ind, value){
        array_field.push($(value).val());
    });

    if(order_type && order_arrow){

        array_field.push(column_arrow);
        array_filter.push(order_type);
        array_operator.push("null");
        array_value.push(order_arrow);
    }
    
    var filters = {filters:{'filter': array_filter, value: array_value, 'operator': array_operator, 'field': array_field}};



    return filters;
}


function getOrderColumn(){
    $("#sort-"+id_arrow).addClass('order-active');
    if(order_arrow === 'asc'){
        $("#sort-"+id_arrow).data('order','desc');
        $("#up-"+id_arrow).css('border-bottom','solid 7px black');
        $("#arrow-"+id_arrow).removeClass('down-arrow');
        $("#arrow-"+id_arrow).addClass('up-arrow');
    }else{
        $("#sort-"+id_arrow).data('order','asc');

        //$(".up-arrow").css('border-top','solid 7px #0000003d');
        $("#down-"+id_arrow).css('border-top','solid 7px black');
        $("#arrow-"+id_arrow).removeClass('up-arrow');
        $("#arrow-"+id_arrow).addClass('down-arrow');

    }
}


    
    function get_list(url, field_id, field_text)
    {
        var field_id = field_id || 'id';
        var field_text = field_text || 'nombre';
        
        var data_list = [];
         
        $.ajax({
            url: url,
            type: 'get',
            async: false,
            success: function (values) {
                $.each(values, function(indx, value){
                    data_list.push({"id": value[field_id], "text": value[field_text]});
                });
            }
        });

        return data_list;
    }
    
    function get_list_template(url)
    {
        
        
        var data_list = '';
         
        $.ajax({
            url: url,
            type: 'get',
            async: false,
            success: function (html) {
                data_list = html
            }
        });

        return data_list;
    }

var CI = {
    filter: function (options) {
        var elemnt_field = $(options.controls.field)
        var elemnt_operator = $(options.controls.operator)
        var elemnt_value = '';
        var default_filter = options.default_filter ? options.default_filter :  null; 
        
        var elemnt_action = $(options.elemnt_action)
        var content_filters = $(options.content_filters)
        var data = options.data;
        var data_orders = options.data_orders ? options.data_orders : null ;
        var selected = null;
        
        var element_group_filter = options.group_filter ? options.group_filter :  'body';
        var element_cmb_value = options.cmb_value ? options.cmb_value :  '#cmb-value';
        

        elemnt_field.select2({
            "data": data,
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            escapeMarkup: function (text) { return text; }
        });
        elemnt_field.on('change', function(){
            elemnt_value = $(options.controls.value)
            if (elemnt_value.data("DateTimePicker")) {
                elemnt_value.data("DateTimePicker").destroy();
            }
            var value = $(this).val();
            var row = $.grep(data, function(e){
                return e.id == value; 
            });
            
            var field_name = row[0].text;
            var field_type = row[0].type;
            var type_select2 = row[0].type_select2 ? row[0].type_select2 : null;
            var template_list = row[0].template_list ? row[0].template_list : null;
            var multiple = row[0].multiple ? row[0].multiple : null;
            if (field_type == 'list') {
                text_value_multiple= [];
                form_list(element_group_filter);
                var list = row[0].list();
                 elemnt_value = $(element_cmb_value);
                var name_select2 = element_cmb_value.replace("#","");
                if(template_list){
                     var html = list;
                }else{
                    if(multiple){
                        var html = "";
                    }else{
                        var html = "<option value=''>Seleccionar "+field_name+"</option>";
                    }
                    

                    $.each(list, function(index, value){
                        option = "<option value="+value.id+">"+value.text+"</option>";
                        html = html + option;
                    });
                   
                }
                
               

                elemnt_value.html(html);                  
                
                if(type_select2){
                    if(multiple){
                        elemnt_value.attr("multiple","multiple");
                        elemnt_value.select2({ 
                            allowClear:true,
                            escapeMarkup: function (text) { return text; }
                        });
                        elemnt_value.val([]).trigger("change"); 
                        
                    }else{
                        elemnt_value.removeAttr("multiple","multiple");
                        elemnt_value.select2({ 
                            allowClear:true,
                            escapeMarkup: function (text) { return text; }
                        });
                    }
                    
                }else{
                    if($('#select2-'+name_select2+'-container').is('*')){
                        elemnt_value.select2('destroy');
                    }                    
                }
                //$("#cmb-value").select2({allowClear:true});
                
            } else if (field_type == 'text') {
                form_text(element_group_filter);
                elemnt_operator.not('option:first').html('');
                elemnt_operator.select2({'data': data_text});
            } else if (field_type == 'number') {
                form_number(element_group_filter);
                elemnt_operator.not('option:first').html('');
                elemnt_operator.select2({'data': data_operation});
            } else if (field_type == 'date') {
                var format = row[0].format ? row[0].format : 'YYYY/MM/DD';
                elemnt_value.addClass('dtp');
                form_date(element_group_filter);
                elemnt_value.datetimepicker({
                    locale: 'en', 
                    format: format, 
                    useCurrent: false, //Important! See issue #1075
                    widgetPositioning: {
                        vertical: 'bottom'
                    }
                });
                elemnt_operator.not('option:first').html('');
                elemnt_operator.select2({'data': data_operation});
            }
            elemnt_value.val('');
        });
        
        $(document).on('click', element_group_filter + " .close-filter", function(){
           $(this).parents('.tag-filter').remove();
            options.load();
        });
        
        elemnt_action.on('click', function (){
            var row = $.grep(data, function(e){
                return e.id == elemnt_field.find('option:selected').val(); 
            });
            
            var field = row[0].field ? row[0].field : null;
            var filter = row[0].filter ? row[0].filter : default_filter;
            var field_type = row[0].type;
            var field_name = elemnt_field.find('option:selected').html().toUpperCase();
            var field_operator = '';            
            var field_operator_id = null;
            var multiple = row[0].multiple ? row[0].multiple : null;
            if (field_type == 'list') {
                if(multiple){
                    var values_text = text_value_multiple;
                    field_value_id = elemnt_value.val();
                    field_value = elemnt_value.find(":selected").text();
                }else{
                    field_value_id = elemnt_value.find('option:selected').val();
                    field_value = elemnt_value.find('option:selected').html();
                    
                }
                
            } else {
                field_value_id = elemnt_value.val();
                field_value = elemnt_value.val();
                field_operator_id = elemnt_operator.find('option:selected').val();
                field_operator = elemnt_operator.find('option:selected').html()
            }
            
            if($('._'+filter).is('*') && field_type != 'number'){
                $('._'+filter).remove();
            }
  
            content_filters.after("<div class='m2 tag-filter' style='float: left'>\n\
                                            <input name='value[]' type='hidden' value='"+field_value_id+"'>   \n\
                                            <input name='filter[]' type='hidden' value="+filter+">   \n\
                                            <input name='operator[]' type='hidden' value="+field_operator_id+"> \n\                                         <input name='field[]' type='hidden' value="+field+">   \n\
                                            <span class='sidebar-title-tray'>\n\
                                                <span class='label bg-system'> \n\
                                                <span class='field-name text-muted'>"+field_name+"</span> \n\
                                                <span> : </span> \n\
                                                <span class='field-operator'>"+field_operator+"</span> \n\
                                                <b><span class='field-value'>"+field_value+"</span></b> \n\
                                                <i class='close-filter fa fa-times-circle' style='cursor:pointer'></i> \n\
                                                </span> \n\
                                            </span> \n\
                                        </div>");

            options.load();

        });
        
            
        data.forEach(function(name){
            if(name.selected) { 
               elemnt_field.select2('val',name.id);
            } 
        });
       
    },
    order : function (options){
        if(options.default_field){
            column_arrow = options.default_field;
        }
        if(options.default_order){
            order_arrow =  options.default_order;
        }
        if(options.default_order_type){
            order_type = options.default_order_type;
        }

        //console.log('defaul',column_arrow,order_arrow,order_type);
        var element = $(document);
        var element_event = options.element;
        /*if (options.isLoadFromAjax == false) {
            element = $(options.element);
            element_event = null;
        }*/
        $(element_event).on('click' , function(e){
            e.preventDefault();
            e.stopPropagation();

             id_arrow =$(this).data('id');
             column_arrow =$(this).data('column')?$(this).data('column') : null;
             order_arrow =$(this).data('order')? $(this).data('order'):'asc';
            order_type = $(this).data('filter') ? $(this).data('filter') : 'byOrder';
            order_success = true;

            if(order_type =='byOrder'){
                if(!column_arrow){
                    order_success = false;
                }
            }
            if(order_success){
                if(order_arrow === 'asc') {

                    $(this).addClass('order-active')
                    $(this).data('order','desc');
                    options.loadOrder(id_arrow,column_arrow,order_arrow)

                }else{
                    $(this).addClass('order-active')
                    $(this).data('order','asc');
                    options.loadOrder(id_arrow,column_arrow,order_arrow)
                }
            }

        });

        getOrderColumn();

    }
};