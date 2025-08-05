@extends('layouts.app')
@section('title', 'Watches')
@section('content')

    <div class="bg">

        <form method="GET" action="{{ route('watches.index') }}" class="mb-4">
            <div class="container">
                <div class="row justify-content-center align-items-end text-center">
                    <div class="col-md-3 mb-2">
                        <label for="brand_id" class="form-label">Brand</label>
                        <select id="brand_id" name="brand_id" class="form-control">
                            <option value="">All Brands</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $selectedBrand == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="category_id" class="form-label">Category</label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="price_sort" class="form-label">price</label>
                        <select id="price_sort" name="price_sort" class="form-control">
                            <option value="">Sort By Price</option>
                            <option value="low_to_high" {{ $selectedPrice == 'low_to_high' ? 'selected' : '' }}>Low to High
                            </option>
                            <option value="high_to_low" {{ $selectedPrice == 'high_to_low' ? 'selected' : '' }}>High to Low
                            </option>
                        </select>

                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" id="search" name="search" class="form-control"
                            value="{{ request('search') }}" placeholder="Enter name">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="price_min" class="form-label">Min Price</label>
                        <input type="number" id="price_min" name="price_min" class="form-control"
                            value="{{ request('price_min') }}">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="price_max" class="form-label">Max Price</label>
                        <input type="number" id="price_max" name="price_max" class="form-control"
                            value="{{ request('price_max') }}">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="date_sort" class="form-label">Sort by Date</label>
                        <select name="date_sort" id="date_sort" class="form-control">
                            <option value="">Sort by</option>
                            <option value="newest" {{ request('date_sort') == 'newest' ? 'selected' : '' }}>Newest First
                            </option>
                            <option value="oldest" {{ request('date_sort') == 'oldest' ? 'selected' : '' }}>Oldest First
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-3">Filter</button>
                        <a href="{{ route('watches.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </div>
        </form>

        <section class="brand_section layout_padding2">
            <div class="container">
                <div class="brand_heading">
                    <h3 class="custom_heading">Our watch brands</h3>
                    <p class="font-weight-bold">
                        Our watch brands represent a legacy of craftsmanship and innovation, offering designs that combine
                        style, precision, and durability to suit every taste.
                    </p>
                </div>
                <div class="text-right mb-3">
                    <a href="{{ route('watches.create') }}" class="btn btn-primary">
                        + Add New Watch
                    </a>
                </div>
            </div>
            <div class="container-fluid brand_item-container">
                @forelse ($watches as $watch)
                    <div class="brand_item-box mb-4 p-3 border rounded shadow-sm text-center">
                        <div class="brand_img-box mb-3">
                            <img src="{{ asset('images/' . $watch->image) }}" alt="{{ $watch->name }}"
                                class="img-fluid rounded" style="height: 200px; width: auto; object-fit: cover;">
                            <a href="{{ route('watches.show', $watch->id) }}" class="btn btn-outline-primary mt-2 px-4">
                                View More
                            </a>
                        </div>
                        <div class="brand_detail-box">
                            <h5>$<span>{{ $watch->price }}</span></h5>
                            <h6>{{ $watch->name }}</h6>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-100">No watches found.</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
