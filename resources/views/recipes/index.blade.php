@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recipes</h1>
    @foreach ($recipes as $recipe)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary">View Recipe</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
