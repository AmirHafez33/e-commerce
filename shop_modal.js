$(".modalptn").click(function (ev) {
  ev.preventDefault();
  var pro_id = $(this).data("proid");

  $.post(
    "modal_id.php",
    {
      pro_id: pro_id,
    },
    function (data) {
      // console.log(data);
      
        $(".modal").html(data);
        var modal = document.getElementById("productView");
        modal.className = "modal fade show"; // Change class
        modal.style = "display: block; padding-right: 17px;"; // Change class
         $("body").append('<div class ="modal-backdrop fade show"></div>');
    }
  );
});

$(document).on("click", ".closemodal", function(){

    $(".modal_div").remove(); // Remove modal div
    var modal = document.getElementById("productView");
    
    modal.className = "modal fade"; // Change class
    modal.style = "display: none ;"; // Change class
    modal.removeAttribute("aria-modal");
    modal.setAttribute("aria-hidden" , "true");
    $(".modal-backdrop").remove();

    document.body.className = "" ;
    document.body.style = "" ;

   
});
