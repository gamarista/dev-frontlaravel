<div class="container-fluid">
    <!--
  <div class="row">
    <div class="col-sm-8"> {{  $appoinments->withQueryString()->links()  }}</div>
    <div class="col-sm-1" >
      <input type="submit" value="GO" class="btn btn-dark" style="float: right;">
  </div>
  <div class="col-sm--1" >
      <a href="{route('getpatients')}}" class="btn"   style="background-color: chartreuse; float: right;" >New Trip</a>
  </div>
  </div>
-->
    <div class="container">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Total trips filtred: </strong> {{$appoinments->count()}}
        </div>
    </div>
    <table class="table trip-appoinment-list">
        <thead>
        </thead>
        <tbody>


            @foreach ($appoinments as $appoinment)

            <tr>
                @if (isset($appoinment->Cod_Cancell))
                <td colspan="0" class="trip-type-td red">
                    {{Form::label('geo_id',$appoinment->id, ['class' => 'gesidlabel', 'id' =>
                    'geoid-'.$appoinment->id,])}}
                </td>
                @else
                <td colspan="0" class="trip-type-td green">
                    {{Form::label('geo_id',$appoinment->id, ['class' => 'gesidlabel', 'id' =>
                    'geoid-'.$appoinment->id,])}}
                </td>
                @endif
                <td class="tripdatatd">
                    <table class="table table-bordered trip-appoinment-list-col-1">
                        <tbody>
                            <tr>
                                <td class="trip-type-idmc-td"> <strong>{{$appoinment->patient['MedicalNumber']}}
                                    </strong> &nbsp <strong> {{ " " . $appoinment->FirstName . " " .
                                        $appoinment->LastName }} </strong> </td>
                                <td> <strong> Time: </strong> {{Form::label('', date('g:i
                                    a',strtotime($appoinment->Time)), [ 'id' =>
                                    'timelist-'.$appoinment->id])}}<br><strong> Pick Time: </strong> {{date('g:i
                                    a',strtotime('-1 hour',strtotime($appoinment->Time)))}}</td>
                                <td class="trip-type-pickup-td"> <strong> Pickup address </strong> <br>
                                    {{Form::label('', $appoinment->AddressPatient, [ 'id' =>
                                    'addresspatientlist-'.$appoinment->id])}}</td>
                                <td class="trip-type-drooff-td"> <strong> Dropoff address </strong> <br>
                                    {{Form::label('', $appoinment->AddressDestination, [ 'id' =>
                                    'addressdestinationtlist-'.$appoinment->id])}} </td>
                                <td><strong> Assigned driver </strong><br>
                                    @if (isset($appoinment->driver))
                                         <strong id="selectedDriver">{{ $appoinment->driver['Driver'] }} </strong>
                                    @else
                                         <strong >--Not assigned-- </strong>
                                    @endif


                                </td>
                            </tr>
                            <tr>
                                <td style="width: 185.2px;"> <strong> Phones: </strong> {{Form::label('',
                                    $appoinment->PhoneNumber, [ 'id' => 'phonelist-'.$appoinment->id])}} /
                                    {{$appoinment->MobilNumber}}</td>
                                <td> <strong> Birth day: </strong> {{ $appoinment->DOB}}</td>

                                <td> Resource: {{Form::label('', $appoinment->outside_doctor_resource, [ 'id' =>
                                    'resourcelist-'.$appoinment->id])}} </td>
                                <td> <strong>Type of service: </strong>
                                    @if ($appoinment->TripType === "A")
                                    Pick Up
                                    @else
                                    Return
                                    @endif

                                </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> <strong> Notes:</strong> {{Form::label('', $appoinment->notes, [ 'id'
                                    => 'noteslist-'.$appoinment->id])}} </td>
                                <td colspan="2"> <strong> Special Needs: </strong>

                                </td>

                            </tr>

                        </tbody>
                    </table>
                </td>


                <td colspan="0" class="tripoptiontd px-2">
                @if (request()->route()->uri == 'front-desk')
                    <a href="" role="button" class="btn btn-info btn-block" id="transfer-{{$appoinment->id}}" data-toggle="modal"
                        data-target="#changeDriverModal"><i class="fas fa-user-friends fa-xl"></i> Change Driver</a><br>
                    <a href="" role="button" class="btn btn-outline-success btn-block"><i class=" fas fa-hand-point-up fa-xl"></i></span>
                        Ready for Pick-up</a>
                @else
                    {{-- <a href="" role="button" class="btn btn-danger btn-block" id="transfer-{{$appoinment->id}}" data-toggle="modal"
                        data-target="#changeDriverModal"><i class="fas fa-user-friends fa-xl"></i> Change Driver</a><br> --}}
                    <a href="" role="button" class="btn btn-danger btn-block"><i class=" fas fa-times fa-xl"></i></span>
                        Cancel</a>
                @endif

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    {{ $appoinments->withQueryString()->links() }}

    <div class="container-fluid" style="background-color:  #F3F2F2; ">

        <div class="row justify-content-around">
            <div class="col">
                Total services:
            </div>
            <div class="col">
                <strong> {{$totalTrips}}</strong>
            </div>
            <div class="col">
                Assigned:
            </div>
            <div class="col">
                <strong> {{$tripsAssigned}}</strong>
            </div>
            <div class="col">
                Not assigned:
            </div>
            <div class="col">
                <strong> {{$tripsNotAssigned}}</strong>
            </div>
            <div class="col">
                Canceled:
            </div>
            <div class="col">
                <strong> {{$tripsCanceled}}</strong>
            </div>

        </div>

    </div>
</div>

