

   <form action ="{{route('search')}}">
<input type="text" name="search" >
<select name="category">
  <option value="category">Category</option>
  <option value="tName">Name</option>
</select><br>
<button> Search</button>
   </form>


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
      @if (Auth::user()->status==1)
          <td> <a href="{{route('update_medicine',$m->id)}}">Update</a></td>
      @endif
    </tr>
  @endforeach
  </tbody>
</table>

 @if(Auth::User()->status==1)
    <a href="{{route('update')}}">Update Your Medicines Expiration Date</a>
    @endif
