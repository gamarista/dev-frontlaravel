function initMap(initDirection = null,endDirection  = null,idMapName = null) {

  var directionsService = new google.maps.DirectionsService;
  var directionsRenderer = new google.maps.DirectionsRenderer;
  var idMap = 'mapEdit';
  if (idMapName != null )
    idMap = idMapName
    console.log(idMap);
  var map = new google.maps.Map(document.getElementById(idMap), {
    zoom: 100,
    center: {lat: 41.85, lng: -87.65}
  });
  directionsRenderer.setMap(map);

  calculateAndDisplayRoute(directionsService, directionsRenderer,initDirection,endDirection);

}

function calculateAndDisplayRoute(directionsService, directionsRenderer,initDirection,endDirection) {
  var waypts = [];
  var patients = ["Clinica","Serafin Martinez"];
  var waypoints = ["7725 Nw 22 Ave 108, Miami, FL 33147","12820 NW 22 Ave, Miami, FL 33167"];
  var o = "7725 Nw 22 Ave 108, Miami, FL 33147";
  var d = "12820 NW 22 Ave, Miami, FL 33167";

  if (initDirection != null && endDirection != null){
    waypoints = [initDirection,endDirection];
    o = initDirection;
    d = endDirection;
  }

  var checkboxArray = waypoints;
  var xtime = 0;
  for (var i = 0; i < waypoints.length; i++) {
      waypts.push({
        location: waypoints[i],
        stopover: true
      });
  }

  directionsService.route({
    origin: o,
    destination: d,
    waypoints: waypts,
    optimizeWaypoints: true,
    travelMode: 'DRIVING'
  }, function(response, status) {
    if (status === 'OK') {
      directionsRenderer.setDirections(response);

    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

function showMapChangePickUp(id,mapId,pick_know){


  var endDirection = "";

  var dropoff_another = $("#dropoffinputknowaddress-" + id[1]).val();
    var dropoff_know = $("#dropoffselectknowaddressedit-" + id[1]).val();
    var dropoff_center = $("#dropoffselectcentersedit-" + id[1]).val();

    if (dropoff_another.length > 0){
      endDirection = dropoff_another;
      $("#dropoffanotheraddress-"+ id[1]).prop('checked', true);
      $("#dropoffaddressknow-"+ id[1]).prop('checked', false);
      $("#dropoffboxcenters-"+ id[1]).prop('checked', false);

      $( "#dropoffinputknowaddress-" + id[1]).show();
      $( "#dropoffselectknowaddressedit-"+ id[1]).hide();
      $( "#dropoffselectcentersedit-"+ id[1]).hide();
    }

    if (dropoff_know.length > 0){
      endDirection = dropoff_know;
      $("#dropoffanotheraddress-"+ id[1]).prop('checked', false);
      $("#dropoffaddressknow-"+ id[1]).prop('checked', true);
      $("#dropoffboxcenters-"+ id[1]).prop('checked', false);
      $( "#dropoffinputknowaddress-" + id[1] ).hide();
      $( "#dropoffselectknowaddressedit-"+ id[1]).show();
      $( "#dropoffselectcentersedit-"+ id[1]).hide();
    }

    if (dropoff_center.length > 0){
      endDirection = dropoff_center;
      $("#dropoffanotheraddress-"+ id[1]).prop('checked', false);
      $("#dropoffaddressknow-"+ id[1]).prop('checked', false);
      $("#dropoffboxcenters-"+ id[1]).prop('checked', true);
      $( "#dropoffinputknowaddress-"+ id[1] ).hide();
      $( "#dropoffselectknowaddressedit-"+ id[1]).hide();
      $( "#dropoffselectcentersedit-"+ id[1]).show();
      $("#editcenternamedestination-" +id[1]).prop('disabled', true);
      $("#editcenterphonedestination-" +id[1]).prop('disabled', true);
      $("#editapptdoctorresource-" +id[1]).prop('disabled', true);
      $("#editapptmotive-" +id[1]).prop('disabled', true);
      $("#editapptmotivedetails-" +id[1]).prop('disabled', true);
    }

    initMap(pick_know,endDirection,mapId);
}

function showMapChangeDropOff(id,mapId,dropoff){
  var pick_another = $( "#inputknowaddress-"+id[1] ).val();
  var pick_know = $( "#selectknowaddressedit-"+id[1]).val();
  var pick_center = $( "#selectcentersedit-" + +id[1]).val();

  var initDirection = "";
  if (pick_another.length > 0){
    initDirection = pick_another;
    $("#checkaddressknow-"+id[1]).prop('checked', false);
    $("#checkboxcenters-"+id[1]).prop('checked', false);
    $("#checkanotheraddress-"+id[1]).prop('checked', true);

    $( "#inputknowaddress-" +id[1] ).show();
    $( "#selectknowaddressedit-"+id[1]).hide();
    $( "#selectcentersedit-"+id[1]).hide();

  }

  if (pick_know.length > 0){
    initDirection = pick_know;
    $("#checkaddressknow-"+id[1]).prop('checked', true);
    $("#checkboxcenters-"+id[1]).prop('checked', false);
    $("#checkanotheraddress-"+id[1]).prop('checked', false);

    $( "#inputknowaddress-" +id[1] ).hide();
    $( "#selectknowaddressedit-"+id[1]).show();
    $( "#selectcentersedit-"+id[1]).hide();

  }

  if (pick_center.length > 0){
    initDirection = pick_center;
    $("#checkaddressknow-"+id[1]).prop('checked', false);
    $("#checkboxcenters-"+id[1]).prop('checked', true);
    $("#checkanotheraddress-"+id[1]).prop('checked', false);

    $( "#inputknowaddress-" +id[1] ).hide();
    $( "#selectknowaddressedit-"+id[1]).hide();
    $( "#selectcentersedit-"+id[1]).show();

  }

  initMap(initDirection,dropoff,mapId);
}

$(document).ready(function(){
 //document.getElementById("hora").selectedIndex=0;
 //document.getElementById("horae").selectedIndex=0;

  $('.pagination').addClass("justify-content-center");

  $( "select[id^='selectknowaddressedit-']").change(function() {
    var id = $(this).attr('id').split('-');
    var mapId = "mapEdit-" + id[1];
    var pick_know = $(this).val();

    showMapChangePickUp(id,mapId,pick_know);
  });


  $( "select[id^='selectcentersedit-']").change(function() {
    var id = $(this).attr('id').split('-');
    var mapId = "mapEdit-" + id[1];
    var pick_know = $(this).val();

    showMapChangePickUp(id,mapId,pick_know);
  });

  $( "select[id^='dropoffselectknowaddressedit-']").change(function() {
    var id = $(this).attr('id').split('-');
    var mapId = "mapEdit-" + id[1];
    var dropoff = $(this).val();
    showMapChangeDropOff(id,mapId,dropoff);
  });


  $( "select[id^='dropoffselectcentersedit-']").change(function() {
    var id = $(this).attr('id').split('-');
    var mapId = "mapEdit-" + id[1];
    var dropoff = $(this).val();
    showMapChangeDropOff(id,mapId,dropoff);
  });

  $( "select[id^='assignDriver-']").change(function() {
    var id = $(this).attr('id').split('-');
    var idSelect = "#assignDriver-" + id[1] + " option:selected";
    var driver = $(idSelect).text();
    var driver_id = $(idSelect).val();
    var geoid = $('#geoid-' + id[1]).text();
    console.log(driver);

    var formData = {
      'gesid' : geoid,
      'driver': driver,
      'driver_id':driver_id
    };

      $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "POST",
            url:  'assign-driver-appoinment' ,
            data: formData,
            dataType: 'json',
            success: function (data) {
              console.log("success");

            },
            error: function (data) {
               // console.log(data);
            }
      });
  });

  //Aqui se utiliza una funcion para cambio de chofer -> Change Driver
    // $("#savechangedriver").click(function() {

    //     var id = $(this).attr('id').split('-');
    //     var idSelect = "#assignDriver-" + id[1] + " option:selected";
    //     var driver = $(idSelect).text();
    //     var driver_id = $(idSelect).val();
    //     var geoid = $('#geoid-' + id[1]).text();
    //     console.log(driver);

    //   var driver_id = $( "#selectdriver" ).val();
    //   var gesid = $('#gesiddriver').text();
    //   var formData = {
    //     'driver_id' : driver_id,
    //     'gesid': gesid,
    //   };
    //   console.log(formData)
    //   $.ajax({
    //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //     method: "POST",
    //     url:  'assign-driver-appoinment' ,
    //     // url:  'change-driver' ,
    //     data: formData,
    //     dataType: 'json',
    //     statusCode: {
    //       200: function(data) {

    //         $('select#selectdriver  option:contains("--Driver--")').prop('selected',true);
    //         $('#assignDriverModal').modal('hide');
    //         $( "#drivername-" + gesid).empty();
    //         $( "#driverzone-" + gesid).empty();
    //         $( "#drivercenter-" + gesid).empty();
    //         $( "#drivername-" + gesid).append(data['name']);
    //         $( "#driverzone-" + gesid).append(data['zone']);
    //         $( "#drivercenter-" + gesid).append(data['center']);
    //       },
    //       400: function(data) {

    //           alert(data['message']);
    //       },
    //       500: function(data) {
    //         alert(data['message']);

    //     }
    //   }
    //   });

    // });


  $(  "button[id^='canceltrip-']").click(function() {

    var id = $(this).attr('id').split('-');
    $( "#gesid" ).text(id[1]);

  });

  $( "button[id^='restoreges-']").click(function() {

    var id = $(this).attr('id').split('-');
    var formData = {
      'id': id[1],
    };

    $.ajax({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      method: "POST",
      url:  'assing-uncancel',
      data: formData,
      dataType: 'json',
      success: function (data) {
        $( "#restoreges-"+data['id']).hide();
        $( "#canceltrip-"+data['id']).show();
        $( "#geoid-"+data['id']).parent().css("background-color", "#1EC96E" );
       /*
        $( "#restoreges-"+data['id']).attr("data-toggle", "modal");
        $( "#restoreges-"+data['id']).attr("data-target", "#cancellationTripModal");
        $( "#restoreges-"+data['id']).css("background-color", "#EF4B4B");
        $( "#restoreges-"+data['id'] ).removeClass( "btn btn-success btn-md" ).addClass( "btn btn-danger btn-sm" );
        $("#restoreges-"+data['id']).text("");
        $("#restoreges-"+data['id']).append("<i class='far fa-trash-alt'></i> Cancel");
        $( "#restoreges-"+data['id']).attr("id", "canceltrip-"+data['id']);
     */

      },
      error: function (data) {
          console.log(data);
      }
    });


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
      success: function (data) {
        var color_label = "geoid-" + data['id'];
        $( "#geoid-"+data['id']).parent().css("background-color", "red" );
        $('select#selectcancellationcode  option:contains("--Reason--")').prop('selected',true);
        $('#cancellationTripModal').modal('hide');
        $( "#restoreges-"+data['id']).show();
        $( "#canceltrip-"+data['id']).hide();
      },
      error: function (data) {
          console.log(data);
      }
    });
  });
  $(  "button[id^='edittrip-']").click(function() {
    // pick part
    var id = $(this).attr('id').split('-');
    var mapId = "mapEdit-" + id[1];
    var pick_another = $( "#inputknowaddress-"+id[1] ).val();
    var pick_know = $( "#selectknowaddressedit-"+id[1]).val();
    var pick_center = $( "#selectcentersedit-" + +id[1]).val();
    var initDirection = "";
    var endDirection = "";
    if (pick_another.length > 0){
      initDirection = pick_another;
      $("#checkaddressknow-"+id[1]).prop('checked', false);
      $("#checkboxcenters-"+id[1]).prop('checked', false);
      $("#checkanotheraddress-"+id[1]).prop('checked', true);
      $( "#inputknowaddress-" +id[1] ).show();
      $( "#selectknowaddressedit-"+id[1]).hide();
      $( "#selectcentersedit-"+id[1]).hide();
    }
    if (pick_know.length > 0){
      initDirection = pick_know;
      $("#checkaddressknow-"+id[1]).prop('checked', true);
      $("#checkboxcenters-"+id[1]).prop('checked', false);
      $("#checkanotheraddress-"+id[1]).prop('checked', false);
      $( "#inputknowaddress-" +id[1] ).hide();
      $( "#selectknowaddressedit-"+id[1]).show();
      $( "#selectcentersedit-"+id[1]).hide();

    }

    if (pick_center.length > 0){
      initDirection = pick_center;
      $("#checkaddressknow-"+id[1]).prop('checked', false);
      $("#checkboxcenters-"+id[1]).prop('checked', true);
      $("#checkanotheraddress-"+id[1]).prop('checked', false);
      $( "#inputknowaddress-" +id[1] ).hide();
      $( "#selectknowaddressedit-"+id[1]).hide();
      $( "#selectcentersedit-"+id[1]).show();
    }

    //dropoff
    var dropoff_another = $("#dropoffinputknowaddress-" + id[1]).val();
    var dropoff_know = $("#dropoffselectknowaddressedit-" + id[1]).val();
    var dropoff_center = $("#dropoffselectcentersedit-" + id[1]).val();

    if (dropoff_another.length > 0){
      endDirection = dropoff_another;
      $("#dropoffanotheraddress-"+ id[1]).prop('checked', true);
      $("#dropoffaddressknow-"+ id[1]).prop('checked', false);
      $("#dropoffboxcenters-"+ id[1]).prop('checked', false);
      $( "#dropoffinputknowaddress-" + id[1]).show();
      $( "#dropoffselectknowaddressedit-"+ id[1]).hide();
      $( "#dropoffselectcentersedit-"+ id[1]).hide();
    }

    if (dropoff_know.length > 0){
      endDirection = dropoff_know;
      $("#dropoffanotheraddress-"+ id[1]).prop('checked', false);
      $("#dropoffaddressknow-"+ id[1]).prop('checked', true);
      $("#dropoffboxcenters-"+ id[1]).prop('checked', false);
      $( "#dropoffinputknowaddress-" + id[1] ).hide();
      $( "#dropoffselectknowaddressedit-"+ id[1]).show();
      $( "#dropoffselectcentersedit-"+ id[1]).hide();
    }

    if (dropoff_center.length > 0){
      endDirection = dropoff_center;
      $("#dropoffanotheraddress-"+ id[1]).prop('checked', false);
      $("#dropoffaddressknow-"+ id[1]).prop('checked', false);
      $("#dropoffboxcenters-"+ id[1]).prop('checked', true);
      $( "#dropoffinputknowaddress-"+ id[1] ).hide();
      $( "#dropoffselectknowaddressedit-"+ id[1]).hide();
      $( "#dropoffselectcentersedit-"+ id[1]).show();
      $("#editcenternamedestination-" +id[1]).prop('disabled', true);
      $("#editcenterphonedestination-" +id[1]).prop('disabled', true);
      $("#editapptdoctorresource-" +id[1]).prop('disabled', true);
      $("#editapptmotive-" +id[1]).prop('disabled', true);
      $("#editapptmotivedetails-" +id[1]).prop('disabled', true);
    }
    initMap(initDirection,endDirection,mapId);
  });

  $("input[id^='checkanotheraddress-']").change(function(){
    var ban = $(this).is(':checked');
    var id = $(this).attr('id').split('-');
    if (ban == true ){
      $("#checkaddressknow-" + id[1]).prop('checked', false);
      $("#checkboxcenters-" +id[1]).prop('checked', false);

      $( "#inputknowaddress-"+id[1] ).show();
      $( "#selectknowaddressedit-" +id[1]).hide().val("");
      $( "#selectcentersedit-" +id[1]).hide().val("");

    }
    console.log("do");

  });

  $("input[id^='checkaddressknow-']").change(function(){
    var ban = $(this).is(':checked');
    var id = $(this).attr('id').split('-');
    if (ban == true ){
      $("#checkanotheraddress-" +id[1]).prop('checked', false);
      $("#checkboxcenters-" +id[1]).prop('checked', false);

      $( "#inputknowaddress-" +id[1] ).hide().val("");
      $( "#selectknowaddressedit-" +id[1]).show();
      $( "#selectcentersedit-" +id[1]).hide().val("");

    }
    console.log("re");

  });
  $("input[id^='checkboxcenters-']").change(function(){
    var ban = $(this).is(':checked');
    var id = $(this).attr('id').split('-');
    if (ban == true ){
      $("#checkanotheraddress-" +id[1]).prop('checked', false);
      $("#checkaddressknow-" +id[1]).prop('checked', false);

      $( "#inputknowaddress-" +id[1] ).hide().val("");
      $( "#selectknowaddressedit-" +id[1]).hide().val("");
      $( "#selectcentersedit-" +id[1]).show();

    }
    console.log("mi");

  });

  $("input[id^='dropoffanotheraddress-']").change(function(){
    var ban = $(this).is(':checked');
    var id = $(this).attr('id').split('-');
    if (ban == true ){
      $("#dropoffaddressknow-"+id[1]).prop('checked', false);
      $("#dropoffboxcenters-"+id[1]).prop('checked', false);

      $( "#dropoffinputknowaddress-"+id[1] ).show();
      $( "#dropoffselectknowaddressedit-"+id[1]).hide().val("");
      $( "#dropoffselectcentersedit-"+id[1]).hide().val("");

      $("#editcenternamedestination-" +id[1]).prop('disabled', false);
      $("#editcenterphonedestination-" +id[1]).prop('disabled', false);
      $("#editapptdoctorresource-" +id[1]).prop('disabled', false);
      $("#editapptmotive-" +id[1]).prop('disabled', false);
      $("#editapptmotivedetails-" +id[1]).prop('disabled', false);

      if ( $( "#labeledittriptype-" +id[1] ).text() === 'A'){
        $( "#showdestinationtypeid-" +id[1] ).empty();
        $( "#showdestinationtypeid-" +id[1] ).append("Outside");
      }



    }
    console.log("do");

  });
  $("input[id^='dropoffaddressknow-']").change(function(){
    var ban = $(this).is(':checked');
    var id = $(this).attr('id').split('-');
    if (ban == true ){
      $("#dropoffanotheraddress-"+id[1]).prop('checked', false);
      $("#dropoffboxcenters-"+id[1]).prop('checked', false);

      $( "#dropoffinputknowaddress-"+id[1] ).hide().val("");
      $( "#dropoffselectknowaddressedit-"+id[1]).show();
      $( "#dropoffselectcentersedit-"+id[1]).hide().val("");

      $("#editcenternamedestination-" +id[1]).prop('disabled', false);
      $("#editcenterphonedestination-" +id[1]).prop('disabled', false);
      $("#editapptdoctorresource-" +id[1]).prop('disabled', false);
      $("#editapptmotive-" +id[1]).prop('disabled', false);
      $("#editapptmotivedetails-" +id[1]).prop('disabled', false);

      if ( $( "#labeledittriptype-" +id[1] ).text() === 'A'){
        $( "#showdestinationtypeid-" +id[1] ).empty();
        $( "#showdestinationtypeid-" +id[1] ).append("Outside");
      }


    }
    console.log("re");

  });
  $("input[id^='dropoffboxcenters-']").change(function(){
    var ban = $(this).is(':checked');
    var id = $(this).attr('id').split('-');
    if (ban == true ){
      $("#dropoffanotheraddress-" +id[1]).prop('checked', false);
      $("#dropoffaddressknow-"+id[1]).prop('checked', false);

      $( "#dropoffinputknowaddress-" +id[1] ).hide().val("");
      $( "#dropoffselectknowaddressedit-"+id[1]).hide().val("");
      $( "#dropoffselectcentersedit-"+id[1]).show();

      $("#editcenternamedestination-" +id[1]).prop('disabled', true);
      $("#editcenterphonedestination-" +id[1]).prop('disabled', true);
      $("#editapptdoctorresource-" +id[1]).prop('disabled', true);
      $("#editapptmotive-" +id[1]).prop('disabled', true);
      $("#editapptmotivedetails-" +id[1]).prop('disabled', true);

      if ( $( "#labeledittriptype-" +id[1] ).text() === 'A'){
        $( "#showdestinationtypeid-" +id[1] ).empty();
        $( "#showdestinationtypeid-" +id[1] ).append("Inside");
      }

    }

    console.log("mi");

  });


$( "button[id^='saveedit-']").click(function() {

  var id = $(this).attr('id').split('-');
  var appt_time = $( "#editapptime-" +id[1] ).val();
  var return_time = $( "#editreturntime-" +id[1] ).val();
  var appt_cell_phne = $( "#editcellphone-" +id[1] ).val();
  var appt_home_phone= $( "#edithomephone-" +id[1] ).val();
  var pickup_address = "";
  var dropoff_address = "";
  var check_pick_another = $("#checkanotheraddress-"+id[1]).is(':checked');
  var check_pick_know = $("#checkaddressknow-"+id[1]).is(':checked');
  var check_pick_center = $("#checkboxcenters-"+id[1]).is(':checked');
  var check_dropoff_another = $("#dropoffanotheraddress-"+id[1]).is(':checked');
  var check_dropoff_know = $("#dropoffaddressknow-"+id[1]).is(':checked');
  var check_dropoff_center = $("#dropoffboxcenters-"+id[1]).is(':checked');

  var input_address_other = $( "#inputknowaddress-" +id[1]).val();
  var input_address_know = $( "#selectknowaddressedit-" +id[1]).val();
  var input_address_center = $( "#selectcentersedit-" +id[1]).val();

  var dropoff_address_other = $( "#dropoffinputknowaddress-" +id[1]).val();
  var dropoff_address_know = $( "#dropoffselectknowaddressedit-" +id[1]).val();
  var dropoff_address_center = $( "#dropoffselectcentersedit-" +id[1]).val();

  var input_trip_type = $( "#editapptriptype-" +id[1]).val();
  console.log(input_trip_type);
  if (appt_cell_phne.length == 0){
    alert("Please provide a cell phone number");
    return ;
  }

  if (appt_home_phone.length == 0){
    alert("Please provide a phone home number");
    return ;
  }

  if (check_pick_another == true ){
    if(input_address_other.length > 0){
      pickup_address = input_address_other;

    }else{

      alert("Please provide a pickup address");
      return ;
    }
  } else if (check_pick_know == true){
    if(input_address_know.length > 0){
      pickup_address = input_address_know;
    }else{

      alert("Please provide a pickup know address");
      return ;

    }

  } else if (check_pick_center == true){

    if(input_address_center.length > 0){
      pickup_address = input_address_center;
    }else{

      alert("Please provide a pickup center");
      return ;
    }
  }

  if (check_dropoff_another == true ){
    if(dropoff_address_other.length > 0){
      dropoff_address = dropoff_address_other;

    }else{

      alert("Please provide a dropoff address");
      return ;
    }
  } else if (check_dropoff_know == true){
    if(dropoff_address_know.length > 0){
      dropoff_address = dropoff_address_know;
    }else{

      alert("Please provide a dropoff know address");
      return ;

    }

  } else if (check_dropoff_center == true){

    if(dropoff_address_center.length > 0){
      dropoff_address = dropoff_address_center;
    }else{

      alert("Please provide a dropoff center");
      return ;
    }
  }

  var attetion_type = $( "#atettiontypeid-" +id[1]).val();
  if (attetion_type.length <= 0){
    alert("Please provide a atettion");
    return;
  }

  var notes = $( "#editnotes-" +id[1]).val();

  var requeriments = [];
    $("input[id^='editrequeriment-"+id[1]+ "-']").each(function (i, el) {
      let requerimentId = $(this).attr('id').split("-");
      if ($(this).is(':checked'))
        requeriments.push(parseInt(requerimentId[2]));
    });
    console.log(requeriments);

  //var obj_requeriments = $( "#specialrequeriment-" +id[1]).val();
  var formData = {
    'id' : id[1],
    'appt_time' : appt_time,
    'return_time': return_time,
    'appt_cell_phne': appt_cell_phne,
    'appt_home_phone' : appt_home_phone,
    'pickup_address': pickup_address,
    'dropoff_address': dropoff_address,
    'attetion_type': attetion_type,
    'notes': notes,
    'requeriments': requeriments,
    'inside' :check_dropoff_center ,
    'tripType' : input_trip_type
  };

  if (check_dropoff_center == false ){
    var dest_center_name =  $( "#editcenternamedestination-" +id[1]).val();
    var dest_center_phone =  $( "#editcenterphonedestination-" +id[1]).val();
    var appt_doctor_resource =  $( "#editapptdoctorresource-" +id[1]).val();
    var appt_motive =  $( "#editapptmotive-" +id[1]).val();
    var appt_motive_details =  $( "#editapptmotivedetails-" +id[1]).val();
    var formData = {
    'id' : id[1],
    'appt_time' : appt_time,
    'appt_cell_phne': appt_cell_phne,
    'appt_home_phone' : appt_home_phone,
    'pickup_address': pickup_address,
    'dropoff_address': dropoff_address,
    'attetion_type': attetion_type,
    'notes': notes,
    'requeriments': requeriments,
    'dest_center_name': dest_center_name,
    'dest_center_phone': dest_center_phone,
    'appt_doctor_resource': appt_doctor_resource,
    'appt_motive': appt_motive,
    'appt_motive_details': appt_motive_details,
    'inside' :check_dropoff_center
  };

  }

  $.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    method: "POST",
    url:  'edit-ges-appoinment' ,
    data: formData,
    dataType: 'json',
    success: function (data) {

     $( "#noteslist-" + id[1]).empty();
     $( "#noteslist-" + id[1]).append(data['notes']);
     $( "#resourcelist-" + id[1]).empty();
     $( "#resourcelist-" + id[1]).append(data['outside_doctor_resource']);
     $( "#timelist-" + id[1]).empty();
     $( "#timelist-" + id[1]).append(data['Time']);
     $( "#addresspatientlist-" + id[1]).empty();
     $( "#addresspatientlist-" + id[1]).append(data['AddressPatient']);
     $( "#addressdestinationtlist-" + id[1]).empty();
     $( "#addressdestinationtlist-" + id[1]).append(data['AddressDestination']);
     $( "#phonelist-" + id[1]).empty();
     $( "#phonelist-" + id[1]).append(data['PhoneNumber']);
     $('#editlationTripModal-'+id[1]).modal('hide');

    },
    error: function (data) {
      console.log("errr");
        //console.log(data);
    }
   });
  });
 });


