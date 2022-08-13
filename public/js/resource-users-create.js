$(document).ready(function(){

    var role = $("#roleid option:selected").text();
    if (role === "driver"){
        $("#carddriver").prop('disabled', false);
        $("#phonedriver").prop('disabled', false);
        $("#addressdriver").prop('disabled', false);
        $("#vehicledriver").prop('disabled', false);
        $("#zonedriver").prop('disabled', false);
        $("#centerdriver").prop('disabled', false);
      }


    $( "#roleid").change(function() {

        var role = $("#roleid option:selected").text();
        if (role != "driver"){
            $("#carddriver").val("").prop('disabled', true);
            $("#phonedriver").val("").prop('disabled', true);
            $("#addressdriver").val("").prop('disabled', true);
            $("#vehicledriver").val("").prop('disabled', true);
            $("#zonedriver").val("").prop('disabled', true);
            $("#centerdriver").val("").prop('disabled', true);
            return;
          }
        if (role === "driver"){
            $("#carddriver").val("").prop('disabled', false);
            $("#phonedriver").val("").prop('disabled', false);
            $("#addressdriver").val("").prop('disabled', false);
            $("#vehicledriver").val("").prop('disabled', false);
            $("#zonedriver").val("").prop('disabled', false);
            $("#centerdriver").val("").prop('disabled', false);
            return;
  
          }
          


    });

});