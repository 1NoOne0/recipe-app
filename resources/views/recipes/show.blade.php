@extends('layouts.app')

@section('content')
    <h1>{{ $recipe->name }}</h1>
    <p>Author: {{ $recipe->author }}</p>
    <p>Meal Time: {{ $recipe->meal_time }}</p>

    <h3>Reviews</h3>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <input type="number" name="rating" max="5" min="1">
        <textarea name="text" placeholder="Write a review"></textarea>
        <button type="submit">Submit Review</button>
    </form>

    @foreach($recipe->reviews as $review)
        <div>
            <strong>{{ $review->author->username }}</strong>
            <p>Rating: {{ $review->rating }}</p>
            <p>{{ $review->text }}</p>
        </div>
    @endforeach
@endsection
