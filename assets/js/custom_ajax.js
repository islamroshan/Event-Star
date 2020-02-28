(function($) {
    $(document).ready(function(){
        $('#tic_hide').hide();
        $('#event_picker').change(function(){
            var event_id = $('#event_picker').val();
            if(event_id != '')
            {
                $.post(baseurl+"/guest/add_guest_controller/geting_ticket", {event_id:event_id}, function( data ){
                    $('#tic_hide').show();
                    $('#sel_tic').html(data);
                });
            }
        });
    });
})(jQuery); // End of use strict
 