@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Recipes</h1>
            @foreach ($recipes as $recipe)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->title }}</h5>
                        <p class="card-text">{{ $recipe->description }}</p>
                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary">View Recipe</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
