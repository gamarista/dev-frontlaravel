<div>
    <div class="container-fluid">

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Driver</th>
              <th scope="col">Start job</th>
              <th scope="col">End job</th>
              <th scope="col">Total Trips</th>
              <th scope="col">Complete trips</th>
              <th scope="col">Pending Trips</th>
              <th scope="col"  style="background-color: #1EC96E">OB </th>
              <th scope="col"  style="background-color: palegoldenrod">DP</th>
              <th scope="col"  style="background-color: #EF4B4B">CD </th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($activities as $activity)
                  <tr>
    
                 
                    <th scope="col">
                    {{  $activity->driver->Driver}}
                    </th>
                    <th scope="col">
                        {{  $activity->start_job}}
                    </th>
                    <th scope="col">
                        {{  $activity->end_job}}
                    </th>
                    <th scope="col">
                        {{  $activity->total_trips}}
                    </th>
                    <th scope="col">
                        {{  $activity->completed_trips}}
                    </th>
                    <th scope="col">
                        {{  $activity->pending_trips}}
                    </th>
                    <th scope="col">
                        {{  $activity->ob}}
                    </th>
                    <th scope="col">
                        {{  $activity->dp}}
                    </th>
                    <th scope="col">
                        {{  $activity->cd}}
                    </th>
                  
                    
                   
        
                          
                  </tr>
            @endforeach
    
          </tbody>
        </table>
    
      </div>
</div>