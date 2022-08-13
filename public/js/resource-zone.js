$(document).ready(function(){

    $( "#savezone" ).click(function() {


        var formData = {
            'name' : $("#namezone").val(), 
            'description':  $("#descriptionzone").val(),
          };
          console.log(formData);

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "POST",
            url:  'resource-zone-store' ,
            data: formData,
            dataType: 'json',
            success: function (data) {
             console.log(data);
              $('#modalnewzone').modal('hide');
           
       
            },
            error: function (data) {
                console.log(data);
            }
          });


      
      });

});