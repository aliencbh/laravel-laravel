@extends('layouts.app1')
@section("content")
<h1>Create New Sales</h1>
<form method="post" action="/sales">
  @csrf
  <div class="form-group m-2">
    <label for="name">Product name</label>
    <select id="idSelect">
      @if(count($products) > 0)
      @foreach ($products as $product)
      <option value="{{ $product->id }}">{{ $product->name }}</option>
      @endforeach
      @endif
    </select>
  </div>
  <div class="form-group m-2">
    <label for="qty">Qty</label>
    <input type="text" class="form-control" name="qty" id="qty" placeholder="Enter qty">
  </div>
  <div class="form-group m-2">
    <label for="quantityPrice">RM/unit</label>
    <input type="text" class="form-control" name="quantityPrice" id="quantityPrice" value="{{$quantity_prices->first()->quantity_price }}">
  </div>
  <div class="form-group m-2">
    <label for="total_price">Total RM</label>
    <input type="text" class="form-control" name="total_price" id="total_price" value="">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
