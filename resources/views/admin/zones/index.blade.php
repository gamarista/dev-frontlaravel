@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Zones</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        
                        <div class="row justify-content-end">
                            <div class="col-4">
                               
                              </div>
                          <div class="col-2">
                            <a  href="{{route('resource.zone.create')}}" class="btn" style="background-color: #1EC96E;"><i class="fas fa-globe"></i> New zone</a>
                          </div>
                   
                    </div>

                    <div class="container">
                        <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Zone</th>
                                <th scope="col">Description</th>
                              
                             
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($zones as $zone)
                                <tr>
                                    <td style="width: 15%;">{{$zone->Name}}</th>
                                    <td style="width: 30%;">{{$zone->description}}</td>
                                    <td style="width: 25%;" >
                                        <a href="{{route('resource.zone.route',['id' => $zone->IdZone])}}" class="btn float-right" style="background-color: #EFEFEF; margin-right: 5px; " ><i class="fas fa-route"></i> Routes</a>
                                       <a href="{{route('resource.zone.edit',['id' => $zone->IdZone])}}" class="btn float-right" style="background-color: #AFE9EF; margin-right: 5px;width: 90px;" ><i class="fas fa-edit"></i> Edit</a>
                                      


                                    </td>
                                  
                                  </tr>

                                @endforeach
                          
                        
                           
                            </tbody>
                          </table>
                          {{  $zones->withQueryString()->links()  }}
                    
                    </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('child-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/resource-zone.js') }}"></script>
@endpush
