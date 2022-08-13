@extends('layouts.app')
@section('content')

    <h3>  Notification Log for service {{ $appoinment}} <h3>
    <div class="container-fluid">
       
        <table class="table trip-appoinment-list" >
            <thead>
                <tr>
                    <th scope="col">Driver</th>
                    <th scope="col">Sending Time</th>
                    <th scope="col">Reception Time</th>
                    <th scope="col">Service</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                  </tr>
            </thead>
            <tbody>
                
                @foreach ($notifications as $notification)
                    <tr>
                    
                        @if ( !empty($notification->driver_id))
                            <td> {{ $notification->driver->Driver}}</td>
                        @else
                            <td></td>
                        @endif
                
                 
                        @php
                            $date = explode(" ", $notification->created_at);
                            $date = $date[1];
                        @endphp
                        <td> {{$date}} </td>

                        @php
                            if (strcmp($notification->created_at,$notification->updated_at) == 0 ){
                                $date = "";
                            }else{
                                $date = explode(" ", $notification->updated_at);
                                $date = $date[1];
                            }
                            
                        @endphp
                        <td> {{$date}} </td>

                        <td> {{$notification->ges_appoinments_id}} </td>
                        <td> {{$notification->message}} </td>
                        
                        @isset($notification->appoinment->OB)
                            <td>  Accepted </td>
                        @endisset
                        @isset($notification->appoinment->CD)
                            <td>  Rejected </td>
                        @endisset

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


@endsection