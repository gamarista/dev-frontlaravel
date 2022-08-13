@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header">Report Return Trips status</div>
          <div class="card-body">
            <embed src="{{Request::root()}}/reports/planning/returntripsstatus.pdf" width="100%" height="600px" />
          </div>

      </div>
    </div>
   </div>
</div>
@endsection
