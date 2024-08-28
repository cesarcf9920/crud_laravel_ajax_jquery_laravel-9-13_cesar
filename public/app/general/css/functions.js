$(document).ready(function () {
    if(jQuery(".menu-children-active").is("*")){
        jQuery(".menu-children-active").parent().parent().find('a.accordion-toggle').addClass('active-menu menu-open');
    }
    if(jQuery(".active-menu").is("*")){
        jQuery(".active-menu").parents('.sub-nav').parents('li.group-general-menu').find('a.module-parent').addClass('active-menu menu-open');
    } 
    
    jQuery(':input[type=text]').attr('autocomplete', 'off');
    
});

var showLoader = function(selector){
    var selector = selector|| "html";
    AlertMessage.showSpining(selector);
    
    if(selector === 'html'){        
        $(selector).css('overflow', 'hidden');
    }

}

var hideLoader = function(selector){
    var selector = selector|| "html";
    AlertMessage.hideSpining(selector);
    
    if(selector === 'html'){
        $(selector).css('overflow-y', 'auto');
    } 
}