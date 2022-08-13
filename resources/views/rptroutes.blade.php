@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header">Reports Routes</div>
          <div class="card-body">
            <embed src="{{Request::root()}}/reports/planning/routeh.pdf" width="100%" height="600px" />
          </div>

      </div>
    </div>
   </div>
</div>
@endsection
