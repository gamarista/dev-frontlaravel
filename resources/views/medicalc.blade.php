@extends('layouts.app')
@section('content')

@php 
    if (isset($data)) {
       $save='disabled';
       $update='enabled';
       $data=json_decode($data);
       $IdMedicalC=$data[0]->IdMedicalC;
       $Name=$data[0]->Name;
       $NickName=$data[0]->NickName;
       $AddressMedicalC=$data[0]->AddressMedicalC;
       $LatitudCenter=$data[0]->LatitudCenter;
       $LongitudCenter=$data[0]->LongitudCenter;
       $NameDr=$data[0]->NameDr;
       $Specialty=$data[0]->Specialty;
       $NumberPhone=$data[0]->NumberPhone;
       $NumberPhone1=$data[0]->NumberPhone1;
       $FaxNumber=$data[0]->FaxNumber;
       $Email=$data[0]->Email;
       $Street=$data[0]->Street;
    }
    else 
    {
       $save='enabled';
       $update='disabled';
       $IdMedicalC='';
       $Name=''; 
       $NickName='';
       $AddressMedicalC='';
       $LatitudCenter='';
       $Specialty='';
       $LongitudCenter='';
       $NameDr='';
       $NumberPhone='';
       $NumberPhone1='';
       $FaxNumber='';
       $Email='';
       $Street='';
    }
@endphp  
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">Medical Centers</div>
     <form method="POST" action="{{route('newmedicalc')}}">
     
      @csrf
      <div class="card-body">
       <div class="container">
         @if (isset($status)) 
           <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success! </strong>{{ $status }}
           </div>
         @endif
         @if (isset($statuse))
            <div class="alert alert-danger alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error! </strong> {{ $statuse }}
            </div>                 
         @endif  
        </div> 
<!--first-->        
           <div class="form-group row">
           <div class="col-50"> 
            <label for="name" class="col-md-6 col-form-label text-sm-left">Name</label> 
            <div class="col-md-12">
              <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{$Name}}" required autocomplete="Name" autofocus>
              @error('Name')
               <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
               </span>
              @enderror
            </div> 
           </div> 

           <div class="col-50"> 
              <label for="NickName" class="col-md-6 col-form-label text-sm-left">NickName</label>
              <div class="col-md-6">
                  <input id="NickName" type="text" class="form-control @error('NickName') is-invalid @enderror" name="NickName" value="{{ $NickName }}" required autocomplete="NickName" autofocus>
                  @error('NickName')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 

           <div class="col-50"> 
              <label for="Specialty" class="col-md-6 col-form-label text-sm-left">Specialty</label>
              <div class="col-md-12">
                 <input id="Specialty" type="text" class="form-control @error('Specialty') is-invalid @enderror" name="Specialty" value="{{ $Specialty }}" autocomplete="Specialty" autofocus>
                  @error('Specialty')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 

           <div class="col-50"> 
              <label for="Specialty" class="col-md-6 col-form-label text-sm-left">Dr. Name</label>
              <div class="col-md-12">
                 <input id="NameDr" type="text" class="form-control @error('NameDr') is-invalid @enderror" name="NameDr" value="{{ $NameDr }}" autocomplete="NameDr" autofocus>
                  @error('NameDr')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div>            
          </div>
<!--Second-->
          <div class="form-group row">
           <div class="col-25"> 
              <label for="LatitudCenter" class="col-md-6 col-form-label text-sm-left">Latitud</label>
              <div class="col-md-8">
                  <input id="LatitudCenter" type="text" class="form-control @error('LatitudCenter') is-invalid @enderror" name="LatitudCenter" value="{{ $LatitudCenter }}" required autocomplete="LatitudCenter" autofocus>
                  @error('LatitudCenter')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div>
           <div class="col-25"> 
              <label for="LongitudCenter" class="col-md-6 col-form-label text-sm-left">Longitud</label>
              <div class="col-md-8">
                  <input id="LongitudCenter" type="text" class="form-control @error('LongitudCenter') is-invalid @enderror" name="LongitudCenter" value="{{ $LongitudCenter }}" required autocomplete="LongitudCenter" autofocus>
                  @error('LongitudCenter')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div>           

           <div class="col-50"> 
              <label for="AddressMedicalC" class="col-md-6 col-form-label text-sm-left">Address</label>
              <div class="col-md-12">
                  <input id="AddressMedicalC" type="text" class="form-control @error('AddressMedicalC') is-invalid @enderror" name="AddressMedicalC" value="{{ $AddressMedicalC }}" required autocomplete="AddressMedicalC" autofocus>
                  @error('AddressMedicalC')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 

           <div class="col-50"> 
              <label for="Email" class="col-md-6 col-form-label text-sm-left">Email</label>
              <div class="col-md-12">
                  <input id="Email" type="Email" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{ $Email }}" autocomplete="Email" autofocus>
                  @error('Email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 
          </div>
<!--third-->
          <div class="form-group row">
           <div class="col-25"> 
              <label for="NumberPhone" class="col-md-12 col-form-label text-sm-left">First Number Phone</label>
              <div class="col-md-10">
                  <input id="NumberPhone" type="text" class="form-control @error('NumberPhone') is-invalid @enderror" name="NumberPhone" value="{{ $NumberPhone }}" required autocomplete="NumberPhone" autofocus>
                  @error('NumberPhone')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div>
           <div class="col-25"> 
              <label for="NumberPhone1" class="col-md-12 col-form-label text-sm-left">Second Number Phone</label>
              <div class="col-md-10">
                  <input id="NumberPhone1" type="text" class="form-control @error('NumberPhone1') is-invalid @enderror" name="NumberPhone1" value="{{ $NumberPhone1 }}"  autocomplete="NumberPhone1" autofocus>
                  @error('NumberPhone1')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div>           

           <div class="col-50"> 
              <label for="FaxNumber" class="col-md-6 col-form-label text-sm-left">Fax</label>
              <div class="col-md-10">
                  <input id="FaxNumber" type="text" class="form-control @error('FaxNumber') is-invalid @enderror" name="FaxNumber" value="{{ $FaxNumber }}"  autocomplete="FaxNumber" autofocus>
                  @error('FaxNumber')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 

           <div class="col-50"> 
              <label for="Street" class="col-md-6 col-form-label text-sm-left">Street</label>
              <div class="col-md-12">
                  <input id="Street" type="text" class="form-control @error('Street') is-invalid @enderror" name="Street" value="{{ $Street }}"  autocomplete="Street" autofocus>
                  @error('Street')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 
          </div>
<!--end-->                         
       </div>
       <div class="card-footer">
        <button type="submit" value="Save" class="btn btn-primary {{$save}}"><i class="fas fa-save"></i></button>
        <button type="button" value="Search" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
        <button type="submit" value="Update" class="btn btn-primary {{$update}}"><i class="fas fa-edit"></i></button>
        <a href="{{route('vehicles')}}" type="button" value="Discard" class="btn btn-primary"><i class="fas fa-window-close"></i></a>
       </div>
      </form>
      
     </div>
    </div>
  </div>
</div>

<!----------MODAL------------->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Search Medical Center</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
         <h5>Name :</h5>
         <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>
         <div class="container-fluid" id="listaCompra"> 
           <table class="table">
              <tr>
                 <th>Medical Center</th><th></th>
              </tr>
            <tbody id="myTable">
            @foreach($Medical_centers as $Medical_center)  
             <tr>
                <td>{{$Medical_center->Name}}</td>
                <td>
                  <form method="POST" action="{{route('searchmedicalc')}}">
                    @csrf
                  <input type="hidden" name="IdMedicalC" id="IdMedicalC" value="{{$Medical_center->IdMedicalC}}">  
                  <button type="submit" class="btn btn-standard"><i class="fas fa-search"></i></button>
                  </form>  
                </td>
             </tr>
            @endforeach 
            </tbody>
           </table>    
         </div>  
        </div>

      </div>
      <div class="modal-footer">
        Select one
      </div>
    </div>
  </div>
</div>
<!----------MODAL------------->


@endsection

@push('child-scripts')
  <script src="{{ asset('js/medicalc.js') }}">
  </script>
@endpush