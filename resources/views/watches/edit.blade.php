@extends('layouts.app')

@section("title", "edit Watch")

@section("content")
<div class="container mt-5">
  <h2 class="text-center mb-4">edit Watch</h2>

  <form action="{{ route('watches.update',$watch->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="form-group">
      <label for="name">Watch Name</label>
      <input type="text" name="name" class="form-control" value="{{$watch->name}}" placeholder="Enter watch name" required>
    </div>

    <div class="form-group">
      <label for="price">Price ($)</label>
      <input type="number" name="price" class="form-control" value="{{$watch->price}}" placeholder="Enter price" required>
    </div>

    <div class="form-group">
  <label for="brand_id">Brand</label>
  <select name="brand_id" class="form-control" required>
    @foreach($brands as $brand)
      <option value="{{ $brand->id }}" {{ $watch->brand_id == $brand->id ? 'selected' : '' }}>
        {{ $brand->name }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="category_id">Category</label>
  <select name="category_id" class="form-control" required>
    @foreach($categories as $category)
      <option value="{{ $category->id }}" {{ $watch->category_id == $category->id ? 'selected' : '' }}>
        {{ $category->name }}
      </option>
    @endforeach
  </select>
</div>

    <div class="form-group text-center">
  <label for="image">Watch Image</label><br>
  @if($watch->image)
    <img src="{{ asset('images/' . $watch->image) }}" alt="{{ $watch->name }}" style="max-width: 300px; height: auto; margin-bottom: 10px;">
  @endif
  <input type="file" name="image" class="form-control-file mx-auto d-block" style="max-width: 300px;">
</div>

<button type="submit" class="btn btn-primary mt-3 mb-4 d-block mx-auto">Update Watch</button>
  </form>
</div>
@endsection
