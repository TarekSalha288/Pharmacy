<form action="{{ route('update_medicine_admin',$medicine->id) }}" method="POST">
    @csrf
    <input type="text" name="sName" placeholder="Scientific Name" value="{{ old('sName', $medicine->sName) }}">
    @error('sName')
        <div class="error">{{ $message }}</div>
    @enderror
    <br>
    <input type="text" name="tName" placeholder="Trade Name" value="{{ old('tName', $medicine->tName) }}">
    @error('tName')
        <div class="error">{{ $message }}</div>
    @enderror
    <br>
    <input type="text" name="category" placeholder="Category" value="{{ old('category', $medicine->category) }}">
    @error('category')
        <div class="error">{{ $message }}</div>
    @enderror
    <br>
    <input type="text" name="company" placeholder="Company Name" value="{{ old('company', $medicine->company) }}">
    @error('company')
        <div class="error">{{ $message }}</div>
    @enderror
    <br>
    <input type="text" name="amount" placeholder="Insert Amount" value="{{ old('amount', $medicine->amount) }}">
    @error('amount')
        <div class="error">{{ $message }}</div>
    @enderror
    <br>
    <input type="text" name="price" placeholder="Price" value="{{ old('price', $medicine->price) }}">
    @error('price')
        <div class="error">{{ $message }}</div>
    @enderror
    <br>
    <input type="date" name="exDate" placeholder="Expiration Date" value="{{ old('exDate', $medicine->exDate) }}" disabled>
    @error('exDate')
        <div class="error">{{ $message }}</div>
    @enderror
    <br>
    <button type="submit">Update</button>
    <br>
    <a href="{{route('show')}}">Back</a>
</form>
