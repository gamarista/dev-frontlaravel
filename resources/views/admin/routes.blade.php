@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Routes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

<div _ngcontent-how-c8="" class="row" style="margin-bottom:5px">
<div _ngcontent-how-c8="" class="col-10">
    <div _ngcontent-how-c8="" class="float-left" style="padding-right: 5px; margin-bottom: 0px">
        <input _ngcontent-how-c8="" class="filter-inputText" pinputtext="" placeholder="Search by name" type="text" width="150px">
    </div>
    <div _ngcontent-how-c8="" class="float-left" style="padding-right: 5px; margin-bottom: 0px">
        <p-dropdown _ngcontent-how-c8="" class="filter-dropdown ng-tns-c9-5" ptooltip="Trips status filter" placeholder="Zones" tooltipposition="bottom">
            <div class="ng-tns-c9-5 ui-dropdown ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="min-width: 240px;">

                <div class="ui-helper-hidden-accessible ui-dropdown-hidden-select">
                    <select class="ng-tns-c9-5" aria-hidden="true" tabindex="-1"><!---->
                        <option value="" class="ng-tns-c9-5 ng-star-inserted">Zones</option><!---->
                        <option class="ng-tns-c9-5 ng-star-inserted" value="undefined">All zones</option>
                    </select>
                </div>

                <div class="ui-dropdown-trigger ui-state-default ui-corner-right"><span class="ui-dropdown-trigger-icon ui-clickable pi pi-chevron-down"></span>
                </div><!---->
            </div>
        </p-dropdown>
    </div>
    <div _ngcontent-how-c8="" class="float-left" style="padding-right: 5px; margin-bottom: 0px"><p-dropdown _ngcontent-how-c8="" class="filter-dropdown ng-tns-c9-6" ptooltip="Trips status filter" placeholder="Centers " tooltipposition="bottom"><div class="ng-tns-c9-6 ui-dropdown ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="min-width: 240px;">

        <div class="ui-helper-hidden-accessible ui-dropdown-hidden-select">
            <select class="ng-tns-c9-6" aria-hidden="true" tabindex="-1"><!----><option value="" class="ng-tns-c9-6 ng-star-inserted">Centers </option><!----><option class="ng-tns-c9-6 ng-star-inserted" value="undefined">All centers</option></select>
        </div>

        <div class="ui-dropdown-trigger ui-state-default ui-corner-right"><span class="ui-dropdown-trigger-icon ui-clickable pi pi-chevron-down"></span></div><!----></div></p-dropdown></div><div _ngcontent-how-c8="" class="float-left" style="padding-right: 5px; margin-bottom: 0px">

    </div>
</div><div _ngcontent-how-c8="" class="col-2 float-right" style="text-align:right;"><button _ngcontent-how-c8="" class="btn btn-success btn-sm" hidedelay="500" ptooltip="Create a new route" showdelay="1000" style="margin-top: 0" tooltipposition="left" type="button"><fa _ngcontent-how-c8="" animation="none" name="truck" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-truck fa-none"></i></fa>&nbsp;&nbsp;New Route </button></div>
</div>


<div _ngcontent-how-c8="" class="row" style="height: 80%">
<div _ngcontent-how-c8="" class="col-12">
    <p-table _ngcontent-how-c8="">
        <div class="ui-table ui-widget">
            <div class="ui-table-scrollable-wrapper ng-star-inserted"><!---->
                <div class="ui-table-scrollable-view">
                    <div class="ui-table-scrollable-header ui-widget-header">
                        <div class="ui-table-scrollable-header-box" style="margin-right: 17px; margin-left: 0px;">
                            <table class="table table-bordered table-sm"><!---->

                                <tbody class="ui-table-tbody"><!----></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ui-table-scrollable-body" style="max-height: 360px;">
                        <table class="table table-bordered table-sm"><!---->
                                <thead class="ui-table-thead"><!---->
                                    <tr _ngcontent-how-c8="" class="ng-star-inserted">
                                        <th _ngcontent-how-c8="" class="short_name">Route Name</th>
                                        <th _ngcontent-how-c8="" class="counter">Route No.</th>
                                        <th _ngcontent-how-c8="" class="short_name">Zone</th>
                                        <th _ngcontent-how-c8="" class="counter">Center</th>
                                        <th _ngcontent-how-c8="" class="counter">Color</th>
                                        <th _ngcontent-how-c8="" class="short_name">Driver</th>
                                        <th _ngcontent-how-c8="" class="long_name">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody class="ui-table-tbody">
                                    <tr _ngcontent-how-c8="" class="ng-star-inserted"><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">Route1</span></td><td _ngcontent-how-c8="" class="counter"><span _ngcontent-how-c8="">1</span></td><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">East</span></td><td _ngcontent-how-c8="" class="counter"><span _ngcontent-how-c8="">HIA</span></td><td _ngcontent-how-c8="" class="counter"><div _ngcontent-how-c8="" style="background-color: rgb(133, 127, 129); width: 30px; text-align: center;"> &nbsp;&nbsp;</div></td><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">Robexy Rodriguez</span></td><td _ngcontent-how-c8="" class="long_name"><div _ngcontent-how-c8="" class="buttons-cell" style="padding:5px 5px; width: 100%; vertical-align: middle; text-align: center"><div _ngcontent-how-c8="" style="height: auto; vertical-align: middle; padding-inline: 5px;"><button _ngcontent-how-c8="" class="btn btn-primary btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="edit" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-edit fa-none"></i></fa> Edit </button><!----><!----><span _ngcontent-how-c8="" class="ng-star-inserted"><button _ngcontent-how-c8="" class="btn btn-danger btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="close" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-close fa-none"></i></fa> Disable </button></span><span _ngcontent-how-c8=""><button _ngcontent-how-c8="" class="btn btn-success btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="user" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-user fa-none"></i></fa> Driver </button></span><div _ngcontent-how-c8="" style="margin-left: 5px; margin-right: 5px; margin-top: 0; width: 80px; height: 1px;">&nbsp;</div></div></div></td></tr>
                                    <tr _ngcontent-how-c8="" class="ng-star-inserted"><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">Route 2</span></td><td _ngcontent-how-c8="" class="counter"><span _ngcontent-how-c8="">2</span></td><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">North</span></td><td _ngcontent-how-c8="" class="counter"><span _ngcontent-how-c8="">HOL</span></td><td _ngcontent-how-c8="" class="counter"><div _ngcontent-how-c8="" style="background-color: rgb(136, 17, 212); width: 30px; text-align: center;"> &nbsp;&nbsp;</div></td><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">Luis Rios</span></td><td _ngcontent-how-c8="" class="long_name"><div _ngcontent-how-c8="" class="buttons-cell" style="padding:5px 5px; width: 100%; vertical-align: middle; text-align: center"><div _ngcontent-how-c8="" style="height: auto; vertical-align: middle; padding-inline: 5px;"><button _ngcontent-how-c8="" class="btn btn-primary btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="edit" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-edit fa-none"></i></fa> Edit </button><!----><!----><span _ngcontent-how-c8="" class="ng-star-inserted"><button _ngcontent-how-c8="" class="btn btn-danger btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="close" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-close fa-none"></i></fa> Disable </button></span><span _ngcontent-how-c8=""><button _ngcontent-how-c8="" class="btn btn-success btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="user" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-user fa-none"></i></fa> Driver </button></span><div _ngcontent-how-c8="" style="margin-left: 5px; margin-right: 5px; margin-top: 0; width: 80px; height: 1px;">&nbsp;</div></div></div></td></tr>
    <tr _ngcontent-how-c8="" class="ng-star-inserted"><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">Route 3</span></td><td _ngcontent-how-c8="" class="counter"><span _ngcontent-how-c8="">3</span></td><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">West</span></td><td _ngcontent-how-c8="" class="counter"><span _ngcontent-how-c8="">HIA</span></td><td _ngcontent-how-c8="" class="counter"><div _ngcontent-how-c8="" style="background-color: rgb(186, 132, 210); width: 30px; text-align: center;"> &nbsp;&nbsp;</div></td><td _ngcontent-how-c8="" class="short_name"><span _ngcontent-how-c8="">Yaseli Antunez</span></td><td _ngcontent-how-c8="" class="long_name"><div _ngcontent-how-c8="" class="buttons-cell" style="padding:5px 5px; width: 100%; vertical-align: middle; text-align: center"><div _ngcontent-how-c8="" style="height: auto; vertical-align: middle; padding-inline: 5px;"><button _ngcontent-how-c8="" class="btn btn-primary btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="edit" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-edit fa-none"></i></fa> Edit </button><!----><!----><span _ngcontent-how-c8="" class="ng-star-inserted"><button _ngcontent-how-c8="" class="btn btn-danger btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="close" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-close fa-none"></i></fa> Disable </button></span><span _ngcontent-how-c8=""><button _ngcontent-how-c8="" class="btn btn-success btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c8="" animation="none" name="user" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-user fa-none"></i></fa> Driver </button></span><div _ngcontent-how-c8="" style="margin-left: 5px; margin-right: 5px; margin-top: 0; width: 80px; height: 1px;">&nbsp;</div></div></div></td></tr>

</tbody></table><!----><!----></div><!----></div></div><!----><!----><div class="ui-table-summary ui-widget-header ng-star-inserted"><!----> &nbsp; </div><!----><!----><!----></div></p-table></div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
