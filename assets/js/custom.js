(function($) {

// Start of use strict
"use strict";
//Confirm Before Delete
$(document).ready(function()
{

  //HIDE EFFECT ON ITEM DELETION
  function cuteHide(el) 
  {
   el.hide("slow");
  }
    
  $(".deleteitem").click(function()
  {    
    if (!confirm("Do you want to delete!"))
    {
     return false;
    }
    else
    {
      var el = $(this).closest('#hide_animate');
      cuteHide(el);
    }
  });
 
  // Print Button To Print Invoice
  $('#btnPrint').click(function()
  {
    window.print();
  });

});

})(jQuery); // End of use strict