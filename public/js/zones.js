$(document).ready(function(){
  $("#myModal").on('hidden.bs.modal', function(){
    $("#uname").val('');
  });
});


function loadUpdate(xId,xName)
{
    $('#uId').val(xId);
    $('#uname').val(xName);
    $('#myModal').modal('show'); 
};

function SaveZone(xURL) 
{
  var xId = $('#uId').val();
  var xname = $('#uname').val();
  var udata = {
    "_token": $("meta[name='csrf-token']").attr("content"),
    "Id" : xId,
    "Name" : xname
  };
  var datos, i, content = "";
  var URL= xURL;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.post(URL,udata,function(result){
    alert(result);
  });
};

function xSaveZone(xURL) {
  var xId = $('#uId').val();
  var xname = $('#uname').val();
//"_token": $("meta[name='csrf-token']").attr("content"),
  var parametros = {
    "Id" : xId,
    "Name" : xname
  };


  $.ajax({
    data : parametros,
    url : xURL,
    type : 'post',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    beforeSend : function() {

    },
    success : function(response) {
      //$("#tableContainer").html(response);
      alert(response);
    },
    error : function() {
      alert('error')
    }
  });
};

  var xxSaveZone = function(xURL) {
    var xId = $('#uId').val();
    var xname = $('#uname').val();    
    var parametros = {
      "_token": $("meta[name='csrf-token']").attr("content"),
      "Id" : xId,
      "Name" : xname
    };    
        $.ajax({
            data: parametros,
            type: "POST",
            dataType: "json",
            url: xURL,
            headers: {
              "content-type": "application/json",
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),},
        })
            .done(function( data, textStatus, jqXHR ) {
                console.log("compra save: ", data);
                   $('#postmessage').html('<div class="alert alert-primary animated bounce">Success.</div>');
                setTimeout(function(){ $('#boxAlert').html(''); }, 3000);
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( "La solicitud a fallado: " +  textStatus);
                    $('#postmessage').html('<div class="alert alert-danger alert-dismissible">Error.</div>');
                    setTimeout(function(){ $('#boxAlert').html(''); }, 3000);
                }
            });
    };


