$(document).ready(function(){
  $("#myModal").on('hidden.bs.modal', function(){
    $("#SName").val()='';
    $("#SMedicalNumber").val()='';
    document.getElementById("demo").innerHTML = "<div></div>";
    $('#demo').html("");
  });
});


function loadDoc(xURL) {
  var MedicalN = $('#SMedicalNumber').val();
  var xhttp = new XMLHttpRequest();
  var datos, i, content = "";
  
  xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
      var content = '<div class="container"><table class="table table-striped"><thread><tr>';
      content += '<th>Medical Number</th>';
      content += '<th>Names</th>';
      content += '<th>Phone</th>';
      content += '<th></th></tr></thread><tbody>';      
      var datos = JSON.parse(this.responseText);
      for (i in datos.data) {
        content += '<tr><td>' + datos.data[i].MedicalNumber + '</td>';
        content += '<td>' + datos.data[i].Names + '</td>';
        content += '<td>' + datos.data[i].NumberPhone1 + '</td>';
        content += '<td><a href="viewpatients/'+datos.data[i].MedicalNumber+'" type="button" class="btns btn-sm"><i class="glyphicon glyphicon-search"></i></a></td><tr>'
      }
      content += '</tbody></table></div>';
      document.getElementById("demo").innerHTML = content;
    }
  };
  xhttp.open("GET", xURL + "?SMedicalNumber=" + MedicalN, true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send();
};


function loadDocName(xURL) {
  var MedicalN = $('#SName').val();
  var xhttp = new XMLHttpRequest();
  var datos, i, content = "";
  
  xhttp.onreadystatechange = function(xURL) {
  if (this.readyState == 4 && this.status == 200) {
      var content = '<div class="container"><table class="table table-striped"><thread><tr>';
      content += '<th>Medical Number</th>';
      content += '<th>Names</th>';
      content += '<th>Phone</th>';
      content += '<th></th></tr></thread><tbody>';      
      var datos = JSON.parse(this.responseText);
      for (i in datos.data) {
        //x += datos.data[i].MedicalNumber;
        content += '<tr><td>' + datos.data[i].MedicalNumber + '</td>';
        content += '<td>' + datos.data[i].Names + '</td>';
        content += '<td>' + datos.data[i].NumberPhone1 + '</td>';
        content += '<td><a href="viewpatients/'+datos.data[i].MedicalNumber+'" type="button" class="btns btn-sm"><i class="glyphicon glyphicon-search"></i></a></td><tr>'
      }
      content += '</tbody></table></div>';
      document.getElementById("demo").innerHTML = content;
    }
  };
  xhttp.open("GET", xURL + "?SName=" + MedicalN, true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send();
};