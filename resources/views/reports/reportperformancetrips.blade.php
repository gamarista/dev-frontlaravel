@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <div style="background-color:powderblue;" class="row justify-content-md-center">

        <h3> KEY PERFORMANCE INDICATORS</h3>
    </div>

    <div style="border-bottom: 2px solid black;" class="row justify-content-around">
        <div class="col-6">
            <h2> Date: {{$date}}</h3>
        </div>
    </div>

    <div style="border-bottom: 2px solid black;" class="row justify-content-around">
        <div class="col-4">
            <h2> Total trips: {{$total}}</h3>
        </div>
        <div class="col-4">
            <h2> Completed: {{$completed}}</h3>
        </div>
        <div class="col-4">
            @php
            if ($total == 0)
            $percent = 0;
            else {
            $percent = ($completed /$total)*100;
            }
            @endphp
            <h2> % Completed: {{round($percent,2)}}</h3>
        </div>
    </div>
    <br>
    <br>
    <div  class="row">
        <canvas id="pickchart" width="1000" height="400" ></canvas>
    </div>
    <br>
    <br>
    <div  class="row">
        <canvas id="returnchart" width="1000" height="400" ></canvas>
    </div>

</div class="container">

@endsection

@push('child-scripts')
<script>
    var ctx = document.getElementById('pickchart').getContext('2d');
    var pickup = {!!json_encode($performace)!!} ;
    
    var myChart =  new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: Object.keys(pickup['pickup'][0]),
            datasets: [{
                label: 'TRIPS TO CENTER',
                data: Object.values(pickup['pickup'][0]),
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                   
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',  
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
          
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
});


var ctr = document.getElementById('returnchart').getContext('2d');
    var home = {!!json_encode($performace)!!} ;
    
    var chartretunr =  new Chart(ctr, {
        type: 'horizontalBar',
        data: {
            labels: Object.keys(home['return'][0]),
            datasets: [{
                label: 'TRIPS TO HOME',
                data: Object.values(home['return'][0]),
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                   
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',  
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
          
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
});
</script>
@endpush