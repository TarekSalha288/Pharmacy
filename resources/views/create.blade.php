<h1>Welcome Admin {{ Auth::user()->name }}</h1>
<form action="{{ route('insert') }}">
    @csrf
    <input type="text" name="sName" placeholder="Scientific Name" value="{{ old('sName') }}">
    @error('sName')
        {{ $message }}
    @enderror
    <br>
    <input type="text" name="tName" placeholder="Trade Name" value="{{ old('tName') }}">
    @error('tName')
        {{ $message }}
    @enderror
    <br>
    <input type="text" name="category" placeholder="Category" value="{{ old('category') }}">
    @error('category')
        {{ $message }}
    @enderror
    <br>
     <input type="text" name="company" placeholder="Company Name" value="{{ old('company') }}">
    @error('company')
        {{ $message }}
    @enderror
    <br>
    <input type="text" name="amount" placeholder="Insert Amount" value="{{ old('amount') }}">
    @error('amount')
        {{ $message }}
    @enderror
    <br>
    <input type="text" name="price" placeholder="Price" value="{{ old('price') }}">
    @error('price')
        {{ $message }}
    @enderror
    <br>
    <input type="date" name="exDate" placeholder="Expiration Date" value="{{ old('exDate') }}">
    @error('exDate')
        {{ $message }}
    @enderror
    <br>
    <button>Insert</button>
</form>
