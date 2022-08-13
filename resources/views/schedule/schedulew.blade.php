<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SACS</title>
    <!--AGREGADO-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='assets/css/fullcalendar.css' rel='stylesheet' />
    <link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href='assets/css/alertify.css' rel='stylesheet' />
    <link href='assets/css/alertify.min.css' rel='stylesheet' />
    <script src='assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
    <script src='assets/js/wfullcalendar.js' type="text/javascript"></script>
    <script src='assets/js/alertify.js' type="text/javascript"></script>
    <script src='assets/js/alertify.min.js' type="text/javascript"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 

<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">    

<style>

	#wrap {
		width: 100%;
        margin-left: 15px;
        margin-right: 15px;
        padding-left: 10px;
        padding-right: 10px;		
		}

	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}

	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}

	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}

	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}

	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 5 px;
		width: 100%;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #404040;
		}

body {
    margin: 0;
    font-weight: 400;
    line-height: 1.4;
    color: #212529;
    text-align: left;
    background-color: #058181;
    font-family: "Open Sans","Helvetica Neue",sans-serif;
    font-size: 14px;
    text-decoration: none;    
}


li {
    display: list-item;
    text-align: -webkit-match-parent;
    font-size: 18px;
}

      .bg-white {
         background-color: #343a40!important;
         }

      .dropdown-header {
        display: block;
        padding: 0.5rem 1.5rem;
        margin-bottom: 0;
        font-size: 1.05rem;
        color: #003333;
        white-space: nowrap;
       }

      .navbar-light .navbar-nav .nav-link {
          color: rgba(255, 255, 255, 0.5);
      }     
      
      over:: .navbar-light .navbar-nav .nav-link {
         color: #343a40!important;
      }  

     .btn {
      font-size: 1.9rem;
     }

	 .navbar {
	    margin-bottom: 2px;
	   }       

.btn-success{
	background-color: #058181;
	font-size: 14px;
}

a {
    color: #000;
    text-decoration: none;
    background-color: transparent;
}
</style>
</head>
<body>
<!--------------------->


<!------------------->	
<div id="app">
	
 <main class="py-4">


  @if (session('status')) 
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>{{ session('status')}}
    </div>
  @endif
  @if (session('statuse'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> {{ session('statuse')}}
    </div>                 
  @endif 	


<div class="wrap" style="margin-left: 15px;margin-right: 15px;padding-left: 10px;padding-right: 10px;">

   <div class="row">
      <div class="col-sm-2" style="background-color:#87c5c5;padding: 5px;">
      	 <h1 style="text-align: center;color: #343a40;">SCHEDULING</h1>
          <div id="sandbox-container" style="padding: 5px;margin-top: 15px;"></div>
          <div id="sandbox-container2" style="padding: 5px;"></div>
          <div id="sandbox-container3" style="padding: 5px;"></div>
      </div>
      <div class="col-sm-10" style="background-color:#DEEFEF;">
	    <ul class="nav nav-tabs">
	      <li class="active"><a href="#">Day</a></li>
	      <li><a href="{{route('wkschedule')}}">Week</a></li>
	      <li ><a href="{{route('schedule')}}">Month</a></li>
          <li role="button"  class="btn btn-primary">&nbsp;&nbsp;<i class="fas fa-sync"></i>&nbsp;&nbsp;</li>
          <li style="margin-top: 10px;">&nbsp;&nbsp;<i class="fas fa-calendar-plus">&nbsp;</i>Total appointments: {{$totalapp}}</li>
        </ul>        
        <div id='calendar'></div>      
      </div> 
   </div> 


</div>
  </main>
</div>


</body>
</html>


    <script>
   	  $(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
        $('[data-toggle="tooltip"]').tooltip();   

		/*  className colors
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		*/
		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				//center: 'agendaDay,agendaWeek,month',
				center: 'agendaDay',
				right: 'prev,next today'
			},
			editable: false,
			firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'agendaDay',

			axisFormat: 'hh:mm',
			columnFormat: {
                month: 'dd',    // Mon
                //week: 'ddd d', // Mon 7
                day: 'dd', //'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMM yyyy', // September 2009
                week: "MMM yyyy", // September 2009
                day: 'MMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,

		select: function(start, end, allDay) {
				var tzoffsetStart = start.getTimezoneOffset() * 60000; //offset in milliseconds
				var localISOTimeStart = (new Date(start - tzoffsetStart)).toISOString().slice(0, -1);
				var tzoffsetEnd = end.getTimezoneOffset() * 60000; //offset in milliseconds
				var localISOTimeEnd = (new Date(end - tzoffsetEnd)).toISOString().slice(0, -1);
				$("#PickUpTime").val(localISOTimeStart);
				$("#DropOffMCTime").val(localISOTimeEnd);
				$("#PickUpMCTime").val(localISOTimeEnd);
				$("#DropOffTime").val(localISOTimeEnd);
				$("#AppoinmentDate").val(localISOTimeStart);

				var dateAct = new Date();
				var xdateAct = new Date(localISOTimeStart);
				//var xAct = dateAct.getDate()+dateAct.getMonth()+dateAct.getFullYear();
				//var xUsr = xdateAct.getDate()+xdateAct.getMonth()+xdateAct.getFullYear();
				//$("#Fecha1").val(dateAct.getMonth()); //+dateAct.getMonth()+dateAct.getFullYear());
				//$("#xFecha1").val(xdateAct.getMonth()); //+xdateAct.getMonth()+xdateAct.getFullYear());

				//$("#Fecha").val(dateAct);
				//$("#xFecha").val(xdateAct);

				if (xdateAct>=dateAct)
				{ 
				//$("#myModal").modal();
			    }
				//var title = prompt('Event Title 1:');
				/*if (title) { 
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');*/
			},

			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped

				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},

			events: 
			[ 
			 {!!$events!!}			
			],
		});


	});

  $('#sandbox-container').datepicker({
      format: "mm/dd/yyyy",
      startDate: "now",
    orientation: "top auto",
    todayHighlight: true      
  });

  var today = new Date();
  dateNewFormat =  (today.getMonth() + 2) + "/" + today.getDate() + "/" +  today.getFullYear();
  $('#sandbox-container2').datepicker({
      format: "mm/dd/yyyy",
      orientation: "top auto",
      showOnFocus: "false",
    }).datepicker("setDate", dateNewFormat);
	

  //var today = new Date();
  dateNewFormat =  (today.getMonth() + 3) + "/" + today.getDate() + "/" +  today.getFullYear();
  $('#sandbox-container3').datepicker({
      format: "mm/dd/yyyy",
      orientation: "top auto",
      showOnFocus: "false",
    }).datepicker("setDate", dateNewFormat);
 


</script>


