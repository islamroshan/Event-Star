(function($) {
    $(document).ready(function(){
        $('#tic_hide').hide();
        $('#tamount_hide').hide();

        $('#event_picker').change(function(){
            var event_id = $('#event_picker').val();
            if(event_id != '')
            {
                $.post(baseurl+"guest/add_guest_controller/geting_ticket", {event_id:event_id}, function( data ){
                    $('#tic_hide').show(500);
                    $('#sel_tic').html(data);
                });
            }
            else
            {
                return null;
            }
        });
        $('#sel_tic').change(function(){
            var ticket_id = $('#sel_tic').val();
            if( ticket_id != '' )
            {
                $.post(baseurl+"guest/add_guest_controller/get_ticket_price", {ticket_id:ticket_id}, function( data ){
                   $('#tamount_hide').show(500);
                   $('#tamount').val(data);
                });
            }
        });
    });
    
})(jQuery); // End of use strict
 