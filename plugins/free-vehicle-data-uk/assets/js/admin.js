function FVD_CreatePages(){
    var sURL = jQuery('#FVD_AjaxURL').val();
    jQuery.ajax({
            type: 'POST',
            url: sURL,
            data: {"action":"FVD_CreatePages"}, 
            success: function(data){
                jQuery('#CreatedPages').html(data.html);
                FVD_DisplayMessages(data.messages)
            },
            error: function (data) {},
        }); 
}
function FVD_ClearSearchLogs(){
    var sURL = jQuery('#FVD_AjaxURL').val();
    jQuery.ajax({
            type: 'POST',
            url: sURL,
            data: {"action":"FVD_ClearSearchLogs"}, 
            success: function(data){
                jQuery('#searchlog').val('');
                FVD_DisplayMessages(data.messages)
            },
            error: function (data) {},
        }); 
}
function FVD_ClearImages(){
    var sURL = jQuery('#FVD_AjaxURL').val();
    jQuery.ajax({
            type: 'POST',
            url: sURL,
            data: {"action":"FVD_ClearImages"}, 
            success: function(data){
                FVD_DisplayMessages(data.messages)
            },
            error: function (data) {},
        }); 
}

function FVD_DisplayErrors(aErrors){
    for(var i = 0; i < aErrors.length; i++){
        toastr.error(aErrors[i], 'Error!')
    }
}
function FVD_DisplayMessages(aMessages){
    for(var i = 0; i < aMessages.length; i++){
        toastr.success(aMessages[i], 'Message');
    }
}
