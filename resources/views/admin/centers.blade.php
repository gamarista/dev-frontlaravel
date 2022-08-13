@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Centers</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

<div _ngcontent-how-c0="" class="col-md-10 ng-star-inserted" style="padding-left: 0">
    <div _ngcontent-how-c0="" style=" margin-top: 0px; padding-left: 0px; text-align: center"><router-outlet _ngcontent-how-c0="">
    </router-outlet>
    <app-center-management _nghost-how-c7="" class="ng-star-inserted">



</div>
<div _ngcontent-how-c7="" class="row" style="margin-bottom:5px">
    <div _ngcontent-how-c7="" class="col-10"><div _ngcontent-how-c7="" class="float-left" style="padding-right: 5px; margin-bottom: 0px">

        </div>
    </div>
    <div _ngcontent-how-c7="" class="col-2 float-right" style="text-align:right;"><button _ngcontent-how-c7="" class="btn btn-success btn-sm" hidedelay="500" ptooltip="Create a new route" showdelay="1000" style="margin-top: 0" tooltipposition="left" type="button"><fa _ngcontent-how-c7="" animation="none" name="hospital-o" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-hospital-o fa-none"></i></fa>&nbsp;&nbsp;New Center </button>
    </div>
</div>
<div _ngcontent-how-c7="" class="row" style="height: 80%"><div _ngcontent-how-c7="" class="col-12"><p-table _ngcontent-how-c7=""><div class="ui-table ui-widget"><!----><!----><!----><!----><!----><!----><div class="ui-table-scrollable-wrapper ng-star-inserted"><!----><div class="ui-table-scrollable-view">
<div class="ui-table-scrollable-body" style="max-height: 405px;">
    <table class="table table-bordered table-sm">
    <thead class="ui-table-thead"><!----><tr _ngcontent-how-c7="" class="ng-star-inserted"><th _ngcontent-how-c7="" class="long_name">Name</th><th _ngcontent-how-c7="" class="short_name">Short name</th><th _ngcontent-how-c7="" class="long_name">Address</th><th _ngcontent-how-c7="" class="long_name">&nbsp;</th></tr>
    </thead>
        <tbody class="ui-table-tbody"><tr _ngcontent-how-c7="" class="ng-star-inserted"><td _ngcontent-how-c7="" class="long_name"><span _ngcontent-how-c7="">Bird Road Center</span></td><td _ngcontent-how-c7="" class="short_name"><span _ngcontent-how-c7="">BRO</span></td><td _ngcontent-how-c7="" class="long_name"><span _ngcontent-how-c7="">9611 SW 40 Street, Miami, FL 33165</span></td><td _ngcontent-how-c7="" class="long_name"><div _ngcontent-how-c7="" class="buttons-cell" style="padding:5px 5px; width: 100%; vertical-align: middle; text-align: center"><div _ngcontent-how-c7="" style="height: auto; vertical-align: middle; padding-inline: 5px;"><button _ngcontent-how-c7="" class="btn btn-primary btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c7="" animation="none" name="edit" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-edit fa-none"></i></fa> Edit </button><!----><!----><span _ngcontent-how-c7="" class="ng-star-inserted"><button _ngcontent-how-c7="" class="btn btn-danger btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c7="" animation="none" name="close" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-close fa-none"></i></fa> Disable </button></span><div _ngcontent-how-c7="" style="margin-left: 5px; margin-right: 5px; margin-top: 0; width: 80px; height: 1px;">&nbsp;</div></div></div></td></tr><!----><!----><tr _ngcontent-how-c7="" class="ng-star-inserted"><td _ngcontent-how-c7="" class="long_name"><span _ngcontent-how-c7="">Hollywood</span></td><td _ngcontent-how-c7="" class="short_name"><span _ngcontent-how-c7="">HOL</span></td><td _ngcontent-how-c7="" class="long_name"><span _ngcontent-how-c7="">750 S Federal Hwy, Hollywood 33020</span></td><td _ngcontent-how-c7="" class="long_name"><div _ngcontent-how-c7="" class="buttons-cell" style="padding:5px 5px; width: 100%; vertical-align: middle; text-align: center"><div _ngcontent-how-c7="" style="height: auto; vertical-align: middle; padding-inline: 5px;"><button _ngcontent-how-c7="" class="btn btn-primary btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c7="" animation="none" name="edit" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-edit fa-none"></i></fa> Edit </button><!----><!----><span _ngcontent-how-c7="" class="ng-star-inserted"><button _ngcontent-how-c7="" class="btn btn-danger btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c7="" animation="none" name="close" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-close fa-none"></i></fa> Disable </button></span><div _ngcontent-how-c7="" style="margin-left: 5px; margin-right: 5px; margin-top: 0; width: 80px; height: 1px;">&nbsp;</div></div></div></td></tr><!----><!----><tr _ngcontent-how-c7="" class="ng-star-inserted"><td _ngcontent-how-c7="" class="long_name"><span _ngcontent-how-c7="">Hialeah Center</span></td><td _ngcontent-how-c7="" class="short_name"><span _ngcontent-how-c7="">HIA</span></td><td _ngcontent-how-c7="" class="long_name"><span _ngcontent-how-c7="">551 E 49 Street, Suite 1-8, Hialeah, FL 33013</span></td><td _ngcontent-how-c7="" class="long_name"><div _ngcontent-how-c7="" class="buttons-cell" style="padding:5px 5px; width: 100%; vertical-align: middle; text-align: center"><div _ngcontent-how-c7="" style="height: auto; vertical-align: middle; padding-inline: 5px;"><button _ngcontent-how-c7="" class="btn btn-primary btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c7="" animation="none" name="edit" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-edit fa-none"></i></fa> Edit </button><!----><!----><span _ngcontent-how-c7="" class="ng-star-inserted"><button _ngcontent-how-c7="" class="btn btn-danger btn-sm btn-command action-button" type="button"><fa _ngcontent-how-c7="" animation="none" name="close" _nghost-how-c6=""><i _ngcontent-how-c6="" aria-hidden="true" class="fa fa-close fa-none"></i></fa> Disable </button></span><div _ngcontent-how-c7="" style="margin-left: 5px; margin-right: 5px; margin-top: 0; width: 80px; height: 1px;">&nbsp;</div></div></div></td></tr><!----></tbody></table><!----><!----></div><!----></div></div><!----><!----><div class="ui-table-summary ui-widget-header ng-star-inserted"><!----> &nbsp; </div><!----><!----><!----></div></p-table></div></div></app-center-management></div></div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
