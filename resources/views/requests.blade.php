@if ($requests!=null)
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>

 <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"> Name</th>
      <th scope="col">Trade Name</th>
       <th scope="col">Amount</th>
      <th scope="col">Total Price </th>
       <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($requests as $r)
        <tr>
      <th scope="row"></th>
      <td>{{$r->user_name}}</td>
      <td>{{$r->medicine_name}}</td>
      <td>{{$r->amount}}</td>
      <td>{{$r->total_price}}</td>
      <td><a href="{{route('accept',$r->id)}}">Accept</a></td>
      <td> <a href="{{route('deleteRequest',$r->id)}}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
 </table>
 @endif
