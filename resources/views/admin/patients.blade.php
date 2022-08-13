@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Patients</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
<div _ngcontent-how-c11="" class="row" style="margin-bottom:5px">
    <div _ngcontent-how-c11="" class="col-10">
        <div _ngcontent-how-c11="" class="float-left" style="padding-right: 5px; margin-bottom: 0px">
            <input _ngcontent-how-c11="" class="filter-inputText" pinputtext="" placeholder="Search by name" type="text" width="250px">
        </div>
        <div _ngcontent-how-c11="" class="float-left" style="padding-right: 5px; margin-bottom: 0px">
            <p-dropdown _ngcontent-how-c11="" class="filter-dropdown ng-tns-c9-8 ui-inputwrapper-filled" ptooltip="Trips status filter" placeholder="Centers " tooltipposition="bottom">
                <div class="ng-tns-c9-8 ui-dropdown ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="min-width: 240px;">

                    <div class="ui-helper-hidden-accessible ui-dropdown-hidden-select">
                        <select class="ng-tns-c9-8" aria-hidden="true" tabindex="-1"><!----><option value="" class="ng-tns-c9-8 ng-star-inserted">Centers </option><!----><option class="ng-tns-c9-8 ng-star-inserted" value="undefined">All centers</option></select>
                    </div>

                    <div class="ui-dropdown-trigger ui-state-default ui-corner-right"><span class="ui-dropdown-trigger-icon ui-clickable pi pi-chevron-down"></span>
                    </div><!---->
                </div>
            </p-dropdown>
        </div>
        <div _ngcontent-how-c11="" class="float-left" style="padding-right: 5px; margin-bottom: 0px">
            <p-dropdown _ngcontent-how-c11="" class="filter-dropdown ng-tns-c9-9 ui-inputwrapper-filled" ptooltip="Trips status filter" placeholder="Routes" tooltipposition="bottom">
                <div class="ng-tns-c9-9 ui-dropdown ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="min-width: 240px;">
                    <div class="ui-helper-hidden-accessible ui-dropdown-hidden-select">
                        <select class="ng-tns-c9-9" aria-hidden="true" tabindex="-1"><!----><option value="" class="ng-tns-c9-9 ng-star-inserted">Routes</option><!----><option class="ng-tns-c9-9 ng-star-inserted" value="undefined">All routes</option></select>
                    </div>

                    <div class="ui-dropdown-trigger ui-state-default ui-corner-right"><span class="ui-dropdown-trigger-icon ui-clickable pi pi-chevron-down"></span>
                    </div><!---->
                </div>
            </p-dropdown>
        </div>
    </div>
    <div _ngcontent-how-c11="" class="col-2 float-right" style="text-align:right;"><button _ngcontent-how-c11="" class="btn btn-success btn-sm" hidedelay="500" ptooltip="Create a new route" showdelay="1000" style="margin-top: 0" tooltipposition="left" type="button"><fa _ngcontent-how-c11="" animation="none" name="wheelchair" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-wheelchair fa-none"></i></fa>&nbsp;&nbsp;New Patient </button>
    </div>
</div>


<div _ngcontent-how-c11="" class="row" style="height: 80%">
  <div _ngcontent-how-c11="" class="col-12">
   <p-table _ngcontent-how-c11="">
    <div class="ui-table ui-widget">
     <div class="ui-table-scrollable-wrapper ng-star-inserted">
      <div class="ui-table-scrollable-view">
       <div class="ui-table-scrollable-header ui-widget-header">
        <div class="ui-table-scrollable-header-box" style="margin-right: 17px; margin-left: 0px;">
         <table class="table table-bordered table-sm">
          <thead class="ui-table-thead">
            <tr _ngcontent-how-c11="" class="ng-star-inserted">
             <th _ngcontent-how-c11="" class="short_name">Name</th>
             <th _ngcontent-how-c11="" class="date_time">DOB</th>
             <th _ngcontent-how-c11="" class="long_name">Address</th>
             <th _ngcontent-how-c11="" class="long_name">&nbsp;</th>
            </tr>
          </thead>
          <tbody class="ui-table-tbody">
            @foreach($patients as $patient)  
             <tr _ngcontent-how-c11="" class="ng-star-inserted">
                <td _ngcontent-how-c11="" class="short_name"><span _ngcontent-how-c11="">{{$patient->Names}}</span></td>
                <td _ngcontent-how-c11="" class="date_time"><span _ngcontent-how-c11="">{{$patient->BOD}}</span></td>
                <td _ngcontent-how-c11="" class="long_name"><span _ngcontent-how-c11="">{{$patient->PatientAddress}}</span></td>
                <td _ngcontent-how-c11="" class="long_name"><div _ngcontent-how-c11="" class="buttons-cell" style="padding:5px 5px; width: 100%; vertical-align: middle; text-align: center"><div _ngcontent-how-c11="" style="height: auto; vertical-align: middle; padding-inline: 5px;"><button _ngcontent-how-c11="" class="btn btn-primary btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c11="" animation="none" name="edit" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-edit fa-none"></i></fa> Edit </button><div _ngcontent-how-c11="" style="margin-left: 5px; margin-right: 5px; margin-top: 0; width: 80px; height: 1px;">&nbsp;</div></div></div>
                </td>
             </tr>
            @endforeach                                        
          </tbody>
         </table>
        </div>
      </div></div></div></div>
                        
    </p-table>
</div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
