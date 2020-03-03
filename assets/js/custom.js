(function($) {

// Start of use strict
"use strict";
//Confirm Before Delete
$(document).ready(function()
{

  //HIDE EFFECT ON ITEM DELETION
  function cuteHide(div_id) 
  {
   div_id.hide("slow");
  }
    
  $(".deleteitem").click(function()
  {    
    var pin_verify = prompt("Please enter your pin code to coutinue");
    if (admin_pin == pin_verify && admin_pin != 0)
    {
      var div_id = $(this).closest('#hide_animate');
      cuteHide(div_id);
    }
    else if( pin_verify >= 1 && admin_pin != pin_verify)
    {
      alert('You entered an invalid pin. only admin can edit or delete');
      return false;
    }
    else
    {
      return false;
    }
  });

  $(".edit_verification").click(function()
  {    
    var pin_verify = prompt("Please enter your pin code to coutinue");
    if (admin_pin == pin_verify && admin_pin != 0)
    {
     return true;
    }
    else if( pin_verify >= 1 && admin_pin != pin_verify)
    {
      alert('You entered an invalid pin. only admin can edit or delete');
      return false;
    }
    else
    {
      return false;
    }
  });
 
  // Print Button To Print Invoice
  $('#btnPrint').click(function()
  {
    window.print();
  });

});

})(jQuery); // End of use strict