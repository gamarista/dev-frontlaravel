@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <div class="row">
<div _ngcontent-fkr-c4="" class="row">
    <div _ngcontent-fkr-c4="" class="col-xs-10 col-sm-8 col-md-6 offset-xs-1 offset-sm-2 offset-md-3 align-self-center" style="padding: 20px"></div>
</div>
            
<div class="col-xs-10 col-sm-8 col-md-6 col-lg-4 offset-xs-1 offset-sm-2 offset-md-3 offset-lg-4  align-self-center" style="border:1px dimgrey solid; padding: 20px; margin-top: 70px">

    <div _ngcontent-fkr-c4="" style="font-style: italic; font-size: 1.5em; text-align: center; margin-bottom: 5px;" width="100%">SACS WEB<br _ngcontent-fkr-c4="">(Scheduling and Control System)</div> 
    <div _ngcontent-fkr-c4="" style="font-style: italic; font-size: 0.85em; text-align: center; margin-bottom: 25px;" width="100%"> version 1.1.0</div>

<div _ngcontent-fkr-c4="" style="text-align: center; padding-bottom: 35px"><img _ngcontent-fkr-c4="" alt="logo" src="./assets/img/login_logo.png"></div>

  <form method="POST" action="{{ route('login') }}">
   @csrf
    <div class="form-group row" style="padding-left:20px;padding-right:20px;">
      <label for="email">Username or email</label>
      
         <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
         @error('email')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
         @enderror
    </div>

    <div class="form-group row" style="padding-left:20px;padding-right:20px;">
       <label for="password">Password</label>
         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            
     </div>

    <button  class="btn btn-primary float-right" type="submit">Sign In</button>
           </form>
                
         </div>
     </div>
</div>

@endsection
