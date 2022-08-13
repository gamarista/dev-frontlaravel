$(document).ready(function(){

    $("#myInput").on("keyup", function() {
        console.log("Ehhh");
        var value = $(this).val().toLowerCase();
        $("#tableDrivers tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    
    $("button[id^='btnstatus-']").click(function() {

       
        var id = $(this).attr('id').split('-');
        var data = $(this).val().split('-');
        if (data[0] == 0){
            $("#statusdrivertext").text("Are you sure to activate " + data[1] + "?");
        }else{
            $("#statusdrivertext").text("Are you sure to deactivate " + data[1] + "?" );
        }
        $( "#iddriver" ).text(id[1]);
       

    });

    $("button[id^='enable-']").click(function() {

        console.log("Activar");
        var id = $(this).attr('id').split('-');
        var nameDriver = $(this).val();
        $( "#iddriver" ).text(id[1]);
        $("#statusdrivertext").text("Are you sure to activate " + nameDriver + "?");
      

    });

    $("#savestatus").click(function() {

        var driver =  $( "#iddriver").text();

         
        var formData = {
            'id' : driver
          };

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "POST",
            url:  'resource-drivers-status' ,
            data: formData,
            dataType: 'json',
            success: function (data) {
                
                if (data['status'] == 0){
                    
                
                    $("#btnstatus-"+driver).css({"background-color": "#1EC96E"});
                    $("#btnstatus-"+driver).text("Enable");
                    $("#btnstatus-"+driver).val(data['status']+"-"+data['driver']);
                    $("#tdstatus-"+driver).html("<b>disabled</b>");


                  
                }else{
                  
                    $("#btnstatus-"+driver).css({"background-color": "#EF4B4B"});
                    $("#btnstatus-"+driver).text("Disable");
                    $("#btnstatus-"+driver).val(data['status']+"-"+data['driver']);
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