$(document).ready(function(){

    $("#myInput").on("keyup", function() {
        console.log("Ehhh");
        var value = $(this).val().toLowerCase();
        $("#tableVehicles tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });



    
    $("button[id^='btnstatus-']").click(function() {

       
        var id = $(this).attr('id').split('-');
        var data = $(this).val().split('-');
        if (data[0] == 0){
            $("#statusdrivertext").text("Are you sure to activate car with id " + data[1] + " ?");
        }else{
            $("#statusdrivertext").text("Are you sure to deactivate car with id " + data[1] + " ?" );
        }
        $( "#iddriver" ).text(id[1]);
       

    });

    $("#savestatus").click(function() {

        var driver =  $( "#iddriver").text();

         
        var formData = {
            'id' : driver
          };

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "POST",
            url:  'resource-vehicles-status' ,
            data: formData,
            dataType: 'json',
            success: function (data) {
                
                if (data['status'] == 0){
                
                
                    $("#btnstatus-"+driver).css({"background-color": "#1EC96E"});
                    $("#btnstatus-"+driver).text("Enable");
                    $("#btnstatus-"+driver).val(data['status']+"-"+data['vehicle']);
                    $("#tdstatus-"+driver).html("<b>disabled</b>");


                  
                }else{
                  
                    $("#btnstatus-"+driver).css({"background-color": "#EF4B4B"});
                    $("#btnstatus-"+driver).text("Disable");
                    $("#btnstatus-"+driver).val(data['status']+"-"+data['vehicle']);
                    $("#tdstatus-"+driver).html("<b>activated</b>");
                }
                $("#statusdrivermodal").modal('hide');   
                console.log("se cerro");
           
        
            },
            error: function (data) {
                console.log("errr");
                console.log(data);
            }
          });


      
    });

 

});