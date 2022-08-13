$(document).ready(function(){


    $( "#IdMedicalC").change(function() {
      
        var center = $("#IdMedicalC option:selected").text();
       
        if (center === "--Not assigned--"){
          $("#centername").val("").prop('disabled', true);
          $("#nickname").val("").prop('disabled', true);
          $("#phoneone").val("").prop('disabled', true);
          $("#phonetwo").val("").prop('disabled', true);
          $("#faxnumber").val("").prop('disabled', true);
          $("#emailcenter").val("").prop('disabled', true);
          $("#centeraddress").val("").prop('disabled', true);
          return;
        }
         

        if (center === "New center"){
          $("#centername").val("").prop('disabled', false);
          $("#nickname").val("").prop('disabled', false);
          $("#phoneone").val("").prop('disabled', false);
          $("#phonetwo").val("").prop('disabled', false);
          $("#faxnumber").val("").prop('disabled', false);
          $("#emailcenter").val("").prop('disabled', false);
          $("#centeraddress").val("").prop('disabled', false);

          return;

        }

        var formData = {
            'center' : center, 
         
          };
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "GET",
            url:  'get-info-center' ,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log("success");
                console.log(data);
                $("#centername").val(data['Name']).prop('disabled', true);
                $("#nickname").val(data['NickName']).prop('disabled', true);
                $("#phoneone").val(data['NumberPhone1']).prop('disabled', true);
                $("#phonetwo").val(data['NumberPhone2']).prop('disabled', true);
                $("#faxnumber").val(data['FaxNumber']).prop('disabled', true);
                $("#emailcenter").val(data['Email']).prop('disabled', true);
                $("#centeraddress").val(data['AddressMedicalC']).prop('disabled', true);

               
              
                
              },
              error: function (data) {
                console.log("Error");
                  console.log(data);
              }

    

        
    });
 
});

$( "#servicetype").change(function() {
  var type = $("#servicetype option:selected").val();

  if (type == 1){
    console.log('se mete a pickup');
    $("#pickuptime").prop('disabled', false);
    $("#Dropoffatcenter").prop('disabled', false);
    $("#Pickucenter").val(null).prop('disabled', true);
    $("#DropOffTime").val(null).prop('disabled', true);
    $("#Pickucenter").prop('required', false);
    $("#DropOffTime").prop('required', false);

  }else if(type == 2){

    $("#pickuptime").val(null).prop('disabled', true);
    $("#Dropoffatcenter").val(null).prop('disabled', true);
    $("#pickuptime").prop('required', false);
    $("#Dropoffatcenter").prop('required', false);
    $("#Pickucenter").prop('disabled', false);
    $("#DropOffTime").prop('disabled', false);


  }else{
    $("#pickuptime").prop('disabled', false);
    $("#Dropoffatcenter").prop('disabled', false);
    $("#Pickucenter").prop('disabled', false);
    $("#DropOffTime").prop('disabled', false);

  }
});

});