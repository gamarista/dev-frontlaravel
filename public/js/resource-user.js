$(document).ready(function(){

    $("#myInput").on("keyup", function() {
        console.log("Ehhh");
        var value = $(this).val().toLowerCase();
        $("#tableUsers tr").filter(function() {
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
        $( "#iduser" ).text(id[1]);
    

    });

    $("#savestatus").click(function() {

        var driver =  $( "#iduser").text();

         
        var formData = {
            'id' : driver
          };
         

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "POST",
            url:  'resource-users-status' ,
            data: formData,
            dataType: 'json',
            success: function (data) {
                
                if (data['status'] == 0){
                    
                
                    $("#btnstatus-"+driver).css({"background-color": "#1EC96E"});
                    $("#btnstatus-"+driver).text("Enable");
                    $("#btnstatus-"+driver).val(data['status']+"-"+data['email']);
                    $("#tdstatus-"+driver).html("<b>disabled</b>");


                  
                }else{
                  
                    $("#btnstatus-"+driver).css({"background-color": "#EF4B4B"});
                    $("#btnstatus-"+driver).text("Disable");
                    $("#btnstatus-"+driver).val(data['status']+"-"+data['email']);
                    $("#tdstatus-"+driver).html("<b>activated</b>");
                }
                $("#statusdrivermodal").modal('hide');   
                
            },
            error: function (data) {
                console.log("errr");
                console.log(data);
            }
          });


      
    });


});