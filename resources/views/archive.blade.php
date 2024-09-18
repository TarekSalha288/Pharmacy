



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
      <th scope="col">Scientific Name</th>
      <th scope="col">Trade Name</th>
       <th scope="col">Company</th>
        <th scope="col">Category</th>
      <th scope="col">Amount </th>
       <th scope="col"> Price</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($medicines as $m)
        <tr>
      <th scope="row">{{$m->id}}</th>
      <td>{{$m->sName}}</td>
      <td>{{$m->tName}}</td>
      <td>{{$m->company}}</td>
      <td>{{$m->category}}</td>
      <td>{{$m->amount}}</td>
      <td>{{$m->price}}</td>
      <td> <a href="{{route('delete',$m->id)}}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
