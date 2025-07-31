@extends('layouts.app')

@section("title", "Add New Watch")

@section("content")
<div class="container mt-5">
  <h2 class="text-center mb-4">Add New Watch</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('watches.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Watch Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter watch name" required>
    </div>

    <div class="form-group">
      <label for="price">Price ($)</label>
      <input type="number" name="price" class="form-control" placeholder="Enter price" required>
    </div>

    <div class="form-group">
      <label for="brand_id">Brand</label>
      <select name="brand_id" class="form-control" required>
        @foreach ($brands as $brand)
          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id" class="form-control" required>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    
    <div class="form-group text-center mt-4">
      <label for="image" class="d-block">Watch Image</label>
      <input type="file" name="image" class="form-control-file d-block mx-auto" style="max-width: 300px;">
    </div>

    
    <div class="text-center mt-4 mb-3">
      <button type="submit" class="btn btn-primary px-5">Add Watch</button>
    </div>

  </form>
</div>
@endsection
