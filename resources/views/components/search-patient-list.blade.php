<div>
   
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Medical Number</th>
                <th scope="col">Names</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($patients as $patient)  <tr>
            <th scope="row"> <strong>{{$patient->MedicalNumber}} </strong></th>
                <td>{{$patient->Names}} </td>
                <td>{{$patient->PatientAddress}}</td>
                <td>{{$patient->ContactPreference}}</td>
                <td>{{$patient->Email}}</td>
                <td> <a href="{{route('trips.create',['id' => $patient->Id])}}" class="btn"   style="background-color: chartreuse;" ><i class="fas fa-bus"></i> New Trip</a></td>
              </tr>
                
            @endforeach
            </tbody>
          </table>
  
</div>