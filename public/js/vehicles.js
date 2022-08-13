$(document).ready(function(){
  $("#myModal").on('hidden.bs.modal', function(){
    $("#myInput").val('');
  });
});

$("#myInput").on("keyup", function() {
  alert('tecla');
  });
 



