
@if ($medicines!=[])
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

      <th scope="col">Scientific Name</th>
      <th scope="col">Trade Name</th>
       <th scope="col">Company</th>
        <th scope="col">Category</th>
      <th scope="col">Price </th>
       <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($medicines as $m)
        <tr>
      <td>{{$m->sName}}</td>
      <td>{{$m->tName}}</td>
      <td>{{$m->company}}</td>
      <td>{{$m->category}}</td>
      <td>{{$m->price}}</td>
      <td> <a href="{{route('edit',$m->id)}}">Edit</a></td>
    </tr>
  @endforeach
  </tbody>
 </table>
 @endif



