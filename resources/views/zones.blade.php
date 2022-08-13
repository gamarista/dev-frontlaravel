@extends('layouts.app')
@section('content')

<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
   <div class="card">
    <div class="card-header">Zone Settings</div>
     <div class="card-body">
      <div class="container">
        @if (session('status')) 
         <div class="alert alert-success alert-dismissible">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Success! </strong>{{ session('status')}}
           </div>
        @endif
        @if (session('statuse'))
           <div class="alert alert-danger alert-dismissible">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Error! </strong> {{ session('statuse')}}
           </div>                 
        @endif     
        <form method="POST" action="{{route('newzone')}}">
          @csrf
          <div class="form-group row">
           <div class="col-md-10">
            <div class="input-group mb-3">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i></button>
              </div>
              @error('name')
               <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
               </span>
              @enderror
            </div>
           </div> 
          </div> 
        </form>

        <div class="table-responsive-sm">
         <table class="table table-striped">        
           <thead>
            <tr>
             <th>Id</th>
             <th>Zone</th>
             <th></th>
            </tr>
           </thead>
           <tbody>
              @forelse ($zones as $zone)
              <tr>
                <td class="small">{{ $zone->IdZone }}</td>
                <td class="small">{{ $zone->Name }}</td>
                <td>
                 <button class="btn btn-standard btn-sm" role="button" 
                 onclick="loadUpdate('{{ $zone->IdZone }}','{{ $zone->Name }}')"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
              @empty
               <tr></tr>
              @endforelse
           </tbody>
         </table>
        </div>
       </div>
      </div>
     </div>
    </div>
  </div>
</div>


<!----------MODAL------------->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Update Zones</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
         <h5>Zone's name :</h5>
           <form method="POST" action="{{route('updatezone')}}">
            @csrf
            <div class="input-group mb-3">
              <input type="hidden" name="uId" id="uId">  
              <input id="uname" type="text" class="form-control @error('name') is-invalid @enderror" name="uname" value="{{ old('uname') }}" required autocomplete="uname" autofocus>
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i></button>
                
              </div>
              @error('name')
               <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
               </span>
              @enderror
            </div>
           </form> 
        </div>

      </div>
      <div id="postmessage" class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!----------MODAL------------->
@endsection

@push('child-scripts')
  <script src="{{ asset('js/zones.js') }}">
  </script>
@endpush