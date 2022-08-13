$(document).ready(function(){
    $('.pagination').addClass("justify-content-center");

    $(  "button[id^='canceltrip-']").click(function() {

        var id = $(this).attr('id').split('-');
        $( "#gesid" ).text(id[1]);

      });

      $("#savetripcancellation").click(function() {

        var code = $( "#selectcancellationcode" ).val();
        var gesid = $('#gesid').text();

        var formData = {
          'code' : code,
          'gesid': gesid,
        };

        $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          method: "POST",
          url:  'assign-code-cancellation' ,
          data: formData,
          dataType: 'json',
          statusCode: {
            200: function(data) {

                var time = data['CD'].split(" ");
                $( "#geoid-"+data['id']).parent().css("background-color", "red" );
                $('select#selectcancellationcode  option:contains("--Reason--")').prop('selected',true);
                $('#cancellationTripModal').modal('hide');
                $( "#cdcode-" + data['id']).empty();
                $( "#cd-" + data['id']).empty();
                $( "#cdcode-" + data['id']).append(data['Cod_Cancell']);
                $( "#cd-" + data['id']).append(time[1]);
            },
            400: function(data) {
                alert("ERror saving cancel trip");
            }
        }
        });

      });


    $("button[id^='transfer-']").click(function() {

      var id = $(this).attr('id').split('-');
      $( "#gesiddriver").text(id[1]);
      console.log($( "#gesiddriver").text(id[1]))

    });

    $("a[id^='transfer-']").click(function() {

      var id = $(this).attr('id').split('-');
      $( "#gesiddriver").text(id[1]);
      console.log(id[1])
      console.log($( "#gesiddriver"))

    });

    $("#saveassigndriver").click(function() {

      var driver_id = $( "#selectdriver" ).val();
      var gesid = $('#gesiddriver').text();
      var formData = {
        'driver_id' : driver_id,
        'gesid': gesid,
      };
      console.log(formData)
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: "POST",
        url:  'assign-driver-appoinment' ,
        data: formData,
        dataType: 'json',
        statusCode: {
          200: function(data) {
            console.log(data['prueba'])
            $('select#selectdriver  option:contains("--Driver--")').prop('selected',true);
            $('#assignDriverModal').modal('hide');
            $( "#drivername-" + gesid).empty();
            $( "#driverzone-" + gesid).empty();
            $( "#drivercenter-" + gesid).empty();
            $( "#drivername-" + gesid).append(data['name']);
            $( "#driverzone-" + gesid).append(data['zone']);
            $( "#drivercenter-" + gesid).append(data['center']);
          },
          400: function(data) {

              alert(data['message']);
          },
          500: function(data) {
            alert(data['message']);

        }
      }
      });

    });

    //Aqui se utiliza una funcion para cambio de chofer -> Change Driver
    $("#savechangedriver").click(function() {

      var driver_id = $( "#selectdriver" ).val();
      var gesid = $('#gesiddriver').text();
      var formData = {
        'driver_id' : driver_id,
        'gesid': gesid,
      };
      console.log(formData)
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: "POST",
        url:  'change-driver' ,
        data: formData,
        dataType: 'json',
        statusCode: {
          200: function(data) {

            $('strong#selectedDriver  option:contains("--Driver--")').prop('selected',true);
            $('#changeDriverModal').modal('hide');
            $( "#drivername-" + gesid).empty();
            $( "#driverzone-" + gesid).empty();
            $( "#drivercenter-" + gesid).empty();
            $( "#drivername-" + gesid).append(data['name']);
            $( "#driverzone-" + gesid).append(data['zone']);
            $( "#drivercenter-" + gesid).append(data['center']);

          },
          400: function(data) {

              alert(data['message']);
          },
          500: function(data) {
            alert(data['message']);

        }
      }
      });

    });

    $("button[id^='message-']").click(function() {

      var id = $(this).attr('id').split('-');
      $( "#gesidmessage").text(id[1]);

    });

    $("#savemessage").click(function() {

      var message = $( "#messagetrip" ).val();
      var gesid = $('#gesidmessage').text();

      var formData = {
        'message' : message,
        'ges_id': gesid,
      };

      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: "POST",
        url:  'message' ,
        data: formData,
        dataType: 'json',
        success: function (data) {
          console.log('mensaje enviado');
          $( "#messagetrip" ).val("");
          $('#sendmessagemodal').modal('hide');

        },
        error: function (data) {
            console.log(data);


        }
      });

    });


});
