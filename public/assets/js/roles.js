$(document).ready(function(){
  $("#myModal").on('hidden.bs.modal', function(){
    $("#SName").val()='';
    $("#SMedicalNumber").val()='';
    document.getElementById("demo").innerHTML = "<div></div>";
    $('#demo').html("");
  });
});


function roleUpdate() {
  var i = 0;
  var IdSelect = document.getElementById("IdRole").value;
   
        @foreach($admroles->data as $dato)
            if (IdSelect==@php echo $dato->IdRole; @endphp)
            {
              document.getElementById("Opc1").checked=@php echo $dato->Opc1; @endphp;
              document.getElementById("Opc2").checked=@php echo $dato->Opc2; @endphp;
              document.getElementById("Opc3").checked=@php echo $dato->Opc3; @endphp;
              document.getElementById("Opc4").checked=@php echo $dato->Opc4; @endphp;
              document.getElementById("Opc5").checked=@php echo $dato->Opc5; @endphp;
            }
        @endforeach
 }; 