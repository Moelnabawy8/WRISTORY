@extends('layouts.app')

@section('title', 'Watch Details')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Watch Details</h2>

        <div class="card mx-auto" style="max-width: 500px;">
            <img src="{{ asset('images/' . $watch->image) }}" class="card-img-top" alt="Watch Image">
            <div class="card-body">
                <h4 class="card-title mb-3">{{ $watch->name }}</h4>
                <p><strong>Price:</strong>{{ $watch->price }} </p>
                <p><strong>Brand:</strong>{{ $watch->brand->name }}</p>
                <p><strong>Category:</strong>{{ $watch->category->name }}</p>
                <p><strong>Review:</strong></p>
                @foreach ($watch->reviews as $review)
                    <div class="mb-3">
                        <strong>{{ $review->user->name }}</strong>
                        <br>
                        Rating: {{ $review->rating }}/5
                        <br>
                        <p>{{ $review->comment }}</p>
                    </div>
                @endforeach
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('watches.edit', $watch->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('watches.destroy', $watch->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-5 mb-5">
            <a href="{{ route('watches.index') }}" class="btn btn-secondary px-5">Back to All Watches</a>
        </div>
    </div>
@endsection
